<?php include_once("inc/header.php") ?>

<div class="main-panel" >
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
        <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#pablo">Dashboard LA CARRETA</a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
        </div>
    </nav>
    <!-- End Navbar -->            
    <div class='panel-header' style="background: url('<?php echo base_url()."application/views/img/slide3.jpg"?>')"> 
    
    <canvas id="bigDashboardChart"></canvas>
    <canvas id="activeUsers"></canvas>
    <canvas id="emailsCampaignChart"></canvas>
    <canvas id="activeCountries"></canvas>
    <!-- CANVAS -->
    </div>

    <div class="content" style="max-width:1600px; justify-conten:center">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> ABC BANNERS</h4>            
                </div>

                <div class="card-body">
                    <section >
                        <div class="alert alert-danger text-center msg_danger" role="alert" style="display: none; background:#81C784; color:#000; "></div>
                        <div class="alert alert-success text-center msg_success" role="alert" style="display: none; background:#A5D6A7; color:#000; "></div>
                            
                            <div class="col-md-12">
                                <button id="addBanner" class="btn" style="background:#43A047" data-toggle="tooltip" title="Agregar nuevo banner">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                 Agregar 
                                </button>            
                            </div>

                            <div class="col-md-12">
                                <table id="allBanner" class="table table-striped table-responsive ">
                                    <thead class="">
                                        <tr>
                                            <th>No.</th>
                                            <th>Contenido_1</th>
                                            <th>Contenido_2</th>
                                            <th>Contenido_3</th>    
                                            <th>Link</th>                                         
                                            <th>Estado</th>
                                            <th class="text-center" >Acciones</th>
                                            <th>Imagen</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_table">

                                        <?php echo $data; ?>

                                    </tbody>

                                </table>
                            </div>

                    </section>
                </div>
            </div>
         </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo base_url()."application/views/img/logo.png"?>" alt=""  width="100">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar nuevo banner</h4>
      </div>
      <div class="modal-body">       
            <div class="card "> 
                <div class="card-body ">
                    <form enctype="multipart/form-data" id="formulario_banner" >        
                        <div class="form-group has-label">
                            <label> Contenido 1  </label>
                            <input class="form-control"
                                    name="titulo"
                                    id="titulo"
                                    type="text"
                                    maxlength="20"
                                    required="true"/>
                            <div class="msg_titulo" style="display: none; color:#F44336; "></div>
                        </div>
                                            
                        <div class="form-group has-label">
                            <label>  Contenido 2  </label>
                            <input class="form-control"
                                    name="descripcion"
                                    id="descripcion"
                                    type="text"
                                    maxlength="20"
                                    required="true"/>
                            <div class="msg_descrip" style="display: none; color:#F44336; "></div>
                        </div>

                        <div class="form-group has-label">
                            <label>  Contenido 3 </label>
                            <input class="form-control"
                                    name="descripcion2"
                                    type="text"
                                    maxlength="20"/>
                        </div>

                        <div class="form-group has-label">
                            <label>  link </label>
                            <input class="form-control"
                                    name="url"
                                    type="text"/>
                        </div>

                        <div class="form-group has-label">
                            <label>  Subir imagen  </label>
                            <input class="form-control" 
                                    name="img_banner"
                                    id="subir_img" 
                                    type="file" />
                            <div class="msg_upload" style="display: none; color:#F44336; "></div>
                        </div> 
                        <div id="vista_img">                        
                        </div>  
                    </form>
                </div>
            </div>
      </div>
      <div class="modal-footer">            
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id='btn_guardar' class="btn btn-primary">Guardar</button>       
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="modalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo base_url()."application/views/img/logo.png"?>" alt=""  width="100">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar banner</h4>
      </div>
      <div class="modal-body">       
            <div class="card "> 
                <div class="card-body ">
                    <form enctype="multipart/form-data" id="formulario_banner_edit" >   
                    <input type="text" class="form-control" name="banner_id" id="banner_id" hidden/>     
                        <div class="form-group has-label">
                            <label> Contenido 1  </label>
                            <input class="form-control"
                                    name="titulo_edit"
                                    id="titulo_edit"
                                    type="text"
                                    maxlength="20"
                                    required="true"/>
                            <div class="msg_titulo" style="display: none; color:#F44336; "></div>
                        </div>
                                            
                        <div class="form-group has-label">
                            <label>  Contenido 2  </label>
                            <input class="form-control"
                                    name="descripcion_edit"
                                    id="descripcion_edit"
                                    type="text"
                                    maxlength="20"
                                    required="true"/>
                            <div class="msg_descrip" style="display: none; color:#F44336; "></div>
                        </div>

                        <div class="form-group has-label">
                            <label>  Contenido 3 </label>
                            <input class="form-control"
                                    name="descripcion2_edit"
                                    id="descripcion2_edit"
                                    type="text"
                                    maxlength="20"/>
                        </div>

                        <div class="form-group has-label">
                            <label>  link </label>
                            <input  class="form-control"
                                    id="link_edit"
                                    name="url"
                                    type="text"/>
                        </div>

                        <div class="form-group has-label">
                            <label>  Subir imagen  </label>
                            <input class="form-control" 
                                    name="img_banner"
                                    id="subir_img_edit" 
                                    type="file" />
                            <div class="msg_upload" style="display: none; color:#F44336; "></div>
                        </div> 
                        <div id="vista_img_edit">                        
                        </div>  
                    </form>
                </div>
            </div>
      </div>
      <div class="modal-footer">            
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id='btn_guardar_edit' class="btn btn-primary">Guardar</button>       
      </div>
    </div>
  </div>
