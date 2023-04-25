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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link rel="stylesheet" href="css/overwrite.css" media="screen">

  <style>
		.grid-container {
		  display: grid;
		  grid-template-columns: repeat(7, 1fr);
		  grid-gap: 10px;
		  background-color: #2196F3;
		  color: white;
		  padding: 10px;
		  font-size: 1.5rem;
		}

		.grid-item {
		  border: 1px solid #ccc;
		  padding: 10px;
		  text-align: center;
		  font-size: 1.2rem;
		}

		.today {
		  background-color: #4CAF50;
		  color: white;
		  font-weight: bold;
		}
	</style>
</head>

<body class="u-body u-xl-mode" data-lang="en">
<?php
  include('header.php');
  
  //TODO: either a table or a grid that displays students who will go to cons.
  ?>
<section class="u-align-center u-clearfix u-section-1">
    <div class="u-clearfix u-sheet u-sheet-1">
    <div class="grid-container">
		<div class="grid-item">Pirmdiena</div>
		<div class="grid-item">Otrdiena</div>
		<div class="grid-item">Trešdiena</div>
		<div class="grid-item">Ceturtdiena</div>
		<div class="grid-item">Piektdiena</div>
		<div class="grid-item">Sestdiena</div>
		<div class="grid-item">Svētdiena</div>
		<div class="grid-item today">Pirmdiena</div>
		<div class="grid-item">Otrdiena</div>
		<div class="grid-item">Trešdiena</div>
		<div class="grid-item">Ceturtdiena</div>
		<div class="grid-item">Piektdiena</div>
		<div class="grid-item">Sestdiena</div>
		<div class="grid-item">Svētdiena</div>
	</div>
    </div>
</section>



<?php
  include('footer.php');
  ?>

</body>

</html>