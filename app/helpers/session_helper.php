<?php
    //Manage sessions

    session_start();

    function loggedUserIsAdmin(){


        if($_SESSION['user_cargo'] == 'adm'){

            return TRUE;
        }

        return FALSE;


    }

    function userIsLoggedIn(){


        if(isset($_SESSION['user_id'])){
            return TRUE;
        }
        return FALSE;



    }

    function flash($message, $messageBody = ""){

        if(isset($_SESSION[$message])){
            //Message has been set, calling for flashing
            $flashed = $_SESSION[$message];
            unset($_SESSION[$message]);
            
            return $flashed;

        }else if($messageBody != ""){
            //Message has not yet been set. Setting it
            //Message check needed to avoid erasing
            $_SESSION[$message] = $messageBody;
            
        }

        return FALSE;


    }


?>