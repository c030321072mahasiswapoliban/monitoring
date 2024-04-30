<?php
session_start();
include 'koneksi/koneksi.php';
if (!isset($_SESSION['admin'])) {
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $title ?></title>

  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

  <script type="text/javascript" src="assets2/js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="assets2/js/mdb.min.js"></script>
  <script type="text/javascript" src="jquery-latest.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<?php include 'assets/pages/header.php'; ?>

<?php include 'assets/pages/main.php'; ?>

<?php include 'assets/pages/footer.php'; ?>