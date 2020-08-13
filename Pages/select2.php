<?php session_start();

if(isset($_SESSION['UserType'])){

  if($_SESSION['UserType'] != 'admin'){

    header('Location: index_admin.php');

  }

}

else{

  header('Location:../index.php');

}

require_once "../connection.php";

$query="Select count(*) as numere from pacineti where IDm='{$_SESSION['Id']}'";

$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

?>