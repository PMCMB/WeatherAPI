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

    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <h1 style="text-align:center;color:white;background-color:#2b669a;
        border:2px solid gray;"><strong>WEATHER API - Translate</strong></h1>

</head>
<body>
<?php include("navbar.php"); ?>
<div class="top-content">
    <div class="container">
        <div class="central">
            <div class="form-group">
                <form method="POST">
                    <select name="lOrigem" required>
                        <option value="">língua de origem</option>
                        <option value="en">Inglês</option>
                        <option value="pt">Português</option>
                        <option value="de">Alemão</option>
                        <option value="es">Espanhol</option>
                        <option value="da">Dinamarquês</option>
                        <option value="ko">Coreano</option>
                        <option value="ro">Romeno</option>

                    </select>
                    <select  name="lDestino" required>
                        <option value="">Tradução</option>
                        <option value="en">Inglês</option>
                        <option value="pt">Português</option>
                        <option value="de">Alemão</option>
                        <option value="es">Espanhol</option>
                        <option value="da">Dinamarquês</option>
                        <option value="ko">Coreano</option>
                        <option value="ro">Romeno</option>
                    </select>


                    <textarea name="texto" cols="40" rows="5" class="form-control" id="exampleFormControlTextarea4" placeholder="Introduza o texto a traduzir!"></textarea>
                    <input type="submit"  value="TRADUZIR">
                </form>



                <?php


                if(isset($_POST["texto"])){

                $curl = curl_init();

                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://text-translator2.p.rapidapi.com/translate",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "source_language=".$_POST["lOrigem"]."&target_language=".$_POST["lDestino"]."&text=".$_POST["texto"]."",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: text-translator2.p.rapidapi.com",
                        "X-RapidAPI-Key: 34fc55e7c0mshe8b9d757743821cp1cd6d9jsn15c26f8282ba",
                        "content-type: application/x-www-form-urlencoded"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                $json = json_decode($response, true);

                $texto_traduzido=$json["data"]["translatedText"];

                ?>
<br>

                <textarea name="texto" cols="40" rows="5" class="form-control" id="exampleFormControlTextarea4" > <?php echo $texto_traduzido ?> </textarea>

            <?php
                 }

            }

            ?>


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
