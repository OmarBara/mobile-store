<?php
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 09/01/2018
 * Time: 06:12 PM
 *
 */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-theme.min.css">
    <link rel="stylesheet" href="Font/glyphicons-halflings-regular.svg">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script type="text/javascript">
        function showHide(value) {
            if (value=='address'){
                document.getElementById('cty').style.display = 'none';
                document.getElementById('ad').style.display = 'none';
                document.getElementById('pho').style.display = 'none';
                document.getElementById('ct').removeAttribute("required");
                document.getElementById('add').removeAttribute("required");
                document.getElementById('p').removeAttribute("required");
            }

            else{
                document.getElementById('cty').style.display = 'block';
                document.getElementById('ad').style.display = 'block';
                document.getElementById('pho').style.display = 'block';

            }

        }
    </script>
    <style>


        .active {
            background-color: #4CAF50;

        }

        div.gallery {
            margin: 5px;
            border: 1px hidden #ccc;
            float: left;
            width: 180px;
            /*justify-content:space-around;*/
            padding: 10px;
        }

        div.gallery:hover {
            border: 1px solid #777;
            box-shadow: 10px 10px 5px #888888;
        }

        div.gallery img {
            width: 100%;
            height: 160px;
        }

        div.desc {
            padding: 15px;
            text-align: center;
            color: darkblue;
        }

        div.head {
            width:850px;
            margin: 100px;
            border: .5px solid gray;

        }
        footer {
            background-color: #F1F1F1;
            text-align: center;
            margin-top:20px

        }
        /*.row:nth-child(2n){
            border-top: 1.2px solid gray;
            outline-width: thin;


        }*/
        /*#item{
          text-align: left;
          color: darkblue;
        }*/
        .btn{
            /*float: right*/;
            margin-top:  10px;
            margin-bottom: 20px;
            margin-right: 0px;
        }
        body {
            padding-bottom: 0px;
            padding-top: 20px;
            margin-bottom: 20px ;
            min-height:100vh;

        }
        img {width:600px; height:400px;}

        .container {

            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }






        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
            /*background-color: #AA0000;*/
        }


        .jumbotron {
            margin-bottom: 0;
            margin-top: 0;
        }


        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }


        .slideanim {visibility:hidden;}
        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }
        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }
            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }
        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
            .hd {
                background-color: #1b557a;
                color: #1b557a;
            }
        }
    </style>
</head>
<body>
<div>

    <div class="jumbotron " style="background-color: #791a7a;">
        <div class="container text-center">
            <h1 style="color: white">Online Store</h1>
            <p style="color: #bee5eb">Best Online Value</p>
        </div>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><!--<img src="pictures/logo2.png" width="25" height="25" title="Logo of a company" alt="Logo of a company" />--></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">About us</a></li>
                    <li><a href="store.php">Store</a></li>
                    <li><a href="sale.php">Sales</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
                    <li><a href="invoice.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

