<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'proyecto_nomin');
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$Nombre1 = $Nombre2 = $apellido1 = $apellido2 = $correo = $cedula = $salario = $numerocontrato = $tipocargo = $cuenta = $banco = $telefono = $horas = "";
$nombre1_error = $nombre2_error = $apellido1_error = $apellido2_error = $cedula_error = $correo_error = $banco_error = "";
$salario_error = $nrocuenta_error = $nrocontrato_error= $cargo_error = $telefono_error = $jornada_error = $horas_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // VALIDACIÓN NOMBRE1
    $input_nombre1 = trim($_POST['nombre1']); 
    echo $input_nombre1;
    if(empty($input_nombre1)){
        $nombre1_error ="Por favor ingrese el nombre del empleado.";
    }elseif(!filter_var($input_nombre1,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre1_error = "por favor ingrese un nombre valido. ";
    }else{
        $Nombre1 = $input_nombre1;
    }
}
$sqlmes ="SELECT IdMes, Mes FROM aux_mes";
    $meses = mysqli_query($con,$sqlmes);
    echo $sqlmes;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pruebayerror</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1300px;
            margin: 0 auto;
        }
    </style>
</head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="page-header">
                    <h1 class="form-group text-center">Agregar Empleados</h1>
                </div>
                    <p>Favor diligenciar el siguiente formulario, para agregar el empleado.</p>
                <div class="row"> 
                    <div class="col-md-4"><!--AMCHO DE CAJONES DE -->
                        <div class="jumbotron">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">  
                                <!-- ESPACIO primer nombre-->
                            <div class="form-group <?php echo (!empty($nombre1_error)) ? 'has-error' :''; ?>">
                                    <label for="PrimerNombre">Primer Nombre</label>
                                    <input id="PrimerNombre" type="text" name="nombre1" class="form-control" value="<?php echo $Nombre1;?>">
                                    <span class="help-block"><?php echo $nombre1_error; ?> </span>
                            </div>
                                <!-- ESPACIO SEGUNDO NOMBRE -->
                            <div class="form-group <?php echo (!empty($nombre2_error)) ? 'has-error' :''; ?>">
                                    <label for="Segundo_Nombre">Segundo Nombre</label>
                                    <input id="Segundo_Nombre" type="Text" name="nombre2" class="form-control" value="<?php echo $Nombre2;?>">
                                    <span class="help-block"> <?php echo $nombre2_error; ?> </span>
                            </div>
                                <!-- ESPACIO PRIMER APELLIDO -->
                            <div class="form-group <?php echo (!empty($apellido1_error)) ? 'has-error' :''; ?>">
                                    <label for="Primer_Apellido">Primer apellido</label>
                                    <input id="Primer_Apellido"type="Text" name="apellido1" class="form-control" value="<?php echo $apellido1; ?>">
                                    <span class="help-block"> <?php echo $apellido1_error; ?> </span>
                            </div>
                                <!-- ESPACIO SEGUNDO APELLIDO -->
                            <div class="form-group <?php echo (!empty($apellido2_error)) ? 'has-error' :''; ?>">
                                    <label for="Segundo_Apellido">Segundo apellido</label>
                                    <input id="Segundo_Apellido" type="Text" name="apellido2" class="form-control" value="<?php echo $apellido2; ?>">
                                    <span class="help-block"> <?php echo $apellido2_error; ?> </span>
                            </div>
                                <!-- ESPACIO CEDULA -->
                            <div class="form-group <?php echo (!empty($cedula_error)) ? 'has-error' :''; ?>">
                                    <label for="Cedula">Cedula</label>
                                    <input id="Cedula" type="text" name="Cedula" class="form-control" value="<?php echo $cedula; ?>">
                                    <span class="help-block"> <?php echo $cedula_error; ?> </span>
                            </div>
                                <!-- ESPACIO CORREO -->
                            <div class="form-group <?php echo (!empty($correo_error)) ? 'has-error' :''; ?>">
                                    <label for="Correo">Correo</label>
                                    <input id="Correo" type="email" name="Correo" class="form-control" value="<?php echo $correo; ?>">
                                    <span class="help-block"> <?php echo $correo_error; ?> </span>
                            </div>
                                <!-- ESPACIO TELEFONO-->
                            <div class="form-group <?php echo (!empty($telefono_error)) ? 'has-error' :''; ?>">
                                    <label for="telefono">Telefono</label>
                                    <input id="telefono" type="tel" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
                                    <span class="help-block"> <?php echo $telefono_error; ?> </span>
                            </div>
                            <div class="row">
                        </div>         
                    </div>  
                </div> 
                <div class="row"> 
                    <div class="col-md-4"><!--AMCHO DE CAJONES DE -->
                        <div class="jumbotron">  
                                <!-- ESPACIO BANCO -->
                            <div class="form-group <?php echo (!empty($banco_error)) ? 'has-error' :''; ?>">
                                    <label for="Banco">Banco</label>
                                    <input id="Banco" type="text" name="Banco" class="form-control" value="<?php echo $banco; ?>" >
                                    <span class="help-block"> <?php echo $banco_error; ?> </span>
                            </div> 
                                <!-- ESPACIO NUMERO CUENTA-->
                            <div class="form-group <?php echo (!empty($nrocuenta_error)) ? 'has-error' :''; ?>">
                                    <label for="nrocuenta">N° cuenta bancaria</label>
                                    <input id="nrocuenta" type="text" name="nrocuenta" class="form-control" value="<?php echo $cuenta; ?>" > 
                                    <span class="help-block"> <?php echo $nrocuenta_error; ?> </span>
                            </div>
                                <!-- ESPACIO NUMERO CONTRATO -->
                            <div class="form-group <?php echo (!empty($nrocontrato_error)) ? 'has-error' :''; ?>">
                                    <label for="Numero_Contrato">N° Contrato</label>
                                    <input id="Numero_Contrato" type="text" name="Numerocontrato" class="form-control" value="<?php echo $numerocontrato; ?>">
                                    <span class="help-block"> <?php echo $nrocontrato_error; ?> </span>
                            </div>
                                <!-- ESPACIO TIPO CARGO -->
                            <div class="form-group <?php echo (!empty($cargo_error)) ? 'has-error' :''; ?>">
                                    <label for="TipoCargo">Cargo del empleado</label>
                                    <input id="TipoCargo" type="text" name="TipoCargo" class="form-control" value="<?php echo $tipocargo; ?>">
                                    <span class="help-block"> <?php echo $cargo_error; ?> </span>
                            </div>
                                <!-- ESPACIO SALARIO -->
                            <div class="form-group <?php echo(!empty($salario_error)) ? 'has-error': ''; ?>">
                                    <label for="Salario">Salario</label>
                                    <input id="Salario" type="text" name="Salario" class="form-control" value="<?php echo $salario;?>">
                                    <span class="help-block"> <?php echo $salario_error; ?> </span>
                            </div>
                                <!--ESPACIO MESES-->
                            <div class="form-group <?php echo(!empty($mes_error)) ? 'has-error': ''; ?>">
                                <label for="meses1">Indique el mes de nomina</label><br>
                                    <select id="meses1"name="mesesitos" class="form-control">
                                        <option selected disabled>Seleccione un mes</option>
                                            <?php 
                                                while($mes = mysqli_fetch_array($meses))
                                                { 
                                            ?>
                                        <option value="<?php echo $mes['IdMes']?>"> <?php echo $mes['Mes']?> </option>
                                            <?php
                                                }
                                            ?> 
                                    </select>
                                        <span class="help-block"> <?php echo $jornada_error; ?> </span>
                            </div>
                                <!-- ESPACIO JORNADA TRABAJADA -->
                            <div class="form-group <?php echo(!empty($jornada_error)) ? 'has-error': ''; ?>">
                                <label for="jornada">Jornadas extras trabajadas</label><br>
                                <select id="jornada"name="jornada" class="form-control">
                                        <option selected disabled>Seleccione una jornada</option>
                                            <?php 
                                                while($jorna = mysqli_fetch_array($jornada))
                                                { 
                                             ?>
                                        <option value="<?php echo $jorna['IdJornada']?>"> <?php echo $jorna['TipoJornada']?> </option>
                                            <?php
                                            }
                                            ?> 
                                </select>
                                    <span class="help-block"> <?php echo $jornada_error; ?> </span>
                            </div>
                                <!-- ESPACIO HORAS -->
                            <div class="form-group <?php echo(!empty($horas_error)) ? 'has-error': ''; ?>">
                                    <label for="horas">Horas extras</label>
                                    <input id="horas" type="text" name="horas" class="form-control" value="<?php echo $horas;?>">
                                    <span class="help-block"> <?php echo $horas_error; ?> </span>
                            </div>
                        </div>         
                    </div>  
                </div> 
                <input type="submit" class="btn btn-primary text-center" name="Enviar"></input>
                <a href="create.php" class="btn btn-default">Cancelar</a>
                </form> 
            </div>
        </div>
    </body>
