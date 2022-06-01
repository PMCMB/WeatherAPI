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
    <link rel="icon" type="image/svg+xml" href="/pages/assets/ico/favicon.png">
    <link rel="icon" type="image/png" href="/pages/assets/ico/favicon.png">

    <title>Currency Exchange</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <h1 style="text-align:center;color:white;background-color:#2b669a;
        border:2px solid gray;"><strong>Currency Exchange API</strong></h1>

</head>
<body>
<?php include("navbar.php"); ?>

<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sn-8 col-sn-offset-2 text">
                <div class="description">
                </div>
            </div>
        </div>
        <div class ="row">
            <form method="POST">
                <input placeholder="moedainicial" name="moedainicial">
                <br>
                <input placeholder="moedapretendida" name="moedapretendida">
                <br>
                <input placeholder="montante" name="montante">
                <br>
                <input type="submit">
            </form>
            <?php

            if(isset($_POST["moedainicial"]) && isset($_POST["moedapretendida"]) && isset($_POST["montante"])) {
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://currency-converter-by-api-ninjas.p.rapidapi.com/v1/convertcurrency?have=" . $_POST["moedainicial"] . "&want=" . $_POST["moedapretendida"] . "&amount=" . $_POST["montante"] . "",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: currency-converter-by-api-ninjas.p.rapidapi.com",
                        "X-RapidAPI-Key: 0816f6063emsh5940e2b08444460p15ae9ejsn486cbc256bf5"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $json = json_decode($response, true);
                    echo "<h1 style='color: black; alignment: center; border: 5px solid black; background: white'>Montante = " . $json["new_amount"] . " " . $_POST["moedapretendida"] . "</h1>";
                }
            }
            ?>

        </div>
    </div>
</div>


<!-- Javascript -->
<script src="/pages/assets/js/jquery-1.11.1.min.js"></script>
<script src="/pages/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/pages/assets/js/jquery.backstretch.min.js"></script>
<script src="/pages/assets/js/scripts-c.js"></script>

<!--[if lt IE 10]>
<script src="/pages/assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>
