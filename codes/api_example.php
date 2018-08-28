<?php

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        $var_post = $_POST;

        $hault = 1;
        $auth  = "";

        if ( isset($var_post["AKey"]) && $var_post["AKey"] != "" ) { $auth["AKey"] = $var_post["AKey"]; msg("AKey present: " . $var_post["AKey"]); } else { $hault = 0; }
        if ( isset($var_post["User"]) && $var_post["User"] != "" ) { $auth["User"] = $var_post["User"]; msg("User present: " . $var_post["User"]); } else { $hault = 0; }
        if ( isset($var_post["Pawd"]) && $var_post["Pawd"] != "" ) { $auth["Pawd"] = $var_post["Pawd"]; msg("Pawd present: " . $var_post["Pawd"]); } else { $hault = 0; }
        if ( isset($var_post["RTpe"]) && $var_post["RTpe"] != "" ) { $auth["RTpe"] = $var_post["RTpe"]; msg("RTpe present: " . $var_post["RTpe"]); } else { $hault = 0; }
        if ( isset($var_post["Reqt"])) { $auth["Reqt"] = $var_post["Reqt"]; msg("Reqt present: " . $var_post["Reqt"]); } else { $hault = 0; }

        if ( $hault == 1 )
        {
            
        }
        else
        {
            msg("Please, check manual instructions to call API.");
        }
    }
    else
    {
        msg("Service Unavailable.");
    }

    function msg($msg)
    {
        echo $msg."<BR>";
    }
