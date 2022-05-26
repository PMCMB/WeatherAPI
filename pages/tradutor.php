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
    <div class="container">
        <div class="central">
            <div class="form-group">
                <form method="POST">
                    <select name="lOrigem" required>
                        <option value="">Introduza a língua de origem</option>
                        <option value="en">Inglês</option>
                        <option value="pt">Português</option>
                    </select>

                    <select name="lDestino" required>
                        <option value="">Introduza a língua para qual quer traduzir</option>
                        <option value="en">Inglês</option>
                        <option value="pt">Português</option>
                    </select>

                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Introduza o texto que quer traduzir!"></textarea>
                    <input type="submit" value="TRADUZIR">
                </form>


                <?php


                if(isset($_POST["texto"])){

                $curl = curl_init();

                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
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

                $texto_traduzido=$json["data"]["translatedText"]; // POR PARA UMA VARIAVEL O TEXTO TRADUZIDO

                ?>

                <textarea  class="form-control" id="exampleFormControlTextarea2" rows="7"> <?php echo $texto_traduzido ?> </textarea>



                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>



            <?php
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
<script src="/pages/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="/pages/assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>
