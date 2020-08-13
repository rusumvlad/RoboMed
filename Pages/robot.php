<?php 


include("../connection.php");



$id=$_GET['id'];

//$conn = mysqli_connect("localhost","webTeam","webTeam","robomed");


$queryselect = "select ID_PACIENT, ID_MEDICAMENT from Comenzi_robot where ID_COMANDA = '".$id."'";

$query = mysqli_query($conn,$queryselect) or die('Errant query:  '.$queryins);

$row=mysqli_fetch_row($query);


$queryselect2 = "select NR_PAT from Date_pacient where ID_PACIENT =  '".$row[0]."'";

$query2 = mysqli_query($conn,$queryselect2) or die('Errant query:  '.$queryins);
$row1=mysqli_fetch_row($query2);

echo "#";

echo $row1[0].' '.$row[1]; 
echo "*";


?>
