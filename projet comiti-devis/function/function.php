<?php



function isConnected(){

    if(isset($_SESSION['loginPage']['userLogged'])){
        return true;
    }

        return false;

}