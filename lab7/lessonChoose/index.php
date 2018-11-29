<?php
session_start();
if(isset($_SESSION['sisi'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Хичээл сонгох</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<script src="./js/master.js"></script>
</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<?php if(!(int)$_SESSION['sisi']){ ?>
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Тавтай морилн уу!  <?php echo $_SESSION['sisi']  ?></th>
							</tr>
						</thead>
						<tbody>
							<tr class="row100" data-sCredits="0" onClick="select(this)">
								<td class="column100 column1">Нэг оюутанаар бүх хичээлүүдыг нь сонгосон бол заавал баталгаажуулах товчыг дарну!!</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">SISI</th>
								<th class="column100 column2" data-column="column2">First Name</th>
								<th class="column100 column3" data-column="column3">Last Name</th>
								<th class="column100 column4" data-column="column4">Programm</th>
							</tr>
						</thead>
						<tbody id="students">
						</tbody>
					</table>
				</div>
			<?php }else{?>
				<table data-vertable="ver1">
					<thead>
						<tr class="row100 head">
							<th class="column100 column1" data-column="column1" colspan = "2">Тавтай морилн уу!  <?php echo $_SESSION['sisi']  ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="row100" data-sCredits="0" onClick="select(this)">
							<td class="column100 column1" style="display:none"><?php echo $_SESSION['sisi']  ?></td>
							<td class="column100 column1">Хичээлүүдээ сонгосон бол заавал баталгаажуулах товчыг дарну!!</td>
							<td class="column100 column1">Хичээл сонгож эхлэх</td>
						</tr>
					</tbody>
				</table>
			<?php } ?>
				<div id="error"></div>
				<div class="table100 ver2 m-b-110">
					<table data-vertable="ver2">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Lesson ID</th>
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column3" data-column="column3">Gredit</th>
								<th class="column100 column4" data-column="column4">Chairs</th>
								<th class="column100 column5" data-column="column5">Select</th>
							</tr>
						</thead>
						<tbody id="lessons">
						</tbody>
					</table>
					<button type="button" onClick="valdation()" class="btn btn-primary ml-5 mt-5">Баталгаажуулах</button>
					<p id="result"></p>
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
}else{
	header('Location: ' . "http://mazenet.com/lab7/login/");
}
?>
