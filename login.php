<?php
    include_once('header.php');
?>

<body>
<div class="container">

  <!--Login-->
	<h2>Login</h2>
<form action="includes/login.inc.php" method="post">
  <div class="container2">

    <label for="un"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="un">

    <label for="psw"><b>Password</b></label>
    <input type="text" placeholder="Enter Password" name="psw">

    <button class="loginb" name = "submit" type="submit">Login</button>

  </div>



</form>
    <div class="acctreg">
	    <a href="register.php">Register Here</a>
	  </div>


<div class = "errorMsg">
  <style>
    .errorMsg {
      margin-bottom: 50px;
      background-color: #000000;
      color: white;
      padding: 20px;
      font-size: 12px;
      text-transform: uppercase;
      text-align: center;
      font-family: "Montserrat", sans-serif;
    }
  </style>    
  <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyInput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "wronglogin") {
          echo "<p>Incorrect Login Information</p>";   
    }  
    }
  ?>
</div>
<footer>
</footer>
	
	
</div>
</body>
</html>
