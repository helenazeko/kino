<?php
session_start();
if (! empty($_SESSION['logged_in']))
{
    ?>
<!DOCTYPE html>
<html>
<?php 
        $id = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "", "baza");

        $movieQuery = "SELECT * FROM movietable WHERE movieID = $id"; 
        $movieImageById = mysqli_query($link,$movieQuery);
        $row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book <?php echo $row['movieTitle']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:#969696;">
    <div class="booking-panel">
    <div class="booking-panel-section booking-panel-section1">
</div>
        <div class="booking-panel-section booking-panel-section2">
        <i style="font-size:24px;color:black" class="fa fa-times-circle"  onclick="window.location='index.php'; return false;"> </i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                    echo '<img src="'.$row['movieImg'].'" alt="">';
                    ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movieTitle']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>ŽANR:</td>
                        <td><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td>TRAJANJE:</td>
                        <td><?php echo $row['movieDuration']; ?></td>
                    </tr>
                    <tr>
                        <td>DATUM IZLASKA:</td>
                        <td><?php echo $row['movieRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>REDATELJ:</td>
                        <td><?php echo $row['movieDirector']; ?></td>
                    </tr>
                    <tr>
                        <td>GLUMCI:</td>
                        <td><?php echo $row['movieActors']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="" method="POST">

                    <select id = "prikazivanje" name="prikazivanje" required >
                        <option value="" disabled selected>PRIKAZIVANJE</option>
                        <?php 
                         $id = $_GET['id'];
                         $link = mysqli_connect("localhost", "root", "", "baza");

                         $sql = "SELECT * FROM prikazivanje WHERE IDm = $id";
                         $result1 = mysqli_query($link, $sql);
                         ?>

                         <?php while($row1 = mysqli_fetch_array($result1)):; ?>
   <option name="pr" value="<?php echo $row1[0];?>"><?php echo " DVORANA: " . $row1[3] . " ,TIP: " . $row1[6]. " ,DATUM: " . $row1[4]. " ,VRIJEME: " . $row1[5];?> </option>
    <?php endwhile; ?>
                    </select>
                    <input placeholder="Ime" type="text" name="fName" required>

                    <input placeholder="Prezime" type="text" name="lName">

                    <input placeholder="Broj mobitela" type="text" name="pNumber" required>

                    <button type="submit" value="submit" name="submit" class="form-btn"> Rezerviraj kartu </button>

                    <?php
                    $id = $_GET['id'];
                    $link = mysqli_connect("localhost", "root", "", "baza");
            
                    $movieQuery = "SELECT * FROM movietable WHERE movieID = $id"; 
                    $movieImageById = mysqli_query($link,$movieQuery);
                    $row = mysqli_fetch_array($movieImageById);
                    $fNameErr = $pNumberErr= "";
                    $fName = $lName = $pNumber = "";
            
                    if(isset($_POST['submit'])){
                        $selected1 = $_POST['prikazivanje']; 
                        $sql3 = "SELECT * FROM prikazivanje WHERE idPrikazivanje = " . $selected1;
                        
                        if($result3 = mysqli_query($link, $sql3)){
                            if(mysqli_num_rows($result3) > 0){
                                while($row3 = mysqli_fetch_array($result3)){
                        
            
                        $fName = $_POST['fName'];
                        $lName = $_POST['lName'];
                        $pNumber = $_POST['pNumber'];
                        
                        $insert_query = "INSERT INTO 
                        bookingTable (  movieName,
                                        bookingTheatre,
                                        bookingType,
                                        bookingDate,
                                        bookingTime,
                                        bookingFName,
                                        bookingLName,
                                        bookingPNumber)
                        VALUES (        '".$row['movieTitle']."',
                                        '".$row3['dvorana']."',
                                        '".$row3['tipPrikazivanja']."',
                                        '".$row3['datum']."',
                                        '".$row3['vrijeme']."',
                                        '".$fName."',
                                        '".$lName."',
                                        '".$pNumber."')";
                        mysqli_query($link,$insert_query);
                        if ($insert_query == TRUE){
                            $last_id = $link->insert_id;
                            echo "Uspjesno ste rezervirali.Vaš broj rezervacije je: " . $last_id;
                            echo "<br>Ako ne dođete pola sata ranije , vaša rezervacija bit će poništena.";
                        }
                    }
                }
            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
   
</body>
   

</html>
<?php
}
else
{
    echo 'Niste prijavljeni. <a href="login.php"> Pritisnite ovdje </a> da se prijavite.';
} ?>