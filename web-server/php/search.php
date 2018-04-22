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


        if(isset($_POST["search"])){

            if(!empty($_POST["search"])) {

                $_POST['session_id'] = $_COOKIE['session'];
                
                echo "<p hidden>";
                include "FlaskProxy.php";
                echo "</p>";

                $users = explode(" ", $response);
                $numRes = count($users);
                $counter = 0;
                echo "<table border='0'>";
                while($counter < ($numRes-1)){
                        echo "<tr><td>";
                        echo "<a href='account.php?user=".$users[$counter]."'>". $users[$counter] . "</a>";
                        echo "</td></tr>";
                        $counter++;
                }
                echo "</table>";
            }
        }
    }
}
?>
