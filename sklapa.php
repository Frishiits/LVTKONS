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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      padding: 4rem;
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
        <div class="grid-item" id="grid-item-1">
          Pirmdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="grid-item-2">
          Otrdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="grid-item-3">
          Trešdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="grid-item-4">
          Ceturtdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="grid-item-5">
          Piektdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="Pirmdiena">
          Pirmdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="Otrdiena">
          Otrdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="Trešdiena">
          Trešdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="Ceturtdiena">
          Ceturtdiena
          <div class="info"></div>
        </div>
        <div class="grid-item" id="Piektdiena">
          Piektdiena
          <div class="info"></div>
        </div>
      </div>
      <div id="modal-container"></div>


      <div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modal-body">
              Modal body text goes here.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

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
          case 6:

            break;
          case 7:

            break;
          default:
            console.log("Error: invalid day of week");
        }

        var today = new Date();
        var dayOfWeek = today.getDay();

        var gridItems = document.getElementsByClassName("info");
        // add so it skips weekends 
        for (var i = 0; i < 5; i++) {
          var date = new Date();
          var dayOfWeekIndex = (dayOfWeek + i) % 7;
          date.setDate(date.getDate() + i - dayOfWeek + 1);
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var dateString = day + "." + month;
          gridItems[i].innerHTML = dateString;
        }
        jQuery(document).ready(function() {
  // Get current date and time
  var today = new Date();
  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  
  // Send AJAX request to retrieve data from database
  $.ajax({
    url: "backend/get_data.php",
    method: "POST",
    data: {date: date, time: time},
    success: function(data) {
      // Check if data is not empty
      if (data != '') {
        // Parse JSON data
        var result = JSON.parse(data);
        
        // Loop through each record and create a table row
        var table_data = '';
        for (var i = 0; i < result.length; i++) {
          table_data += '<tr>';
          table_data += '<td>' + result[i].prieksmets + '</td>';
          table_data += '<td>' + result[i].skolotaja_vards + ' ' + result[i].skolotaja_uzvards + '</td>';
          table_data += '<td>' + result[i].kabinets + '</td>';
          table_data += '<td>' + result[i].sakums + '</td>';
          table_data += '<td>' + result[i].beigas + '</td>';
          table_data += '<td>' + result[i].dalibnieku_skaits + '</td>';
          table_data += '<td><button type="button" class="btn btn-primary view_data" data-toggle="modal" data-target="#myModal" data-id="' + result[i].konsultacija_id + '">View</button></td>';
          table_data += '</tr>';
        }
        
        // Insert table data into table body
        $('#table_body').html(table_data);
        
        // Open modal when View button is clicked
        $('.view_data').click(function() {
          var konsultacija_id = $(this).data('id');
          
          // Send AJAX request to retrieve data for selected record
          $.ajax({
            url: "get_record.php",
            method: "POST",
            data: {konsultacija_id: konsultacija_id},
            success: function(data) {
              // Parse JSON data
              var record = JSON.parse(data);
              
              // Display record data in modal
              $('#prieksmets').text(record.prieksmets);
              $('#skolotajs').text(record.skolotaja_vards + ' ' + record.skolotaja_uzvards);
              $('#kabinets').text(record.kabinets);
              $('#sakums').text(record.sakums);
              $('#beigas').text(record.beigas);
              $('#dalibnieki').text(record.dalibnieku_skaits);
            }
          });
        });
      } else {
        // Display message if no data is found
        $('#table_body').html('<tr><td colspan="7">No data found.</td></tr>');
      }
    }
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

<!--
  214:1 Uncaught SyntaxError: Unexpected token '<', "<br />
<b>"... is not valid JSON
    at JSON.parse (<anonymous>)
    at Object.success (sklapa.php:248:27)
    at c (jquery.js:2:28294)
    at Object.fireWith [as resolveWith] (jquery.js:2:29039)
    at l (jquery.js:2:79800)
    at XMLHttpRequest.<anonymous> (jquery.js:2:82254)


    fix this error for ajax