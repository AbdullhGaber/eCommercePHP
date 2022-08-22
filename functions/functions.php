<?php
include "includes/db.php";

function getUserRealIP()
{
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return  $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return  $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return  $_SERVER['HTTP_X_FORWARDED_FOR'];
        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

function getItemsNo()
{
    global $conn;

    $ip_add = getUserRealIP();

    $get_cartItems_sql = "SELECT * FROM cart WHERE ip_add = '$ip_add' ";
    $run_cartItems = mysqli_query($conn, $get_cartItems_sql);

    $Items_no = mysqli_num_rows($run_cartItems);
    return $Items_no;
}

function getTotalPrice()
{
    global $conn;
    $total_price = 0;
    $ip_add = getUserRealIP();

    $cart_price_sql = "SELECT p.product_price , c.qty FROM products p INNER JOIN cart c ON p.product_id = c.p_id WHERE c.ip_add = '$ip_add' ";
    $cart_price_run = mysqli_query($conn, $cart_price_sql);

    while ($cart_price_row = mysqli_fetch_assoc($cart_price_run)) :
        $total_price += $cart_price_row['product_price'] * $cart_price_row['qty'];

    endwhile;

    return $total_price;
}

function getUserInfo()
{
    global $conn;
    $getUser_sql = "SELECT * FROM customers WHERE customer_email = '$_SESSION[customer_email]' ";

    $getUser_run = mysqli_query($conn , $getUser_sql);
    
    $getUser_row = mysqli_fetch_array($getUser_run);
    
    return $getUser_row;
}
