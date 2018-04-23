<?php

if(!isset($_COOKIE['session'])){
    header("Location: /index.html");

}else{

    include_once("common.php");

    if(!isAuthenticated($_COOKIE['session'])){
        unset($_COOKIE['session']);
        setcookie($_COOKIE['session'], '', time()-3600, '/');
        header("Location: /index.html");

    }else{


        if(isset($_GET["user"])){

            if(!eimpty($_GET["user"])) {
                $user = strip_tags($_GET["user"]);
                $session_id = strip_tags($_COOKIE['session']);

                echo "<p>page belongs to ".$user."</p>";
                if($stmt = $con->prepare("SELECT * FROM skitter.follow WHERE  = ?")){

                    if($stmt->bind_param("ss",$user)){

                        if(!$stmt->execute()){
                            die("Error - Issue executing prepared statement: " . mysqli_error($con));
                        }
                    }else{
                        die("Error - Issue binding prepared statement: " . mysqli_error($con));
                    }

                    echo "<div><button type='submit'></button></div>";

                }
            }
        }
    }
?>
