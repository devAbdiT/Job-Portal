<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "../config/config.php";


if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $getJobs = $conn->prepare("SELECT * FROM jobs WHERE job_category=:job_category AND status=:status");
    $getJobs->execute([':job_category' => $name, ':status' => 1]);

    $getAllJobs = $getJobs->fetchAll(PDO::FETCH_OBJ);
}
?>



<?php require "../includes/header.php"; ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Jobs in <?php echo $name ?></h1>
                <div class="custom-breadcrumbs">
                    <a href="<?php echo APPURL ?>">Home</a> <span class="mx-2 slash">/</span>
                    <a href="#">Job</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong><?php echo $name ?></strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section" id="next">
    <div class="container">



        <ul class="job-listings mb-5">
            <?php foreach ($getAllJobs as $job): ?>
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="<?php echo APPURL; ?>jobs/job-single.php?id=<?php echo $job->id; ?>"></a>
                    <div class="job-listing-logo">
                        <img src="../users/user-images/<?php echo $job->company_image; ?>" alt="Image" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2><?php echo $job->job_title; ?></h2>
                            <strong><?php echo $job->company_name; ?></strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span><?php echo $job->job_region; ?>
                        </div>
                        <div class="job-listing-meta">
                            <span class="badge badge-<?php if ($job->job_type == 'Part Time') {
                                                            echo 'danger';
                                                        } else {
                                                            echo 'success';
                                                        }  ?>"><?php echo $job->job_type; ?></span>
                        </div>
                    </div>

                </li>
                <br>
            <?php endforeach; ?>



        </ul>



    </div>
</section>

<?php require "../includes/footer.php"; ?>