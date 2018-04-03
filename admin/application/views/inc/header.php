<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()."application/views/img/apple-icon.png"?>">
    <link rel="stylesheet" href="<?php echo base_url()."application/views/img/apple-icon.png"?>">
    <link rel="stylesheet" href="<?php echo base_url()."application/views/img/favicon.png"?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard La Carreta</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">  
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/bootstrap.min.css"?>">
    <link rel="stylesheet" href="<?php echo base_url()."application/views/css/now-ui-dashboard.minf700.css?v=1.0.1"?>">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url()."application/views/demo/demo.css"?>">

    
</head>
    <!-- class sidebar- mini para ocultar menu-->
<body class="">
    <div class="wrapper" style="height:0px">          
        <div class="sidebar" data-color="#fff">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
            -->
                <div class="logo">
                <a href="http://www.lacarreta.com.gt/" class="simple-text logo-mini"> LC </a>
                <a href="http://www.lacarreta.com.gt/" class="simple-text logo-normal"> La carreta </a>     
            </div>

        <div class="sidebar-wrapper">        
            <div class="user">
                <div class="photo">
                    <img src="<?php echo base_url()."application/views/img/james.jpg"?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span>

                            <?php echo $this->session->userdata('nombre'); ?>
                            <!--b class="caret"></b-->
                        </span>
                    </a>
                </div>
            </div>
            
            <ul class="nav">                       
                <li  class="desactive" >                  
                    <a href="<?php echo site_url('InicioController') ?>">
                    <i class="fab fa-dochub"></i>                                     
                        <p>Dashboard</p>
                    </a>                  
                </li>
                <li >                 
                    <a href="<?php echo site_url('ProductosController') ?>" >                      
                    <i class="fab fa-product-hunt"></i>                    
                        <p>Productos</p>
                    </a>              
                </li>                
                <li >  
                    <a href="<?php echo site_url('BannersController') ?>">                               
                    <i class="fas fa-bold"></i>                     
                        <p>Banners</p>
                    </a>              
                </li>                
                <li >                  
                    <a href="<?php echo site_url('RecetasController') ?>" >                    
                    <i class="fas fa-registered"></i>                      
                        <p> Recetas </p>
                    </a>                
                </li>                
                <li >                  
                    <a  href="<?php echo site_url('LoginController/salir') ?>" >                      
                        <i class="fas fa-sign-out-alt"></i>                      
                        <p> Salir </p>
                    </a>              
                </li>                
                <!--li >                  
                    <a data-toggle="collapse" href="#mapsExamples" >                      
                        <i class="now-ui-icons location_pin"></i>                      
                        <p> Maps  <b class="caret"></b> </p>
                    </a>                 
                </li-->          
            
            </ul>
    </div>
</div>

</div>          
</div>
        
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            
             <i class="fa fa-cog fa-2x"></i>
        </a>
        <!--ul class="dropdown-menu">
			<li class="header-title"> Color de menu</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
						<span class="badge filter badge-yellow" data-color="yellow"></span>
                        <span class="badge filter badge-blue" data-color="blue"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange active" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>            
            <li class="header-title">
                Sidebar Mini
            </li>
            <li class="adjustments-line">
              <div class="togglebutton switch-sidebar-mini">
                <span class="label-switch">OFF</span>
                <input type="checkbox" name="checkbox" checked class="bootstrap-switch"
                  data-on-label=""
                  data-off-label=""
                  />
                <span class="label-switch label-right">ON</span>
              </div>
            </li>
        </ul-->
    </div>
</div>

</body>
    <!--   Core JS Files   -->
<script src="<?php echo base_url()."application/views/js/core/jquery.min.js"?>" ></script>
<script src="<?php echo base_url()."application/views/js/core/popper.min.js"?>" ></script>
<script src="<?php echo base_url()."application/views/js/core/bootstrap.min.js"?>" ></script>
<script src="<?php echo base_url()."application/views/js/plugins/perfect-scrollbar.jquery.min.js"?>" ></script>
<script src="<?php echo base_url()."application/views/js/plugins/moment.min.js"?>"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url()."application/views/js/plugins/bootstrap-switch.js"?>"></script>
<!--  Plugin for Sweet Alert -->
<script src="<?php echo base_url()."application/views/js/plugins/sweetalert2.min.js"?>"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url()."application/views/js/plugins/jquery.validate.min.js"?>"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?php echo base_url()."application/views/js/plugins/jquery.bootstrap-wizard.js"?>"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?php echo base_url()."application/views/js/plugins/bootstrap-selectpicker.js"?>" ></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="<?php echo base_url()."application/views/js/plugins/bootstrap-datetimepicker.js"?>"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="<?php echo base_url()."application/views/js/plugins/jquery.dataTables.min.js"?>"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="<?php echo base_url()."application/views/js/plugins/bootstrap-tagsinput.js"?>"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url()."application/views/js/plugins/jasny-bootstrap.min.js"?>"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="<?php echo base_url()."application/views/js/plugins/fullcalendar.min.js"?>"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?php echo base_url()."application/views/js/plugins/jquery-jvectormap.js"?>"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?php echo base_url()."application/views/js/plugins/nouislider.min.js"?>" ></script>
<!--  Google Maps Plugin    -->
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

