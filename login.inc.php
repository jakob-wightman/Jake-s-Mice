<?php

if (isset($_POST["submit"])) {

    $Uname = $_POST["un"];
    $Password = $_POST["psw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($Uname, $Password) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
     } 
     
    loginUser($conn, $Uname, $Password);
    
}
else {
    header("location: ../login.php");
    exit();
}
?>
