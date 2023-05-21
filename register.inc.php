<?php

if (isset($_POST["submit"])) {
    
    $Uname = $_POST["un"];
    $Password = $_POST["psw"];
    $RPassword = $_POST["psw-repeat"];
    $Pnumber = $_POST["pn"];
    $EmailAddress = $_POST["ea"];
    $Age = $_POST["age"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

     if (emptyInputRegister($Uname, $Password, $RPassword, $Pnumber, $EmailAddress, $Age) !== false) {
        header("location: ../register.php?error=emptyInput");
        exit();
     }
     if (invalidun($Uname) !== false) {
        header("location: ../register.php?error=invalidun");
        exit();
     }
     if (invalidea($EmailAddress) !== false) {
        header("location: ../register.php?error=invalidea");
        exit();
     }
     if (pswMatch($Password, $RPassword) !== false) {
        header("location: ../register.php?error=pswmatcherror");
        exit();
     }
     if (unExists($conn, $Uname, $EmailAddress) !== false) {
        header("location: ../register.php?error=untaken");
        exit();
     }

     createUser($conn, $Uname, $Password, $RPassword, $Pnumber, $EmailAddress, $Age);

}
else {
    header("location: ../register.php");
}
?>