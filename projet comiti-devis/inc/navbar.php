<?php 
// require 'function/function.php';
// si on a dans l'url ?logout alors on efface la session et redirige vers la page login.php
if(isset($_GET['logout'])){
  unset($_SESSION['loginPage']);
  header('Location: login.php');
  exit;
}
// if(!isConnected()){
//   header('Location: login.php');
//   exit;
// }
// $_SESSION['loginPage']['userLogged']['Role']

?>

<nav class="navbar sticky-top navbar-expand-lg  border-bottom shadow"style="background-color:#C5C6C7;"> 
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">COMITI-Asso</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if ($_SESSION['loginPage']['userLogged']['Role'] === 'Big-admin' || $_SESSION['loginPage']['userLogged']['Role'] === 'Admin' ) :?>
          
          <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'userList' ? 'active' : '' ?>"  href="userList.php">Userlist</a>
          </li> 
          <?php endif ?>
          <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'Dashboard' ? 'active' : '' ?>"  href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'Devis' ? 'active' : '' ?>"  href="test-devisV3.php">Devis-Annuel</a>
          </li>
          
      </ul>
      <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a href="?logout" class="btn btn-primary btn-rounded btn-block  fa-lg gradient-custom-2 mb-3 ">Se déconnecter</a>
            </li>
          </ul>  
    </div>
  </div>
</nav>

           