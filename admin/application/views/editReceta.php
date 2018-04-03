<?php include_once("inc/header.php") ?>
<style>

    a{
        color: #000;
    }

     #eac-container-busqueda ul{
        border: solid 1px #000;
        border-radius:  5px;
        background: #4D4D4D;
        color: #EAEBEB;
        list-style: none;       
    }

    #eac-container-busqueda ul :hover{
        color: #EE781B;   
    }    

    #list_prod ul{
        border: solid 1px #000;
        border-radius:  5px;
        background: #4D4D4D;
        color: #EAEBEB;
        list-style: none;
        cursor: pointer        
    }

    #list_prod ul :hover{
        color: #F96060;   
    } 

    .eac-item{
        cursor: pointer
    }
    .btn-primary{
        margin-top: 20px;
    }
</style>

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

    <div class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> EDITAR RECETA</h4>            
                    </div>

                    <div class="alert alert-danger text-center msg_danger" role="alert" style="display: none; background:#81C784; color:#000; "></div>
                    <div class="alert alert-success text-center msg_success" role="alert" style="display: none; background:#A5D6A7; color:#000; "></div>

                    <div class="card-body ">
                        <form enctype="multipart/form-data" id="formulario_receta">
                            <div class="row"> 
                            <input class="form-control" name="receta_id" id="receta_id" type="text" value="<?php echo $data[0]['id']; ?>" hidden/>                             
                            

                                <div class="form-group has-label col-md-4">
                                    <label><b>* Titulo:</b>  </label>
                                    <input class="form-control"
                                            name="titulo"
                                            id="titulo"
                                            type="text"
                                            maxlength="30"
                                            required="true"
                                            value="<?php echo $data[0]['titulo']; ?>"/>
                                    <div class="msg_titulo" style="display: none; color:#F44336; "></div>
                                </div>
                                                
                                <div class="form-group has-label col-md-3">
                                    <label><b> Categoria:</b> </label>
                                    <select class="form-control" id="categoria" name="categoria">
                                        <option value="0">Cambiar de categoria</option>
                                        <?php
                                            foreach ($categorias as $value) {
                                                echo "<option value=".$value['id'].">".utf8_decode($value['nombre'])."</option>";
                                            }
                                        ?>
                                    </select>       
                                </div>

                                <div class="form-group has-label col-md-3">
                                    <label><b>Tiempo de preparaci&oacuten:</b></label>
                                    <input class="form-control"
                                           name="t_preparacion"
                                           id="t_preparacion"
                                           type="number"
                                           placeholder="Ingrese los minutos "
                                           min="1" 
                                           max="3"
                                           value="<?php echo $data[0]['tiempo_preparacion']; ?>"/>  
                                    <div class="msg_tiempo" style="display: none; color:#F44336; "></div>  
                                </div>

                                <div class="form-group col-md-2">
                                 <button type="button" id='btn_guardar' class="btn btn-primary">Guardar</button>         
                                </div>

                            </div><!--fin de row-->
                            <hr>
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="ingrediente-tab" data-toggle="tab" href="#ingredientes" role="tab" aria-controls="a" aria-selected="fase">Ingredientes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#preparacion" role="tab" aria-controls="profile" aria-selected="false">Preparaci&oacuten</a>
                                        </li>
                                    </ul>                            

                                    <!-- Tab panes -->
                                    <div class="tab-content">                              
                                        <div class="tab-pane active" id="ingredientes" role="tabpanel">                                    
                                            <div class="form-group">
                                                <textarea class="form-control"
                                                        name="txt_ingrediente"
                                                        id="txt_ingrediente"><?php echo $data[0]['ingredientes']; ?></textarea>               
                                            </div>                    
                                        </div>
                                        <div class="tab-pane" id="preparacion" role="tabpanel">
                                            <div class="form-group">
                                                <textarea class="form-control"
                                                        name="txt_preparacion"
                                                        id="txt_preparacion"><?php echo $data[0]['preparacion']; ?></textarea>               
                                            </div>     
                                            
                                        </div>
                                    </div> 
                                </div>                   
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <br>
                                        <label>* Subir imagen: </label>
                                        <input class="form-control" 
                                                name="img_receta"
                                                id="subir_img" 
                                                type="file" />
                                        <div class="msg_upload" style="display: none; color:#F44336; "></div>
                                    </div> 
                                    <div id="vista_img">
                                        <img src="<?php echo base_url().$data[0]['img']?>" alt="">                        
                                    </div>
                                </div>
                            </div>  
                        </form>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="min-height:650px">                        
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Busqueda de producto" id="busqueda"/>
                        
                        <hr>
                        <h6>Productos relacionados:</h6>
                        <div id="list_prod">
                     
                        </div>
                        <hr>
                                           
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>                                    
    </div>
</div>



