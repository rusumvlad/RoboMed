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
$idp = $_GET['id'];
$ID_Medic=$_SESSION['Id'];
$Nume_c="";
$Prenume_c="";
//Selectare nume si prenume
$result_update_c=mysqli_query($conn,"SELECT NUME,PRENUME FROM Date_pacient WHERE ID_PACIENT=$idp");
  if(mysqli_num_rows($result_update_c) > 0){
    while($row_pac_c=mysqli_fetch_assoc($result_update_c)){
      $Nume_c=$row_pac_c['NUME'];
      $Prenume_c=$row_pac_c['PRENUME'];
   
    }
    mysqli_free_result($result_update_c);
  }
//Selectarea medicamentului
$medicamente_all_select = "SELECT * FROM Medicamente_stoc";
$result_medicamente_all_select = mysqli_query($conn,$medicamente_all_select);
//Insert in tabela
if(isset($_POST["adaugacom"])){
        $Medicam = $_POST['f_Medicament'];
        $ModControl = $_POST['f_MOD_CONTROL'];
        $Status = $_POST['f_STATUS_COMENZI'];
        $sql_insert_comanda = "INSERT INTO Comenzi_robot(ID_MEDIC, MOD_CONTROL, ID_PACIENT, ID_MEDICAMENT, STATUS_COMENZI) VALUES ('$ID_Medic','$ModControl','$idp','$Medicam','$Status');UPDATE Medicamente_stoc SET NR_MEDICAMENT=NR_MEDICAMENT-1 WHERE MEDICAMENT_ID='$Medicam'";
		mysqli_multi_query($conn,$sql_insert_comanda);
	    header('Location: view_transporturi.php?status=succes');
	}

?>
<html>

<head>
  <title>ROBOMED | Comanda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styleNEW.css">
  <link rel="shortcut icon" href="../images/logoM.png"  />
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
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
               <a class="nav-link doctor-color" href="#"><i class="fa fa-user-md meniu-icons"></i><?php echo $_SESSION['MedicUser'];?></a>

            </li>
          </ul>
        </div>
      </nav></br></br></br></br>
      <div id="slides" class="carousel slide ml-1 mr-1" data-ride="carousel">
        <p class="subtitleadjustment">Editare comenzi</p>
        <div class="d-flex justify-content-center">
          <form method="POST">
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationServer01">Id pacient</label>
                <input type="text" class="form-control" id="validationServer01" value="<?php echo $idp?>" placeholder="" name="f_ID_PACIENT" readonly>

              </div>
              <div class="col-md-4 mb-3">
                <label for="validationServer01">Nume pacient</label>
                <input type="text" class="form-control" id="validationServer01" value="<?php echo $Nume_c?>" placeholder="" name="Nume_c" readonly>
              </div>
               <div class="col-md-4 mb-3">
                <label for="validationServer01">Prenume pacient</label>
                <input type="text" class="form-control" id="validationServer01" value="<?php echo $Prenume_c?>" placeholder="" name="Prenume_c" readonly>
              </div>
            </div>
            <div class="form-row">
               <div class="col-md-4 mb-3">
                <label for="validationServer01">Mod Control</label>
                <select class="form-control" id="Mod" name="f_MOD_CONTROL">
                  <option name="automat" value="automat" selected>automat</option>
                  <option name="manual" value="manual">manual</option>
                </select>
              </div>
               

              <div class="col-md-4 mb-3">
            <label for="validationServer01">Nume Medicament</label>
                <select class="form-control" id="Mod" name="f_Medicament"> 
                <?php 
                while ($row_medicamente = mysqli_fetch_assoc($result_medicamente_all_select)) {
                  echo '<option value="'.$row_medicamente['MEDICAMENT_ID'].'">'.$row_medicamente['NUME_MEDICAMENT'].'</option>';
                 } 
                 ?>
                </select>  
                </div>
              <div class="col-md-4 mb-3">
                <label for="validationServer01">Status comenzi</label>
                <input type="text" class="form-control" id="validationServer01" value="in asteptare" placeholder="" name="f_STATUS_COMENZI" readonly>
              </div>
            </div></br>
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary"  name="adaugacom" type="submit">
                Adauga Comanda
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>