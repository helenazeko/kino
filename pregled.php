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
                            <a class="nav-link " href="index.php" >KONTAKT</a>
                     </li>
                     <?php
                      session_start();
                      if (! empty($_SESSION['logged_in']))
                       {
                       ?>
                       <li class="nav-item">
                            <a class="nav-link " href="pregledrezervacije.php" >PREGLED REZERVACIJE</a>
                         </li>
                        <li class="nav-item">
                      <a class="nav-link " href="logout.php" >ODJAVA </a>
                       </li>
                       
                       <?php
                     
                      if (! empty($_SESSION['admin']))
                       {
                       ?>
                       <li class="nav-item">
                        <a class="nav-link " href="admin.php" > ADMIN </a>
                         </li>
                         <?php 
                      }

                      ?>
                       <?php
                        }else{?>
                        <li class="nav-item">
                         <a class="nav-link " href="logout.php" >PRIJAVA </a>
                         </li>
                    

<?php 
                      }

                      ?>
                  </ul>
                </div>
              </nav>
</section>

    <div class="movies"> <br> <br> 
    <form action="" method="post" >
    <select name="odaberifilm" class="form-control" >
    <option value="disabled selected" > Odaberi film</option>
   <?php while($row1 = mysqli_fetch_array($result1)):; ?>
   <option name="id2" value="<?php echo $row1[0];?>"><?php echo $row1[2];?> </option>
    <?php endwhile; ?>
    </select>
    <input type="submit" class="search"style="float: left;" name="Pogledaj" value="Pogledaj"  > 
    </form>
    </div >

<section id="indent-1">

    <?php 
    if(isset($_POST['odaberifilm']))                              
    { 
        if(!empty($_POST['odaberifilm'])){
           $selected1 = $_POST['odaberifilm']; 
           $sql1 = "SELECT * FROM movietable WHERE movieID = " . $selected1;
                                    if($result = mysqli_query($link, $sql1)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                            echo '<div class="box1">';
                                                echo '<br>';
                                                echo '<div>';
                                                echo " <h5> Naziv filma: ". $row['movieTitle'] ." </h5> ";
                                                echo " <h5>ŽANR filma: ". $row['movieGenre'] ." </h5>"; 
                                                echo " <h5>TRAJANJE: ". $row['movieDuration'] ." min </h5>";
                                                echo "<h5>DATUM IZASKA: ". $row['movieRelDate'] ." </h5>";
                                                echo " <h5>REDATELJ filma: ". $row['movieDirector'] ." </h5>";
                                                echo " <h5>GLUMCI: ". $row['movieActors'] ." </h5>";
                                                if(isset($_POST['odaberifilm']))                              
                                                { 
                                                    if(!empty($_POST['odaberifilm'])){
                                                $selected1 = $_POST['odaberifilm'];
                                                $sql1 = "SELECT * FROM prikazivanje WHERE IDm = " . $selected1;
                                                if($result = mysqli_query($link, $sql1)){
                                                  if(mysqli_num_rows($result) > 0){
                                                      while($row = mysqli_fetch_array($result)){
                                                echo " <h5>PRIKAZIVANJE: Dvorana:". $row['dvorana'] . " <h5>Datum: " . $row['datum'] . " <h5>Vrijeme: " . $row['vrijeme'] . " <h5>Tip prikazivanja: " . $row['tipPrikazivanja'] . " </h5>";
                                                      } } } } }
                                                if(isset($_POST['odaberifilm']))                              
                                                    { 
                                                          if(!empty($_POST['odaberifilm'])){
                                                             $selected1 = $_POST['odaberifilm']; 
                                                             $sql1 = "SELECT * FROM movietable WHERE movieID = " . $selected1;
                                                                                      if($result = mysqli_query($link, $sql1)){
                                                                                          if(mysqli_num_rows($result) > 0){
                                                                                              while($row = mysqli_fetch_array($result)){
                                                echo  '<img src="'. $row['movieImg'] .'" alt=" " width="200" height="300">';
                                                echo '<a href="booking.php?id='.$row['movieID'].'"> <i class="fas fa-ticket-alt"></i>Rezerviraj kartu </a>';
                                                echo '</div>';
                                                echo '<br>';
                                                echo '</div>';
                                                                                              }}}}}
                                            echo '<br>';
                                            }
                                            mysqli_free_result($result);
                                        } else{
                                            echo '<h4 class="no-annot">Nema takvog filma.</h4>';
                                        }
                                    }
        }
    }
    ?> 

    

</section> 

</body>

</html>