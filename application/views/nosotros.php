<?php
$menu='nosotros';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    
    <title>La Carreta</title>
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
    
    <section id="nosotros">
        <div class="title-page">
            Quienes <span>Somos</span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-us">
                        Más de medio siglo de tradición agricola
                    </div>
                    <div class="content-us">
                        Somos una empresa familiar 100% guatemalteca, que desde casi un siglo se ha dedicado a trabajar diferentes cultivos en el campo.  Nuestro reto ha sido en formar una empresa que honre la tradicion de Guatemala, que es un país netamente agrícola.  Hoy día, LA CARRETA es una de las empresas líderes en producción, distribución y comercialización a nivel local y en el mercado centroamericano.  Nuestras exportaciones se han extendido con mucho éxito tanto a Estados Unidos, como a Europa.
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url()."application/views/images/us01.jpg"?>" class="img-responsive us-img1">
                </div>
            </div>
        </div>
    </section>
    <?php include('inc/footer.php');?>
</body>
</html>