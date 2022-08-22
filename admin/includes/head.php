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
    </style>


    <title>E-commerce store</title>
</head>

<body>