
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<link rel="stylesheet" href ="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  ></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<title>Admin</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<style>
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
<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "baza");
    $sql = "SELECT * FROM bookingtable";
    $sql1 = "SELECT * FROM movietable";
    $sql3 = "SELECT * FROM prikazivanje";
    $bookingsNo=mysqli_num_rows(mysqli_query($link, $sql));
    $prikazivanjeNo=mysqli_num_rows(mysqli_query($link, "SELECT * FROM prikazivanje"));
    $moviesNo=mysqli_num_rows(mysqli_query($link, "SELECT * FROM movietable"));

    ?>
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
                      <a class="nav-link" href="pregled.php">FILMOVI</a>
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
                      <a class="nav-link " href="logout.php" >ODJAVA </a>
                       </li>
                       <li class="nav-item">
                        <a class="nav-link " href="admin/admin.php" > ADMIN </a>
                         </li>
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
    <div class="admin-container">
        <div class="admin-section admin-section1">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">
                        
                        <h2 ><?php echo $bookingsNo ?></h2>
                        <h4>REZERVACIJE</h4>
                    </div>
                    <div class="admin-section-stats-panel">
                        
                        <h2 ><?php echo $moviesNo ?></h2>
                        <h4>FILMOVI</h4>
                    </div>
                    <div class="admin-section-stats-panel">
                        
                        <h2 ><?php echo $prikazivanjeNo ?></h2>
                        <h4>PRIKAZIVANJA</h4>
                    </div>

                    
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Rezervacije</h2>
                        
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<div class=\"admin-panel-section-booking-item\">\n";
                                    echo "                            <div class=\"admin-panel-section-booking-response\">\n";
                                    echo "                            </div>\n";
                                    echo "                            <div class=\"admin-panel-section-booking-info\">\n";
                                    echo "                                <div>\n";
                                    echo "                                    <h5>". $row['movieName'] ."</h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['bookingTheatre'] ." dvorana </h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['bookingDate'] ."</h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['bookingTime'] ."</h5> h \n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                                                   
                                    echo "                                    <h5>". $row['bookingFName'] ." ". $row['bookingLName'] ."</h5>\n";
                                    echo "                                    <i class=\"fas fa-circle\"></i>\n";
                                    echo "                                    <h5>". $row['bookingPNumber'] ."</h5>\n";
                                    echo "                                </div>\n";
                                    echo "                            </div>\n";
                                    echo "                                <a href='deleteBooking.php?id=".$row['bookingID']."'><i class=\"fas fa-times decline-booking\"></i></a>\n";
                                    echo "                        </div>";
                                }
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">No Bookings right now</h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        ?>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Filmovi</h2>
                        
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        if($result = mysqli_query($link, $sql1)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<div class=\"admin-panel-section-booking-item\">\n";
                                    echo "                            <div class=\"admin-panel-section-booking-response\">\n";
                                    echo "                            </div>\n";
                                    echo "                            <div class=\"admin-panel-section-booking-info\">\n";
                                    echo "                                <div>\n";
                                    echo "                                    <h5>". $row['movieTitle'] ."</h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['movieGenre'] ."</h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['movieDuration'] ." min </h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['movieRelDate'] ."</h5>\n";
                                    echo "                                </div>\n";
                                    echo "                                <div>\n";
                                    echo "                                    <h5>". $row['movieDirector'] ." ". $row['movieActors'] ."</h5>\n";
                                    echo "                                </div>\n";
                                    echo "                            </div>\n";
                                    echo "                                <a href='deleteMovie.php?id=".$row['movieID']."'><i class=\"fas fa-times decline-booking\"></i></a>\n";
                                    echo "                        </div>";
                                }
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">No Bookings right now</h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        ?>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Prikazivanja</h2>
                        
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        if($result = mysqli_query($link, $sql3)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<div class=\"admin-panel-section-booking-item\">\n";
                                    echo "                            <div class=\"admin-panel-section-booking-response\">\n";
                                    echo "                            </div>\n";
                                    echo "                            <div class=\"admin-panel-section-booking-info\">\n";
                                    echo "                                <div>\n";
                                    echo "                                    <h5>". $row['movieTitle'] ."</h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['dvorana'] ." dvorana</h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['datum'] ."  </h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['vrijeme'] ." h </h5>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h5>". $row['tipPrikazivanja'] ." </h5>\n";
                                    echo "                                </div>\n";
                                    echo "                            </div>\n";
                                    echo "                                <a href='deletePrikazivanje.php?id=".$row['idPrikazivanje']."'><i class=\"fas fa-times decline-booking\"></i></a>\n";
                                    echo "                        </div>";
                                }
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">No Bookings right now</h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        ?>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Dodaj film</h2>
                    </div>
                    <form action="" method="POST">
                        <input placeholder="Naslov" type="text" name="movieTitle" required>
                        <input placeholder="Žanr" type="text" name="movieGenre" required>
                        <input placeholder="Trajanje filma" type="number" name="movieDuration" required>
                        <input placeholder="Datum izlaska" type="date" name="movieRelDate" required>
                        <input placeholder="Redatelj" type="text" name="movieDirector" required>
                        <input placeholder="Glumci" type="text" name="movieActors" required>
                        <input type="file" name="movieImg" accept="image/*">
                        <button type="submit" value="submit" name="submit" class="form-btn">Dodaj film</button>
                        <?php
                        if(isset($_POST['submit'])){
                            $insert_query = "INSERT INTO 
                            movieTable (  movieImg,
                                            movieTitle,
                                            movieGenre,
                                            movieDuration,
                                            movieRelDate,
                                            movieDirector,
                                            movieActors)
                            VALUES (        'img/".$_POST['movieImg']."',
                                            '".$_POST["movieTitle"]."',
                                            '".$_POST["movieGenre"]."',
                                            '".$_POST["movieDuration"]."',
                                            '".$_POST["movieRelDate"]."',
                                            '".$_POST["movieDirector"]."',
                                            '".$_POST["movieActors"]."')";
                            mysqli_query($link,$insert_query);}
                        ?>
                    </form>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Dodaj prikazivanje</h2>
                    </div>
                    <form action="" method="POST">
                        <input placeholder="Ime filma" type="text" name="movieTitle" required>
                        <input placeholder="Dvorana" type="text" name="dvorana" required>
                        <input placeholder="Tip prikazivanja" type="text" name="tipPrikazivanja" required>
                        Datum:<input placeholder="Datum" type="date" name="datum" required>
                        Vrijeme prikazivanja:<input placeholder="Vrijeme" type="time" name="vrijeme" required>
                    
                        <button type="submit" value="submit2" name="submit2" class="form-btn">Dodaj prikazivanje</button>
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "baza");
                         ?>
                         <?php
                        if(isset($_POST['submit2'])){
                            $naziv = $_POST['movieTitle'];
                            $sql3 = "SELECT * FROM movietable WHERE movieTitle = '$naziv'";
                            $result1 = mysqli_query($link, $sql3); 
                            while($row1 = mysqli_fetch_array($result1)){
                            $insert_query = "INSERT INTO prikazivanje (  IDm,movieTitle,dvorana,datum,vrijeme,tipPrikazivanja)
                            VALUES (        $row1[0],
                                            '".$_POST["movieTitle"]."',
                                            '".$_POST["dvorana"]."',
                                            '".$_POST["datum"]."',
                                            '".$_POST["vrijeme"]."',
                                            '".$_POST["tipPrikazivanja"]."')";
                            mysqli_query($link,$insert_query);
                        }
                    
                    }
                        ?>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>
