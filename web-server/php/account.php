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

            if(!empty($_GET["user"])) {
                echo "<p>page belongs to ".$_GET["user"]."</p>";
            }
        }
    }
}
?>
