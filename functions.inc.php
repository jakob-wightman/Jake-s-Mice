<?php
function emptyInputRegister($Uname, $Password, $RPassword, $Pnumber, $EmailAddress, $Age) {
    $result = "";
    if (empty($Uname) || empty($Password) || empty($RPassword) || empty($Pnumber) || empty($EmailAddress) || empty($Age)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidun($Uname) {
    $result = "";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $Uname)) {
        $result = true;
    }
    else {
        $result = false;
    } 
    return $result;
}

function invalidea($EmailAddress) {
    $result = "";
    if (!filter_var($EmailAddress, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    } 
    return $result;
}

function pswMatch($Password, $RPassword) {
    $result = "";
    if ($Password !== $RPassword) {
        $result = true;
    }
    else {
        $result = false;
    } 
    return $result;
}

function unExists($conn,$Uname, $EmailAddress) {
    $sql = "SELECT * FROM users WHERE username = ? OR emailaddress = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();       
    }

    mysqli_stmt_bind_param($stmt, "ss", $Uname, $EmailAddress);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn, $Uname, $password, $RPassword, $Pnumber, $EmailAddress, $Age) {
    $sql = "INSERT INTO users (username, password, repeatpassword, phonenumber, emailaddress, age) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();       
    }

    $hashedpsw = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $Uname, $hashedpsw, $RPassword, $Pnumber, $EmailAddress, $Age);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit(); 
}

function emptyInputLogin($Uname, $Password) {
    $result = "";
    if (empty($Uname) || empty($Password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $Uname, $Password) {
    $unExists = unExists($conn, $Uname, $Uname);

    if ($unExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pswHashed = $unExists["password"];
    $checkpsw = password_verify($Password, $pswHashed);

    if ($checkpsw === false) {
        header("location: ../login.php?error=wronglogin");
        exit();        
    }
    else if ($checkpsw === true) {
        session_start();
        $_SESSION["id"] = $unExists["id"];
        header("location: ../index.php");
        exit(); 
    }
}




