<!-- displaying Job seeker -->
<?php require "../config/config.php";

$select = $conn->prepare("SELECT * FROM users WHERE type=:type");
$select->execute([':type' => 'Worker']);

$allWorkers = $select->fetchAll(PDO::FETCH_OBJ);

?>
<?php require "../includes/header.php"; ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APPURL; ?>/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Workers</h1>
                <div class="custom-breadcrumbs">
                    <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Workers</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="site-section" style="" id="home-section">
    <div class="container">
        <div class="row">
            <?php foreach ($allWorkers as $worker): ?>
                <div class="col-md-4 ">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" style="height:200px; 18rem;" src="../users/user-images/<?php echo $worker->img; ?>" alt="<?php echo $worker->img; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $worker->username; ?></h5>
                            <p class="card-text"><?php echo $worker->bio; ?></p>
                            <a target="_blank" href="../users/public-profile.php?id=<?php echo $worker->id; ?>" class="btn btn-primary">Go to Profile</a>
                        </div>
                    </div>
                    <br>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php require "../includes/footer.php"; ?>