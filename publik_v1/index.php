<?php
include 'koneksi/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $title?> Monitoring Dashboard</title>
  
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>

  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 5;
    background-color: #f0f0f0;
  }

  .card-wrapper {
    text-align: center;
    max-width: 1000px; /* Lebar maksimal card-wrapper */
    margin: 0 auto; /* Meletakkan card-wrapper di tengah */
  }

  .table {
    border: 1px solid #ddd;
    padding: 8px;
    background-color: #fff;
  }

  .table-heading {
    font-size: 20px;
    font-weight: bold;
    padding: 10px 0;
    background-color: #00f; /* Warna biru */
    color: #fff; /* Warna teks putih */
  }

  .table th {
    background-color: #fff; /* Warna biru */
    color: #007bff; /* Warna teks putih */
  }

  .table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .table tbody tr:hover {
    background-color: #ddd;
  }

  .card {
    display: inline-block;
    margin: 10px;
    width: 400px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .card.task-card {
    width: 200px;
    height: auto;
    position: relative;
  }

  .arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 16px;
    z-index: 1;
  }

  .arrow:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  .footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .footer-list {
    list-style-type: none;
    padding: 0;
  }

  .footer-item {
    display: inline-block;
    margin-right: 20px;
  }

  .footer-link {
    color: #fff;
    text-decoration: none;
  }

  .footer-link:hover {
    text-decoration: underline;
  }

  .copyright-link {
    color: #fff;
    text-decoration: none;
  }

  .copyright-link:hover {
    text-decoration: underline;
  }
</style>


</head>

<?php include 'assets/publik/header.php';?>

<?php include 'assets/publik/main.php';?>

<?php include 'assets/publik/footer.php';?>



