<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Konsultacija</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="css/overwrite.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link href="css/mobiscroll.jquery.min.css" rel="stylesheet" />
  <script src="js/mobiscroll.jquery.min.js"></script>


</head>

<body class="u-body u-xl-mode" data-lang="en">
  <?php
  include('header.php');
  ?>
  <section class="meklet">
    <div class="u-clearfix u-sheet u-sheet-1">
      <form method="Post" onsubmit="event.preventDefault(); searchAndHide()">
        <input type="text" autocomplete="off" placeholder="Meklēt skolotāju" name="search-bar" id="search-bar" />
        <button class="meklet2" type="submit" id="search-button">Meklēt</button>
        <?php
        if (isset($_POST['searchbar']))
          $keyword = $_POST['searchbar'];
        if (isset($keyword) && !empty($keyword)) {
          //$result = $pdo->query("SELECT * FROM pieteikums where telpa like '%$keyword%' or status like '%$keyword%' or iela like '%$keyword%' or problema  like '%$keyword%' or piezimes  like '%$keyword%' or epasts  like '%$keyword%' ORDER BY `pieteikums`.`laiks` DESC");
        } else {
          //  $result = $pdo->query("SELECT * FROM pieteikums ORDER BY `pieteikums`.`laiks` DESC");
        }
        ?>

        <script>
          function searchAndHide() {
            var searchInput = document.getElementById("search-bar").value;
            var element1 = document.getElementById("cardhide");
            var element = document.getElementById("tablehide");
            var seachview = document.getElementById("SearchView");
            // Search logic - you can modify this to suit your needs
            if (searchInput !== "") {
              element1.style.display = "none"; // Hiding the result element
              element.style.display = "none"; // Hiding the result element
              seachview.style.display = "flex";
            } else {
              // resultElement.style.display = "block"; // Showing the result element
            }
          }
        </script>
      </form>
      <div id="cardhide" class="card-line">
        <a href="#">
          <div class="card">
            <h2>Pirmdiena</h2>
          </div>
        </a>
        <a href="#">
          <div class="card">
            <h2>Otrdiena</h2>
          </div>
        </a>
        <a href="#">
          <div class="card">
            <h2>Trešdiena</h2>
          </div>
        </a>
        <a href="#">
          <div class="card">
            <h2>Ceturtdiena</h2>
          </div>
        </a>
      </div>
      <div id="tablehide" class="u-table u-table-responsive u-table-1 mobile-hide">
        <table class="u-table-entity">
          <thead class="u-align-left u-custom-font u-palette-1-base u-table-header u-text-font u-table-header-1">
            <tr style="height: 56px;">
              <th class="u-align-center u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-1">Vards Uzvārds</th>
              <th class="u-align-center u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-2">Pirmdiena</th>
              <th class="u-align-center u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-3">Otrdiena</th>
              <th class="u-align-center u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-4">Trešdiena</th>
              <th class="u-align-center u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-5">Ceturtdiena</th>
            </tr>
          </thead>
  <!-- Tabula -->

          <tbody class="u-table-alt-grey-5 u-table-body u-white u-table-body-1">
            <?php
            $result = $pdo->query("SELECT *,DAYOFWEEK(laiks) AS day_number,DATE_FORMAT(sākums,'%H:%i') AS laiks_time,DATE_FORMAT(beigas,'%H:%i') AS laiks_time1 FROM `konsultācija`
            JOIN skolotajs ON konsultācija.skolotajs_id_fk = skolotajs_id");
            $rows = $result->fetchAll();

            foreach ($rows as $row) {

              $day_number = $row['day_number'];
              $days_of_week = array('Svētdiena', 'Pirmdiena', 'Otrdiena', 'Trešdiena', 'Ceturtdiena', 'Piektdiena', 'Sestdiena');
              $day_of_week = $days_of_week[$day_number - 1];
              $laiks_time = $row['laiks_time'];
              $laiks_time1 = $row['laiks_time1'];
              ?>
              <tr style="height: 51px;">
                <td class="u-border-1 u-border-grey-75 u-table-cell">
                  <?= $row['vards']; ?>
                  <?= $row['uzvards']; ?>
                </td>
                <?php
                if ($day_of_week == 'Pirmdiena') {
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7">' . $row['iela'] . ' <br> ' . $laiks_time . '-' . $laiks_time1 . '</td>';
                } else
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7"></td>';
                if ($day_of_week == 'Otrdiena') {
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7">' . $row['iela'] . ' <br> ' . $laiks_time . '-' . $laiks_time1 . '</td>';
                } else
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7"></td>';
                if ($day_of_week == 'Trešdiena') {
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7">' . $row['iela'] . ' <br> ' . $laiks_time . '-' . $laiks_time1 . '</td>';
                } else
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7"></td>';
                if ($day_of_week == 'Ceturtdiena') {
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7">' . $row['iela'] . ' <br> ' . $laiks_time . '-' . $laiks_time1 . '</td>';
                } else
                  echo '<td class="u-align-center u-border-1 u-border-grey-75 u-table-cell u-table-cell-7"></td>';
                ?>
              </tr>
              <?php
            }
            ?>

          </tbody>
        </table>
      </div>
      <!--
        //Phone view only 
        -->
      <?php

      ?>
      <div class="card mobile-show" style="width: 18.5rem;">
        <div class="card-body">
          <h5 class="card-title">Skolotajs Labais</h5>
        </div>
        <ul class="list-group list-group-flush">
          <a class="list-group-item">Pirmdien Ve A-203 </a>
          <a class="list-group-item">Otrdiena V A-201</a>
        </ul>
      </div>


    </div>
  </section>
  <div class="kajene">
    <?php
    include('footer.php');
    ?>
  </div>

</body>

</html>