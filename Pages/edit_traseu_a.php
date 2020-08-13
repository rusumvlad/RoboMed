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

$Tras=$_POST['f_Traseu'];
$rezultat = mysqli_query($conn,$query);
$sql="UPDATE Harta SET Traseu=$Tras WHERE ID_Harta=1";
mysqli_query($conn,$sql);
header("Location: harta.php?status=succes");

?>