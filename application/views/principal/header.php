<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VirtualMall</title>
  <meta name="description" content="Red de clientes, proveedores y negocios locales">
  <meta name="keywords" content="gratis, publicidad, internet, negocios, proveedores, emprendedores, sistemas, tecnologia, ropa, calzado, eventos, restaurantes, comida,hoteles, turismo, deportes,quito">
  <meta name="author" content="Codesfot">
  <meta name=”robots” content="Index, NoFollow">
  <link rel="icon" href="<?=base_url()?>img/fav.png" type="image/x-icon">
  <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a href="<?=base_url()?>"><img src="<?=base_url()?>img/logo.png" width="80" alt="Logo"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=base_url()?>">Inicio</a> </li>
        <li><a href="<?=base_url()?>general/conocenos">Conócenos</a></li>
        <li><a href="<?=base_url()?>general/servicios">Servicios</a></li>
        <li><a href="<?=base_url()?>general/registro">Registro</a></li>
        <li><a href="<?=base_url()?>catalogo">Catálogo Web</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container-fluid">





