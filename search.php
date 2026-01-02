<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "config/config.php";
if (isset($_POST['submit'])) {
    // echo "submitted";

    if (empty($_POST['job_title']) or empty($_POST['job_region']) or empty($_POST['job_type'])) {
        echo "<script>alert('one input or more are empty')</script>";
    } else {
        $job_title = $_POST['job_title'];
        $job_region = $_POST['job_region'];
        $job_type = $_POST['job_type'];

        $search = $conn->prepare("SELECT * FROM jobs WHERE job_title LIKE ? AND job_region LIKE ? AND job_type LIKE ? AND status = 1");
        $search->execute(["%$job_title%", "%$job_region%", "%$job_type%"]);

        $searchRes = $search->fetchAll(PDO::FETCH_OBJ);
    }
} else {
    header("location:" . APPURL . "");
}
?>


<?php require "includes/header.php"; ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APPURL; ?>/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Search result for </h1>
                <div class="custom-breadcrumbs">
                    <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Search</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">


        <ul class="job-listings mb-5">

            <?php if (count($searchRes)): ?>
                <?php foreach ($searchRes as $oneJob): ?>
                    <li
                        class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="<?php echo APPURL; ?>jobs/job-single.php?id=<?php echo $oneJob->id; ?>"></a>
                        <div class="job-listing-logo">

                            <!-- $profile->img; -->
                            <img
                                src="users/user-images/<?php echo $oneJob->company_image; ?>"
                                alt="Free Website Template by Free-Template.co"
                                class="img-fluid" />
                        </div>

                        <div
                            class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div
                                class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2><?php echo $oneJob->job_title; ?></h2>
                                <strong><?php echo $oneJob->company_name; ?></strong>
                            </div>
                            <div
                                class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> <?php echo $oneJob->job_title; ?>
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-<?php if ($oneJob->job_type == 'Part Time') {
                                                                echo 'danger';
                                                            } else {
                                                                echo 'success';
                                                            }  ?>"><?php echo $oneJob->job_type; ?></span>
                            </div>
                        </div>
                    </li>
                    <br>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-danger bg-danger text-white">there are no searches with this job just yet</div>
            <?php endif; ?>
        </ul>
    </div>
</section>
<?php require "includes/footer.php"; ?>