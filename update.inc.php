<?php
session_start();


if (isset($_POST['update'])) {

    require_once 'dbh.inc.php';

    $userId = $_SESSION['id'];

    $Uname = $_POST["un"];
    $Password = $_POST["psw"];
    $RPassword = $_POST["psw-repeat"];
    $Pnumber = $_POST["pn"];
    $EmailAddress = $_POST["ea"];
    $Age = $_POST["age"];

    $hasedP = password_hash($Password, PASSWORD_DEFAULT);


    $sql = "UPDATE users SET username=?, password=?, repeatpassword=?, phonenumber=?, emailaddress=?, age=? WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssi", $Uname, $hasedP, $RPassword, $Pnumber, $EmailAddress, $Age, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profile.php?error=none");
    exit();
}
else {
    header("location: ../profile.php");
    exit();
}
?>