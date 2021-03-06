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
                      <a class="nav-link" href="#section-slider">NASLOVNICA </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#section-about">O NAMA</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#section-filmovi">FILMOVI</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link " href="#section-contact" >KONTAKT</a>
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
<!---Slider--->
<div id="section-slider">
            <div id="headerSlider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
                      <li data-target="#headerSlider" data-slide-to="1"></li>
                      <li data-target="#headerSlider" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="img/kokice.jpg">
                            <div class="carousel-caption">
                                 <h5>Pogledajte najdra??i film u nasem kinu</h5>
                            </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/ljudi.jpg ">
                        <div class="carousel-caption">
                                <h5>Rezervirajte kartu za sebe i svoje najdra??e</h5>
                           </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="img/dvorana.jpg ">
                        <div class="carousel-caption">
                                <h5>Udobno se smjestite i na najboljem platnu pogledajte film</h5>
                           </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>  

    </div>
    <!----About--->
    <section id="section-about">
        <div class="container">
            <div class="row">
                <div class="col-mb-6"> 
                    <h4><br> <br> <br> O nama</h4>
                   
                    <div class="about-content">
                            <h5>Povijest</h5>
                            CineStar grupa svoje po??etke bilje??i jo?? davne 1948. godine, kada je tvrtka Kieft & Kieft Filmtheater GmbH otvorila svoje prvo klasi??no kino u L??becku u Njema??koj.
                             Nakon vi??e od ??etiri desetlje??a rada, 1993. godine otvaraju svoj prvo CineStar multipleks kino u Njema??koj i zapo??inju sa ??irenjem po cijeloj Europi. 
                            Nekad mala obiteljska tvrtka Kieft & Kieft je danas dio CineStar grupe ??? s vi??e od 100 multipleksa u vi??e europskih zemalja.<br> <br>
                            <h5>Standardi</h5>
                            Multipleksi CineStar potpuno su digitalizirana kina opremljena najsavremenijim tehnologijama u skladu s posljednjim svjetskim
                            trendovima i standardima. CineStar nudi najsuperiornije kino-formate: 4DX, RealD, 3D digitalnu tehnologiju, eXtreme dvorane 
                            i 3D zvuk. <br> <br>
                            <h5>Na??a vizija...</h5>
                            Biti najbolji i najve??i kino lanac u regiji koji ??e biti standard i mjerilo kvalitete i profesionalnosti u svim segmentima poslovanja - 
                            posjetiocima prvi izbor za kino, zaposlenima po??eljan poslodavac, poslovnim subjektima pouzdan partner i dru??tveno odgovorna kompanija.
                            <br> <br>
                            <h5>Na??a misija...</h5>
                            Pru??iti svakom posjetiocu najbolju vrijednost za novac kroz vrhunsku uslugu i zadovoljstvo te omogu??iti uvijek najbolji i najve??i izbor filmova, u tehnolo??ki superiornim dvoranama te najudobnijim sjedi??tima, uvijek konstantnu kvalitetu kina s pet zvjezdica. Vrijednosti na kojima baziramo na?? dugogodi??nji uspjeh su kvaliteta, uslu??nost, povjerenje, inovativnost i razumijevanje potreba na??ih posjetilaca.
  <br> 
                    </div>
                    
                </div>
               
        </div>

    </section>
<!---Filmovi--->

    <section id="section-filmovi">
    <div id="home-section-1" class="movie-show-container">
     <h3> Filmovi </h3>
        <div class="movies-container">
            <?php
             $result = mysqli_query($link,$sql);
             $brojac = mysqli_num_rows($result);
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                for ($i = 0; $i <= 4; $i++){
                                    $row = mysqli_fetch_array($result);
                                    echo '<div class="movie-box">';
                                    echo '<img src="'. $row['movieImg'] .'" alt=" ">';
                                    echo '<div class="movie-info ">';
                                    echo '<h3>'. $row['movieTitle'] .'</h3>';
                                    echo '<a href="booking.php?id='.$row['movieID'].'"> <i class="fas fa-ticket-alt"></i> Rezerviraj kartu </a>';
                                    
                                    echo '</div>';
                                    echo '</div>';
                                    
                                    
                                }
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">Trenutno ne mo??ete rezervirati sjedalo za ovaj film </h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        // Close connection
                        mysqli_close($link);
                        ?>
        </div>
        <div class="book-btn">
                                <a href="pregled.php" > Pogledaj vi??e filmova</a>
                            </div>

</div>


    <div class="trailers-section">
        <br> <h3 class="section-title"> Istra??i nove filmove </h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-1.jpg" alt="">
                <div class="trailer-item-info" data-video="Z1BCujX3pw8">
                    <h3>Kapetanica Marvel</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/1917-thumb.jpg" alt="">
                <div class="trailer-item-info" data-video="YqNYrYUiMfg">
                    <h3>1917</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-3.jpg" alt="">
                <div class="trailer-item-info" data-video="zAGVQLHvwOY">
                    <h3>Joker </h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/brzi-thumb.jpg" alt="">
                <div class="trailer-item-info" data-video="7xp4gRKwxSI">
                    <h3>Brzi i ??estoki 9</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/bombe-thumb.jpg" alt="">
                <div class="trailer-item-info" data-video="zonR5Z0Pfdk">
                    <h3>Opsjednutost </h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-6.jpg" alt="">
                <div class="trailer-item-info" data-video="Ify9S7hj480">
                    <h3>Gospoda</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!------Kontakt------->
<section id="section-contact">
       <div class="container">
<div class="row">
                <div class="col-md-6">
                            <h4>Kontakt informacije</h4><br>
                            <ul>
                                <li><img src="img/loc.png" alt=""> <span>88000 Kardinala Stepinca bb ,Mepas Mall,Mostar
                                        </span></li> <br>
                                <li><img src="img/phone.png" alt=""> <span>Telefon: 036 333 340*</span></li><br>
                                <li><img src="img/mail.png" alt=""> <span>info.bih@cinemabih.eu</span></li><br>
                                <li><img src="img/clock.png" alt=""> <span>ponedjeljak - petak od 13:00h do 22:00h<br>
                                                                           subota - nedjelja od 10:00h do 22:00h</span></li>
                            </ul>

                </div>
            <div class="contact-us-section1">
            <h4> Pi??i nam</h4> 
            <form action="" method="POST">
                <input placeholder="Ime" name="fName" ><br>
                <input placeholder="Prezime" name="lName" ><br>
                <input placeholder="E-mail " name="eMail" ><br>
                <textarea placeholder="Ostavi komentar" name="feedback" rows="3" cols="30"></textarea><br>
                <button type="submit" name="submit1" value="submit">Po??alji</button>
                <?php
                 $link = mysqli_connect("localhost", "root", "", "baza");
                    if(isset($_POST['submit1'])){
                        $insert_query = "INSERT INTO 
                        feedbackTable ( senderfName,
                                        senderlName,
                                        sendereMail,
                                        senderfeedback)
                        VALUES (        '".$_POST["fName"]."',
                                        '".$_POST["lName"]."',
                                        '".$_POST["eMail"]."',
                                        '".$_POST["feedback"]."')";
                        mysqli_query($link,$insert_query);
                        }
                ?>
            </form>
                    </div>  
                    </div>
                    </div>
       
</section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js" integrity="sha256-
    MMt0/21G3z0Zg4ET1kI3HC9npItDowkitRDVr0FhCxA" crossorigin="anonymous"></script>
    <script type="text/javascipt">
        $(function () {
            var scroll = new SmoothScroll('a[href*="#section-"]');
        };
    </script>



    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>