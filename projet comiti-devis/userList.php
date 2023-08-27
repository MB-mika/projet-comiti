<?php
session_start();

$title = 'userList| Session';
$currentPage = 'userList';
require 'inc/head.php';
require 'inc/navbar.php';
require 'db/dataUser.php';
require 'function/function.php';

if(!isConnected()){
    header('Location: login.php');
    exit;
}


?>



  <title>Page utilisateurs</title>




<div class="container mt-5">
    <div class="row row-cols-5 gap-4 justify-content-center">
    <?php foreach($comiti as $user) : ?>
        <div class="card col-sm-3 p-0" >
            
            <div class=" text-bg-light p-3 card-body">
                <h5 class="card-title"><?= $user['Name'] ?></h5>
                <p class="card-text"><?= $user['Email'] ?></p>
                <p class="card-text"><?= $user['Phone'] ?></p>
                <p class="card-text"><?= $user['Classe'] ?></p>
                <a href="userCard.php?id=<?= $user['id'] ?>" class="btn btn-primary">Voir la carte</a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<!-- submit qui permet d'éffacer la session en passant par le GET -->



