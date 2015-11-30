<?php

if(isset($_POST["submit"])){
	// cek username and password
    if(($_POST['username']==$username)and($_POST['password']==$password)){
    	// set session
        $_SESSION["user"]=$username;
        // go to homepage when login success
        header('Location: ./index.php');
    }
    else{
        $fail=1;
    }
}

?>