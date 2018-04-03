<section class="contact-wrapper">
        
    
        <div class="container">
            <div class="title text-center">
                <div class="clearfix"></div>    
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box" data-scroll-reveal="enter from the bottom after 0.6s">
                        <i class="fa fa-envelope-o aligncenter"></i>
                        <h2>ventas1@lacarreta.com.gt</h2>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box" data-scroll-reveal="enter from the bottom after 0.6s">
                        <i class="fa fa-map-marker aligncenter"></i>
                        <h2>1er Avenida y 4ta Calle, bodega #2 Km 30 Amatitlán, Guatemala    </h2>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box"  data-scroll-reveal="enter from the bottom after 0.6s">
                        <i class="fa fa-phone aligncenter"></i>
                        <h2>+502 6624-4300  </h2>
                    </div>
                </div>
            </div> 
        </div>
        
    </section>
<section class="footer-wrapper ">
        <div class="container">
            <div class="title ">
               <div class="">     
                 
                    <div class="socialFooter">
                        <a href="#">Contactanos</a>
                        <a href="#">Vida saludable</a>
                        <a href="#">Sobre Nosotros</a>
                        <a href="#">Nuestros productos</a>
                    </div>
               	
    	<p>©2018 La Carreta</p>
            </div>   
        </div>  
                </div>
    </section>
     
  
     
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="<?php echo base_url()."application/views/js/jquery.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/bootstrap.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/smooth-scroll.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/jquery.parallax-1.1.3.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/jquery.easypiechart.min.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/owl.carousel.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/jquery.jigowatt.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/custom.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/jquery.unveilEffects.js";?>"></script>
	<script src="<?php echo base_url()."application/views/js/jquery.isotope.min.js";?>"></script>
	<script>
		(function ($) {
			var $container = $('.masonry_wrapper'),
				colWidth = function () {
					var w = $container.width(), 
						columnNum = 1,
						columnWidth = 0;
					if (w > 1200) {
						columnNum  = 3;
					} else if (w > 900) {
						columnNum  = 3;
					} else if (w > 600) {
						columnNum  = 2;
					} else if (w > 300) {
						columnNum  = 1;
					}
					columnWidth = Math.floor(w/columnNum);
					$container.find('.item').each(function() {
						var $item = $(this),
							multiplier_w = $item.attr('class').match(/item-w(\d)/),
							multiplier_h = $item.attr('class').match(/item-h(\d)/),
							width = multiplier_w ? columnWidth*multiplier_w[1]-4 : columnWidth-4,
							height = multiplier_h ? columnWidth*multiplier_h[1]*0.5-4 : columnWidth*0.5-4;
						$item.css({
							width: width,
							height: height
						});
					});
					return columnWidth;
				}
							
				function refreshWaypoints() {
					setTimeout(function() {
					}, 1000);   
				}
							
				$('nav.portfolio-filter ul li a').on('click', function() {
					var selector = $(this).attr('data-filter');
					$container.isotope({ filter: selector }, refreshWaypoints());
					$('nav.portfolio-filter ul li a').removeClass('active');
					$(this).addClass('active');
					return false;
				});
					
				function setPortfolio() { 
					setColumns();
					$container.isotope('reLayout');
				}
		
				isotope = function () {
					$container.isotope({
						resizable: true,
						itemSelector: '.item',
						masonry: {
							columnWidth: colWidth(),
							gutterWidth: 0
						}
					});
				};
			isotope();
			$(window).smartresize(isotope);
		}(jQuery));
	</script>

	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
	    <script type="text/javascript" src="<?php echo base_url()."application/views/rs-plugin/js/jquery.themepunch.plugins.min.js";?>"></script>
		<script type="text/javascript" src="<?php echo base_url()."application/views/rs-plugin/js/jquery.themepunch.revolution.min.js";?>"></script>
    
		<script type="text/javascript">
			var revapi;
			jQuery(document).ready(function() {
			revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:500,
				hideThumbs:10,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: ""
			 });
		   });	//ready
		</script>
		
		
    
    <!-- Animation Scripts-->
	<script type="text/javascript" src="<?php echo base_url()."application/views/js/scrollReveal.js";?>"></script>
    
    <script>
            (function($) {
            "use strict"
                window.scrollReveal = new scrollReveal();
            })(jQuery);
    </script>
    
    <!-- Portofolio Pretty photo JS -->       
	<script type="text/javascript" src="<?php echo base_url()."application/views/js/jquery.prettyPhoto.js";?>"></script>
 
    <script type="text/javascript">
        (function($) {
            "use strict";
            jQuery('a[data-gal]').each(function() {
                jQuery(this).attr('rel', jQuery(this).data('gal'));
            });  	
                jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
        })(jQuery);
    </script>
          
    <!-- Video Player o-->
	<script type="text/javascript" src="<?php echo base_url()."application/views/js/jquery.mb.YTPlayer.js";?>"></script>
 
          
	 
    <script type="text/javascript">
      (function($) {
        "use strict"
          $(".player").mb_YTPlayer();
        })(jQuery);	
    </script>