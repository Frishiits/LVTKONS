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
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Home">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body class="u-body u-xl-mode" data-lang="en">

<?php
  include('header.php');
  ?>

<div class="container">
      <h1 class="form-title">Pieteikties</h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Vārds</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Ievadi savu vārdu"/>
          </div>
          <div class="user-input-box">
            <label for="username">Uzvārds</label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Ievadi savu uzvārdu"/>
          </div>
          <select class="user-input-box">
          <label for="iela">Izvēlies ielu</label>
             <option id="iela" selected>Izvēlies ielu</option>
               <option value="1">Ventspils iela</option>
               <option value="2">Vānes iela</option>
          </select>

          <select class="kodaris">
          <label for="iela">Ko darīsi</label>
             <option id="iela" selected>Izvēlies ko darīsi</option>
               <option value="1">Labošu vērtējumu</option>
               <option value="2">Mācīšos</option>
          </select>
          <div class="kodaris">
            <label for="password">Mācība</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Izvēlies mācību"/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Pie kāda skolotāja/as</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Izvēlies skolotāju"/>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Pieteikties">
        </div>
      </form>

  </body>
</html>