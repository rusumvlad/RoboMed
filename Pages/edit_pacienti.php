<?php session_start();
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
 
    $Nume="";
    $Prenume="";
    $Varsta="";
    $CNP="";
    $DataNasterii="";
    $Adresa="";
    $Sex="";
    $NumarPat="";
    $Telefon="";
    $Mail="";
    $Profesie="";
    $Locdemunca="";
    $ID_Medic="";
	$Tratament="-";
	$Diagnostic="-";
	$DataTratament="-";
	$TipAlergie="-";
	$Simptome="-";
	$DataPrescriere="-";
	$Medicament="-";
	
  $result_update=mysqli_query($conn,"SELECT * FROM Date_pacient WHERE ID_PACIENT=$idp");
  if(mysqli_num_rows($result_update) > 0){
    while($row_pac=mysqli_fetch_assoc($result_update)){
      $Nume=$row_pac['NUME'];
      $Prenume=$row_pac['PRENUME'];
      $Varsta=$row_pac['VARSTA'];
      $CNP=$row_pac['CNP'];
      $DataNasterii=$row_pac['DATA_NASTERII'];
      $Adresa=$row_pac['ADRESA'];
      $Sex=$row_pac['SEX'];
      $NumarPat=$row_pac['NR_PAT'];
      $Telefon=$row_pac['TELEFON'];
      $Mail=$row_pac['EMAIL'];
      $Profesie=$row_pac['PROFESIE'];
      $Locdemunca=$row_pac['LOC_MUNCA'];
   
    }
    mysqli_free_result($result_update);
  }
  //selectare Alergii
  $sql_select_a="SELECT * FROM Alergii_pacient WHERE ID_PACIENT=$idp";
  $result_select_a=mysqli_query($conn,$sql_select_a);
  
  //selectare Tratament
  $sql_select_t="SELECT * FROM Schema_medicatie WHERE ID_PACIENT=$idp";
  $result_select_t=mysqli_query($conn,$sql_select_t);
  
  //Update si Cancel
  if(isset($_POST["update"])){
		mysqli_multi_query($conn,"update Date_pacient set NUME='$_POST[f_Nume]',PRENUME='$_POST[f_Prenume]',VARSTA='$_POST[f_Varsta]',ADRESA='$_POST[f_Adresa]',TELEFON='$_POST[f_Telefon]',EMAIL='$_POST[f_Mail]',PROFESIE='$_POST[f_Profesie]',LOC_MUNCA='$_POST[f_Locdemunca]' where ID_PACIENT=$idp");
		header("Location:view_pacienti.php?update=succes");
	}
	else if(isset($_POST["cancel"])){
		header("Location:view_pacienti.php");
	}
