<?php
#
#if(!isset($_COOKIE['session'])){
#    header("Location: /index.html");
#
#}else{
#
#    include_once("common.php");
#
#    if(!isAuthenticated($_COOKIE['session'])){
#        unset($_COOKIE['session']);
#        setcookie($_COOKIE['session'], '', time()-3600, '/');
#        header("Location: /index.html");
#
#    }else{


        if(isset($_POST["res"])){

            if(!empty($_POST["res"])) {
                $users = explode(" ", $_POST["res"]);
                $numRes = count($users);
                $counter = 0;
                while($counter < ($numRes-1)){
                        echo "<tr><td>";
                        $name = ucfirst($row['firstname']) . ' ' . ucfirst($row['lastname']);
                        echo "<a href='account.php?user=".$users[$counter]."'>". $users[$counter] . "</a>";
                        echo "</td></tr>";
                        $counter++;
                }
                echo "</table>";
            }
        }
#    }
#}
?>
