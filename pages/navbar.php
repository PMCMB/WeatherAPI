<?php ?>
<style>
    .navigationbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    .navigationbar li {
        float: left;
    }

    .navigationbar li a {
        display: block;
        color: orangered;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .navigationbar li a:hover {
        background-color: steelblue;
    }

    select {
        width: 180px;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
    }

    button {
        display: inline-block;
        background-color: steelblue;
        border-radius: 20px;
        border: 4px double #cccccc;
        color: #eeeeee;
        text-align: center;
        font-size: 25px;
        padding: 10px;
        width: 200px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }
    button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }
    button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }
    button:hover {
        background-color: skyblue;
    }
    button:hover span {
        padding-right: 25px;
    }
    button:hover span:after {
        opacity: 1;
        right: 0;
    }

</style>
<ul class="navigationbar">
    <li><a href="/index.php" title="Página inicial"><b>Home</b></a></li>
    <li><a href="/pages/weather.php" title="Clique para ver o tempo"><b>Weather</b></a></li>
    <li><a href="/pages/tradutor.php" title="Clique para traduzir"><b>Translate</b></a></li>
    <li><a href="/pages/currencyexchange.php" title="Clique para converter moedas" ><b>Currency Exchange</b></a></li>
</ul>