?>
<html>
  <head>
  	<title>ROBOMED | Vizualizare Pacient</title>
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
		 <div class="title text-center">
        <h1 class="titleVP">Vizualizare si editare pacienti</h1>
		</div>
         <div class="tab-pane" id="edit">
            <form id="adaugarePac" class="justify-content-center mt-1 ml-3 mr-3 mb-5 form-content" name="formEdit" method="post">
              <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Nume</label>
                <input type="text" class="form-control" id="valid_Nume"  name="f_Nume"  
                  value="<?php echo htmlspecialchars($Nume);?>">
               
              </div>
              <div class="col-md-6 mb-3">
                <label>Prenume</label>
                <input type="text" class="form-control" id="valid_Prenume"  value="<?php echo $Prenume;?>"  name="f_Prenume" >
              </div>
              </div>
              <div class="form-row">
			  <div class="col-md-4 mb-3">
                <label>CNP</label>
                <input type="text" class="form-control" id="valid_CNP" value="<?php echo $CNP;?>"   name ="f_CNP" readonly>
                
              </div>
              <div class="col-md-4 mb-3">
                <label>Data Nasterii</label>
                <input type="text" class="form-control" id="datepicker" value="<?php echo $DataNasterii;?>"  name="f_Data_Nasterii" readonly>
               
              </div>
			  <div class="col-md-4 mb-3">
                <label>Varsta</label>
                <input type="text" class="form-control" id="valid_Varsta" placeholder="Varsta"  name="f_Varsta" value="<?php echo $Varsta;?>">
               
              </div>
              
            </div>
            <div class="form-row">
              
			   <div class="col-md-4 mb-3">
                <label>Sex</label>
                <input type="text" class="form-control" id="valid_Sex" value="<?php 
                if($Sex=='f') echo "feminin";
                elseif($Sex=='m') echo "masculin"?>"  name="f_Sex"  readonly>
               </div>
               <div class="col-md-4 mb-3">
                <label>Numarul patului</label>
                <input type="text" class="form-control" id="valid_Numar" value="<?php echo $NumarPat;?>"  name="f_Numarpat" readonly >
                
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label>Adresa</label>
                <input type="text" class="form-control" id="valid_Adresa" value="<?php echo $Adresa;?>"  name="f_Adresa" >
              
              </div>
              </div>
				<div class="form-row">
              
              <div class="col-md-6 mb-3">
                <label>Telefon</label>
                <input type="text" class="form-control" id="valid_Telefon" value="<?php echo $Telefon;?>"  name="f_Telefon" maxlength="10">
               
              </div>
              <div class="col-md-6 mb-3">
                <label>E-Mail</label>
                <input type="text" class="form-control" id="valid_Email" value="<?php echo $Mail;?>"  name="f_Mail" >
                
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col-md-6 mb-3">
                <label>Profesie</label>
                <input type="text" class="form-control" id="valid_Profesie" value="<?php echo $Profesie;?>"  name="f_Profesie" >
                
              </div>
              <div class="col-md-6 mb-3">
                <label>Loc de munca</label>
                <input type="text" class="form-control" id="valid_Loc" value="<?php echo $Locdemunca;?>"  name="f_Locdemunca" >
                
              </div>
			  
              </div>
				<div class="form-row text-center">
					<div class="col-12">
						<p style="color:red" id="eroare"></p>
					</div>
				</div>
			
                
                <div class="d-flex justify-content-center">
                <button class="btn btn-danger" type="submit" name="update">Edit User</button>&nbsp
				<button class="btn btn-danger" name="cancel">Cancel</button></div>
				<div class="row text-center mt-5">
             <div class="col-12">
                    <button class="btn btn-danger " type="button" id="less" onclick="unhide()">Vezi Alergii si Tratamente</button>
                </div>
                </div>
              <div id="tratamentalergii">
            <div class="justify-content-center mt-1 ml-3 mr-3 mb-5 form-content">
             <div class="row text-center">
                 <div class="col-12">
             <h1 class="" > Alergii </h1>
             </div>
             </div>
            <div class="table-responsive-xl">
                <table class="table">
               <?php
                 if(mysqli_num_rows($result_select_a)>0){
                echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>Tip Alergie</th>";
                    echo "<th scope='col'>Simptome</th>";
                    echo "<th scope='col'>Data Prescriere</th>";
                    echo "<th scope='col'>Medicament</th>";
					  echo "</tr>";
                echo "</thead>"; 
                
                echo "<tbody id='myTable'>";
            
                  
                 while($row_select_a=mysqli_fetch_assoc($result_select_a)){
                   echo "<tr>";
                      echo "<td>".$row_select_a['TIP_ALERGIE']."</td>";
					  echo "<td>".$row_select_a['SIMPTOME']."</td>";
					  echo "<td>".$row_select_a['DATA_PRESCRIERE']."</td>";  
					  echo "<td>".$row_select_a['MEDICAMENT']."</td>"; 
					  echo "</tr>";
                 
              }
            
              mysqli_free_result($result_select_a);
          } else {
              echo "<center><p style='color:red;'>Pacientul nu are o alergie stabilita!</p></center>";
          }
            echo "</tbody>";
            ?>
              </table>
              </div> 
            
              <div class="row text-center">
                  <div class="col-12">
             <h1 class="" > Tratament </h1>
             </div>
             </div>
             <div class="table-responsive-xl">
                <table class="table">
                <?php
                 if(mysqli_num_rows($result_select_t)>0){
                echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>Tratament</th>";
                    echo "<th scope='col'>Diagnostic</th>";
                    echo "<th scope='col'>Data Tratament</th>";
					  echo "</tr>";
                echo "</thead>"; 
                
                echo "<tbody id='myTable'>";
            
                  
                  while($row_select_t=mysqli_fetch_assoc($result_select_t)){
                          echo "<tr>";
                          echo "<td>".$row_select_t['TRATAMENT']."</td>";
    					  echo "<td>".$row_select_t['DIAGNOSTIC']."</td>";
    					  echo "<td>".$row_select_t['DATA_TRATAMENT']."</td>";  
                          echo "</tr>";
    			 }
            
              mysqli_free_result($result_select_t);
          } else {
              echo "<center><p style='color:red;'>Pacientul nu are inca un tratament stabilit!</p></center>";
          }
            echo "</tbody>";
            ?>
                
              </table>
            
            
              </div>
          
         </div>
              </form>
              
              
             <!--Final Profile-->
             
        <!--Final Contet Tab-->
        
        </div>
    
        </div>
		</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/search.js"></script>
    <script src="js/hide.js"></script>
	<script src="js/validareForm_addp.js"></script>
  </body>
 
</html>
