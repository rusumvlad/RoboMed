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

$Utilizator=$_POST['f_UTILIZATOR'];
$Parola=$_POST['f_PAROLA'];
$Tip=$_POST['f_USRE_TYPE'];
$query = "SELECT UTILIZATOR from Login_utilizator where UTILIZATOR='$Utilizator'";
$rezultat = mysqli_query($conn,$query);
$sql="INSERT INTO Login_utilizator(UTILIZATOR, PAROLA, USER_TYPE) VALUES ('$Utilizator','$Parola','$Tip')";
if(mysqli_num_rows($rezultat)>0){
	header("Location: adauga_ma.php?status=fail");
}else{
mysqli_query($conn,$sql);
header("Location: adauga_ma.php?status=succes");
}
?>