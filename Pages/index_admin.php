<?php
session_start();
if(isset($_SESSION['UserType'])){
  if($_SESSION['UserType'] != 'admin'){
    header('Location: index.php');
  }
}
else{
  header('Location:../index.php');
} 
?>


<!doctype html>
<html lang="en">



<head>

    <title>ROBOMED | DASHBOARD</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleNEW.css">
    <link rel="shortcut icon" href="../images/logoM.png" />

</head>



<body>

    <div class="wrapper d-flex align-items-stretch">

        <!-- SideBar Area -->

        <nav id="sidebar">

            <div class="p-4 pt-5 sticky-top">

                <a href="index_admin.php" class="img logo rounded-circle mb-5" style="background-image: url(images/logom.png);" title="Logo"></a>

                <ul class="list-unstyled components mb-5">

                    <li>

                        <a href="adauga_ma.php"><i class="fa fa-plus-square meniu-icons" aria-hidden="true"></i>Adaugare utilizatori</a>

                    </li>

                    <li>

                        <a href="adauga_medicament.php"><i class="fas fa-pills meniu-icons-principal" aria-hidden="true"></i>Adaugare medicamente</a>

                    </li>

                    <li>

                        <a href="harta.php"><i class="fa fa-cog fa-spin meniu-icons-principal" aria-hidden="true"></i>Editare Harta</a>

                    </li>

                    <li>

                        <a href="logout.php"><i class="fa fa-times-circle meniu-icons-principal"></i>Log Out</a>

                    </li>

                </ul>

            </div>

        </nav>

        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-0 p-sm-0">

            <!-- Numele Doctorului si collaps-ul(responsive) -->

            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light color-nav" style="margin-bottom: 1px">

                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">

                        <i class="fa fa-bars toggle-icons"></i>

                        <span class="sr-only">Toggle Menu</span>

                    </button>

                </div>

            </nav>

            <!-- SlideShow Prima pagina -->

            <div id="slides" class="carousel slide " data-ride="carousel">

                <ul class="carousel-indicators">

                    <li data-target="#slides" data-slide-to="0" class="active"></li>

                    <li data-target="#slides" data-slide-to="1"></li>

                    <li data-target="#slides" data-slide-to="2"></li>

                </ul>

                <div class="carousel-inner">

                    <div class="carousel-item active">

                        <img src="images/Admin1.jpg" alt="Admin1">
						
                    </div>

                    <div class="carousel-item">

                        <img src="images/Admin2.jpg" alt="Admin2">

                    </div>

                    <div class="carousel-item">

                        <img src="images/Admin3.jpg" alt="Admin3">

                    </div>

                </div>

            </div>





        </div>



    </div>

    </div>







    <script src="js/jquery.min.js"></script>

    <script src="js/popper.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

    <script src="js/carouselFocus.js"></script>

</body>



</html>