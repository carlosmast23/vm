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
  <!-- css -->
  <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

  <style>
    /* Makes images fully responsive */
    .img-responsive,
    .thumbnail > img,
    .thumbnail a > img,
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      display: block;
      width: 100%;
      height: auto;
    }
    /* ------------------- Carousel Styling ------------------- */

    .carousel-inner {
      border-radius: 15px;
    }

    .carousel-caption {
      background-color: rgba(0,0,0,.5);
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 10;
      padding: 0 0 10px 25px;
      color: #fff;
      text-align: left;
    }

    .carousel-indicators {
      position: absolute;
      bottom: 0;
      right: 0;
      left: 0;
      width: 100%;
      z-index: 15;
      margin: 0;
      padding: 0 25px 25px 0;
      text-align: right;
    }

    .carousel-control.left,
    .carousel-control.right {
      background-image: none;
    }


    /* ------------------- Section Styling - Not needed for carousel styling ------------------- */
    .section-white {
     padding: 10px 0;
   }

   .section-white {
    background-color: #fff;
    color: #555;
  }

  @media screen and (min-width: 768px) {
    .section-white {
     padding: 1.5em 0;
   }
 }

 @media screen and (min-width: 992px) {
  .container {
    max-width: 930px;
  }
}

</style>

</head>
<body>


  <div class="container">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?=aleatorio('a')?>" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
        <div class="item">
          <img src="<?=aleatorio('a')?>" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
        <div class="item">
          <img src="<?=aleatorio('a')?>" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
  </div>

</body>
</html>