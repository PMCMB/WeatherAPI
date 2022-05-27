<?php ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

    <link rel="stylesheet" href="/pages/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pages/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/pages/assets/css/form-elements.css">
    <link rel="stylesheet" href="/pages/assets/css/style.css">

    <title>Weather</title>
    <link rel="icon" type="image/x-icon" href="/pages/assets/ico/favicon.png">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <h1 style="text-align:center;color:white;background-color:#2b669a;
        border:2px solid gray;"><strong>Weather API</strong></h1>
</head>
<body>

<?php include("navbar.php"); ?>
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1 style='color: #2b669a;font-weight: bold'>Selecione uma Cidade</h1>
                    <div class="description">
                    </div>
                </div>
            </div>
            <div class="row">
                <form method="POST">
                    <input placeholder="cidade" name="city">
                    <input type="submit" value="Submeter">
                </form>
                <?php

                if (isset($_POST["city"])) {
                    $curl = curl_init();

                    curl_setopt_array($curl, [
                        CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?q=" . $_POST["city"] . "&id=2172797&lang=null&units=metric",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => [
                            "X-RapidAPI-Host: community-open-weather-map.p.rapidapi.com",
                            "X-RapidAPI-Key: 2c919a96d7msh4b3c8f542ec9108p1b1e5fjsn5c0f938ee222"
                        ],
                    ]);

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        $json = json_decode($response, true);
                        echo "<h1 style='color: white;font-weight: bold;'>" . $json["name"] . "</h1>";
                        echo "<h3 style='color: white;font-weight: bold;'>" . $json["weather"][0]["description"] . "</h3>";

                        if ($json["weather"][0]["description"] == "clear sky") {
                            ?>
                            <img src="/pages/assets/img/ClearSky.jpg" alt="weather image" width="100" height="100">
                            <?php
                        }
                        elseif ($json["weather"][0]["description"] == "broken clouds") {
                                ?>
                                <img src="/pages/assets/img/BrokenClouds.jpg" alt="weather image" width="100" height="100">
                                <?php
                        }
                        elseif ($json["weather"][0]["description"] == "overcast clouds") {
                             ?>
                             <img src="/pages/assets/img/OvercastClouds.jpg" alt="weather image" width="100" height="100">
                             <?php
                            }
                        elseif ($json["weather"][0]["description"] == "light rain") {
                            ?>
                            <img src="/pages/assets/img/LightRain.jpg" alt="weather image" width="100" height="100">
                            <?php
                        }
                        elseif ($json["weather"][0]["description"] == "scattered clouds") {
                            ?>
                            <img src="/pages/assets/img/ScatteredClouds.jpg" alt="weather image" width="100" height="100">
                            <?php
                        }
                        elseif ($json["weather"][0]["description"] == "few clouds") {
                            ?>
                            <img src="/pages/assets/img/FewClouds.jpg" alt="weather image" width="100" height="100">
                            <?php
                        }
                        elseif ($json["weather"][0]["description"] == "light intensity shower rain") {
                            ?>
                            <img src="/pages/assets/img/LightIntensityShowerRain.jpg" alt="weather image" width="100" height="100">
                            <?php
                        }
                        elseif ($json["weather"][0]["description"] == "mist") {
                            ?>
                            <img src="/pages/assets/img/Mist.jpg" alt="weather image" width="100" height="100">
                            <?php
                        }
                        elseif ($json["weather"][0]["description"] == "haze") {
                            ?>
                            <img src="/pages/assets/img/Haze.jpg" alt="weather image" width="100" height="100">
                            <?php
                        }
                    }
                    echo "<h3 style='color: white;font-weight: bold;'>Temperatura: " . $json["main"]["temp"] . "ºC</h3>";
                    echo "<h3 style='color: white;font-weight: bold;'>Humidade: " . $json["main"]["humidity"] . "%</h3>";
                    echo "<h3 style='color: white;font-weight: bold;'>Pressão atmosférica: " . $json["main"]["pressure"] . " atm</h3>";
                } ?>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="/pages/assets/js/jquery-1.11.1.min.js"></script>
<script src="/pages/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/pages/assets/js/jquery.backstretch.min.js"></script>
<script src="/pages/assets/js/scripts-w.js"></script>

<!--[if lt IE 10]>
<script src="/pages/assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>

