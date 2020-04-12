<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track COVID-19</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .font {
            font-size: 200%;
        }
    </style>
</head>

<body>
    <?php
    $url = 'https://api.covid19api.com/summary';
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    $count = count($json['Countries']);
    ?>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md py-2 ">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-notes-medical"></i></i> Track COVID-19</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="myNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">World</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="bd.php">Bangladesh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="search.php">Search Result</a>
                    </li>
                </ul>

                <form action="search.php" class="form-inline my-2 my-lg-0" method="post">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search by Country" name="search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit" name="button"> Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?php

        for ($i = 0; $i < $count; $i++) {
            if (strcasecmp("Bangladesh", $json['Countries'][$i]['Country']) == 0) {
                $res = 1;
                $ans = $i;

                break;
            }
        }
        //echo $ans;
        if ($res == 1) {
    ?>
            <div class="container py-3 text-center border-0">


                <div class="card border-0">
                    <h1 class="card-title lead font text-primary"><span><i class="far fa-flag"></i></span> <?php
                                                                                                            echo $json['Countries'][$ans]['Country'];
                                                                                                            ?></span></p>
                    </h1>
                    <ul class="list-group ">
                        <li class="list-group-item ">
                            <p class="display-4 font">New Infected: <span class="text-secondary"><?php
                                                                                                    echo $json['Countries'][$ans]['NewConfirmed'];
                                                                                                    ?></span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="display-4 font">Total Infected: <span class="text-secondary"><?php
                                                                                                    echo $json['Countries'][$ans]['TotalConfirmed'];
                                                                                                    ?></span></p></span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="display-4 font">New Deaths: <span class="text-danger"><?php
                                                                                            echo $json['Countries'][$ans]['NewDeaths'];
                                                                                            ?></span></p></span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="display-4 font">Total Deaths: <span class="text-danger"><?php
                                                                                                echo $json['Countries'][$ans]['TotalDeaths'];
                                                                                                ?></span></p></span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="display-4 font">New Recovered: <span class="text-success"><?php
                                                                                                echo $json['Countries'][$ans]['NewRecovered'];
                                                                                                ?></span></p></span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="display-4 font">Total Recovered: <span class="text-success"><?php
                                                                                                    echo $json['Countries'][$ans]['TotalRecovered'];
                                                                                                    ?></span></p></span></p>
                        </li>
                    </ul>
                </div>
            </div>


        <?php
        } else {
        ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Wrong Input!</strong> Example: Bangladesh, United Kingdom, United States of America
                </div>
            </div>




    <?php
        }
    
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/popper.js"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->

  <div class="footer-copyright text-center py-3">
    <p class="lead pb-0 mb-0">Stay Home, Stay Safe</p>
    © 2020 Copyright:
    <a href="http://trackcovid19.grpranto.site"> trackcovid19.grpranto.site</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</html>
