<?php 
include "select.php";
$medicamente_stoc_all = "SELECT * FROM Medicamente_stoc";
$result_medicamente_stoc_all = mysqli_query($conn,$medicamente_stoc_all);
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>ROBOMED | Dashboard</title>
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
		  		<a href="index.php" class="img logo rounded-circle mb-5" style="background-image: url(images/logom.png);" title="Logo"></a>
	        <ul class="list-unstyled components mb-5">
	          <li>
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wheelchair meniu-icons-principal" aria-hidden="true"></i>Pacienti</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu"> 					
                <li>
                    <a href="adauga_pacienti.php"><i class="fa fa-plus-square meniu-icons" aria-hidden="true"></i>Adaugare Pacient</a>
                </li>
                <li>
                    <a href="view_pacienti.php"><i class="fa fa-file meniu-icons" aria-hidden="true"></i>Vizualizare Pacienti</a>
                </li>
              </ul>
            </li>
	          
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-eye meniu-icons-principal" aria-hidden="true"></i>Vizualizare Generala</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="view_transporturi.php"><i class="fa fa-ambulance meniu-icons"></i>Transporturi</a>
                </li>
                <li>
                    <a href="view_alarme.php"><i class="fa fa-exclamation-circle meniu-icons"></i>Alarme</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="selectare_comanda.php"><i class="fa fa-cog fa-spin meniu-icons-principal" aria-hidden="true"></i>Editare Comenzi</a>
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
           

            
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link doctor-color" href="#"><i class="fa fa-user-md meniu-icons"></i>
                    <?php echo $_SESSION['MedicUser'];?></a>
                </li>
                
              </ul>
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
              <img src="images/backg.jpg" alt="Medicamente">
              <div class="carousel-caption">
                <h1 class="display-2">Bun Venit!</h1>
                            
              </div>
            </div>
            <div class="carousel-item">
                <img src="images/backg1.jpg" alt="Medic5">
                <div class="carousel-caption">
                  <h1 class="display-2">Bun Venit!</h1>
                                
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/backg2.jpg" alt="Medic3">
                <div class="carousel-caption">
                  <h1 class="display-2">Bun Venit!</h1>
                                
                </div>
            </div>
          </div>
        </div>
       
        <!--Statistici-->
        <div class="container">
          <div class="row">
          <div class="col text-center">
          <h2 class="count-title-h2">Statistici</h2>
          </div>
          <br>
           </div>
            <div class="row text-center">
                  <div class="col-xs-4 col-sm-4 col-md-4">
				  <div onclick="location.href='view_pacienti.php'">
					<div class="counter">
              <i class="fa fa-wheelchair fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="<?php echo $row['numere']?>" data-speed="1500"></h2>
               <p class="count-text ">Pacienti</p>
					</div>
					</div>
					</div>
                      <div class="col-xs-4 col-sm-4 col-md-4">
                       <div class="counter">
              <i class="fa fa-medkit fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="<?php echo $stoc ?>" data-speed="1500"></h2>
              <p class="count-text ">Medicamente</p>
            </div>
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-4">
					  <div onclick="location.href='view_alarme.php'">
                          <div class="counter">
              <i class="fa fa-lightbulb-o fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="<?php echo $row_alarme['numereAlarme']?>" data-speed="1500"></h2>
              <p class="count-text ">Alarme</p>
						</div>
						</div>
						</div>
                      
                 </div>
	        <div class="row">
          <div class="col text-center">
          <h2 class="count-title-h2">Stoc Medicamente</h2>
          </div>
          <br>
           </div>
            <div class="row text-center mb-5">
                  <div class="col-sm-12 col-md-12">
                    <ul class="list-group stoc-medicament">
                        <?php 
                        if(mysqli_num_rows($result_medicamente_stoc_all) > 0){
                        while($row_medicament_all = mysqli_fetch_assoc($result_medicamente_stoc_all)){
                        echo"<li class='list-group-item d-flex justify-content-between align-items-center'>".$row_medicament_all['NUME_MEDICAMENT'];
                        echo "<span class='badge badge-primary badge-pil'>".$row_medicament_all['NR_MEDICAMENT'];
                        echo "</span></li>";
                        }
                        }
                        ?>
                        </ul>
                      
                 </div>
             
        </div>
        </div>
        
        </div>
      </div>
		
    

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/statistics.js"></script>
    <script src="js/carouselFocus.js"></script>
  </body>
</html>