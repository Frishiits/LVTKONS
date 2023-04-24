<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Konsultacijas</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Home.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 5.6.13, nicepage.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link rel="stylesheet" href="css/overwrite.css" media="screen">
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Home">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body class="u-body u-xl-mode" data-lang="en">

  <?php
  include('header.php');
  $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
  echo "<script>var userEmail = '$email';</script>";
  ?>
  <script>
    var isTeacher = userEmail.indexOf("@sk") === -1; // returns true if the email does not contain the subdomain "sk"

    // If user is an admin, show the admin-only element
    if (isTeacher) {
      document.getElementById("teacher-only").style.display = "block";
      document.getElementById("teacher-hide").style.style.visibility = "hidden";

    }
  </script>
  <section class="u-align-center u-clearfix u-gradient u-section-1" id="carousel_1d8f">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-list u-list-1">
        <h2 class="u-align-left">Sveiki,
          <?= substr($_SESSION['username'], 0, -1); ?>!
        </h2>
        <?php

        echo '<div class="same-line">';
        // TODO:  
        $result = $pdo->query("SELECT *,DATE_FORMAT(laiks, '%e %M') AS month FROM pieteikums
        JOIN konsultācija ON pieteikums.id_konsultacijas = konsultācija.konsultācija_id
        JOIN prieksmets ON prieksmets = prieksmets.prieksmets_id
        JOIN skolotajs ON pieteikums.id_skolotajs = skolotajs.skolotajs_id WHERE id_skolnieks = (SELECT skolnieks_id FROM skolnieks WHERE vards = 'Daniels');");
        $rows = $result->fetchAll();
        if (!empty($rows)) {
          foreach ($rows as $row) {
            $formatted_date = $row['month'];


            echo '<div class="alert alert-warning"   role="alert">';
            echo ' <p class="u-text u-align-left" > <b>' . $row['prieksmets'] . '</b> <br> ' . $row['iela'] . ': ' . $row['kabinets'] . ' <br> Datums: ' . $formatted_date . '</p>';
            //echo implode(', ', $errors);
            echo '</div>';
          }
        }
        echo '</div>';

        ?>

        <br>
        <div class="u-repeater u-repeater-1" id="teacher-s">
          <div
            class="u-align-center u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white u-list-item-1">
            <div class="u-container-layout u-similar-container u-container-layout-1">
              <img src="images/users-with-speech-bubbles-vector_53876-82250.jpg" alt=""
                class="u-expanded-width u-image u-image-contain u-image-default u-image-1" data-image-width="626"
                data-image-height="625">
              <h4 class="u-text u-text-default u-text-palette-1-base u-text-1">Konsultāciju saraksts</h4>
              <a href="Konsultacija.php"
                class="u-active-palette-1-base u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-1">ATVĒRT</a>
            </div>
          </div>
          <div
            class="u-align-center u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-video-cover u-white u-list-item-2">
            <div class="u-container-layout u-similar-container u-container-layout-2">
              <img src="images/fdf.jpg" alt="" class="u-expanded-width u-image u-image-default u-image-2"
                data-image-width="626" data-image-height="625">
              <h4 class="u-text u-text-default u-text-palette-1-base u-text-2">Pieteikties<br></h4>
              <a href="pieteikties.php"
                class="u-active-palette-1-base u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-2">
                ATVĒRT</a>
            </div>
          </div>
          <div
            class="u-align-center u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-video-cover u-white u-list-item-3">
            <div class="u-container-layout u-similar-container u-container-layout-3">
              <img src="images/dsds.jpg" alt=""
                class="u-expanded-width u-image u-image-contain u-image-default u-image-3" data-image-width="626"
                data-image-height="626">
              <h4 class="u-text u-text-default u-text-palette-1-base u-text-3">Skolotājiem</h4>
              <a href="sklapa.php"
                class="u-active-palette-1-base u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-3">
                ATVĒRT</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  include('footer.php');
  ?>
</body>

</html>