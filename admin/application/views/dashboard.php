<?php include_once("inc/header.php") ?>
<div class="main-panel">
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
        <!-- CANVAS -->
    </div>
    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-stats card-raised">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="statistics">
                                        <div class="info">
                                            <div class="icon icon-primary">
                                                <i class="fas fa-bold"></i>
                                            </div>
                                            <h3 class="info-title"><?php echo $banners ?></h3>
                                            <h6 class="stats-title">Banners</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="statistics">
                                        <div class="info">
                                            <div class="icon icon-success">
                                                <i class="fab fa-product-hunt"></i>
                                            </div>
                                                <h3 class="info-title"><?php echo $productos ?></h3>
                                                <h6 class="stats-title">Productos</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="statistics">
                                        <div class="info">
                                            <div class="icon icon-info">
                                                <i class="fas fa-registered"></i>
                                            </div>
                                            <h3 class="info-title"><?php echo $recetas ?></h3>
                                            <h6 class="stats-title">Recetas</h6>
                                        </div>
                                    </div>
                                </div>
                                <!--div class="col-md-3">
                                    <div class="statistics">
                                        <div class="info">
                                            <div class="icon icon-danger">
                                                <i class="now-ui-icons objects_support-17"></i>
                                            </div>
                                            <h3 class="info-title">1</h3>
                                            <h6 class="stats-title">Comentario</h6>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Ultimas recetas creadas</h4>            
                </div>
                <div class="card-body">
                            <div class="col-md-12">
                                <table id="tableRecetas" class="table table-striped table-responsive ">
                                    <thead class="">
                                        <tr>
                                            <th>No.</th>
                                            <th>Titulo</th>
                                            <th>Categoria</th>
                                            <th>Usuario</th>
                                            <th>Creado el</th>                                        
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($new_recetas as $value) { 
                                       	$estado =$value['estado'] == 1? "<div class=\" text-center\"  style='background:#43A047;  color:#fff; width:60% !important; border-radius: 0.3em; padding: 8px !important;'>Aceptado</div>" : "<div class=\"text-center\" style='background:#EF5350; color:#fff; width:60% !important; border-radius: 0.3em; padding: 8px !important;'>Rechazado</div>" ;
    
                                        ?>
                                            
                                        <tr>
                                            <td> <?php echo $i++ ?></td>
                                            <td> <?php  echo $value['titulo'] ?> </td>
                                            <td> <?php  echo $value['categoria'] ?> </td>
                                            <td> <?php  echo $value['usuario']." ".$value['apellido'] ?> </td>
                                            <td> <?php  echo $value['fecha_ingreso'] ?> </td>                                        
                                            <td class="text-center" > <?php  echo $estado ?> </td>
                                        </tr>
                                           

                                        <?php } ?>

                                    </tbody>

                                </table>
                            </div>

                </div>
            </div>
         </div>
    </div>
</div>
<?php include_once("inc/footer.php") ?>