<?php session_start();
require_once "connection.php";
if(isset($_POST["loginBTN"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query="SELECT * FROM Login_utilizator WHERE UTILIZATOR='$username' AND PAROLA='$password'";
    $result = mysqli_query($conn,$query);
    if(empty($username) || empty($password)){
        header('Location: index.php?login=empty');
        exit();
    } else{

    if(mysqli_num_rows($result) > 0){
        while($row=mysqli_fetch_assoc($result)){
           if($row["USER_TYPE"]=="admin"){
                
                $_SESSION['AdminUser']=$row["UTILIZATOR"];
                $_SESSION['UserType']=$row['USER_TYPE'];
                
                header('Location: Pages/index_admin.php');

           }
           elseif($row["USER_TYPE"]=="medic"){
                $_SESSION['Id']=$row["ID_UTILIZATOR"];
                $_SESSION['MedicUser']=$row["UTILIZATOR"];
                $_SESSION['UserType']=$row['USER_TYPE'];
                header('Location: Pages/index.php');

           } else if($row["USER_TYPE"]=="asistent"){
				header('Location: index.php?login=denied');
				exit();
		   }
        }
    } else{
        header('Location: index.php?login=wrong');
        exit();
    }
    }
}
 
?>