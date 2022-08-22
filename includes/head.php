<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "db.php" ?>
    <?php include "functions/functions.php" ?>
    <?php ob_start(); ?>
    <?php session_start(); ?>

    <?php
    $per_page = 6;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $per_page;
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /*

Template : E commerce Store in PHP and MySQL with Bootstrap 5
Author Name : Abdullh Gaber
Author Email: drabdullh2002.1@gmail.com
Theme URl : http://www.computerfever.com
Version: 1.0

*/

        /* General Styles */

        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333333;
            background-color: #f0f0f0;
            overflow-x: hidden;

        }

        #top {
            background: #555555;
            padding: 10px 0;
        }

        #top .offer {
            color: #ffff;

        }

        #top a {
            color: #fff;
            text-decoration: none;
        }


        #top .offer .btn {
            text-transform: uppercase;
        }

        #top ul.menu {
            padding-top: 5px;
            margin: 0;
            text-align: right;
            font-size: 12px;
            list-style: none;
        }

        @media (max-width : 991px) {

            #top {
                font-size: 12px;
                text-align: center;
            }

            #top ul.menu {
                text-align: center;
            }


        }

        #top ul.menu li {
            display: inline-block;
        }

        #top ul.menu li a {
            color: #eeeeee;
            text-decoration: none;
        }

        #top ul.menu li+li::before {
            content: "|\00a0";
            color: #f7f7f7;
            padding: 0 5px;
        }

        nav ul.menu li.nav-item {
            padding: 5px 5px;
        }

        nav ul.menu li.nav-item:hover {
            background-color: #777777;
            transition: 4s;
            -webkit-transition: 4s;
            -moz-transition: 4s;
            -ms-transition: 4s;
            -o-transition: 4s;
        }



        .breadcrumb {
            padding: 8px 15px;
            margin-bottom: 20px;
            background-color: #ffffff;
            border-radius: 0;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);

        }

        @media (max-width: 991px) {

            .breadcrumb {
                padding: 8px 2px;
                text-align: center;

            }

        }

        ul.breadcrumb li.breadcrumb-item a {
            text-decoration: none;
        }

        ul a.list-group-item {
            border: none;
            padding: 10px 10px;
            font-size: 18px;
        }

        .wdp-ribbon {
            display: inline-block;
            padding: 2px 15px;
            position: absolute;
            right: 0px;
            top: 20px;
            line-height: 24px;
            height: 24px;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
            border-radius: 0;
            text-shadow: none;
            font-weight: normal;
            background-color: #1eb5ff !important;
        }

        
        .wdp-ribbon-two:before {
            display: inline-block;
            content: "";
            position: absolute;
            left: -12px;
            top: -0.6px;
            border: 9px solid transparent;
            border-width: 12.5px 8px;
            border-right-color: #1eb5ff;
        }

        .wdp-ribbon-two:before {
            border-color: #1eb5ff;
            border-left-color: transparent !important;
            left: -9px;
        }

       
    </style>


    <title>E-commerce store</title>
</head>

<body>