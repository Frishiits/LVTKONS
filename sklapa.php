<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<title>Konsultacijas</title>
	<link rel="stylesheet" href="nicepage.css" media="screen">
	<link rel="stylesheet" href="pieteikties.css" media="screen">
	<script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
	<script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
	<meta name="generator" content="Nicepage 5.6.13, nicepage.com">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<link id="u-theme-google-font" rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
	<link rel="stylesheet" href="css/overwrite.css" media="screen">

	<style>
		.grid-container {
			display: grid;
			grid-template-columns: repeat(5, 1fr);
			grid-gap: 10px;
			background-color: #2c659f;
			color: white;
			padding: 10px;
			font-size: 1.5rem;
			margin-top: 3rem;
			margin-top: 2rem;
		}

		.grid-item {
			border: 1px solid #ccc;
			padding: 10px;
			text-align: center;
			font-size: 1.2rem;
		}

		.today {
			background-color: #fff;
			color: black;
			font-weight: bold;
		}

		.info {
			font-size: 0.8rem;
			margin-top: 5px;
		}

		.modal-body {
			text-align: -webkit-center;
		}
	</style>
</head>

<body class="u-body u-xl-mode" data-lang="en">
	<?php
	include('header.php');
	$parts = explode('@', $_SESSION['email']);
	$domain = array_pop($parts);
	$blocked_domains = array('sk'); // to block sub domain add sk in here
	if (!in_array(explode('.', $domain)[0], $blocked_domains)) {
		echo '<meta http-equiv="refresh" content="0; URL=block.php" />';

	}
	//TODO: either a table or a grid that displays students who will go to cons.
	$today = date("Y-m-d");
	$result = $pdo->query("SELECT * FROM pieteikums 
  INNER JOIN Konsultācija ON pieteikums.id_konsultacijas = Konsultācija.konsultācija_id 
  INNER JOIN skolotajs ON pieteikums.id_skolotajs = skolotajs.skolotajs_id 
  INNER JOIN skolnieks ON pieteikums.id_skolnieks = skolnieks.skolnieks_id 
  WHERE Konsultācija.laiks = '$today'");


	if (!$result) {
		die("Error retrieving data: " . $pdo->error());
	}
	$data = array();
	while ($row = $result->fetchAll()) {
		$data[] = $row;
	}
	$json_data = json_encode($data);
	?>

	<section class="u-align-center u-clearfix u-section-1">
		<div class="u-clearfix u-sheet u-sheet-1">

			<div class="grid-container">
				<div class="grid-item" id="grid-item-1" data-day="Pirmdiena">
					Pirmdiena
					<div class="info"></div>
				</div>
				<div class="grid-item" id="grid-item-2" data-day="Otrdiena">
					Otrdiena
					<div class="info"></div>
				</div>
				<div class="grid-item" id="grid-item-2" data-day="Trešdiena">
					Trešdiena
					<div class="info"></div>
				</div>
				<div class="grid-item" id="grid-item-4" data-day="Ceturtdiena">
					Ceturtdiena
					<div class="info"></div>
				</div>
				<div class="grid-item" id="grid-item-5" data-day="Piektdiena">
					Piektdiena
					<div class="info"></div>
				</div>
			</div>
			<div id="modal-container"></div>


			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel"><span id="day"></span></h4>
						</div>
						<div class="modal-body">
							<table class="table">
								<thead>
									<tr>
									</tr>
								</thead>
								<tbody id="modal-body-data">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script>
				var today = new Date();
				var dayOfWeek = today.getDay();
				var gridItems = document.getElementsByClassName("grid-item");
				switch (dayOfWeek) {
					case 1:
						gridItems[0].classList.add("today");
						break;
					case 2:
						gridItems[1].classList.add("today");
						break;
					case 3:
						gridItems[2].classList.add("today");
						break;
					case 4:
						gridItems[3].classList.add("today");
						break;
					case 5:
						gridItems[4].classList.add("today");
						break;
					default:
						console.log("Error: invalid day of week");
				}
				var today = new Date();

				var gridItems = document.getElementsByClassName("info");
				// add so it skips weekends 
				for (var i = 0; i < 5; i++) {
					var date = new Date();
					date.setDate(date.getDate() + i - dayOfWeek + 1);
					var day = date.getDate();
					var month = date.getMonth() + 1;
					var year = date.getFullYear();
					var dateString = year + "-" + month + "-" + day;


					gridItems[i].innerHTML = dateString;
				}


				$(document).ready(function () {
					$('.grid-item').click(function () {
						var myString = $(this).text();
						dateString = myString.replace(/[^\d-]+/g, '');

						$('#day').text('Pieteiktie: ' + dateString);
						$.ajax({
							url: 'backend/get_data.php',
							type: 'post',
							data: {
								date: dateString
							},
							success: function (response) {
								$('#modal-body-data').html(response);
								$('#myModal').modal('show');
							}
						});
					});
				});



			</script>





		</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
	<?php
	include('footer.php');
	?>

</body>

</html>