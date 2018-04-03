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

    <div class="content" style="max-width:1650px; justify-conten:center">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> ABC PRODUCTOS</h4>            
                </div>

                <div class="card-body">
                    <section >
                        <div class="alert alert-danger text-center msg_danger" role="alert" style="display: none; background:#81C784; color:#000; "></div>
                        <div class="alert alert-success text-center msg_success" role="alert" style="display: none; background:#A5D6A7; color:#000; "></div>
                            
                            <div class="col-md-12">
                                <button id="addProducto" class="btn" style="background:#43A047" data-toggle="tooltip" title="Agregar nuevo banner">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                 Agregar 
                                </button>            
                            </div>

                            <div class="col-md-12">
                                <table id="tableProducts" class="table table-striped table-responsive ">
                                    <thead class="">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nombre</th>
                                            <th>Categoria</th>
                                            <th>Descripci&oacuten</th>
                                            <th>Producci&oacuten</th>                                        
                                            <th>Estado</th>
                                            <th class="text-center" >Acciones</th>
                                            <th>Imagen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo base_url()."application/views/img/logo.png"?>" alt=""  width="100">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar nuevo producto</h4>
      </div>
      <div class="modal-body">       
            <div class="card "> 
                <div class="card-body ">
                    <form enctype="multipart/form-data" id="formulario_producto" >        
                        <div class="form-group has-label">
                            <label>* Nombre  </label>
                            <input class="form-control"
                                    name="nombre"
                                    id="nombre"
                                    type="text"
                                    maxlength="30"
                                    required="true"/>
                            <div class="msg_nombre" style="display: none; color:#F44336; "></div>
                        </div>
                                            
                        <div class="form-group has-label">
                            <label>  Categoria  </label>
                            <select class="form-control" id="categoria" name="categoria">
                                <?php
                                    foreach ($categorias as $value) {
                                        echo "<option value=".$value['id'].">".utf8_decode($value['nombre'])."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group has-label">
                            <label>  Descripci&oacuten: </label>
                            <textarea class="form-control"
                                      name="descripcion"
                                      require="true"                                      
                                      id="comment"></textarea>                      
                        </div>

                        <div class="form-group has-label">
                            <label>  Producci&oacuten: </label>
                            <textarea class="form-control"
                                    name="produccion"
                                    require="true"
                                    id="produccion"></textarea>               
                        </div>

                        <div class="form-group has-label">
                            <label>  Info. nutricional: </label>
                            <textarea class="form-control"
                                    name="nutricional"
                                    require="true"
                                    id="nutricional"></textarea>               
                        </div>

                        <div class="form-group has-label">
                            <label>* Subir imagen: </label>
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
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo base_url()."application/views/img/logo.png"?>" alt=""  width="100">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar producto</h4>
      </div>
      <div class="modal-body">       
            <div class="card "> 
                <div class="card-body ">
                    <form enctype="multipart/form-data" id="formulario_producto_edit" > 
                       <input type="text" class="form-control" name="producto_id" id="producto_id" hidden/>       
                        <div class="form-group has-label">
                            <label>* Nombre  </label>
                            <input class="form-control"
                                    name="nombre_edit"
                                    id="nombre_edit"
                                    type="text"
                                    maxlength="30"
                                    required="true"/>
                            <div class="msg_nombre" style="display: none; color:#F44336; "></div>
                        </div>
                                            
                        <div class="form-group has-label">
                            <label>  Categoria  </label>
                            <select class="form-control" id="categoria_edit" name="categoria_edit">
                                <option value="0">Cambiar categoria</option>";
                                <?php
                                    foreach ($categorias as $value) {
                                        echo "<option value=".$value['id'].">".utf8_decode($value['nombre'])."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group has-label">
                            <label>  Descripci&oacuten: </label>
                            <textarea class="form-control"
                                      name="descripcion_edit"
                                      require="true"                                      
                                      id="descripcion_edit"></textarea>                      
                        </div>

                        <div class="form-group has-label">
                            <label>  Producci&oacuten: </label>
                            <textarea class="form-control"
                                    name="produccion_edit"
                                    require="true"
                                    id="produccion_edit"></textarea>               
                        </div>

                        <div class="form-group has-label">
                            <label>  Info. nutricional: </label>
                            <textarea class="form-control"
                                    name="nutricional_edit"
                                    require="true"
                                    id="nutricional_edit"></textarea>               
                        </div>

                        <div class="form-group has-label">
                            <label>* Subir imagen: </label>
                            <input class="form-control" 
                                    name="imagen_edit"
                                    id="imagen_edit" 
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
$(document).ready(function() {
    
    var dataTable = $('#tableProducts').DataTable( { 
        "language":	{
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        },
        "processing": true,
        "serverSide": true,
        "paging": true,
        "ajax":{
            url : "<?php  echo site_url('ProductosController/dataTable'); ?>", // json datasource
            type: "post",  // method  , by default get
        }
    });

    $("#addProducto").on( "click", function() {
        document.getElementById("formulario_producto").reset();
        $("#vista_img").html("");

        $('#addModal').modal({ show: true });
        img_vista("vista_img","subir_img");
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

    $("body").on("click","#btn_guardar", function(){

        $(".msg_nombre").css("display","none");
        $(".msg_upload").css("display","none");

        var camposRellenados=true;    

        if( $("#nombre").val().length <= 0 ) {
                camposRellenados = false;
                $('.msg_nombre').html('* Ingresa un nombre del producto').show();
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
                url:" <?php  echo site_url('ProductosController/guardar_producto'); ?>",
                data:new FormData($("#formulario_producto")[0]),
                beforeSend:function(){
                    $(".msg_danger").html();
                    $(".msg_success").html();
                    $.blockUI({ message: null });
                },
                success:function(results){
                    $("#addModal").modal('hide');
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

        }

    });

    $("body").on("click",".btn_editar", function(){
        $(".msg_nombre").css("display","none");
        $(".msg_upload").css("display","none");

        document.getElementById("formulario_producto_edit").reset();
        $("#vista_img_edit").html("");
        $('#editModal').modal({ show: true });
        infoProducto($(this).attr("id"));
        img_vista("vista_img_edit","imagen_edit");
    });

    $("body").on("click","#btn_guardar_edit", function(){

        $(".msg_nombre").css("display","none");
        $(".msg_upload").css("display","none");

        var camposRellenados=true;    

        if( $("#nombre_edit").val().length <= 0 ) {
                camposRellenados = false;
                $('.msg_titulo').html('* Ingresa un nombre del producto').show();
        }

        if(camposRellenados){ 

            $.ajax({
                type:"POST",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                url:" <?php  echo site_url('ProductosController/editar_producto'); ?>",
                data:new FormData($("#formulario_producto_edit")[0]),
                beforeSend:function(){
                    $(".msg_danger").html();
                    $(".msg_success").html();
                    $.blockUI({ message: null });
                },
                success:function(results){
                    $("#editModal").modal('hide');
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

        }

    });

    function infoProducto(id){
        $.ajax({
            type:"POST",
            dataType: "json",            
            url:" <?php  echo site_url('ProductosController/info_producto'); ?>",
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

                $("#nombre_edit").val(results.data[0].nombre);
                $("#descripcion_edit").val(results.data[0].descripcion);
                $("#produccion_edit").val(results.data[0].produccion);
                $("#nutricional_edit").val(results.data[0].inf_nutricional);
                $("#producto_id").val(results.data[0].id);
                $("#vista_img_edit").html("<img src='<?php echo base_url();?>"+results.data[0].img+"' alt='' >");
                $("#vista_img_edit").css("display","block");
            }
        });  
    }

    function altabaja(id,tipo){
        $.ajax({
            type:"POST",
            dataType: "json",
            url:" <?php  echo site_url('ProductosController/setAB'); ?>",
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
                    dataTable.ajax.reload();
                 }, 2000);                   
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