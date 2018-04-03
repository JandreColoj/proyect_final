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
    
    <section id="" class="sliderwrapper clearfix">
   
       <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>                     
                <?php foreach ($data as  $value) { ?>

                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <img src="<?php echo base_url()."admin/".$value['img']?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                    <div class="tp-dottedoverlay twoxtwo"></div>


                    <div class="tp-caption circle rev-video customin customout start" data-x="center"
                        data-hoffset="0"
                        data-y="40"
                        data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="1000"
                        data-start="500"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">
                        
                        <?php if ($value['descripcion2']!=null) { ?>

                          <div class="visible-xs" style="height: 70px;"></div>
                          <p class="title2" style="margin-top: 65px; font-size: 80px;text-transform: uppercase"><?php echo $value['titulo']; ?></p>
                          <p class="title1" style="margin-top: -20px; font-size: 90px;text-transform: uppercase"><?php echo $value['descripcion']; ?></p>
                          <p class="title2" style="margin-top: -20px; font-size: 80px;text-transform: uppercase"><?php echo $value['descripcion2']; ?></p>   

                        <?php }else{?>
                        <p class="title1"><?php echo $value['titulo']; ?></p>
                        <p class="title2"><?php echo $value['descripcion']; ?></p>
                        <?php }?>

                        <?php if ($value['href']!=null) { ?>                           
                            <a href="<?php echo $value['href'];?>"> <button class="btn read-more-slide">Leer más</button>  </a>
                        <?php }?>
                    </div>
                    </li>
                    
                <?php }?>  

				
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
		</div>
    </section ><!-- end slider-wrapper -->  
    <section class="sliderwrapper clearfix">
        <div  data-scroll-reveal="enter from the bottom after 0.4s" class="text-center title-g"><h1>EL AMOR ES <span>NATURAL</span></h1></div>
        <div  data-scroll-reveal="enter from the bottom after 0.4s" class="row">
            <div class="col-md-4 nat-01">
                <div class="title-g-2">
                    NUESTROS<br><span>PRODUCTOS</span>
                </div>
            </div>
            <div class="col-md-4 nat-02">
                <div class="title-g-2">
                    Recetas de<br><span>cocina</span>
                </div>
            </div>
            <div class="col-md-4 nat-03">
                <div class="title-g-2">
                    Sobre<br><span>La carreta</span>
                </div>
            </div>
        </div>
    </section>
        
    <div  data-scroll-reveal="enter from the bottom after 0.4s" class="text-center title-g"><h1>Frutas & vegetales <span>frescos</span></h1></div>
   <section  data-scroll-reveal="enter from the bottom after 0.4s" class="w-section">
    <div class="section-background">
        <div class="bg-wrapper bg-image hidden-sm hidden-xs" >
        </div>
       </div>
           <div class="row w-align-middle w-row-flex">
               <div class="col-lg-6 w-text-light">
                   <div class="col-inner">
                       <div class="row">
                           <div class="col-lg-12 hidden-sm hidden-xs">
                               <div class="col-inner">
                                   <div class="w-space" style="height:100px"></div>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-2 hidden-md hidden-sm hidden-xs">
                               <div class="col-inner"></div>
                           </div>
                           <div class="col-sm-8 col-xs-12">
                               <div class="col-inner">
                                   <div class="w-text-block">
                                       <h2>
                                           <span style="color: #ffffff;">
                                               <span style="color: #000000;">COMPARTE</span> TU RECETA</span>
                                       </h2>
                                       <p>
                                           <span style="color: #ffffff;">En La Carreta podrás revisar qué recetas han sido creadas con tus productos preferidos. </span>
                                       </p>
                                   </div>
                                   <div class="w-space" style="height:50px"></div>
                                   <div class="w-info-box clear w-medium w-left w-none">
            
                                       <span class="w-icon" >
                                           <i class="fm-garden">
                                                <img src="<?php echo base_url()."application/views/images/icon1.png"?>">
                                           </i>
            
                                       </span>
                                       <div class="w-content">
                                           <h3>Hazlo por ti</h3>
                                           <p><span style="color: #f5f5f5;">No te pierdas la oportunidad de cocinar sano y con la mejor calidad.</span></p>
                                           <p class="w-read-more">
                                               <a href="#" >Leer más</a></p>
                                       </div>
                                   </div>
                                   <div class="w-space" style="height:30px"></div>
                                   <div class="w-info-box clear w-medium w-left w-none">
            
                                       <span class="w-icon" >
                                           <i class="fm-garden">
                                                <img src="<?php echo base_url()."application/views/images/icon2.png"?>">
                                           </i>
            
                                       </span>
                                       <div class="w-content">
                                           <h3>Compartelo</h3>
                                           <p><span style="color: #f5f5f5;">Si tienes una receta propia puedes subir y compartirla con la comunidad</span></p>
                                           <p class="w-read-more">
                                               <a href="#" >Leer más</a></p>
                                       </div>
                                   </div>
                                   <div class="w-space" style="height:85px"></div>
                               </div>
                           </div>
                           <div class="col-lg-2 hidden-md hidden-sm hidden-xs">
                               <div class="col-inner"></div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-12 hidden-sm hidden-xs">
                               <div class="col-inner">
                                   <div class="w-space" style="height:100px"></div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-6 no-padding"><div class="col-inner"></div></div></div>
    </section>
	
    
    
    
    
	<section   class="feature-wrapper">
    	
		<div class="title text-center" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                        <div class="text-center title-g"><h1><span>8 Razones </span>para comer natural</h1></div>
                    </div>
        <div   class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 razon-01 razon">
                <div class="number">01</div>
                <div class="text-r">No contiene químicos</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  razon-02 razon">
                <div class="number">02</div>
                <div class="text-r">No tiene alteración genética</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  razon-03 razon">
                <div class="number">03</div>
                <div class="text-r">Preeserva el ecosistema</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  razon-04 razon">
                <div class="number">04</div>
                <div class="text-r">Ayuda directamente a los granjeros</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  razon-05 razon">
                <div class="number">05</div>
                <div class="text-r">Mantiene saludables a los niños</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  razon-06 razon">
                <div class="number">06</div>
                <div class="text-r">La Carreta cumple estándares estrictos</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  razon-07 razon">
                <div class="number">07</div>
                <div class="text-r">Mejora el sabor y beneficia con sus nutrientes</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  razon-08 razon">
                <div class="number">08</div>
                <div class="text-r">Evita las hormonas, antibióticos y drogas en productos de origen animal.</div>
            </div>
        </div>
    </section>
    
    <section class="parallax" style="background-image: url('<?php echo base_url().'application/views/images/leaf.jpg'?>'); transform: translate3d(0px, -10%, 0px);margin-top: 50px;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="20">
        <div class="overlay">
            <div class="container">
                <div class="featured-box text-center" data-effect="slide-bottom">
                    <h1><span>100% </span> garantizados nuestros cultivos</h1>
                    <img class="img-respnsive" src="<?php echo base_url()."application/views/images/canasta.png"?>" alt="">
                </div>
            </div>
        </div>
    </section>
      
      
   
        
 
    <?php include('inc/footer.php');?>
    
</body>
</html>