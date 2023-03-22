<?php
require "../connection.php";
require "../header.php";
require "../content_header.php"
?>

<?php

$sql = 'SELECT * FROM  category';
$statement = $connection->prepare($sql);
$statement->execute();
$category = $statement->fetchAll(PDO::FETCH_OBJ);

?>


<?php
if (isset($_POST['add_event'])) {
	$event_name = $_POST['event_name'];
	$category = $_POST['category'];
	$no_of_tickets = $_POST['no_of_tickets'];
	$starting_date = ($_POST['start_date']);
	$ending_date = $_POST['end_date'];
	$starting_time = ($_POST['start_time']);
	$ending_time = $_POST['end_time'];
	$sql = 'INSERT INTO  event(event_name,category,no_of_tickets,start_date,end_date,start_time,end_time) VALUES(:event_name,:category,:no_of_tickets,:starting_date,:ending_date,starting_time,ending_time)';
	$statement = $connection->prepare($sql);
	if ($statement->execute([':event_name' => $event_name, ':category' => $category, ':starting_date' => $starting_date, ':ending_date' => $ending_date, ':starting_time' => $starting_time, ':ending_time' => $ending_time])) {
		echo "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                  })</script>";
	}
}


?>
<?php
if (isset($_POST['delete_event'])) {
	$event_name = $_POST['event_name'];
	$sql = 'DELETE FROM event WHERE event_name=:event_name';
	$statement = $connection->prepare($sql);
	if ($statement->execute([':event_name' => $event_name])) {
		echo "<script>Swal.fire({
                icon: 'success',
                 text: 'Data deleted successfully!',
                   })</script>";
	}
}
?>
<div class="container-fluid">
	<section id="works">
		<div class="second-img"></div>
		<div class="admin_title">
			<form action="" method="POST">
				<div>
					<input type="text" placeholder="Event Name" name="event_name" class="mb-4 form-control">

				</div>
				<div class="row mb-3">
					<div class="col-sm">
						<label for="select">Choose Category</label>
						<select name="category" id="select">
							<?php foreach ($category as $value) : ?>
								<option value="<?php if (isset($_GET['id'])) {
													echo $value->id;
												} else {
													echo $value->name;
												} ?>">
									<?php if (isset($_GET['id'])) {
										echo $value->id;
									} else {
										echo $value->name;
									} ?>
								</option>
							<?php endforeach ?>
						</select>
					</div>

				</div>
				<div class="mb-3">

					<input type="text" placeholder="Total Number of Tickets" name="no_of_tickets" class="mb-4 form-control">

				</div>
				<div class="mb-3">

					<input type="text" placeholder="Price of Tickets" name="price_of_tickets" class="mb-4 form-control">

				</div>
				<div class="row mb-3">
					<div class="col-sm">
						<label for="starting_date">Starting Date</label>
						<input type="date" name="start_date" class="form-control">
					</div>
					<div class="col-sm">
						<label for="ending_date">Ending date</label>
						<input type="date" name="end_date" class="form-control">
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-sm">
						<label for="starting_time">Starting Time</label>
						<input type="time" name="start_time" class="form-control">
					</div>
					<div class="col-sm">
						<label for="ending_time">Ending Time</label>
						<input type="time" name="end_time" class="form-control">
					</div>
				</div>

				<input type="submit" name="add_event" value="ADD EVENT" class="btn btn-info">
				<input type="submit" name="delete_event" value="DELETE EVENT " class="btn btn-warning">


			</form>

		</div>
	</section>


</div>
<footer class="row justify-content-center bg-black mt-3 py-3 p-0 m-0">
	<div class="col-10 col-lg-4 p-0 m-0">
		<p class="text-center text-light py-3">
			visit our official website at www.amatma.com
		</p>
	</div>
	<div class="col-10 col-lg-4 p-0 m-0 text-center py-3">
		<a class="navbar-brand" href="#">
			<img src="../images/logo2.png" alt="Logo" class="d-inline-block rounded-5 wid" />
			<span class="text-light fw-bold"> AMATMA </span>
			<span class="text-danger"></span>
		</a>
	</div>
	<div class="col-10 col-lg-4 p-0 m-0 py-3">
		<p class="text-center text-light m-0">
			&copy; 2023 AMATMA PVT. LTD.
		</p>
		<p class="text-center text-light m-0">Country India</p>
	</div>
</footer>

<?php
require "../footer.php";
?>