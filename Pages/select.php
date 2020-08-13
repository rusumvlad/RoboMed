<?php session_start();
if(isset($_SESSION['UserType'])){
  if($_SESSION['UserType'] != 'medic'){
    header('Location: index_admin.php');
  }
}
else{
  header('Location:../index.php');
}
require_once "../connection.php";
//Numarul de pacienti
$query="Select count(*) as numere from Date_pacient where ID_MEDIC='{$_SESSION['Id']}'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0)
$row=mysqli_fetch_assoc($result);
else
$row['numere']=0;
//Numarul de medicamente
$medicamente_stoc = "SELECT SUM(NR_MEDICAMENT) as stoc from Medicamente_stoc";
$result_medicamente_stoc = mysqli_query($conn,$medicamente_stoc);
if(mysqli_num_rows($result_medicamente_stoc) > 0)
$row_medicament = mysqli_fetch_assoc($result_medicamente_stoc);
else
$row_medicamnet['stoc'] = 0;
$stoc = $row_medicament['stoc'];
//Numarul de alarme
$numar_alarme="Select count(*) as numereAlarme from Alarme_robot";
$result_numar_alarme= mysqli_query($conn,$numar_alarme);
if(mysqli_num_rows($result_numar_alarme) > 0)
$row_alarme=mysqli_fetch_assoc($result_numar_alarme);
else
$row_alarme['numereAlarme']=0;
?>