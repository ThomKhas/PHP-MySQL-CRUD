<?php
    session_start();
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'yuri';
  
    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    }
    
    $message = '';
    
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['id_rol'])) {
        $sql = "INSERT INTO usuarios (username, password, id_rol) VALUES (:username, :password, :id_rol)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':id_rol', $_POST['id_rol']);

        if ($stmt->execute()) {
            $message = 'Usuario creado exitosamente';
        } else {
            $message = 'Error al crear usuario';
        }
    }
?>

<?php include_once("../headers-footers/header_signup.php");?>

<?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h1>Registro de Usuario</h1>
                <form action="#" method="POST">
                    <input type="text" class="form-control m-1" name="username" placeholder="Ingrese su usuario">
                    <input type="password" class="form-control m-1" name="password" placeholder="Ingrese su contraseña">
                    <input type="password"  class="form-control m-1" name="id_rol" placeholder="Rol de Empleado">
                    <input type="submit" class="btn btn-success btn-block m-1 form-control" name="signup" value="Ingresar">
                </form>
            </div>
        </div>
    </div>            
</div>
<?php include_once("../headers-footers/footer.php");?>