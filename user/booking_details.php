<?php
   session_start();
    require "connection.php";

$p=$_SESSION['passenger_name'];
$n=$_SESSION['count'];


if(isset($_POST['confirm'])){
    // $length = count($passenger_name);
    // $count=$_POST['person_count'];
    for($i=0;$i<$n;$i++){
        $sql='INSERT INTO booking(name) VALUES(:fname)';
        $sql='INSERT INTO passenger(name) VALUES(:fname)';
        $statement=$connection->prepare($sql);
        $log=$statement->execute([':fname'=>$p[$i]]);
    }
          
      
}

 require "header.php";

?>
<div class="container-fluid main_grad m-0 p-0">
	<nav
		class="navbar row justify-content-around justify-content-start justify-content-lg-around p-0 m-0 py-3 sticky-top"
		id="navigate"
	>
		<div class="col-12 text-center text-lg-start col-lg-10 p-0 m-0">
			<a class="navbar-brand" href="#">
				<img
					src="images/logo2.png"
					alt="Logo"
					class="d-inline-block rounded-5 firstwidth"
				/>
				<span class="text-light fw-bold"> AMATMA </span>
				<span class="text-danger">Airlines</span>
			</a>
		</div>
	</nav>
</div>

<div class="col-12 col-lg-12 row justify-content-center p-0 m-0">
	<div class="col-10 col-lg-8">
		<p class="text-center fw-bold fs-4">Flight Information</p>
		<p class="text-center fw-bold fs-5">Flight name</p>
		<hr />
		<div class="row justify-content-center m-0 p-0">
			<div class="col-6 col-lg-">
				<p class="fw-bold text-center">From</p>
				<p class="text-center"></p>
			</div>

			<div class="col-6 col-lg-">
				<p class="fw-bold text-center">To</p>
				<p class="text-center"><?php ?></p>
			</div>
		</div>
		<p class="text-center">Class</p>
		<p class="text-center">time</p>
		<p class="text-center">date</p>
		<hr />
	</div>

	<p class="text-center fw-bold fs-5">Passenger details</p>
	<div class="row justify-content-center m-0 p-0 col-10 col-lg-8">
		<div class="col-6 col-lg-">
			<p class="text-center fw-bold">Name</p>
           <?php foreach($passenger_name as $name){?>
			<p class="text-center"><?=$name ?></p>
            <?php } ?>
		</div>
		<div class="col-6 col-lg-">
			<p class="text-center fw-bold">Number of passengers</p>
			<p class="text-center"><?= $count ?></p>
		</div>
		<p class="text-center fw-bold">Rate</p>
		<p class="text-center"><?php ?></p>
	</div>
	<div class="col-10 col-lg-6 text-center">
        <form action="" method="POST">
		<button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
		<button type="submit" name="confirm" class="btn btn-primary">Confirm</button>
        </form>
	</div>
</div>

<footer class="row justify-content-center bg-black mt-3 py-3 p-0 m-0">
	<div class="col-10 col-lg-4 p-0 m-0">
		<p class="text-center text-light py-3">
			visit our official website at www.amatma.com
		</p>
	</div>
	<div class="col-10 col-lg-4 p-0 m-0 text-center py-3">
		<a class="navbar-brand" href="#">
			<img
				src="images/logo2.png"
				alt="Logo"
				class="d-inline-block rounded-5 wid"
			/>
			<span class="text-light fw-bold"> AMATMA </span>
			<span class="text-danger">Airlines</span>
		</a>
	</div>
	<div class="col-10 col-lg-4 p-0 m-0 py-3">
		<p class="text-center text-light m-0">&copy; 2023 AMATMA PVT. LTD.</p>
		<p class="text-center text-light m-0">Country India</p>
	</div>
</footer>

<?php
    require "footer.php";
?>
