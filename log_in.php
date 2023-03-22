<?php
require "connection.php";
require "header.php";
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
<div class="container-fluid row bg-secondary bg-opacity-25 m-0 vh-fitcontent py-5">
    <div class="col-12 col-md-6 col-lg-6 align-self-center row justify-content-center m-0 p-0">
        <div class="col-12 col-md-8 py-0 py-md-5">
            <img src="images/login.png" alt="login image" class="img-fluid py-0 py-md-5">
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5 align-self-center   m-0 p-0">
        <h1 class="text-center fs-1 py-0 py-md-5">LOGIN</h1>
        <form method="POST">
            <div class="mt-5">
                <input type="email" placeholder="Enter your email" class="form-control py-3" name="email" required>
            </div>
            <div class="mt-3">
                <input type="password" placeholder="Password" class="form-control py-3" name="password" required>
            </div>
            <div class="mt-3">
                <input type="submit" value="Login" class="form-control btn btn-primary py-3" name="login">
            </div>
            <div class="mt-3">
                <a href="sign_up.php" class="form-control btn bg-info py-3">Create New Account</a>
            </div>
            <div class="mt-2">
                <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Forgotten Password</a>
            </div>
        </form>
    </div>


</div>
<?php
require "footer.php";
?>