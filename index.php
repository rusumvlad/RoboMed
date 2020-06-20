<?php 

include "userlog.php";

?>

<html>

    <head>

        <title>ROBOMED | LOGIN</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="CSS/style.css">

        <script src="https://kit.fontawesome.com/a81368914c.js" SameSite="none Secure"></script>

        <link rel="shortcut icon" href="images/logoM.png" />

        

	</head>

    <body>

        <img class="wave" src="images/waveLeft.png" alt="ImagineVal">

        

	<div class="container">

        <div class="img">

			<img src="images/MedicBack.png" alt="Medic">

		</div>

		<div class="login-content">

            

             <form id="formFocus" action="userlog.php" method="POST">

                <img src="images/logoM.png" alt="Logo">

                

				<h2 class="title">Welcome</h2>

           		<div class="input-div one">

           		   <div class="i">

                      <i class="fas fa-user"></i>

           		   </div>

           		   <div class="div">

           		   		<h5>Username</h5>

           		   		<input type="text" name="username" class="input">

           		   </div>

           		</div>

           		<div class="input-div pass">

           		   <div class="i"> 

           		    	<i class="fas fa-lock"></i>

           		   </div>

           		   <div class="div">

           		    	<h5>Password</h5>

           		    	<input type="password" name="password" class="input">

                   </div>

            	</div>

                <input type="submit" class="btn" name="loginBTN" value="Login">

                <script type="text/javascript" src="JavaScript/main.js"></script>

                <?php 

                    $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($fullUrl,"login=empty") == true){

                        echo "<p style='color:red;'>Nu sunt completate toate campruile</p>";

                        exit();

                    }

                    elseif(strpos($fullUrl,"login=wrong") == true){

                        echo "<p style='color:red;'>Numele sau parola este gresita</p>";

                        exit();

                    } else if(strpos($fullUrl,"login=denied") == true){

						echo "<p style='color:red;'>Asistentii nu au acces pe pagina web!</p>";

					}

                    ?>

            </form>

            

        </div>

    </div>

    

    </body>

</html>