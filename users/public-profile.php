<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "../config/config.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // if ((int)$_SESSION['id'] !== (int)$id) {
    //     header("location:" . APPURL . "");
    // }

    $select = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $select->execute([':id' => $id]);
    $profile = $select->fetch(PDO::FETCH_OBJ);

    // Jobs Created By this Company

    $jobs = $conn->prepare("SELECT * FROM jobs WHERE company_id=:company_id AND status=:status");
    $jobs->execute(['company_id' => $id, ':status' => 1]);
    $moreJobs = $jobs->fetchALL(PDO::FETCH_OBJ);
} else {
    echo "404";
}
?>
<?php
require "../includes/header.php";
?>
<!-- Home -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APPURL; ?>/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold"><?php echo $profile->username; ?></h1>
                <div class="custom-breadcrumbs">
                    <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong><?php echo $profile->username; ?></strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section" style="" id="home-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="user-images/<?php echo $profile->img; ?>" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <?php if (isset($_SESSION['type']) and $_SESSION['type'] == 'Worker') : ?>
                            <a class="btn btn-success text-white" href="user-cvs/<?php echo $profile->cv; ?>" role="button" download>Download CV</a>
                        <?php endif; ?>
                        <h5 class="mt-2 mb-0"><?php echo $profile->username; ?></h5>
                        <?php if (isset($_SESSION['type']) and $_SESSION['type'] == 'Worker') : ?>
                            <span><?php echo $profile->title; ?></span>
                        <?php endif; ?>
                        <div class="px-4 mt-1">
                            <p class="fonts"><?php echo $profile->bio; ?></p>

                        </div>

                        <div class="px-3">
                            <a href="<?php echo $profile->facebook; ?>" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                            <a href="<?php echo $profile->twitter; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="<?php echo $profile->linkedin; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>



                    </div>




                </div>
            </div>
        </div>


    </div>
</section>

<section class="site-section">
    <div class="container">

        <?php if (isset($_SESSION['type']) and $_SESSION['type'] == "Company" and $_SESSION['id'] == $id): ?>
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Jobs Posted by this Company</h2>
                </div>
            </div>
        <?php endif; ?>
        <ul class="job-listings mb-5">

            <?php foreach ($moreJobs as $oneJob): ?>
                <li
                    class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="<?php echo APPURL; ?>jobs/job-single.php?id=<?php echo $oneJob->id; ?>"></a>
                    <div class="job-listing-logo">

                        <!-- $profile->img; -->
                        <img
                            src="./user-images/<?php echo $oneJob->company_image; ?>"
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

        </ul>
    </div>
</section>
<?php
require "../includes/footer.php";
?>