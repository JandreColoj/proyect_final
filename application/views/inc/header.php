<header class="header">
        <div class="links hidden-xs">
            <span><i class="fa fa-phone" aria-hidden="true"></i> +502 6624-4300</span>
            <span><i class="fa fa-envelope" aria-hidden="true"></i> ventas1@lacarreta.com.gt</span>
            <span class="hidden-sm"><i class="fa fa-map-marker" aria-hidden="true"></i> 1er Avenida y 4ta Calle, bodega #2 Km 30 Amatitlán, Guatemala</span>
            <div class="social-links">
                <span><i class="fa fa-facebook" aria-hidden="true"></i></span>
                <span><i class="fa fa-instagram" aria-hidden="true"></i></span>
                <span><i class="fa fa-pinterest" aria-hidden="true"></i></span>

            </div>
            <hr>
        </div>
            <div class="navbar navbar-default" role="navigation">
                
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo site_url('inicioController') ?>" class="navbar-brand visible-xs visible-sm"><img src="<?php echo base_url()."application/views/images/logo.png" ?>" class="logo img-responsive"></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <?php $menu=""; ?>
                        <ul class="nav navbar-nav navbar-center">
                        <li <?php if($menu=='productos') echo 'class="active"'; ?>><a href="<?php echo site_url('productosController') ?>" class="int-collapse-menu" ><span>Nuestros</span> <br>productos</a></li>
                        <li <?php if($menu=='saludable') echo 'class="active"'; ?>><a  href="<?php echo site_url('saludableController') ?>" class="int-collapse-menu"><span>Vida</span> <br>saludable</a></li>
                        <li <?php if($menu=='producimos') echo 'class="active"'; ?>><a  href="<?php echo site_url('producimosController') ?>" class="int-collapse-menu"><span>Así</span><br> producimos</a></li>
                            <li class="navbar-brand hidden-xs hidden-sm" >    <img onclick="location.href='<?php echo site_url('inicioController') ?>'" src="<?php echo base_url()."application/views/images/logo.png"?>" class="logo img-responsive" style="cursor:pointer"></li>
                        <li <?php if($menu=='nosotros') echo 'class="active"'; ?>><a  href="<?php echo site_url('nosotrosController') ?>" class="int-collapse-menu"><span>Sobre</span> <br>nosotros</a></li>
                        <li <?php if($menu=='distribucion') echo 'class="active"'; ?>><a  href="<?php echo site_url('distribucionController') ?>" class="int-collapse-menu"><span>Puntos de </span><br>distribución</a></li>
						<li <?php if($menu=='contacto') echo 'class="active"'; ?>><a  href="<?php echo site_url('contactoController') ?>" class="int-collapse-menu"><span>Contactanos<br>&nbsp;</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        
    </header>