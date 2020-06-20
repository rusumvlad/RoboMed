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
require_once "../connection.php";
$Tratament=$_POST['f_TRATAMENT'];
$Diagnostic=$_POST['f_DIAGNOSTIC'];
$DataTratament=$_POST['f_DATA_TRATAMENT'];
$TipAlergie=$_POST['f_TIP_ALERGIE'];
$Simptome=$_POST['f_SIMPTOME'];
$DataPrescriere=$_POST['f_DATA_PRESCRIERE'];
$Medicament=$_POST['f_MEDICAMENT'];
$IdPacient=$_SESSION['id_pacient'];
$sql="INSERT INTO Alergii_pacient(ID_PACIENT, TIP_ALERGIE, SIMPTOME, MEDICAMENT, DATA_PRESCRIERE) VALUES
('$IdPacient','$TipAlergie','$Simptome','$Medicament','$DataPrescriere');INSERT INTO Schema_medicatie(ID_PACIENT, DIAGNOSTIC, TRATAMENT, DATA_TRATAMENT) 
VALUES('$IdPacient','$Diagnostic','$Tratament','$DataTratament')";
mysqli_multi_query($conn,$sql);
unset($IDPacient);
header("Location: adauga_pacienti.php?info=succes");
?>