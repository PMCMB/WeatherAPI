<?php

// Página inicial.

session_start();

?>
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
        border:2px solid gray;"><strong>WEATHER API</strong></h1>
</head>
<body>

<?php
include("pages/navbar.php"); ?>

<div class="top-content">

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