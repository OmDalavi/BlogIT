<?php

session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h1 class="title"> BlogIT</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="writers.php">Blogs</a>
        </li>';
        if(isset($_SESSION['username'])){
          echo '
             <li class="nav-item">
            <a class="nav-link" href="backend\welcome.php">My Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="backend\logout.php">Log Out</a>
            </li>

          ';
        }else{
            echo '
            <li class="nav-item">
            <a class="nav-link" href="backend\login.php">Log In</a>
            </li>

          ';
        }
        
        
        echo '
              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>' ;



?>