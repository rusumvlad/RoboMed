<?php
session_start();
if(isset($_SESSION['UserType'])){
  if($_SESSION['UserType'] != 'medic'){
    header('Location: index_admin.php');
  }
}
else{
  header('Location:../index.php');
} 
$ida=$_GET["id"];
$_SESSION['id_pacient']=$ida;
if(isset($_POST["adauga"])){
header("Location:adauga_tratament.php");
}
else if(isset($_POST["inapoi"])){
    header("Location:index.php");
}
?>

<html>
  
  <head>
  	<title>Intrebare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleNEW.css">
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light color-nav">
          <div class="container-fluid mb-0">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
           

            
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link doctor-color" href="#">Dr.Ionescu</a>
                </li>
                
              </ul>
            
            </div>
        </nav>
        <div id="slides" class="carousel slide ml-1 mr-1" data-ride="carousel">
</br></br></br></br>
         <p class="subtitleadjustment" >Doriti sa adaugati tratamentul pacientului?</p>
         <div class="d-flex justify-content-center"> 
    <form class="" name="formIntrebare" method="post">
            <div class="row">
                <button class="btn btn-primary mr-5"id="btn-add" name="adauga" type="submit">
                Adauga tratament
                </button > 
                 
                <button class="btn btn-primary"id="btn-add" name="inapoi" type="submit">
                Mai tarziu
                </button> 
                </div>
               
                </form> </div></div>


	</div>
	</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	
  </body>
</html>

