<!DOCTYPE html>
<html lang="en">    
<!-- Mirrored from demos.creative-tim.com/now-ui-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Mar 2018 21:11:09 GMT -->
<head>

<?php include_once("inc/headerIncludes.php") ?>

<title> Login </title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

</head>

<style>

</style>

<body>        
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
        <div class="navbar-wrapper">
                <a class="navbar-brand">Login</a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
            

    <div class="wrapper wrapper-full-page ">
        <div class="full-page login-page section-image" filter-color="black" data-image="<?php echo base_url()."application/views/img/slide3.jpg"?>">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 ml-auto mr-auto">

                        <form class="form" id="form_login" action="<?php echo base_url();?>index.php/LoginController/login" method="post">
                            <div class="card card-login card-plain">
                                
                                <div class="card-header">
                                    <div class="logo-container">
                                        <img src="<?php echo base_url()."application/views/img/logo.png"?>" alt="">
                                    </div>
                                </div>

                                    <?php if ($this->session->flashdata("error")) {?>

                                    <div class="alert alert-danger text-center msg_danger" role="alert" style="background:rgba(165,42,42,0.5); color:#fff; "> 
                                        <?php echo $this->session->flashdata("error") ?>
                                    </div>

                                    <?php }?>
                                    
                                <div class="card-body ">                
                                    <div class="input-group no-border form-control-lg">
                                        <span class="input-group-addon">
                                          <i class="far fa-user"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control" 
                                               placeholder="Usuario" 
                                               name="usuario"
                                               required>
                                        <span class="">
                                        </span>
                                    </div>

                                    <div class="input-group no-border form-control-lg">
                                        <span class="input-group-addon">
                                          <i class="fas fa-key"></i>
                                        </span>
                                        <input type="text" 
                                               placeholder="Contraseña" 
                                               class="form-control" 
                                               name="password"
                                               required>
                                        <span class="">
                                        </span>
                                    </div>        
                                </div>       
        
        
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary  btn-lg btn-block mb-3" id="btn_login">
                                        Iniciar Sesion
                                    </button>
                                               <!--div class="pull-left">
                                        <h6><a href="#pablo" class="link footer-link">Crear usuario</a></h6>
                                    </div>

                                    <div class="pull-right">
                                    <h6><a href="#pablo" class="link footer-link">Necesita ayuda?</a></h6>
                                    </div-->
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer class="footer" >
                <div class="container-fluid">
                    <div class="copyright">
                        <p>La carreta <a href="http://lacarreta.com.gt/">Sitio web</a></p>           
                    </div>
                </div>
            </footer>

        </div>
    </div>

</body>



<noscript>
  <img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"
/>

</noscript>

  <script>
  $(document).ready(function(){
  /*
   $("#btn_login").click(function(){

        var form = $("#form_login" ).serialize();
                
        $.ajax({
            type:"POST",
            dataType: "json",
            url:" <?php  echo site_url('loginController/login'); ?>",
            data:form,
            beforeSend:function(){
                $(".msg_danger").html();
                $(".msg_success").html();
               //$.blockUI({ message: null });
            },
            success:function(results){
                $.unblockUI();

                if (results.status == 400) {
                    $('.msg_danger').html(results.message).show();
                    setTimeout(function(){ $(".msg_danger").hide("slow"); }, 3000);
                    return false;
                }

                $('.msg_success').html(results.message).show();

                setTimeout(function(){ 
                    $(".msg_success").hide("slow"); 
                    dataTable.ajax.reload();
                 }, 2000);                   
            }
        });

    });

    $().ready(function(){
        $sidebar = $('.sidebar');
        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

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
  */
  
</script>

<script>
  $(document).ready(function(){
    demo.checkFullPageBackgroundImage();
  });
</script>























<!-- Mirrored from demos.creative-tim.com/now-ui-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Mar 2018 21:11:10 GMT -->
</html>
