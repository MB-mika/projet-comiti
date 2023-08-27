<?php
session_start();

$title = 'Utilisateur | Session';
$currentPage = 'userCard';
require 'inc/head.php';
require 'inc/navbar.php';
require 'db/dataUser.php';
require 'function/function.php';


if(!isConnected()){
    header('Location: login.php');
    exit;
}


if(!isset($_GET['id'])){
    header('Location: usersList.php');
    exit;
}



$idUrl = $_GET['id'];

foreach ($comiti as $user){
    if ($user['id'] == $idUrl){
        $userCard = $user;
        break;
    }
 
}

?>
<div class="align-self-center" style="height: 92vh;">
    <div class="mt-5 d-flex  row row-cols-5 gap-4 justify-content-center ">
        <div class="card col-sm-3 p-0" >
            
            <div class="text-bg-secondary p-3 card-body">
                <?php foreach($userCard as $key => $value) :?>
                <p class="card-text"><?= $key . ' : '. $value ?></p>
                <?php endforeach;?>
                <?php if ($_SESSION['loginPage']['userLogged']['Role'] === 'Big-admin') : ?>
                <a href="userList.php" class="btn btn-primary">modifier</a>
                <?php endif ?>
                        <a href="userList.php" class="btn btn-primary">retour</a
                
            </div>
        </div>
    </div>
</div>
