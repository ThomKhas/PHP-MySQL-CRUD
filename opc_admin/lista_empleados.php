<?php 

    $servidor = "localhost";
    $user = "root";
    $password = "";
    $db = "yuri";
    $conn = new mysqli($servidor, $user, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!isset($_POST['filtro_sexo'])){$_POST['filtro_sexo'] = '';}

    if (!isset($_POST['filtro_cargo'])){$_POST['filtro_cargo'] = '';}

    if (!isset($_POST['filtro_area'])){$_POST['filtro_area'] = '';}
?>


<?php include_once("../headers-footers/header_admin.php");?>      
<form id="form" action="lista_empleados.php" name="form" method="POST">
<div class="col-12 row m-1">
    <h4 class="card-title">LISTA DE TRABAJADORES</h4>
    <div class="col-4">
        <table class="table table-borderless">
            <thead>
                <tr class="filters">
                    <th>
                        Sexo
                        <select class="form-control" name="filtro_sexo" id="filtro_sexo">
                            <option value=" "> </option>
                            <option name="M">M</option>
                            <option name="F">F</option>
                        </select>
                    </th>
                    <th> Cargo  
                        <select class="form-control" name="filtro_cargo" id="filtro_cargo">
                            <option value=" "> </option>
                            <option name="operador">Operador</option>
                            <option name="cartero">Cartero</option>
                            <option name="asis_vig">Asistente Vigilancia</option>
                            <option name="g_g">Gerente General</option>
                            <option name="ejecutivo">Ejecutivo</option>
                            <option name="j_seg">Jefe Seguridad</option>
                            <option name="j_adm">Jefe Administracion</option>
                        </select>   
                    </th>
                    <th> Area/Departamento   
                        <select class="form-control" name="filtro_area" id="filtro_area">
                            <option value=" "> </option>
                            <option name="despacho">Despacho</option>
                            <option name="finanza">Finanzas</option>
                            <option name="adm">Administracion</option>
                            <option name="pack">Paqueteria</option>
                            <option name="qc">Control de Calidad</option>
                            <option name="secret">Secretario/a</option>
                        </select>   
                    </th>
                </tr>
            </thead>
    </table>
</div>
<div class="col-1">
  <div class="container col"><button type="submit" class="btn btn-success btn-lg mt-4" value="buscar">Buscar</button></div>  
</div>


<?php 
$query2 = "SELECT * FROM form_empleados";
    
    if ($_POST['filtro_sexo'] != ''){ 
        $query2 .= " WHERE sexo = '".$_POST['filtro_sexo']."'"; 
    }

    if ($_POST['filtro_cargo'] != ''){ 
        $query2 .= " OR cargo = '".$_POST['filtro_cargo']."'"; 
    }

    if ($_POST['filtro_area'] != ''){ 
        $query2 .= " OR area = '".$_POST['filtro_area']."'"; 
    }
    $sql = $conn->query($query2);
    $cant = mysqli_num_rows($sql);
?>
<p>Se encontraron <?php echo $cant; ?> registros</p>
</form>    


<div class="container">
    <div class="row">        
        <div class=".col-6 .col-md-4">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>RUT</th>
                        <th>NOMBRE</th>
                        <th>SEXO</th>
                        <th>CARGO</th>
                        <th>AREA/DEPARTAMENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM form_empleados";
                    
                    $result_tasks = mysqli_query($conn, $query2);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['rut']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['sexo']?></td>
                            <td><?php echo $row['cargo']?></td>
                            <td><?php echo $row['area']?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>   
            </table>
        </div>
    </div>
</div>        

<?php include_once("../headers-footers/footer.php");?>