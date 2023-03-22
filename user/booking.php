<?php
   session_start();
    require "connection.php";


// if(isset($_POST['submit'])){
// $count=$_POST['person_count'];
// $fname=$_POST['fname'];
// echo $fname;
// $fname2=$_POST['fname2'];
// echo $fname2;
// $fname3=$_POST['fname3'];
// echo $fname3;
// $fname4=$_POST['fname4'];
// echo $fname4;
// $fname5=$_POST['fname5'];
// echo $fname5;}
// $_SESSION['submit'];
if(isset($_POST['submit'])){
    $count=$_POST['person_count'];
    $fname=$_POST['fname'];
    echo $fname;
    $fname2=$_POST['fname2'];
    echo $fname2;
    $fname3=$_POST['fname3'];
    echo $fname3;
    $fname4=$_POST['fname4'];
    echo $fname4;
    $fname5=$_POST['fname5'];
    echo $fname5;
    $passenger_name=[$fname,$fname2,$fname3,$fname4,$fname5];
   
   
    for($i=0;$i<5;$i++){
        if($passenger_name[$i]!==''){
            $p[$j]=$passenger_name[$i];
            $j++;
        }
    }
    // echo "hello";
    // print_r($p);
    // $n=count($p);
    // echo $n; 
	$_SESSION['passenger_name']=$p;
	$_SESSION['count']=$count;
	header('Location:booking_details.php?');
	echo "<script>window.location.href='booking_details.php?'</script>";
}

 require "header.php";


?>

<!-- Image and text -->
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
	<div class="container-fluid">
		<div class="row justify-content-center m-0 p-0 mt-5 pt-4">
			<p class="header_fond text-center">Book your ticket!</p>
		</div>
		<p class="text-danger text-center">
			Now
			<?php ?>
			seats are available!
		</p>
	</div>
	<form action="" method="POST" class="pb-5 mb-5">
		<div class="row m-0 p-0 justify-content-center">
			<div class="col-8 col-lg-3 m-0 p-0 row justify-content-center mb-3">
				<input
					type="text"
					class="py-3 my-3 border rounded-3 bg-white shadow"
					placeholder="FullName"
					name="fname"
					required
				/>
				<div class="row m-0 p-0 justify-content-center">
					<input
						type="text"
						name="person_count"
						class="py-3 my-3 border rounded-3 bg-white shadow col-9 col-lg-6"
						placeholder="Number of Passenger"
						id="person_count"
						required
					/>
				</div>

				<!-- second passenger -->

				<div id="person1" class="py-5">
					<input
						type="text"
						name="fname2"
						class="py-3 my-3 border rounded-3 bg-white shadow form-control"
						placeholder="FullName"
						id=""
					/>
				</div>
				<!-- third passenger -->
				<div id="person2" class="py-5">
					<input
						type="text"
						class="py-3 my-3 border rounded-3 bg-white shadow form-control"
						placeholder="FullName"
						name="fname3"
					/>
				</div>
				<!-- fourth passenger -->
				<div id="person3" class="py-5">
					<input
						type="text"
						class="py-3 my-3 border rounded-3 bg-white shadow form-control"
						placeholder="FullName"
						name="fname4"
					/>
				</div>
				<!-- fifth passenger -->
				<div id="person4" class="py-5">
					<input
						type="text"
						class="py-3 my-3 border rounded-3 bg-white shadow form-control"
						placeholder="FullName"
						name="fname5"
					/>
				</div>
			</div>
		</div>
		<div
			class="col-12 col-lg-12 d-flex justify-content-center m-0 p-0 pb-3"
		>
			<input type="submit" name="submit" class="btn btn-outline-light" value="Book">
			
		</div>
	</form>
	<!-- no.of passengers end -->

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
			<p class="text-center text-light m-0">
				&copy; 2023 AMATMA PVT. LTD.
			</p>
			<p class="text-center text-light m-0">Country India</p>
		</div>
	</footer>
</div>

<?php
    require "user_footer.php";
?>
