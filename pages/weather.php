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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="/pages/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="/pages/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="/pages/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/pages/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/pages/assets/ico/apple-touch-icon-57-precomposed.png">
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

</head>
<body>
<?php include("navbar.php"); ?>
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>Weather</strong> Selecione uma Cidade</h1>
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
                        echo "<h1 style='color: white;font-weight: bold;'>" . $json["main"]["temp"] . "ºC</h1>";
                        echo "<h1 style='color: white;font-weight: bold;'>" . $json["main"]["humidity"] . "%</h1>";
                        echo "<h2 style='color: white;font-weight: bold;'>" . $json["weather"][0]["description"] . "</h2>";

                        if ($json["weather"][0]["description"] == "clear sky") {
                            ?>
                            <img src="/pages/assets/img/ClearSky.jpg">
                            <?php
                        }
                        if ($json["weather"][0]["description"] == "broken clouds") {
                                ?>
                                <img src="/pages/assets/img/BrokenClouds.jpg">
                                <?php
                        }
                        if ($json["weather"][0]["description"] == "overcast clouds") {
                                ?>
                                <img src="/pages/assets/img/OvercastClouds.jpg">
                                <?php
                            }

                    }


                } ?>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="/pages/assets/js/jquery-1.11.1.min.js"></script>
<script src="/pages/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/pages/assets/js/jquery.backstretch.min.js"></script>
<script src="/pages/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="/pages/assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>

