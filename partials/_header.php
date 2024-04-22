<?php

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">Studdy Buddy</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Forum <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="quiz.php">Quiz</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="notesharing.php">Note Sharing</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="contact.php" tabindex="-1" >Contact</a>
    </li>
  </ul>
  <div class="row mx-2">';

  session_start();
if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
  echo '<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    <p class="text-light my-0 mx-2">Welcome  ' . $_SESSION['useremail'] . '</p>
    <a href="partials/_logout.php" role="button" class="btn btn-success ml-2" >Logout</a>
    </form>';

}

else{
    echo '
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-success mx-2" data-toggle="modal" data-target="#signupModal">Sign Up</button> ';
}
    

echo '</div>  
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>SIGN UP SUCCESSFUL !</strong>  YOU CAN NOW LOG IN .
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}

?>