<!-- Chart JS -->
<script src="<?php echo base_url()."application/views/js/plugins/chartjs.min.js"?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url()."application/views/js/plugins/bootstrap-notify.js"?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url()."application/views/js/now-ui-dashboard.minf700.js?v=1.0.1"?>" ></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url()."application/views/demo/demo.js"?>"></script>
  <!-- Sharrre libray -->
<script src="<?php echo base_url()."application/views/demo/jquery.sharrre.js"?>"></script>
<script src="<?php echo base_url()."application/views/demo/demo.js"?>"></script>
<script src="<?php echo base_url()."application/views/js/blockui.js"?>"></script>
<script src="<?php echo base_url()."application/views/js/editortxt/tinymce.min.js"?>"></script>
<script src="<?php echo base_url()."application/views/js/jquery.easy-autocomplete.js"?>"></script>




<noscript>
  <img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"
/>

</noscript>

  <script>
  $(document).ready(function(){
    $().ready(function(){
        $sidebar = $('.sidebar');
        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
        //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
        //         $('.fixed-plugin .dropdown').addClass('show');
        //     }
        //
        // }

        $('.fixed-plugin a').click(function(event){
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if($(this).hasClass('switch-trigger')){
                if(event.stopPropagation){
                    event.stopPropagation();
                }
                else if(window.event){
                   window.event.cancelBubble = true;
                }
            }
        });

        $('.fixed-plugin .background-color span').click(function(){
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if($sidebar.length != 0){
                $sidebar.attr('data-color',new_color);
            }

            if($full_page.length != 0){
                $full_page.attr('filter-color',new_color);
            }

            if($sidebar_responsive.length != 0){
                $sidebar_responsive.attr('data-color',new_color);
            }
        });

        $('.fixed-plugin .img-holder').click(function(){
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if( $sidebar_img_container.length !=0 && $('.switch-sidebar-image input:checked').length != 0 ){
                $sidebar_img_container.fadeOut('fast', function(){
                   $sidebar_img_container.css('background-image','url("' + new_image + '")');
                   $sidebar_img_container.fadeIn('fast');
                });
            }

            if($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0 ) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $full_page_background.fadeOut('fast', function(){
                   $full_page_background.css('background-image','url("' + new_image_full_page + '")');
                   $full_page_background.fadeIn('fast');
                });
            }

            if( $('.switch-sidebar-image input:checked').length == 0 ){
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $sidebar_img_container.css('background-image','url("' + new_image + '")');
                $full_page_background.css('background-image','url("' + new_image_full_page + '")');
            }

            if($sidebar_responsive.length != 0){
                $sidebar_responsive.css('background-image','url("' + new_image + '")');
            }
        });

        $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function(){
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if($input.is(':checked')){
                if($sidebar_img_container.length != 0){
                    $sidebar_img_container.fadeIn('fast');
                    $sidebar.attr('data-image','#');
                }

                if($full_page_background.length != 0){
                    $full_page_background.fadeIn('fast');
                    $full_page.attr('data-image','#');
                }

                background_image = true;
            } else {
                if($sidebar_img_container.length != 0){
                    $sidebar.removeAttr('data-image');
                    $sidebar_img_container.fadeOut('fast');
                }

                if($full_page_background.length != 0){
                    $full_page.removeAttr('data-image','#');
                    $full_page_background.fadeOut('fast');
                }

                background_image = false;
            }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function(){
          var $btn = $(this);

          if(sidebar_mini_active == true){
              $('body').removeClass('sidebar-mini');
              sidebar_mini_active = false;
              nowuiDashboard.showSidebarMessage('Sidebar mini deactivated...');
          }else{
              $('body').addClass('sidebar-mini');
              sidebar_mini_active = true;
              nowuiDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function(){
              window.dispatchEvent(new Event('resize'));
          },180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function(){
              clearInterval(simulateWindowResize);
          },1000);
        });
    });
  });
</script>
  <script>
    $(document).ready(function(){
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
      
      demo.initVectorMap();
      
    });
</script>

</html>
