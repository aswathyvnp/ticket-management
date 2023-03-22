<?php
    require "connection.php";
    require "header.php";
?>
<?php
    session_start();
    if(isset($_POST['login']))
    {
        $password=md5($_POST['password']);
        $email=$_POST['email'];
        $sql='SELECT * FROM users WHERE email=:email';
        $statement=$connection->prepare($sql);
        $sql_execute=$statement->execute([':email'=>$email]);
        $db_data=$statement->fetch(PDO::FETCH_OBJ);
        $p=$db_data->password;
        
        if ($p==$password){
            $_SESSION['email']=$email;
            header("Location:index.php");
        }
        
       else{
        echo"<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ivalid email or password !',
          })</script>";
       }
    } 
    
?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
 $db = new PDO("mysql:host=localhost;dbname=ticket_management_system", "root", "");
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$token = bin2hex(random_bytes(32));

if(isset($_POST['password-reset-token']) && isset($_POST['email']))
{
    $email_address = $_POST['email'];
    $query = $db->prepare("UPDATE users   SET token=:token WHERE email=:email");
    $query->execute(array(':token' => $token, ':email' => $email_address));
    $reset_url = "http://localhost/ticket-management/reset_password.php?token=" . $token;



    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thomaztibin@gmail.com';                     //SMTP username
        $mail->Password   = 'trhogfbzqigukqnx';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('thomaztibin@gmail.com', 'admin');
        $mail->addAddress($email_address);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'password reset';
        $mail->Body    = 'To reset your password, please click the following link:'.$reset_url;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo '<script>alert("Message sent");</script>';
        echo "message sent";
    } catch (Exception $e) {
        // echo '<script>alert("Message not sent");</script>';
        echo "message not send";
    }
}
else{
//   echo "error";
}
?>
<!-- mailing end -->

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
                <input type="email" placeholder="Enter your email"  class="form-control py-3" name="email" required >
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
                <a href="" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgotten Password</a>
            </div>
        </form>
    </div>
    
<!-- Modal reset password -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" method="POST">
               
              <div><input type="email" class="form-control" id="check_mail" placeholder="Enter your email" aria-label="Email" aria-describedby="emailHelp" name="email" class="mt-2">
                    <p id="status"></p>
                    
                                    
                                        <small
                                            id="emailHelp"
                                            class="form-text text-muted"
                                            >We'll never share your email.</small
                                        >
              </div>
            </div>
                  <div class="modal-footer">
                    <input type="submit" value="Submit" class="btn btn-primary" name="password-reset-token"></input>
                </div>
            </form>
          </div>
        </div>
      </div>
        </form>
    </div>
 
 <?php 
    require "footer.php";
?>
<script>

$(document).ready(()=>{
    $('#check_mail').keyup(()=>{
        let email_search=$('#check_mail').val();
        console.log(email_search);
        $.ajax({
            url:'livesearch.php',
            method:'POST',
            data:{email:email_search},                        
            success: function(data){
                
                if(data!=0){
                    $('#status').html("Success");
                           
                    }

                }
                else{
                    $('#status').html("Fail");
                }
                
            })
        })
    })
        

</script>