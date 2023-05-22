<?php 

    class Database{

    private $server;
    private $db;
    private $user;
    private $password;
    private $charset;
    
    public function __construct(){
        $this->server = 'localhost';
        $this->db = 'yuri';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
        
    }
    
    function connect(){
        try{
            $connection = "mysql:host=" . $this->server . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());


        }}}
    session_start();

    // if(isset($_GET['cerrar_sesion'])){
    //     session_unset();
    //     session_destroy(); 
    // }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: ../opc_admin/login_opc_admin.php');
            break;

            case 2:
                header('location: ../opc_rrhh/login_opc_rrhh.php');
            break;

            case 3:
                header('location: ../opc_emp/login_opc_emp.php');
            break;

            default:
        }
    }

    if(isset($_POST['rut']) && isset($_POST['clave_acceso'])){
        $rut = $_POST['rut'];
        $clave_acceso = $_POST['clave_acceso'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM form_empleados WHERE rut = :rut AND clave_acceso = :clave_acceso');
        $query->execute(['rut' => $rut, 'clave_acceso' => $clave_acceso]);
        
        $row = $query->fetch(PDO::FETCH_NUM);

        
        if($row == true){
            
                $rol = $row[16];

                $_SESSION['rol'] = $rol;

                switch($_SESSION['rol']){
                    case 1:
                        echo "Bienvenido Administrador";
                        header('location: ../opc_admin/login_opc_admin.php');

                    break;
        
                    case 2:
                        echo "Bienvenido RRHH";
                        header('location: ../opc_rrhh/login_opc_rrhh.php');
                    break;
        
                    case 3:
                        echo "Bienvenido Empleado";
                        header('location: ../funciones/lista_edit_emp.php');
                    break;
        
                    default:
                }
            }else{
                // no existe el usuario
                echo "Nombre de usuario o contraseña incorrecto";
            }
        }
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Yuri</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/bdd48295dc.js" crossorigin="anonymous"></script>
    
    
    
    <script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita el envío del formulario por defecto

    // Obtén los valores de los campos de entrada
    var rut = document.getElementById("rut").value;
    var pass = document.getElementById("pass").value;

    // Realiza una petición AJAX para enviar los datos a la primera página
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("username=" + encodeURIComponent(rut) + "&password=" + encodeURIComponent(pass));

    // Redirige al usuario a la segunda página
    window.location.href = "../funciones/lista_edit_emp.php";
  });
    </script>
    
    
    <link rel="stylesheet" src="../index.css">
    

</head>
<body>


<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container col-8">
        <a href="../funciones/lista_empleados.php" class="navbar-brand">
        <i class="fa-sharp fa-solid fa-h3" style="color: #ffffff;">El Correo de Yuri</i>
        </a>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h1>Inicio de Sesion</h1>
                <form action="#" method="POST" id="myForm">
                    <input type="text" id="rut" name="rut" class="form-control m-1" placeholder="Ingrese su RUT, sin puntos, con guion">
                    <input type="password" id="pass" class="form-control m-1" name="clave_acceso" placeholder="Ingrese su contraseña">
                    <input type="submit"  class="btn btn-success btn-block m-1 form-control" name="login" value="Ingresar">
                </form>
            </div>
        </div>   
    </div>
</div>
<?php include_once("../headers-footers/footer.php");?>