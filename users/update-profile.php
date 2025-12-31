<?php
session_start();
require "../config/config.php";


if (isset($_GET['upd_id'])) {
    $id = $_GET['upd_id'];

    $select = $conn->prepare("SELECT *FROM users WHERE id=:id");
    $select->execute([':id' => $id]);

    $row = $select->fetch(PDO::FETCH_OBJ);

    if (isset($_POST['submit'])) {

        if (empty($_POST['username']) or empty($_POST['email'])) {
            echo "<script>alert('username or email are empty')</script>";
        } else {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $bio = $_POST['bio'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $linkedin = $_POST['linkedin'];
            $img = $_FILES['img']['name'];
            $cv = $_FILES['cv']['name'];
            $dir_img = 'user-images/' . basename($img);
            $dir_cv = 'user-cvs/' . basename($cv);

            $update = $conn->prepare("UPDATE users SET username=:username,email=:email,title=:title, bio=:bio, facebook=:facebook,twitter=:twitter, linkedin=:linkedin,img=:img,cv=:cv  WHERE id=:id");

            $update->execute([
                ':username' =>  $username,
                ':email' => $email,
                ':title' => $title,
                ':bio' => $bio,
                ':facebook' => $facebook,
                ':twitter' => $twitter,
                ':linkedin' => $linkedin,
                ':img' => $img,
                ':cv' => $cv,
                ':id' => $id
            ]);
            if (move_uploaded_file($_FILES['img']['tmp_name'], $dir_img) and move_uploaded_file($_FILES['cv']['tmp_name'], $dir_cv)) {
                echo "done";
            }
        }
    }
} else {
    echo "404";
}
?>



<?php
require "../includes/header.php";
?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Update Profile</h1>
                <div class="custom-breadcrumbs">
                    <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Update Profile</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form action="update-profile.php?upd_id=<?php echo $id; ?>" class="" method="POST" enctype="multipart/form-data">

                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Username</label>
                            <input type="text" id="fname" name="username" value="<?php echo $row->username; ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Email</label>
                            <input type="email" id="lname" name="email" value="<?php echo $row->email; ?>" class="form-control">
                        </div>
                    </div>
                    <?php if (isset($_SESSION['type']) and $_SESSION['type'] == "Worker"): ?>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Title</label>
                                <input type="text" id="" value="<?php echo $row->title; ?>" name="title" class="form-control">
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Bio</label>
                            <textarea name="bio" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."> <?php echo $row->bio; ?></textarea>

                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Facebook</label>
                            <input type="subject" id="subject" name="facebook" value="<?php echo $row->facebook; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Twitter</label>
                            <input type="subject" id="subject" name="twitter" value="<?php echo $row->twitter; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Linkedin</label>
                            <input type="subject" id="subject" name="linkedin" value="<?php echo $row->linkedin; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Image</label>
                            <input type="file" name="img" id="" class="form-control">
                        </div>
                    </div>
                    <?php if (isset($_SESSION['type']) and $_SESSION['type'] == "Worker"): ?>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">CV</label>
                                <input type="file" id="" name="cv" class="form-control">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                        </div>
                    </div>


                </form>
            </div>
            <!-- <div class="col-lg-5 ml-auto">
                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Address</p>
                    <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="#">youremail@domain.com</a></p>

                </div>
            </div> -->
        </div>
    </div>
</section>

<?php
require "../includes/footer.php";
?>