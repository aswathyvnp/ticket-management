<?php require 'connection.php'; ?>
<?php require 'header.php'; ?>
<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    if(isset($_POST['pass'])&&isset(($_POST['cpass']))){
        $pass=md5($_POST['pass']);
        $cpass=md5($_POST['cpass']);
        if($pass!=$cpass){
            echo"Password not same";
        }
        else{
            $pass=$cpass;
            $sql='UPDATE users SET PASSWORD=:pass WHERE TOKEN=:token';
            $statement=$connection->prepare($sql);
            if($statement->execute(['pass'=>$pass,'token'=>$token])){
                echo "Success";
            }
            else{
                echo "Failed";
            }
        }
    }
}
else{
    echo "Token not found";
}
?>
        
        <div class="container col-10 col-md-6  justify-content-center">
            <div class="row  justify-content-center">
                <div class="col-12 col-md-10  text-white text-center">
                    <h2>Reset Password</h2>
                    <form action="" method="post" class="">
                      
                        <div class="pb-4">
                            <input
                                type="password"
                                placeholder="Password"
                                id=""
                                class="form-control"
                                name="pass"
                                required
                            />
                        </div>
                        <div class="pb-4">
                            <input
                                type="password"
                                placeholder="Confirm-password"
                                id=""
                                class="form-control"
                                name="cpass"
                                required
                            />
                        </div>                          
                        <div class="text-center">
                            <button
                                type="Submit"
                                name="log"
                                class="btn btn-success mb-5"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
<?php require 'footer.php'; ?>
      