<script>
$(document).ready(function() {

    tinymce.init({ selector:'textarea#txt_ingrediente', height:300, });
    tinymce.init({ selector:'textarea#txt_preparacion', height:300, });

    img_vista("vista_img","subir_img");

    var producto = new Array(); 
    var productos= JSON.parse(<?php echo ($receta_prod); ?>);
    var nombre;
    var id; 

    var html="<ul>";
    productos.forEach(element => {
        html+="<li>";
        html+="<i class='fas fa-trash-alt'> </i>";
        html+="<spam class='spam_product' id="+element.id+" title="+element.nombre+"> "+element.nombre+"</spam></br>";
        html+="</li>";                         
    });
    html+="</ul>";
    $("#list_prod").html(html);        

    /* busqueda */
    var options = {
        url: function(phrase) {
        return "<?php  echo site_url('AddRecetaController/search_product'); ?>";
        },
        getValue: function(element) {
        return element.nombre;
        },
        list: {
        onSelectItemEvent: function() {
            nombre = $("#busqueda").getSelectedItemData().nombre;
            id = $("#busqueda").getSelectedItemData().id;           
            
           // $("#busqueda").val(nombre).trigger("change");            
        },
        onHideListEvent: function() { 

            if ($("#busqueda").val()!="") {

                var html="<ul>";

                if (productos.length==0) {
                    producto=[];
                    producto['id']=id;
                    producto['nombre']=nombre;
                    productos.push(producto);
                        html+="<li>";
                        html+="<i class='fas fa-trash-alt'> </i>";
                        html+="<spam class='spam_product' id="+id+" title="+nombre+"> "+nombre+"</spam></br>";
                        html+="</li>";
                }else{

                    var existe=true;
                    productos.forEach(element => {
                        if (element.nombre==nombre) {
                           existe=false;
                        }
                    });
                    
                    if(existe){
                        producto=[];
                        producto['id']=id;
                        producto['nombre']=nombre;
                        productos.push(producto); 
                    }

                    productos.forEach(element => {
                        html+="<li>";
                        html+="<i class='fas fa-trash-alt'> </i>";
                        html+="<spam class='spam_product' id="+element.id+" title="+element.nombre+"> "+element.nombre+"</spam></br>";
                        html+="</li>";                         
                    });
                }

                html+="</ul>";

                $("#list_prod").html(html);
            } 
        //$("#inputTwo").val("").trigger("change");
    	}
        },
        ajaxSettings: {
        dataType: "json",
        method: "POST",
        data: {
            dataType: "json"
        }
        },
        preparePostData: function(data) {
        data.phrase = $("#busqueda").val();
        return data;
        },
        requestDelay: 400
    };

    $("#busqueda").easyAutocomplete(options);

     $("body").on("click",".spam_product", function(){
        console.log(productos);
        
        var aux=0, index=0;
        productos.forEach(element => {
           
            if (element.id==$(this).attr("id")) {
                index=aux;
            }
            aux++;
        });

        productos.splice(index, 1);

        var html="<ul>";
        productos.forEach(element => {
                html+="<li>";
                html+="<i class='fas fa-trash-alt'> </i>";
                html+="<spam class='spam_product' id="+element.id+" title="+element.nombre+"> "+element.nombre+"</spam></br>";
                html+="</li>";                         
            });
        html+="</ul>";

        $("#list_prod").html(html);
    });

    $("#btn_guardar").click(function(){
       
        $(".msg_titulo").css("display","none");
        $(".msg_tiempo").css("display","none");
        $(".msg_upload").css("display","none");

        var camposRellenados=true;    

        if( $("#titulo").val().length <= 0 ) {
                camposRellenados = false;
                $('.msg_titulo').html('* Ingresa un nombre a la receta').show();
        }
        if( $("#t_preparacion").val().length <= 0 || $("#t_preparacion").val().length >= 3) {
                camposRellenados = false;
                $('.msg_tiempo').html('* Ingrese el tiempo en minutos').show();
        }
        
        var formData=new FormData($("#formulario_receta")[0]);
        //enviar id de productos relacionados en texto
        var txt_productos="";
         productos.forEach(element => {
            txt_productos+=element.id+",";
         });

        formData.append('txt_ingrediente', tinyMCE.get('txt_ingrediente').getContent());
        formData.append('txt_preparacion', tinyMCE.get('txt_preparacion').getContent());
        formData.append('prod_relacionados', txt_productos);

        if(camposRellenados){ 

            $.ajax({
                type:"POST",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                url:" <?php  echo site_url('EditRecetaController/editar_receta'); ?>",
                data: formData,
                beforeSend:function(){
                    $(".msg_danger").html();
                    $(".msg_success").html();
                   // $.blockUI({ message: null });
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
                        location.href ="<?php echo site_url('RecetasController')?>";
                    }, 2000);                 
                                
                }
            });

        }

    });

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