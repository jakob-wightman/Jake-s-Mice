<?php
    include_once('header.php');
?>

<body>
<div class="container">

  <!--Register-->
    <h1>Register</h1>
<form action="includes/register.inc.php" method="post">
  <div class="container">
    <label for="un"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="un" id="un" required>

    <label for="psw"><b>Password</b></label>
    <input type="text" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="text" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

    <label for="pn"><b>Phone Number</b></label>
    <input type="number" placeholder="Enter Phone Number" name="pn" id="pn" required>    
	
    <label for="ea"><b>Email Address</b></label>
    <input type="text" placeholder="Enter Email Address" name="ea" id="ea" required>


	  <label for="age"><b>Age</b></label>
    <input type="number" placeholder="Enter Age" name="age" id="age" required>

	<button type="submit" name="submit" class="registerbtn">Register</button>
  </div>
  </form>
  <div class="containersignin">
    <a href="login.php">Sign in</a>
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
      else if ($_GET["error"] == "untaken") {
            echo "<p1>Username is taken!</p>";   
      }  
      else if ($_GET["error"] == "invalidea") {
        echo "<p>Invalid email address!</p>";   
      }
      else if ($_GET["error"] == "pswmatcherror") {
        echo "<p>Passwords do no match!</p>";   
      } 
      else if ($_GET["error"] == "unExists") {
        echo "<p>Email already taken!</p>";   
      }
      else if ($_GET["error"] == "none") {
        echo "<p>You have registered!</p>";   
      } 
      }
    ?>
  </div>
</div>
</body>

