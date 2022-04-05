<?php 
include "config.php";
?>
<?php
session_start();
if (! empty($_SESSION['logged_in']))
{
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
    
</head>
<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "baza");
    
    ?>
    <style>
        .pregledrezervacije{
            font-size:18px;

        }

    </style>
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
                            <a class="nav-link " href="index.php" >KONTAKT</a>
                     </li>
                    <li class="nav-item">
                      <a class="nav-link " href="logout.php" >ODJAVA </a>
                    </li>
                  </ul>
                </div>
              </nav>
</section>
<section>
 <div style="font-size:18px; margin-left:100px; font-family:'Roboto', sans-serif;"><br>
    <h3 >Molimo unesi ID svoje rezervacije:</h3>
    <form  method="post"  action="">   <br>                           
        <div>  
        <input type="text" name="id"  > 
        <button  name ="btn" type="submit"  > Potvrdi </button> <br> </div>
        <br>
                            
                                 <?php
                                 if(isset($_POST['btn'])){
                                    
                                    $id = filter_input(INPUT_POST, 'id');
                                    $sql = "SELECT * FROM bookingtable WHERE bookingID = " . $id;
                                    if($result = mysqli_query($con, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                               echo '<div class="pregledrezervacije"> ';
                                                echo "<div> <h3>Vaše ime: ". $row['bookingFName'] ." </h3>";
                                                echo "<div> <h3>Film: ". $row['movieName'] ." </h3>";
                                                echo "<div> <h3>Dvorana: ". $row['bookingTheatre'] ." </h3>";
                                                echo "<div> <h3>Tip filma: ". $row['bookingType'] ." </h3>";
                                                echo "<div> <h3>Datum: ". $row['bookingDate'] ." </h3>";
                                                echo "<div> <h3>Vrijeme: ". $row['bookingTime'] ." </h3>";
                                                echo "                        </div>";
                                            }
                                            mysqli_free_result($result);
                                        } else{
                                            echo '<h4 class="no-annot">Nema takve rezervacije.</h4>';
                                        }
                                    } }
                                    ?>
</div>                        
</section>




</body>

</html>
<?php
}
else
{
    echo 'Niste prijavljeni. <a href="login.php"> Pritisnite ovdje </a> da se prijavite.';
} ?>