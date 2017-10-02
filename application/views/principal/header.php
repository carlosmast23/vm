<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VirtualMall</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <link rel="icon" href="<?=base_url()?>img/fav.png" type="image/x-icon">
  <!-- css -->
  <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- main css -->
  <link href="<?=base_url()?>css/estilos.css" rel="stylesheet">
  <link href="<?=base_url()?>css/style.css" rel="stylesheet">



  <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
  <script src="<?= base_url()?>assets/validate/jquery.validate.min.js"></script>


</head>
<body>


  <!-- Preloader -->
  <div id="preloader">
    <div class="pre-container">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>
  </div>
  <!-- end Preloader -->

  <div class="container-fluid">

<!-- box header -->
<header class="box-header">
  <div class="box-logo">
    <a href="<?=base_url()?>"><img src="<?=base_url()?>img/logo.png" width="80" alt="Logo"></a>
  </div>
  <!-- box-nav -->
  <a class="box-primary-nav-trigger" href="#0">
    <span class="box-menu-text">Menu</span><span class="box-menu-icon"></span>
  </a>
  <!-- box-primary-nav-trigger -->
</header>
<!-- end box header -->

<!-- nav -->
<nav>
  <ul class="box-primary-nav">
    <li class="box-label">Sobre mi:</li>

    <li><a href="<?=base_url()?>">Inicio</a> <i class="glyphicon glyphicon-screenshot""></i></li>
    <li><a href="<?=base_url()?>general/conocenos">Conócenos</a></li>
    <li><a href="<?=base_url()?>general/servicios">Servicios</a></li>
    <li><a href="<?=base_url()?>general/registro">Registro</a></li>



    <li class="box-label">Comparte</li>
    <li class="box-social"><a href="https://www.facebook.com/vmquito/"><i class="glyphicon glyphicon-share-alt"></i></a></li>

  </ul>
</nav>
<!-- end nav -->




