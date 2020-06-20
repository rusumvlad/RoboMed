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
$Nume=$_POST['f_Nume'];
$Prenume=$_POST['f_Prenume'];
$Varsta=$_POST['f_Varsta'];
$CNP=$_POST['f_CNP'];
$DataNasterii=$_POST['f_Data_Nasterii'];
$Adresa=$_POST['f_Adresa'];
$Sex=$_POST['f_Sex'];
$NumarPat=$_POST['f_Numarpat'];
$Telefon=$_POST['f_Telefon'];
$Mail=$_POST['f_Mail'];
$Profesie=$_POST['f_Profesie'];
$Locdemunca=$_POST['f_Locdemunca'];
$ID_Medic=$_SESSION['Id'];
$sql="INSERT INTO Date_pacient(ID_MEDIC,NUME, PRENUME, CNP, VARSTA, SEX, ADRESA, DATA_NASTERII, TELEFON, EMAIL, PROFESIE, LOC_MUNCA, NR_PAT) 
VALUES ('$ID_Medic','$Nume','$Prenume','$CNP','$Varsta','$Sex','$Adresa','$DataNasterii','$Telefon','$Mail','$Profesie','$Locdemunca','$NumarPat')";
mysqli_query($conn,$sql);
$last_id = mysqli_insert_id($conn);
header("Location: intrebare.php?id=$last_id");
?>