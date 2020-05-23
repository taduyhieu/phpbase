<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>bower_components/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>dist/css/AdminLTE.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>dist/css/skins/skin-blue.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>jquery-ui/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>jquery-confirm/dist/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php  
      include("main-header.php");
      include("main-sidebar.php");
    ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Quản lý trang</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">