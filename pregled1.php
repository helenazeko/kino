<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css" >
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href ="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  ></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>KinoStar</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        .box1 {
            text-align: center;
            border: 15px solid black;
            border-style: dotted;
            width: 40%;
            margin-top: 50px;
            margin-left: 400px;
        }
        .search-form{
        margin-top:5px;
        float:left;
        margin-left:100px;
        }
      input[type=text]{
        padding: 7px;
        border:none;
        font-size: 16px;
        font-family: sans-serif;
        }
      .search{
        float: right;
        background: #808080;
        color:white;
        border-radius: 0 5x 5x 0;
        cursor: pointer;
        position: relative;
        padding: 7px;
        font-family: sans-serif;
        border:none;
        font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "baza");
    $sql = "SELECT * FROM movietable";

    $result1 = mysqli_query($link, $sql);
    ?>
<!---NavigationBar--->
<section id="section-nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#section-nav-bar"><img src="img/logo.png" ></a>
                <div>
                    <form action="pregled1.php" method="POST" class = "search-form">
                        <input type="text" name="keyword" placeholder="Search "/>
                        <button name="search" class="search">Search</button>
                    </form>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto" > 
                    <li class="nav-item ">
                      <a class="nav-link" href="index.php">NASLOVNICA </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">O NAMA</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">FILMOVI</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link " href="index.php">KONTAKT</a>
                     </li>
                    
                     <?php
                      session_start();
                      if (! empty($_SESSION['logged_in']))
                       {
                       ?>
                        <li class="nav-item">
                      <a class="nav-link " href="logout.php" >ODJAVA </a>
                       </li>
                       <?php
                        }else{?>
                        <li class="nav-item">
                         <a class="nav-link " href="logout.php" >PRIJAVA </a>
                         </li>
                     <?php
                      } ?>
                
                  </ul>
                </div>
              </nav>

</section>
<?php
    $link = mysqli_connect("localhost", "root", "", "baza");
    $sql = "SELECT * FROM movietable";

    $result1 = mysqli_query($link, $sql);
    ?>
    <?php

    if(isset($_POST['search'])){
        $keyword=$_POST['keyword'];
    
    ?>
    <h2>Rezultati pretraživanja:</h2>
    <?php
    $sql7="SELECT *FROM movietable WHERE movieTitle LIKE '%$keyword%' or movieGenre LIKE '%$keyword%' or movieDuration LIKE '%$keyword%' or movieRelDate LIKE '%$keyword%' or movieDirector LIKE '%$keyword%' or movieActors LIKE '%$keyword%' ";
    if ($result7 = mysqli_query($link,$sql7)) {
    while ($row = mysqli_fetch_array($result7)){
                echo '<div class="box1">';
                    echo '<br>';
                    echo '<div>';
                    echo " <h5> Naziv filma: ". $row['movieTitle'] ." </h5> ";
                    echo " <h5>ŽANR filma: ". $row['movieGenre'] ." </h5>"; 
                    echo " <h5>TRAJANJE: ". $row['movieDuration'] ." min </h5>";
                    echo "<h5>DATUM IZASKA: ". $row['movieRelDate'] ." </h5>";
                    echo " <h5>REDATELJ filma: ". $row['movieDirector'] ." </h5>";
                    echo " <h5>GLUMCI: ". $row['movieActors'] ." </h5>";
                    echo  '<img src="'. $row['movieImg'] .'" alt=" " width="200" height="300">';
                    echo '<a href="booking.php?id='.$row['movieID'].'"> <i class="fas fa-ticket-alt"></i>Rezerviraj kartu </a>';
                    echo '</div>';
                    echo '<br>';
                echo '</div>';
                echo '<br>';
                
           
    ?>
    <?php
    }
    mysqli_free_result($result7);
    }else{
        echo "<h4>Nema takvog filma.</h4>";
    }
    ?>
    <?php
    }
    ?>

</body>

</html>