<?php
    include_once('header.php');
?>

<body>
<div class="container">

  <!--Update Profile-->
    <h1>Update Profile</h1>
<form action="includes/update.inc.php" method="post">
    <div class="container">
        <label for="un"><b>Update Username</b></label>
        <input type="text" placeholder="Enter Username" name="un" id="un" >

        <label for="psw"><b>Update Password</b></label>
        <input type="text" placeholder="Enter Password" name="psw" id="psw" >

        <label for="psw-repeat"><b>Update Repeat Password</b></label>
        <input type="text" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" >

        <label for="pn"><b>Update Phone Number</b></label>
        <input type="number" placeholder="Enter Phone Number" name="pn" id="pn" >    
        
        <label for="ea"><b>Update Email Address</b></label>
        <input type="text" placeholder="Enter Email Address" name="ea" id="ea" >


        <label for="age"><b>Update Age</b></label>
        <input type="number" placeholder="Enter Age" name="age" id="age" >

        <button type="submit" name="update" class="updatebtn">Update</button>
    </div>
</form>

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
    if ($_GET["error"] == "none") {
      echo "<p>Information has been updated!</p>";
  }
}
?>
</div>
</div>
</body>
</html>