</html>
<a href="create.php" class="btn btn-default text-center">Cancelar</a>
while($jaja = mysqli_fetch_array($pasaridtelefon)){ 
                echo $jaja["ID"];
            }
            //  QUERY PARA PASAR LLAVE PRIMARIA A FORANEA A LAS DEMAS TABLAS
$pasaridcontrato = "SELECT MAX(IdEmpleado) FROM empleado";
$pasaridtelefono = "SELECT MAX(IdEmpleado) FROM empleado";
$pasaridcuentas = "SELECT MAX(IdEmpleado) FROM empleado";
$pasaridjornadat = "SELECT MAX(IdEmpleado) FROM empleado";
$pasariddeducciones = "SELECT MAX(IdEmpleado) FROM empleado";
$pasariddevengado = "SELECT MAX(IdEmpleado) FROM empleado";
$pasaridapropiaciones = "SELECT MAX(IdEmpleado) FROM empleado";
/*mysqli_query($con,$pasaridtelefono);
mysqli_query($con,$pasaridcuentas);
mysqli_query($con,$pasaridjornadat);
mysqli_query($con,$pasariddeducciones);
mysqli_query($con,$pasariddevengado);
mysqli_query($con,$pasaridapropiaciones);*/

if($input_horas === 0){
                echo "el salario en horas0 es: ".$salario."<br>";
                $ho= $salario / 240;
                echo "el valor de la hora ordinaria es: ".$ho."<br>";
                echo "LAS HORAS INGRESANDAS SON: ".$input_horas."<br>";
                echo "ENTRO A HORAS"."<br>";
                $hed = 0;
                deducciones($hed, $salario,$con,$idemp,$input_mes);
                apropiaciones($hed,$salario,$salariototal,$con,$idemp,$input_mes);
                $sqljorna="INSERT INTO jornadatrabajada(IdEmpleado,IdJornada,IdMes,CantidadHoras)VALUES(?,?,?,?);";
                    if($stmjor = mysqli_prepare($con, $sqljorna)){
                        mysqli_stmt_bind_param($stmca,"iiii",$paramid,$paramjor,$param_mes,$paramhor);
                        $paramid = $idemp;
                        $paramjor = $jorn;
                        $param_mes = $me = $_POST["mesesitos"];
                        $paramhor = $input_horas;
                        mysqli_stmt_execute($stmjor);
                    }
                    //mysqli_stmt_close($stmca);
                }