<?php
require "connection.php";
require "header.php";
?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = ($_POST['confirmpassword']);
    $phone = $_POST['phone'];

    $sql = 'SELECT * FROM users WHERE email=:email LIMIT 1';
    $statement = $connection->prepare($sql);
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "<script>Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Email already exist !',
            })</script>";
    } else if ($password != $confirmpassword) {
        echo "<script>Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Password not match !',
            })</script>";
    } else {
        $sql = 'INSERT INTO  users(name,email,password,phone) VALUES(:name,:email,:password,:phone)';
        $statement = $connection->prepare($sql);
        if ($statement->execute([':name' => $name, ':email' => $email, ':password' => md5($password), ':phone' => $phone,])) {
            echo "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registerd Successfully',
                    showConfirmButton: false,
                    timer: 1500
                  })</script>";
        }
    }
}

?>

<!-- nav -->
<nav class="navbar sticky-top navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="images/logo/logo-white.png" alt="logo" /></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="index.php" class="btn btn-primary nav-link text-white" aria-current="page">
                    Home
                </a>

            </div>
        </div>
    </div>
</nav>
<!-- nav -->

<div class="container-fluid row bg-secondary bg-opacity-25 m-0 vh-fit-content py-5">
    <div class="col-12 col-md-6 col-lg-6 align-self-center row justify-content-center m-0 p-0">
        <div class="col-12 col-md-8">
            <img src="images/register.png" alt="register image" class="img-fluid">
        </div>
    </div>
    <div class="col-12 col-md-5  align-self-center   m-0 p-0">
        <h1 class="text-center fs-1">SignUp</h1>
        <form method="POST" enctype="multipart/form-data" onsubmit="return validate()">
            <p id="a" class="text-danger"></p>
            <div class="mt-5">
                <input type="text" placeholder="Name" class="form-control py-2" name="name" id="name">
            </div>
            <div class="mt-4">
                <input type="email" placeholder="Email" class="form-control py-2" name="email" id="email">
            </div>
            <div class="mt-4">
                <input type="text" placeholder="Phone Number" class="form-control py-2" name="phone" id="phone">
            </div>
            <div class="mt-4">
                <input type="password" placeholder="Password" class="form-control py-2" name="password" id="password">
            </div>
            <div class="mt-4">
                <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="form-control py-2">
            </div>
            <div class="mt-4">
                <input type="submit" value="Submit" class="form-control btn btn-primary py-3" name="submit">
            </div>
            <div class="mt-4">
                <a href="log_in.php" class="form-control btn bg-info py-3">Already Have an Account?</a>
            </div>
        </form>
    </div>
</div>
<?php
require "footer.php";
?>