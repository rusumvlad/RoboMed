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

include("../connection.php");
  $query_select="select * FROM Harta where ID_Harta=1";

  $result_select=mysqli_query($conn,$query_select);


?>


<!doctype html>
<html lang="en">



<head>

    <title>ROBOMED | Harta</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleNEW.css">
    <link rel="shortcut icon" href="../images/logoM.png" />

</head>



<body onload="myMap()">

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

                    <li class="active">

                        <a href="#"><i class="fa fa-cog fa-spin meniu-icons-principal" aria-hidden="true"></i>Editare Harta</a>

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
                    <a class="nav-link doctor-color" href="#">
                    Pentru editare completa a hartii <i class="fas fa-phone-square meniu-icons"></i>0724568129</a>
                </li>
                
              </ul>
                </div>

            </nav>
			<div class="table-responsive-xl">

            <table class="table" id="table-offline">

              

                  <thead>

                    <tr>

                      <!--<th scope="col">IDPacient</th>-->

                      <th scope="col">Numar Pat</th>

                      <th scope="col">Traseu</th>

                      

                    </tr>

                  </thead>

                  <tbody id="myTable">

                  

                  <?php

                   if(mysqli_num_rows($result_select) > 0){

                   while($row=mysqli_fetch_assoc($result_select)){

					         echo "<tr>";

                      echo "<td>".$row['NR_Pat']."</td>";

                      echo "<td>".$row['Traseu']."</td>";

					  

                   }

				   

                   }

                   ?>

                   



                  </tbody>

            </table>

          </div>

		 <div class="container">
		 
          <div class="row mb-2">
          <div class="col text-center">
          <h2 class="count-title-h2">Harta</h2>
          </div>
          <br>
           </div>
		   
		<div class="design text-center mb-1">
		<?php 

                    $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($fullUrl,"status=succes") == true){
						echo "<p class='text-center' style='color:red;'>Intersectiile au fost modificate cu succes</p>";
					}
					?>
		<a href="edit_traseu.php?id=1"><button type='button' class='btn btn-danger'>Editare traseu</button></a>
		
		</div>
		   
		   <div class="row mb-5">
          <div class="col-12 col-md-12" style="border-style: solid;">
          <h4 class="count-title-h4 text-center">Legenda</h4>
		  <div class="ml-3"> 
		  <img src='images/robotm.png' class='dsensleg'><span> - Robotul</span>
		  <img src="images/pat.png" id="patleg" class="patleg"><span> - Salon+Pat</span>
		  <img src='images/farmacie.png' id="farmaleg" class='farmaleg'><span> - Farmacia spitalului</span>
		  <img src='images/sus.png' id="susleg" class='susleg'><span> - Inainte</span>
		  <img src='images/stanga.png' class='stangaleg'><span> - Intersectie stanga</span>
		  <img src='images/dreapta.png' class='dreaptaleg'><span> - Intersectie dreapta</span>
		  <img src='images/dsens.png' class='dsensleg'><span> - Intersectie sens dublu</span>
		  
		  </div>
          </div>
          <br>
		  
           </div>
		   <div class="row pozitionare text-center">
		   <div class="col-12 col-md-12">
		   <img src="images/pat.png" id="pat1" class="pat1">
		   <img src="images/pat.png" id="pat2s" class="pat1">
		   <img src="images/pat.png" id="pat3s" class="pat1">
		   </div>
		   <div class="col-12 col-md-12">
			<span id="traseuX"></span>
			<span class="farmacie">
			<img src='images/farmacie.png' id="farma" class='farma'>
			<img src='images/robotm.png' id="farma" class='farma'>
			</span>
			<img src='images/sus.png' id="sus" class='sus'>
			
			
			<span id="comp2"></span>
			<span class="farmacie">
			<img src='images/sus.png' id="sus" class='sus'>
			</span>
			<span id="comp3"></span>
			<img src='images/sus.png' id="sus" class='sus'>
			<span id="comp4"></span>
		   </div>
		    <div class="col-12 col-md-12">
		   <img src="images/pat.png" id="pat2" class="pat">
		   <img src="images/pat.png" id="pat5s" class="pat">
		   <img src="images/pat.png" id="pat4s" class="pat">
		   </div>
		   </div>
		   
		   
		   
		   
		   
		   
		   </div>
           
	

        </div>



    </div>

    </div>





	<script>
		var traseu = document.getElementById("traseuX");
		var tabel = document.getElementById("myTable");
		var comp1 = document.getElementById("comp1");
		var comp2 = document.getElementById("comp2");
		var comp3 = document.getElementById("comp3");
		var comp4 = document.getElementById("comp4");
		var imagine = document.createElement("img");
		var pat1 = document.getElementById("pat1");
		var pat2 = document.getElementById("pat2");
		var pat2s = document.getElementById("pat2s");
		var pat3s = document.getElementById("pat3s");
		var pat4s = document.getElementById("pat4s");
		var pat5s = document.getElementById("pat5s");
		var farma = document.getElementById("farma");
		var counter1 = 0;
		var counter2 = 0;
		function myMap() {
		
		traseu = tabel.rows[0].cells.item(1).innerHTML;
		console.log(traseu);
		
		var caracter2 = traseu.charAt(0);
		console.log(caracter2);
		var caracter3 = traseu.charAt(1);
		console.log(caracter3);
		var caracter4 = traseu.charAt(2);
		console.log(caracter4);
		
		
		
		if (parseInt(caracter2) === 1){
			comp2.innerHTML = "<img src='images/stanga.png' class='stanga'>"
			pat2.style.visibility = "hidden";
		}else if (parseInt(caracter2) === 2){
			comp2.innerHTML = "<img src='images/dreapta.png' class='dreapta'>"
			pat2.style.visibility = "visible";
			pat1.style.visibility = "hidden";
		}else if(parseInt(caracter2) === 4){
			comp2.innerHTML = "<img src='images/dsens.png' class='dreapta'>"
			pat2.style.visibility = "visible";
			pat1.style.visibility = "visible";
		}
		
		if (parseInt(caracter3) === 1){
			comp3.innerHTML = "<img src='images/stanga.png' class='stanga'>"
			pat5s.style.visibility = "hidden";
		}else if (parseInt(caracter3) === 2){
			comp3.innerHTML = "<img src='images/dreapta.png' class='dreapta'>"
			pat5s.style.visibility = "visible";
			pat2s.style.visibility = "hidden";
		}else if(parseInt(caracter3) === 4){
			comp3.innerHTML = "<img src='images/dsens.png' class='dreapta'>"
			pat5s.style.visibility = "visible";
			pat2s.style.visibility = "visible";
		}
	
		if (parseInt(caracter4) === 1){
			comp4.innerHTML = "<img src='images/stanga.png' class='stanga'>"
			pat4s.style.visibility = "hidden";
		}else if (parseInt(caracter4) === 2){
			comp4.innerHTML = "<img src='images/dreapta.png' class='dreapta'>"
			pat4s.style.visibility = "visible";
			pat3s.style.visibility = "hidden";
		}else if(parseInt(caracter4) === 4){
			comp4.innerHTML = "<img src='images/dsens.png' class='dreapta'>"
			pat4s.style.visibility = "visible";
			pat3s.style.visibility = "visible";
		}
		var widthFarmacie = farma.width;
		pat1.style.marginLeft = 3*widthFarmacie + "px";
		pat2.style.marginLeft = 3*widthFarmacie + "px";
		pat2s.style.marginLeft = 1*widthFarmacie + "px";
		pat3s.style.marginLeft = 1*widthFarmacie + "px";
		pat4s.style.marginLeft = 1*widthFarmacie + "px";
		pat5s.style.marginLeft = 1*widthFarmacie + "px";
		}

	</script>

    <script src="js/jquery.min.js"></script>

    <script src="js/popper.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

</body>



</html>