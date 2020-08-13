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

require_once "../connection.php";

$Traseu = "";

$result_update=mysqli_query($conn,"select * FROM Harta where ID_Harta=1");
  if(mysqli_num_rows($result_update) > 0){
    while($row_pac=mysqli_fetch_assoc($result_update)){
      $Traseu=$row_pac['Traseu'];
     
   
    }
    mysqli_free_result($result_update);
  }




?>

<!doctype html>

<html lang="en">



<head>

    <title>ROBOMED | Editare Traseu</title>

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

                        <a href="adauga_ma.php"><i class="fa fa-plus-square meniu-icons" aria-hidden="true"></i>Adaugare utilizatori</a>

                    </li>

                    <li>

                        <a href="adauga_medicament.php"><i class="fas fa-pills meniu-icons-principal" aria-hidden="true"></i>Adaugare medicamente</a>

                    </li>

                    <li class="active">

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

                <p class="subtitleadjustment">Editare traseu</p>
		

                <div class="d-flex justify-content-center">

                    <form id="addUser" action="edit_traseu_a.php" method="POST">

                        
                        <div class="form-row">

                            <div class="col-md-12 mb-3">

                                <label>Traseu</label>

                                <input type="text" class="form-control" id="valid_Traseu" value="<?php echo $Traseu;?>" name="f_Traseu" maxlength="3">

                            </div>

                        </div>
						
						<div class="form-row text-center">

                            <div class="col-md-12 mb-3">

                                <p>1 - Stanga</p>
								<p>2 - Dreapta</p>
								<p>4 - Sens dublu</p>

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
			
			<script src="js/validare_edit.js"></script>
            

</body>



</html>