</div>
<script>

$(document).ready(function(){   

    $("#addBanner").on( "click", function() {
        document.getElementById("formulario_banner").reset();
        $("#vista_img").html("");

        $('#myModal').modal({ show: true });
        img_vista("vista_img","subir_img");
    });

    $("body").on("click","#btn_guardar", function(){

        $(".msg_titulo").css("display","none");
        $(".msg_descrip").css("display","none");
        $(".msg_upload").css("display","none");
  
        var camposRellenados=true;    
        
        if( $("#titulo").val().length <= 0 ) {
                camposRellenados = false;
                $('.msg_titulo').html('* Ingresa un titulo').show();
        }
        if( $("#descripcion").val().length <= 0 ) {
                camposRellenados = false;
                $('.msg_descrip').html('* Ingresa una descripcion').show();
        }
        if( !$("#subir_img").val() ) {
                camposRellenados = false;
                $('.msg_upload').html('* Selecciona una imagen').show();
        }

        if(camposRellenados){ 

            $.ajax({
                type:"POST",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                url:" <?php  echo site_url('bannersController/guardar_banner'); ?>",
                data:new FormData($("#formulario_banner")[0]),
                beforeSend:function(){
                    $(".msg_danger").html();
                    $(".msg_success").html();
                    $.blockUI({ message: null });
                },
                success:function(results){
                    $("#myModal").modal('hide');
                    $.unblockUI();

                    if (results.status == 400) {                            
                        $('.msg_danger').html(results.message).show();
                        setTimeout(function(){ $(".msg_danger").hide("slow"); }, 3000);
                        return false;
                    }                    
                   
                    $('.msg_success').html(results.message).show();

                    setTimeout(function(){ 
                        $(".msg_success").hide("slow"); 
                        reload_table();
                    }, 2000);                 
                                
                }
           });

        }
       
    });

    $("body").on("click",".btn_editar", function(){
        $(".msg_titulo").css("display","none");
        $(".msg_descrip").css("display","none");
        $(".msg_upload").css("display","none");

        document.getElementById("formulario_banner_edit").reset();
        $("#vista_img_edit").html("");
        $('#modalEdit').modal({ show: true });
        infoBanner($(this).attr("id"));
        img_vista("vista_img_edit","subir_img_edit");
    });

    $("body").on("click","#btn_guardar_edit", function(){

        $(".msg_titulo").css("display","none");
        $(".msg_descrip").css("display","none");
        $(".msg_upload").css("display","none");

        var camposRellenados=true;    

        if( $("#titulo_edit").val().length <= 0 ) {
                camposRellenados = false;
                $('.msg_titulo').html('* Ingresa un titulo').show();
        }
        if( $("#descripcion_edit").val().length <= 0 ) {
                camposRellenados = false;
                $('.msg_descrip').html('* Ingresa una descripcion').show();
        }

        if(camposRellenados){ 

            $.ajax({
                type:"POST",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                url:" <?php  echo site_url('bannersController/editar_banner'); ?>",
                data:new FormData($("#formulario_banner_edit")[0]),
                beforeSend:function(){
                    $(".msg_danger").html();
                    $(".msg_success").html();
                    $.blockUI({ message: null });
                },
                success:function(results){
                    $("#modalEdit").modal('hide');
                    $.unblockUI();

                    if (results.status == 400) {                            
                        $('.msg_danger').html(results.message).show();
                        setTimeout(function(){ $(".msg_danger").hide("slow"); }, 3000);
                        return false;
                    }                    
                    
                    $('.msg_success').html(results.message).show();

                    setTimeout(function(){ 
                        $(".msg_success").hide("slow"); 
                        reload_table();
                    }, 2000);    
                }
            });

        }

    });

    $("body").on("click",".AB", function(){
        var id = $(this).attr("id");
        var title= $(this).data('tipomod') == 'alta'? "Dar de alta" : "Dar de baja";
        var tipo = $(this).data('tipomod') == 'alta' ? 1 : 0 ;

        swal({
            title: title,
            text: "Quieres realizar el cambio?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4CAF50',
            cancelButtonColor: '#EF5350',
            confirmButtonText: 'Aceptar'
        }).then((result) => {            
            if (result) {
                altabaja(id,tipo);
            }
        })       
    });

    function altabaja(id,tipo){
        $.ajax({
            type:"POST",
            dataType: "json",
            url:" <?php  echo site_url('bannersController/setAB'); ?>",
            data:{id    : id,
                  tipo  :tipo},
            beforeSend:function(){
                $(".msg_danger").html();
                $(".msg_success").html();
                $.blockUI({ message: null });
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
                    reload_table();
                 }, 2000);                   
            }
        });       
    } 

    function infoBanner(id){
        $.ajax({
            type:"POST",
            dataType: "json",            
            url:" <?php  echo site_url('bannersController/info_banner'); ?>",
            data:{id:id},
            beforeSend:function(){
            },
            success:function(results){
                console.log(results);
                if (results.status == 400) {
                    $('.msg_danger').html(results.message).show();
                    setTimeout(function(){ $(".msg_danger").hide("slow"); }, 5000);
                    return false;
                }
                $("#banner_id").val(results.data[0].id);
                $("#titulo_edit").val(results.data[0].titulo);
                $("#descripcion_edit").val(results.data[0].descripcion);
                $("#descripcion2_edit").val(results.data[0].descripcion2);
                $("#link_edit").val(results.data[0].href);
                $("#vista_img_edit").html("<img src='<?php echo base_url();?>"+results.data[0].img+"' alt=''  width='500'>");
                $("#vista_img_edit").css("display","block");
            }
        });  
    }

    function reload_table(){
         $.ajax({
            type:"POST", 
            data:{reload : "si"},      
            url:" <?php  echo site_url('bannersController/reloadTable'); ?>",
            beforeSend:function(){
                $("#data_table").html();
            },
            success:function(results){
                $("#data_table").html(results);
            }               
        });
    }

    function img_vista(div_vista, input_img){
                /* vista previa de la imagen */
            function archivo(evt) {
            var files = evt.target.files; // FileList object    
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    swal("", "Unicamente se permite subir imagenes", "error");
                    continue;
                }        
                var reader = new FileReader();        
                reader.onload = (function(theFile) {
                    return function(e) {
                    // Insertamos la imagen
                    document.getElementById(div_vista).innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
        
                reader.readAsDataURL(f);
            }
        }     
        document.getElementById(input_img).addEventListener('change', archivo, false);
    }
   
});
</script>

<?php include_once("inc/footer.php") ?>