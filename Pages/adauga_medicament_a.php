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
$ID=$_POST['f_ID'];
$NumeMedicament=$_POST['f_NUME_MEDICAMENT'];
$Stoc=$_POST['f_NR_MEDICAMENT'];
$DataExp=$_POST['f_DATA_EXPIRARE'];
$query = "SELECT NUME_MEDICAMENT from Medicamente_stoc where NUME_MEDICAMENT='$NumeMedicament'";
$rezultat = mysqli_query($conn,$query);
$sql="INSERT INTO Medicamente_stoc(MEDICAMENT_ID,NUME_MEDICAMENT, NR_MEDICAMENT, DATA_EXPIRARE) VALUES ('$ID','$NumeMedicament','$Stoc','$DataExp')";
$sql_update = "UPDATE Medicamente_stoc SET NR_MEDICAMENT=NR_MEDICAMENT+'$Stoc' WHERE MEDICAMENT_ID='$ID'";

if(mysqli_num_rows($rezultat)>0){
	mysqli_query($conn,$sql_update);
	header("Location: adauga_medicament.php?status=update");

}else{
	mysqli_query($conn,$sql);
	header("Location: adauga_medicament.php?status=succes");
}
?>