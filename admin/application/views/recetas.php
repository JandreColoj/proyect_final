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
    <div class='panel-header' style="background: url('<?php echo base_url()."application/views/img/r07.jpg"?>')"> 
    
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
                    <h4 class="card-title"> ABC RECETAS</h4>            
                </div>
                
                <div class="card-body">
                    <section >
                        <div class="alert alert-danger text-center msg_danger" role="alert" style="display: none; background:#81C784; color:#000; "></div>
                        <div class="alert alert-success text-center msg_success" role="alert" style="display: none; background:#A5D6A7; color:#000; "></div>
                            
                            <div class="col-md-12">
                               <a href="<?php  echo site_url('AddRecetaController'); ?>">
                                    <button id="addProducto" class="btn" style="background:#43A047" data-toggle="tooltip" title="Agregar nueva receta">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Agregar 
                                    </button> 
                                </a>           
                            </div>

                            <div class="col-md-12">
                                <table id="tableRecetas" class="table table-striped table-responsive ">
                                    <thead class="">
                                        <tr>
                                            <th>No.</th>
                                            <th>Titulo</th>
                                            <th>Categoria</th>
                                            <th>Usuario</th>
                                            <th>Enviado el</th>                                        
                                            <th class="text-center" >Estado</th>
                                            <th class="text-center" >Acciones</th>
                                            <th class="text-center" >Imagen</th>
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

<script>
$(document).ready(function() {


    var dataTable = $('#tableRecetas').DataTable( { 
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
            url : "<?php  echo site_url('RecetasController/dataTable'); ?>", // json datasource
            type: "post",  // method  , by default get
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
            url:" <?php  echo site_url('RecetasController/setAB'); ?>",
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
    
});
</script>

<?php include_once("inc/footer.php") ?>