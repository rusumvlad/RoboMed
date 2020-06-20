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


<html lang="en">



<head>

    <title>ROBOMED | Adaugare medicament</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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

                <a href="index.php" class="img logo rounded-circle mb-5" style="background-image: url(images/logom.png);" title="Logo"></a>

                <ul class="list-unstyled components mb-5">



                    <li>

                        <a href="adauga_ma.php"><i class="fa fa-plus-square meniu-icons" aria-hidden="true"></i>Adaugare utilizatori</a>

                    </li>

                    <li class="active">

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



            </br></br></br></br>

            <div id="slides" class="carousel slide ml-1 mr-1" data-ride="carousel">

                <p class="subtitleadjustment">Adaugare stoc de medicamente</p>
				<?php 

                    $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($fullUrl,"status=update") == true){

                        echo "<p class='text-center' style='color:red;'>Stocul medicamentului a fost actualizat</p>";

                    }else if(strpos($fullUrl,"status=succes") == true){
						echo "<p class='text-center' style='color:red;'>Noul medicament a fost adaugat cu succes</p>";
					}
					?>
                <div class="d-flex justify-content-center">

                    <form id="addMed" action="adauga_medicament_a.php" method="POST">

			<div class="form-row">

                            <div class="col-md-12 mb-3">

                                <label>Id Medicament</label>

                                <input type="text" class="form-control" id="valid_ID_Medicament" placeholder="Id Medicament" name="f_ID">

                            </div>

                        </div>

                        
                        <div class="form-row">

                            <div class="col-md-12 mb-3">

                                <label>Nume Medicament</label>

                                <input type="text" class="form-control" id="valid_Medicament" placeholder="Nume Medicament" name="f_NUME_MEDICAMENT">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-12 mb-3">

                                <label>Stoc introdus</label>

                                <input type="text" class="form-control" id="valid_Nr_Medicament" placeholder="Stoc" name="f_NR_MEDICAMENT">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-12 mb-3">

                                <label for="validationServer02">Data expirarii</label>

                                <input id="datepicker2" placeholder="yyyy-mm-dd" class="form-control" data-date-format="yyyy-mm-dd" name="f_DATA_EXPIRARE" readonly />

                                <script>

                                    $('#datepicker2').datepicker({

                                        uiLibrary: 'bootstrap4',

                                        format: 'yyyy-mm-dd'

                                    });

                                </script>

                            </div>

                        </div>
						<div class="form-row text-center">
							<div class="col-12">
								<p style="color:red" id="eroare"></p>
							</div>
						</div>

                        <div class="d-flex justify-content-center">

                            <button class="btn btn-primary" id="btn-add" name="adaugapac" type="submit">

                               Adauga 

                            </button>
							
                        </div>
						

                </div>

            </div>

            <script src="js/jquery.min.js"></script>

            <script src="js/popper.js"></script>

            <script src="js/bootstrap.min.js"></script>

            <script src="js/main.js"></script>

            <script src="js/carouselFocus.js"></script>
			
			<script src="js/validare_admin1.js"></script>

</body>



</html>