<?php 

session_start();

require_once "../connection.php";

if(isset($_SESSION['UserType'])){

    if($_SESSION['UserType'] != 'medic'){

      

        header('Location: index_admin.php');

      

    }

}

  else{

    header('Location:../login.php');

  }

  $query_select="SELECT * FROM Date_pacient WHERE ID_MEDIC='{$_SESSION['Id']}'";

  $result_select=mysqli_query($conn,$query_select); //Folosit pentru tabel

  $result_select_pac=mysqli_query($conn,$query_select); // Folosit pentru edit tabel

  if(mysqli_num_rows($result_select_pac) > 0){

    while($row_pac=mysqli_fetch_assoc($result_select_pac)){

      $_SESSION['IDPacient'] = $row_pac['ID_PACIENT'];

    }

  }

?>

<html>

  <head>

  	<title>ROBOMED | Pregatire Comanda</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="css/styleNEW.css">

    <link rel="shortcut icon" href="../images/logoM.png"  />

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
	          <li class="active">
              <a href="selectare_comanda.php"><i class="fa fa-cog fa-spin meniu-icons-principal" aria-hidden="true"></i>Editare Comenzi</a>
	          </li>
	         
            <li>
              <a href="logout.php"><i class="fa fa-times-circle meniu-icons-principal"></i>Log Out</a>
	          </li>
          </ul>
          
	      </div>
    	</nav>


        <!-- Page Content  -->

      <div id="content" class="p-md-0 p-sm-0">

        <!-- Numele Doctorului si collaps-ul(responsive) -->

        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light color-nav" style="margin-bottom: 1px">

          <div class="container-fluid">



            <button type="button" id="sidebarCollapse" class="btn btn-primary">

              <i class="fa fa-bars toggle-icons"></i>

              <span class="sr-only">Toggle Menu</span>

            </button>

           



            

              <ul class="nav navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link doctor-color" href="#"><i class="fa fa-user-md meniu-icons"></i>

                    <?php echo $_SESSION['MedicUser'];?></a>

                </li>

                

              </ul>

        </div>

        </nav>

        <!--FORM-->

        

         

          

        <!--Tab Content-->

        

          <!--Inceput form PROFILE-->

		 <div class="text-center">

        <h1 class="titleVP">Lista Pacienti</h1>

		</div>

		

        <div class="justify-content-center mt-1 ml-2 mr-1 mb-5 form-content">

		

          <div class="input-group md-form form-sm form-1 pl-0">

            <div class="input-group-prepend">

              <span class="input-group-text" id="basic-text1"><i class="fas fa-search"

                  aria-hidden="true"></i></span>

            </div>

            <input id="tableSearch" class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">

          </div>

          <div class="table-responsive-xl">

            <table class="table">

              

                  <thead>

                    <tr>

                      <th scope="col">ID_Pacient</th>

                      <th scope="col">Nume</th>

                      <th scope="col">Prenume</th>

					  <th>Comenzi</th>

					  

                      

                    </tr>

                  </thead>

                  <tbody id="myTable">

                   <?php 

                   if(mysqli_num_rows($result_select) > 0){

                    

                   while($row=mysqli_fetch_assoc($result_select)){

					  echo "<tr>";

                      echo "<td>".$row['ID_PACIENT']."</td>";

					  echo "<td>".$row['NUME']."</td>";

					  echo "<td>".$row['PRENUME']."</td>";

					  echo "<td>";?><a href="editare_comenzi.php?id=<?php echo $row['ID_PACIENT']; ?>"><button type='button' class='btn btn-danger'>Adauga Comanda</button></a>

					    <?php echo "</td>";

				   }

				   

                   }

                   ?>

				   

                  </tbody>

            </table>

          </div>

          </div>

             <!--Final Profile-->

          

         

        <!--Final Contet Tab-->

        

        </div>

    

        </div>

    <script src="js/jquery.min.js"></script>

    <script src="js/popper.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

    <script src="js/search.js"></script>

  </body>

</html>