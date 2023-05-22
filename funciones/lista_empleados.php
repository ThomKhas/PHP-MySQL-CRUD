<?php include_once("../database/db.php");

if (!isset($_SESSION['rol'])){
    header("Location: ../login-signup/login.php");
}else{
    if($_SESSION['rol'] != 2){
        header("Location: ../login-signup/login.php");
    }
}
?>
<?php include_once("../headers-footers/header_rrhh.php");?>      
<div class="container p-4">
    <h1>LISTA DE TRABAJADORES</h1>
</div>      
<div class="container">
    <div class="row">        
        <div class=".col-6 .col-md-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>NOMBRE</th>
                        <th>SEXO</th>
                        <th>CARGO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM form_empleados";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['rut']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['sexo']?></td>
                            <td><?php echo $row['cargo']?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>   
            </table>
        </div>
    </div>
</div>        

<?php include_once("../headers-footers/footer.php");?>