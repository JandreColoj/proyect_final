<?php
$menu='productos';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    
    <title>La Carreta</title>
	<!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/bootstrap.css"?>">
    <!-- end Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700" rel="stylesheet">
    <!-- owl carousel SLIDER -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/owl.carousel.css"?>">
    <!-- end awesome icons -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/font-awesome.css"?>">
    <!-- lightbox -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/prettyPhoto.css"?>">
    <!-- Animation Effect CSS -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/animation.css"?>">
    <!-- Main Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/style.css"?>">
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/lacarreta.css"?>">

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	<![endif]-->

    <link rel="stylesheet" href="<?php echo base_url()."application/views/rs-plugin/css/settings.css"?>">

</head>
<body data-spy="scroll" data-offset="25">
<div class="animationload"><div class="loader">Loading...</div></div> 

    <?php include('inc/header.php');?>
    
    <section id="productos">
        <div class="title-page title-page2">
            Nuestros <span>productos</span><br>
            <div class="container">
                <p style="font-size: 18px;    line-height: 26px;    margin-top: 25px;    color: #bfbfbf;">La Carreta produce, exporta y comercializa frutas y vegetales frescas de la más alta calidad.   Con más de 20 años de experiencia en producción de vegetales, utilizando las más modernas herramientas y sistemas tecnológicos de producción que nos permiten ofrecer un producto de la más alta calidad. Nuestro transporte refrigerado garantiza la frescura y vida de anaquel de todos los productos.</p>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3 img-products">
                    <img src="images/products/01.png" alt="Aguacate" class="img-rounded">
                    <span>Aguacate</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/02.png" alt="Aguacate" class="img-rounded">
                    <span>Apio</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/03.png" alt="Aguacate" class="img-rounded">
                    <span>Cebolla</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/04.png" alt="Aguacate" class="img-rounded">
                    <span>Cebollín</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/05.png" alt="Aguacate" class="img-rounded">
                    <span>Chiles</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/06.png" alt="Aguacate" class="img-rounded">
                    <span>Coliflor</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/07.png" alt="Aguacate" class="img-rounded">
                    <span>Espinaca</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/08.png" alt="Aguacate" class="img-rounded">
                    <span>Lechuga</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/04.png" alt="Aguacate" class="img-rounded">
                    <span>Loroco</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/04.png" alt="Aguacate" class="img-rounded">
                    <span>Pepinos</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/04.png" alt="Aguacate" class="img-rounded">
                    <span>Tomates</span>
                </div>
                <div class="col-md-3 img-products">
                    <img src="images/products/04.png" alt="Aguacate" class="img-rounded">
                    <span>Zanahoria</span>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="background: #f5f5f5;">
            Categoría de productos
        </div>
        </div>
    <?php include('inc/footer.php');?>
</body>
</html>