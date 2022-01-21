<?php


function emptyInputSignup($AcName, $email, $name, $KnAs, $lMethod, $pMethod, $pwd, $pwdr){
    $result = true;
    if(empty($AcName)|| empty($email)|| empty($name) || empty($KnAs)|| empty($lMethod)|| empty($pMethod)|| empty($pwd)|| empty($pwdr)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
};

function invalidUserName($AcName, $name, $KnAs, $pwd){
    $result = true;
      if(!preg_match("/^[a-zA-Z0-9]\s*$/" , $AcName)){
        $result = true;
    }
    else{
        $result = false;
    }
        if(!preg_match("/^[a-zA-Z0-9]\s*$/" , $name)){
          $result = true;
         }
         else{
            $result = false;
        }
        if(!preg_match("/^[a-zA-Z0-9]\s*$/" , $KnAs)){
            $result = true;
        }
        else{
            $result = false;
        }       
        if(!preg_match("/^[a-zA-Z0-9]*$/" , $pwd)){
        $result = true;
        }
        else{
            $result = false;
        }
        return $result;
};
      
        


function invalidEmail($email){
    $result = true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};


function pwdMatch($pwd, $pwdr){
    $result = false;
    if($pwd !== $pwdr){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function uidExists($conn_tdc, $KnAs){
  
    $sql = "SELECT * FROM users WHERE cu_KnAs = ?;";
    $stmt = mysqli_stmt_init($conn_tdc);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../partPages/signUp.php?error=stmfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $KnAs);
    mysqli_stmt_execute($stmt);
    $resultsData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultsData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);

};

function createUser($conn_tdc, $AcName, $email, $name, $KnAs, $lMethod, $pMethod, $pwd, $date, $twoYear, $verified){

    $sql = "INSERT INTO 'users' (cu_acName, cu_lnName, cu_knAs, cu_email, cu_pwd, cu_lMethod, cu_pMethod, cu_confirmed, cu_startDate, cu_reviewDate) VALUES ($AcName, $name, $KnAs, $email, $pwd, $lMethod, $pMethod, $verified, $date, $twoYear);";
    $stmt = mysqli_stmt_init($conn_tdc);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../partPages/signUp.php?error=stmfailed");
        exit();
    }
    $hashedPWd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssssssdd", $AcName, $name, $KnAs, $email, $hashedpwd, $lMethod, $pMethod, $verified, $date, $twoYear);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../partPages/signUp.php?error=noerrors");
    exit();
    
};
