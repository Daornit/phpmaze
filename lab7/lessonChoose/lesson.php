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
	<script type="text/javascript">
		let DataXML;
		$(document).ready(function(){
			let lessonsTable = $("#lessons");
			let ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
							DataXML = this.responseXML;
							let lessons = DataXML.getElementsByTagName("lesson");
							for(let i=0;i<lessons.length;i++){
								let td = lessons[i].childNodes;
								lessonsTable.append(`
					        <tr class="row100" data-lChair="0">
					  			<td class="column100 ">${td[1].innerHTML}</td>
					  	   	<td class="column100 ">${td[0].innerHTML}</td>
					  			<td class="column100 ">${td[2].innerHTML}</td>
					  			<td class="column100 ">${td[3].innerHTML}</td>
					        <td class="column100 ">${td[4].innerHTML}</td>
									<td class="column100 ">${td[5].innerHTML}</td>
					  			</tr>
					      `);
							}
				 }
			};
			ajax.open("GET","http://mazenet.com/lab7/lessonByXML.php",true);
			ajax.send();
		});
	</script>
</head>
<body>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver2 m-b-110">
					<table data-vertable="ver2">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Хичээлийн Нэр</th>
								<th class="column100 column2" data-column="column2">Lesson ID</th>
								<th class="column100 column3" data-column="column3">Кредит цаг</th>
								<th class="column100 column3" data-column="column4">Харяалагдах мэргэжил</th>
								<th class="column100 column4" data-column="column5">Суудын тоо</th>
								<th class="column100 column5" data-column="column6">Нийт сонгогдсон суудал</th>
							</tr>
						</thead>
						<tbody id="lessons">
						</tbody>
					</table>
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
