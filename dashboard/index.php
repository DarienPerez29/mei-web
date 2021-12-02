<?php require_once "vistas/parte_superior.php"?>

<!-- Topbar Navbar -->
<ul class="navbar-nav mr-auto ml-4">
    <li class="nav-item dropdown no-arrow pe-5 mt-2">
            <h2> <strong>Inventario </strong></h2>
        </li>
</ul>
<ul class="navbar-nav ml-auto mr-3">

    <div class="topbar-divider d-none d-sm-block"></div>
    
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-4 d-none d-sm-inline text-gray-600 small" style="text-align:right;"><strong><?php echo $_SESSION["s_usuario"]; ?></strong><br>Administrador</span>
            <img class="img-profile rounded-circle shadow-sm" src="img/user.png">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar Sesión
            </a>
        </div>
    </li>

</ul>

<!-- End of Topbar -->
</nav>
<!--INICIO del cont principal-->
<div class="container-fluid px-5 py-2">

<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, marca, codigo, cantidad, precio FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="containe-fluid">
        <div class="row">
            <div class="col-lg-12">            
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
</div>    

<br>  

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Marca</th>                                
                            <th>Cantidad</th>  
                            <th>Precio</th>
                            <th>Codigo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                            foreach($data as $dat) {                                                        
                        ?>
                        <tr>
                            <td><?php echo $dat['id'] ?></td>
                            <td><?php echo $dat['nombre'] ?></td>
                            <td><?php echo $dat['marca'] ?></td>
                            <td><?php echo $dat['cantidad'] ?></td>    
                            <td><?php echo $dat['precio'] ?></td>    
                            <td><?php echo $dat['codigo'] ?></td>    
                            <td></td>
                        </tr>
                        <?php
                            }
                        ?>                                
                    </tbody>
                </table>                
            </div>
        </div>
    </div>    
</div>  
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formProductos">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="pais" class="col-form-label">Marca:</label>
                <input type="text" class="form-control" id="marca">
                </div>                
                <div class="form-group">
                <label for="pais" class="col-form-label">Codigo:</label>
                <input type="text" class="form-control" id="codigo">
                </div>                
                <div class="form-group">
                <label for="edad" class="col-form-label">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad">
                </div>            
                <div class="form-group">
                <label for="edad" class="col-form-label">Precio:</label>
                <input type="number" class="form-control" id="precio">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>