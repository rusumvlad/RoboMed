<?php



session_start();

require_once "../connection.php";

if(isset($_SESSION['UserType'])){



  if($_SESSION['UserType'] != 'medic'){



    header('Location: index_admin.php');



  }



}



else{



  header('Location:../index.php');



}



$idp=$_GET["id"];

if(isset($_POST["adaugatrat"])){



        $Diagnostic = $_POST['f_DIAGNOSTIC'];



        $Tratament = $_POST['f_TRATAMENT'];



        $Data_tratament = $_POST['f_DATA_TRATAMENT'];

        

        $Tip_alergie = $_POST['f_TIP_ALERGIE'];

        

        $Simptome = $_POST['f_SIMPTOME'];

        

        $Medicament = $_POST['f_MEDICAMENT'];

        

        $Data_prescriere = $_POST['f_DATA_PRESCRIERE'];



        $sql_insert_tratament = "INSERT INTO Alergii_pacient(ID_PACIENT, TIP_ALERGIE, SIMPTOME, MEDICAMENT, DATA_PRESCRIERE) VALUES

        ('$idp','$Tip_alergie','$Simptome','$Medicament','$Data_prescriere');INSERT INTO Schema_medicatie(ID_PACIENT, DIAGNOSTIC, TRATAMENT, DATA_TRATAMENT) 

        VALUES('$idp','$Diagnostic','$Tratament','$Data_tratament')";





		mysqli_multi_query($conn,$sql_insert_tratament);



	    header('Location: view_pacienti.php?status=succes');



	


}




?>



<html>



  



  <head>



  	<title>ROBOMED | Adauga Tratament</title>



    <meta charset="utf-8">



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



	   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>



    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



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



              <a href="#"><i class="fa fa-cog fa-spin meniu-icons-principal" aria-hidden="true"></i>Editare Comenzi</a>



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



        </br></br>



        <div id="slides" class="carousel slide ml-1 mr-1" data-ride="carousel">



          



          <p class="subtitleadjustment" > Tipul Tratamentului </p>



         <div class="d-flex justify-content-center">



         <form id="formTrat" method="POST">



         



            <div class="form-row">

                

                <div class="col-md-4 mb-3">



                <label>Diagnostict</label>



                <input type="text" class="form-control" id="valid_Diag" placeholder=""  name="f_DIAGNOSTIC">



              </div>



              <div class="col-md-4 mb-3">



                <label for="validationServer01">Tratament</label>



                <input type="text" class="form-control" id="valid_Trat" placeholder=""  name="f_TRATAMENT">



               



              </div>



              



              <div class="col-md-4 mb-3">



                    <label>Data tratament</label>



                    <input id="datepicker"  class="form-control" data-date-format="yyyy-mm-dd" name="f_DATA_TRATAMENT" readonly />



                    <script>



                        $('#datepicker').datepicker({



                            uiLibrary: 'bootstrap4',



                            format: 'yyyy-mm-dd'



                        });



                    </script>



                </div>



              </div> 



            



              <p class="subtitleadjustment" > Alergii </p>



         



                <div class="form-row">



                <div class="col-md-6 mb-3">



                    <label>Tip alergie</label>



                    <input type="text" class="form-control" id="valid_Tip_A" placeholder=""  name="f_TIP_ALERGIE">



                



                </div>



                <div class="col-md-6 mb-3">



                    <label>Simptome</label>



                    <input type="text" class="form-control" id="valid_Simptome" placeholder=""  name="f_SIMPTOME">



                </div>



                </div> 



                



                <div class="form-row">



                <div class="col-md-6 mb-3">



                    <label>Medicament</label>



                    <input type="text" class="form-control" id="valid_Medicament" placeholder=""  name="f_MEDICAMENT">



                



                </div>



                <div class="col-md-6 mb-3">



                    <label for="validationServer02">Data prescriere</label>



                    <input id="datepicker2"  class="form-control" data-date-format="yyyy-mm-dd" name="f_DATA_PRESCRIERE" readonly />



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



            <button class="btn btn-primary"id="btn-add" name="adaugatrat" type="submit">

           

            Adauga 

           

            </button >  



               



               </div>



               </form>



               </div>



    <script src="js/jquery.min.js"></script>



    <script src="js/popper.js"></script>



    <script src="js/bootstrap.min.js"></script>



    <script src="js/main.js"></script>

	<script src="js/validare_tratament.js"></script>

	



  </body>



</html>







