<!DOCTYPE html>
<html style="font-size: 16px;" lang="lv">

<head>
  <?php
  require("../backend/function.php");
  MicrosoftInfo();
  ?>







  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../nicepage.css" media="screen">
  <meta name="generator" content="Nicepage 5.6.13, nicepage.com">
  <link rel="stylesheet" href="admin.css" media="screen">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">

  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-tp navbar-expand-md navbar-dark bg-primary" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        
          <a class="navbar-brand" href="../index.php">Liepajas Valsts tehnikums</a>
       
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <!-- Searchbar -->
          <form class="navbar-search navbar-search-dark form-inline ml-auto mr-3">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
          </form>

          <!-- User -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="media align-items-center">
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm font-weight-bold">
                      <?php echo $_SESSION['fullname']; ?>
                    </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <!-- Dropdown menu content -->
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid text-center">
      <p class="mt-5">Add your content here...</p>
    </div>

    <footer class="footer" style="margin-top: 70%;"></footer>
  </div>
</body>



</html>