<?php
//CONECTAR EL INDEX
require_once "conex.php";
if(isset($_GET["IdEmpleado"]) && !empty(trim($_GET["IdEmpleado"]))){
$gato =$_GET["IdEmpleado"];
if(isset($_GET["SI"])){
    echo "entro al if de lala: "."<br>";
    if(isset($_GET["IdEmpleado"]) && !empty(trim($_GET["IdEmpleado"]))){
        $gato =$_GET["IdEmpleado"];
        echo "entro al delete: "."<br>";
        
        //ELIMINAR REGISTRO DE LA TABLA DEDUCCIONES
        $sqldedu = "DELETE FROM deducciones WHERE IdEmpleado = $gato";
        $exito = mysqli_query($con,$sqldedu);
        
        //ELIMINAR REGISTRO DE LA TABLA DEVENGADO
        $sqldeve = "DELETE FROM devengado WHERE IdEmpleado = $gato";
        $exito1 = mysqli_query($con,$sqldeve);
        
        //ELIMINAR REGISTRO DE LA TABLA CONTRATO
        $sqlcontra = "DELETE FROM contrato WHERE IdEmpleado = $gato";
        $exito2 = mysqli_query($con,$sqlcontra);
        
        //ELIMINAR REGISTRO DE LA TABLA CUENTA
        $sqlcuent = "DELETE FROM cuentas WHERE IdEmpleado = $gato";
        $exito3 = mysqli_query($con,$sqlcuent);
        
        //ELIMINAR REGISTRO DE LA TABLA APROPIACIONES
        $sqlapro = "DELETE FROM apropiaciones WHERE IdEmpleado = $gato";
        $exito4 = mysqli_query($con,$sqlapro);
        
        //ELIMINAR REGISTRO DE LA TABLA JORNADA TRABAJADA
        $sqljor = "DELETE FROM jornadatrabajada WHERE IdEmpleado = $gato";
        $exito5 = mysqli_query($con,$sqljor);
        
        //ELIMINAR REGISTRO DE LA TABLA TELEFONO
        $sqltele = "DELETE FROM telefono WHERE IdEmpleado = $gato";
        $exito6 = mysqli_query($con,$sqltele);
        
        
        //ELIMINAR REGISTRO DE LA TABLA EMPLEADO
        $sqlemple = "DELETE FROM empleado WHERE IdEmpleado = $gato";
        $exito7 = mysqli_query($con,$sqlemple);
        }
        header("location: index.php");
        exit();
}elseif(isset($_GET["NO"])){
    header("location: index.php");
        exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Eliminar registro</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="IdEmpleado" value="<?php echo trim($_GET["IdEmpleado"]); ?>"/>
                            <p>Está seguro que deseas borrar el registro</p><br>
                            <p>
                                <input type="submit" value="SI" name="SI" class="btn btn-danger">
                                <a href="index.php" name="NO" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>