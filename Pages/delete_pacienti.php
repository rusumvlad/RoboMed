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
$idx=$_GET["id"];
$result_delete=mysqli_query($conn,"select * from Date_pacient where ID_PACIENT=$idx");
$row_pacienti=mysqli_fetch_assoc($result_delete);
$_SESSION['numeP_sters']=$row_pacienti['NUME'];
mysqli_query($conn,"delete from Date_pacient where ID_PACIENT=$idx");

header("Location:view_pacienti.php?delete_pacienti=succes");

?>