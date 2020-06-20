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
?>
<html>
  
  <head>
  	<title>ROBOMED | Adaugare pacient</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wheelchair meniu-icons-principal" aria-hidden="true"></i>Pacienti</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu"> 
                <li class="active">
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
                  
                    <a class="nav-link doctor-color" href="#"><i class="fa fa-user-md meniu-icons"></i>
                    <?php echo $_SESSION['MedicUser'];?></a>

                </li>
                
              </ul>
            
            </div>
        </nav>
        <div id="slides" class="carousel slide ml-1 mr-1" data-ride="carousel">
          
         <p class="subtitleadjustment" ><i class="fa fa-ambulance meniu-icons"></i>Date demografice<i class="fa fa-ambulance meniu-icons"></i></p>
         <div class="d-flex justify-content-center"> 
         <form id="adaugarePac" action="adauga.php" method="POST">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Nume</label>
                <input type="text" class="form-control" id="valid_Nume" placeholder="Nume"  name="f_Nume" >
               
              </div>
              <div class="col-md-6 mb-3">
                <label>Prenume</label>
                <input type="text" class="form-control" id="valid_Prenume" placeholder="Prenume"  name="f_Prenume" >
              </div>
              </div>
              <div class="form-row">
			  <div class="col-md-4 mb-3">
                <label>CNP</label>
                <input type="text" onblur="takeCNP()" class="form-control" id="valid_CNP" placeholder="CNP"  name ="f_CNP" maxlength="13">
                
              </div>

              <div class="col-md-4 mb-3">
                    <label>Data Nasterii</label>
                    <input id="datepicker"  class="form-control" placeholder="Data Nasterii" data-date-format="yyyy-mm-dd" name="f_Data_Nasterii" readonly>
                   
                   
                </div>
                
         
              
              
			  <div class="col-md-4 mb-3">
                <label>Varsta</label>
                <input type="text" class="form-control" id="valid_Varsta" placeholder="Varsta"  name="f_Varsta" readonly>
               
              </div>
              
            </div>
            <div class="form-row">
              
			   <div class="col-md-4 mb-3">
                <label>Sex</label>
                <select class="form-control" id="valid_Sex" name="f_Sex" readonly>
                <option name="m" value="m" selected>masculin</option>
                <option name="f" value="f">feminin</option>  
              </select>
               </div>
               <div class="col-md-4 mb-3">
                <label>Numarul patului</label>
                
                 <select class="form-control" id="valid_Numar" name="f_Numarpat" readonly>
                <option name="1" value="1" selected>1</option>
                <option name="2" value="2">2</option>  
              </select>

              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label>Adresa</label>
                <input type="text" class="form-control" id="valid_Adresa" placeholder="Adresa"  name="f_Adresa" >
              
              </div>
              </div>
				<div class="form-row">
              
              <div class="col-md-6 mb-3">
                <label>Telefon</label>
                <input type="text" class="form-control" id="valid_Telefon" placeholder="Telefon"  name="f_Telefon" maxlength="10">
               
              </div>
              <div class="col-md-6 mb-3">
                <label>E-Mail</label>
                <input type="text" class="form-control" id="valid_Email" placeholder="Mail"  name="f_Mail" >
                
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col-md-6 mb-3">
                <label>Profesie</label>
                <input type="text" class="form-control" id="valid_Profesie" placeholder="Profesie"  name="f_Profesie">
                
              </div>
               <div class="col-md-6 mb-3">
                <label>Loc de munca</label>
                <input type="text" class="form-control" id="valid_Loc" placeholder="Loc de munca"  name="f_Locdemunca">

              </div>
			  
              </div>
			<div class="form-row text-center">
				<div class="col-12">
					<p style="color:red" id="eroare"></p>
				</div>
			</div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" id="btn-add" name="adaugapac" type="submit"> Adauga Pacient</button>  
            </div>
        </form>
			 
     </div>

	</div>
	</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/extragereCNP.js"></script>
    <script src="js/validareForm_addp.js"></script>
	
  </body>
</html>

