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


        if(isset($_POST["newSkit"])){

            if(!empty($_POST["newSkit"])) {
                $_POST["user"] = $_COOKIE['session'];
                $skit = array( 'newSkit' => $_POST["newSkit"], 'user' => $_POST['user']);

                $url = 'http://node:8888/addSkit';
                $curl = curl_init($url);
                $curlString = http_build_query($skit, '', '&');
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $curlString);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                curl_close($curl);
                header("Location: ../home.html");

            }

        }
    }

}

?>
