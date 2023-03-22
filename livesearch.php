<?php
    require('connection.php');
?>
<?php
    if(isset($_POST['email'])){
        $input=$_POST['email'];
        $sql='SELECT * FROM users WHERE email=:email';
        $statement=$connection->prepare($sql);
        $statement->execute(['email'=>$input]);  
        $result=$statement->fetch(PDO::FETCH_OBJ);
        if($statement->rowCount()>0){
            echo json_encode($result);
        }
        else{
            echo "0";
        }

   }
?>