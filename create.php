<?php
//......................................ARCHIVO DE CONEXION CON LA BASE DE DATOS.................................\\
require_once "conex.php";
//...............................VARIABLES INCIADAS EN VACIO....................................................\\
$Nombre1 = $Nombre2 = $apellido1 = $apellido2 = $correo = $cedula = $salario = $numerocontrato = $tipocargo = $cuenta = $banco = $telefono = $horas = "";
$nombre1_error = $nombre2_error = $apellido1_error = $apellido2_error = $cedula_error = $correo_error = $banco_error = "";
$salario_error = $nrocuenta_error = $nrocontrato_error= $cargo_error = $telefono_error = $jornada_error = $horas_error = "";
/*-------------------------INICIO VALIDACIONES DE CAMPO------------------------------------------------*/
if($_SERVER["REQUEST_METHOD"] == "POST"){
//............................................. VALIDACIÓN NOMBRE1...............................................\\
    $input_nombre1 = trim($_POST['nombre1']); 
    if(empty($input_nombre1)){
        $nombre1_error ="Por favor ingrese el nombre del empleado.";
    }elseif(!filter_var($input_nombre1,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre1_error = "por favor ingrese un nombre valido. ";
    }else{
        $Nombre1 = $input_nombre1;
    }
//..........................................VALIDACIÓN NOMBRE 2....................................................\\
    $input_nombre2 = trim($_POST["nombre2"]);
    if(empty($input_nombre2)){
        $nombre2_error ="Por favor ingrese el nombre del empleado.";
    }elseif(!filter_var($input_nombre2,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre2_error = "por favor ingrese un nombre valido. ";
    }else{
        $Nombre2 = $input_nombre2;
    }
//..........................................VALIDACIÓN APELLIDO PATERNO...........................................\\
    $input_apellido1 = trim($_POST["apellido1"]); 
    if(empty($input_apellido1)){
        $apellido1_error ="Por favor ingrese el primer apellido del empleado.";
    }elseif(!filter_var($input_apellido1,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $apellido1_error = "por favor ingrese un apellido valido. ";
    }else{
        $apellido1 = $input_apellido1;
    }
//.........................................VALIDACIÓN APELLIDO MATERNO..........................................\\
    $input_apellido2 = trim($_POST["apellido2"]); 
    if(empty($input_apellido2)){
        $apellido2_error ="Por favor ingrese el segundo apellido del empleado.";
    }elseif(!filter_var($input_apellido2,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $apellido2_error = "por favor ingrese un apellido valido. ";
    }else{
        $apellido2 = $input_apellido2;
    }
//.............................................VALIDACIÓN CEDULA.................................................\\
    $input_cedula = trim($_POST["Cedula"]);
    $vace = "SELECT * FROM empleado WHERE Cedula = '$input_cedula';";
    $vce = mysqli_query($con,$vace);
    if(empty($input_cedula)){
        $cedula_error = "Por favor ingrese la cedula del empleado.";     
    }elseif(!ctype_digit($input_cedula)){
        $cedula_error = "Por favor ingrese un valor correcto y positivo.";
    }elseif($vcc2 = $vce->num_rows > 0){
        $cedula_error = "ESTE NUMERO DE CEDULA YA EXISTE";
    }else{
        $cedula = $input_cedula;
    }
//.......................................VALIDACIÓN CORREO.....................................................\\
    $input_correo = trim($_POST["Correo"]); 
    $vaco = "SELECT * FROM empleado WHERE Correo = '".$input_correo."';";
    $vco = mysqli_query($con,$vaco);
    if(empty($input_correo)){
        $correo_error ="Por favor ingrese el correo del empleado.";
    }elseif(!filter_var($input_correo,FILTER_VALIDATE_EMAIL)){
        $correo_error = "por favor ingrese un correo valido. ";
    }elseif($vcc3 = $vco ->num_rows){
        $correo_error = "ESTE CORREO YA ESTA REGISTRADO";
    }else{
        $correo = $input_correo;
    }
//..........................................VALIDACIÓN TELEFONO.............................................\\
    $input_telefono = trim($_POST["telefono"]);
    $vate = "SELECT * FROM telefono WHERE Telefono = '$input_telefono';";
    $vte = mysqli_query($con,$vate);
    if(empty($input_telefono)){
        $telefono_error = "Por favor ingrese el telefono del empleado.";     
    } elseif(!ctype_digit($input_telefono)){
        $telefono_error = "Por favor ingrese un valor correcto y positivo.";
    }elseif($vcte = $vte->num_rows > 0){
        $telefono_error = "ESTE NUMERO DE TELEFONO YA SE ENCUENTRA REGISTRADO";
    }
    else{
        $telefono = $input_telefono;
    }
//............................................VALIDACIÓN BANCO.....................................\\
    $input_banco = trim($_POST["Banco"]); 
    if(empty($input_banco)){
        $banco_error ="Por favor ingrese el banco del empleado.";
    }elseif(!filter_var($input_banco,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $banco_error = "por favor ingrese un banco valido. ";
    }else{
        $banco = $input_banco;
    }
//.................................VALIDACIÓN NUMERO DE CUENTA....................................\\
    $input_nrocuenta = trim($_POST["nrocuenta"]);
    if(empty($input_nrocuenta)){
        $nrocuenta_error = "Por favor ingrese el N° de cuenta del empleado.";     
    } elseif(!ctype_digit($input_nrocuenta)){
        $nrocuenta_error = "Por favor ingrese un valor de N° de cuenta, correcto y positivo.";
    } else{
        $cuenta = $input_nrocuenta;
    }
//.............................VALIDACIÓN NUMERO DE CONTRATO.................................\\
    $input_nrocontrato = trim($_POST["Numerocontrato"]);
    $vc = "SELECT * FROM contrato WHERE IdContrato = '$input_nrocontrato';";
    $vcc = mysqli_query($con,$vc);
    if(empty($input_nrocontrato) or $input_nrocontrato === 0){
        $nrocontrato_error = "Por favor ingrese el N° de contrato del empleado.";     
    }elseif(!ctype_digit($input_nrocontrato)){
        $nrocontrato_error = "Por favor ingrese un valor de N° de contrato, correcto y positivo.";
    }elseif($vcc1= $vcc->num_rows > 0){
        $nrocontrato_error = "ESTE NUMERO DE CONTRATO YA EXISTE";
    }else{
        $numerocontrato = $input_nrocontrato;
    }
//.............................................VALIDACIÓN TIPOCARGO.............................\\
    $input_cargo = trim($_POST["TipoCargo"]); 
    if(empty($input_cargo)){
        $cargo_error ="Por favor ingrese el cargo del empleado.";
    }elseif(!filter_var($input_cargo,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cargo_error = "por favor ingrese un cargo valido. ";
    }else{
        $input_cargo = $input_cargo;
    }
//.......................................VALIDACIÓN SALARIO...........................................\\
    $input_salario = trim($_POST["Salario"]);
    if(empty($input_salario)|| $input_salario === 0){
        $salario_error = "Por favor ingrese el monto del salario del empleado.";     
    } elseif(!ctype_digit($input_salario)){
        $salario_error = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $salario = $input_salario;
    }
//..............................................VALIDACIÓN JORNADA EXTRA TRABAJADA....................................\\
    $input_jornada = isset($_POST["jornada"]);
    if(empty($input_jornada)){
        $jornada_error = "Por favor ingrese la jornada que realizo el empleado.";     
    }else{
        $input_jornada = $input_jornada;
    }
//......................................VALIDACIÓN MESES...........................................//
    $input_mes = isset($_POST["mesesitos"]);
    if(empty($input_mes)){
        $mes_error = "Por favor ingrese el mes de nomina.";     
    }else{
        $input_mes = $input_mes;
    }
//.....................................VALIDACIÓN HORAS EXTRAS.......................................//
    $input_horas = trim($_POST["horas"]);
    echo "LAS HORAS INGRESANDAS SON: ".$input_horas."<br>";
    if($input_horas < 0 || $input_horas == "   "){
        $horas_error = "Por favor ingrese la cantidad de horas extras";     
    }elseif(!ctype_digit($input_horas)||  $input_horas < 0){
        $horas_error = "Por favor ingrese un valor correcto y positivo.";
    }else{
        $horas = $input_horas;
    }
}/*<----------------------------------------------FIN VALIDACION DE DATOS------------------------------------------------------->*/ 
$sqlmes ="SELECT IdMes, Mes FROM aux_mes";
$meses = mysqli_query($con,$sqlmes);
$sqljornada="SELECT IdJornada, TipoJornada FROM jornadas"; 
$jornada = mysqli_query($con,$sqljornada);

function pasarid($con){
$pasaridtelefono = "SELECT MAX(IdEmpleado) AS ID FROM empleado";
    $pasaridtele = mysqli_query($con, $pasaridtelefono);
    while($tele = mysqli_fetch_array($pasaridtele)){ 
        echo $tele["ID"];
        $asig = $tele["ID"];
    }
    return $asig;
}
function pasarcar($con){
    $pasaridcargo = "SELECT MAX(IdCargo) AS IDC  FROM cargo";
        $pasaridcar = mysqli_query($con, $pasaridcargo);
        while($car = mysqli_fetch_array($pasaridcar)){ 
            //echo " la variable car es: ".$car["IDC"];
            //echo "LEL ULTIMO DENTRO DE LA FUNCION ID DE CARGO REGISTRADO ES: ".$car["IDC"]."<br>";
            $carg = $car["IDC"];
            //echo "carg es: ".$carg."<br>";
        }
        return $carg;
    }
$idcar = pasarcar($con);
//echo "LEL ULTIMO ID DE CARGO REGISTRADO ES: ".$idcar."<br>";
$idemp = pasarid($con);
//<----------------------            INSERCION DE DATOS     --------------------->
if(empty($nombre1_error) && empty($nombre2_error) && empty($apellido1_error) && empty($apellido2_error)&& empty($cedula_error)&&empty($correo_error) && empty($telefono_error) && empty($banco_error) && empty($nrocuenta_error) && empty($nrocontrato_error)&&empty($cargo_error) && empty($salario_error) && empty($jornada_error) && empty($mes_error) && empty($horas_error)){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //INSERCION DATOS EMPLLEADO
        if(empty($nombre1_error) && empty($nombre2_error) && empty($apellido1_error)&& empty($apellido2_error)&& empty($cedula_error)&& empty($correo_error)){
            $sqlempleado = "INSERT INTO empleado(Nombre1,Nombre2,Apellido1,Apellido2,Correo,Cedula)
            VALUES(?,?,?,?,?,?);";
            if($stmt = mysqli_prepare($con, $sqlempleado)){
                mysqli_stmt_bind_param($stmt, "sssssi", $param_nombre1, $param_nombre2, $param_apellido1, $param_apellido2, $param_correo, $param_cedula);
                $param_nombre1 = $Nombre1;
                $param_nombre2 = $Nombre2;
                $param_apellido1 = $apellido1;
                $param_apellido2 = $apellido2;
                $param_correo = $correo;
                $param_cedula = $cedula;
                $a = mysqli_stmt_execute($stmt);
            }else{
                echo "Something went wrong. Please try again later.";
            }
        }
        //INSERCION CARGO DEL EMPLEADO
        if(empty($cargo_error)){
            $sqlcargo="INSERT INTO cargo(TipoCargo)VALUES(?);";
            if($stmca = mysqli_prepare($con, $sqlcargo)){
                mysqli_stmt_bind_param($stmca,"s",$param_cargo);
                $param_cargo = $tipocargo = $_POST["TipoCargo"];
                $b = mysqli_stmt_execute($stmca);
            }
        }
        //INSERCION TELEFONO EMPLEADO
        if(empty($telefono_error)){
            $idemp = pasarid($con);
            $sqltelefono = "INSERT INTO telefono(IdEmpleado,Telefono) VALUES (?,?);";
            if($stmte = mysqli_prepare($con, $sqltelefono)){
                mysqli_stmt_bind_param($stmte,"ii",$paramid, $param_telefono);
                $paramid = $idemp;                
                $param_telefono = $telefono;
                $c = mysqli_stmt_execute($stmte);
            }
        }
        //INSERCION DATOS BANCARIOS EMPLEADO
        if(empty($banco_error)&&empty($nrocuenta_error)){
            $idemp = pasarid($con);
            $sqlcuentas = "INSERT INTO cuentas(IdEmpleado,Banco,NumeroCuenta) VALUES (?,?,?);";
            if($stmcu = mysqli_prepare($con, $sqlcuentas)){
                mysqli_stmt_bind_param($stmcu,"isi",$paramid,$param_banco, $param_nrocuenta);
                $paramid = $idemp;
                $param_banco = $banco;
                $param_nrocuenta = $cuenta;
                $d = mysqli_stmt_execute($stmcu);
            }
        }
        //INSERCION DATOS DE CONTRATO DEL EMPLEADO
        if(empty($nrocontrato_error)){
            $idcar = pasarcar($con);
            $idemp = pasarid($con);
            $sqlcontrato="INSERT INTO contrato(IdContrato,IdCargo,IdEmpleado)VALUES(?,?,?);";
            if($stmco = mysqli_prepare($con, $sqlcontrato)){
                mysqli_stmt_bind_param($stmco,"iii",$param_nrocontrato,$paramcar,$paramid);
                $paramcar = $idcar;
                $paramid = $idemp; 
                $param_nrocontrato = $numerocontrato;
                $e = mysqli_stmt_execute($stmco);
            }
        }
        //INSERCION SALARIO DEL EMPLEADO
        if(empty($salario_error)&& empty($mes_error)){
            if($input_salario <= 2000000){
                $auxtrans = 172172;
                $idcar = pasarcar($con);
                $idemp = pasarid($con);
                $sqldevengado="INSERT INTO devengado(IdEmpleado,IdContrato,Salario,AuxTrans,IdMes)VALUES(?,?,?,?,?);"; 
                if($stmsa = mysqli_prepare($con, $sqldevengado)){
                    mysqli_stmt_bind_param($stmsa,"iiiii",$paramid,$param_nrocontrato,$param_salario,$param_auxtrans, $param_mes);
                    $paramid = $idemp;
                    $param_nrocontrato = $numerocontrato;
                    $param_salario = $salario;
                    $param_auxtrans = $auxtrans;
                    $param_mes = $me = $_POST["mesesitos"];
                    $saux = $salario+$auxtrans;
                    echo "el salario base es: ".$saux."<br>";
                    $f = mysqli_stmt_execute($stmsa);
                }
            }else{
                $idcar = pasarcar($con);
                $idemp = pasarid($con);
                $auxtrans = 0;
                $sqldevengado="INSERT INTO devengado(IdEmpleado,IdContrato,Salario,AuxTrans,IdMes)VALUES(?,?,?,?,?);"; 
                if($stmsa = mysqli_prepare($con, $sqldevengado)){
                    mysqli_stmt_bind_param($stmsa,"iiiii",$paramid,$param_nrocontrato,$param_salario,$param_auxtrans, $param_mes);
                    $paramid = $idemp;
                    $param_nrocontrato = $numerocontrato;
                    $param_salario = $salario;
                    $param_auxtrans = $auxtrans;
                    $param_mes = $me = $_POST["mesesitos"];
                    $saux = $salario+$auxtrans;
                    echo "el saux es: ".$saux."<br>";
                    $f = mysqli_stmt_execute($stmsa);
                }
            }
        }
        //FUNCION QUE ME CALCULA EL DEVENGADO\\
        function deducciones($hed, $salario,$con,$idemp,$me){
            $me = $_POST["mesesitos"];
            $idemp = pasarid($con);
            $salud = ($hed + $salario)*0.04;
            echo "EL VALOR DE LA PENSION Y LA SALUD ES: ".$salud."<br>";
            $sqldeduc = "INSERT INTO deducciones(IdEmpleado,SaludEmpl,PensionEmpl,IdMes) VALUES($idemp,$salud, $salud,$me)";
            mysqli_query($con,$sqldeduc);
        }
        //FUNCION QUE ME CALCULA LAS APROPIACIONES\\
        function apropiaciones($hed, $salario,$salariototal,$con,$idemp,$me){
            $me = $_POST["mesesitos"];
            $saemp = ($salario + $hed) * 0.085;
            echo "LA SALUD PAGA POR LA EMPRESA ES: ".$saemp."<br>";
            $penemp = ($salario + $hed) * 0.012;
            echo "LA pension PAGA POR LA EMPRESA ES: ".$penemp."<br>";
            $arlemp = ($salario + $hed) * 0.00522;
            echo "LA arl PAGA POR LA EMPRESA ES: ".$arlemp."<br>";
            $sena = $salariototal * 0.04;
            echo "el sena PAGAdo POR LA EMPRESA ES: ".$sena."<br>";
            $cajacomp = $salariototal * 0.02;
            echo "LA cajadecomp PAGAda POR LA EMPRESA ES: ".$cajacomp."<br>";
            $icbf = $salariototal * 0.03;
            echo "el icbf PAGAdo POR LA EMPRESA ES: ".$icbf."<br>";
            $idemp = pasarid($con);
            $sqlapropia="INSERT INTO apropiaciones (IdEmpleado,Pension,Salud,ARL,Sena,ICBF,Caja_Compen,IdMes) VALUES ($idemp,$penemp,$saemp,$arlemp,$sena,$icbf,$cajacomp,$me)";
            mysqli_query($con,$sqlapropia);
        }
        //VALIDACION DE JORNADAS Y HORAS EXTRAS DEL EMPLEADO\\
        if(empty($jornada_error)&& empty($horas_error)){
            echo "LAS HORAS INGRESANDAS en la insercion SON: ".$input_horas."<br>";
            if($input_horas != 0){
                echo "el salario ingresado es: ".$salario."<br>";
                $ho= $salario / 240;
                echo "el valor de la hora ordinaria es: ".$ho."<br>";
                switch ($jorn = $_POST["jornada"]){
                    case 1:// HORA EXTRA DIURNA
                            echo "usted selecciono la jornada: ".$jorn."<br>";
                            $hed= ($ho*1.25) * $input_horas;
                            echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$hed."<br>";
                            deducciones($hed, $salario,$con,$idemp,$me);
                            $salariototal = $hed + $saux;
                            echo "EL SALARIO TOTAL ES: horas extras mas salario: ".$salariototal."<br>";
                            apropiaciones($hed,$salario,$salariototal,$con,$idemp,$me);
                        break;
                    case 2:// HORA EXTRA NOCTURNA
                            echo "usted selecciono la jornada: ".$jorn."<br>";
                            $hed =($ho*1.75) * $input_horas;
                            echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$hed."<br>";
                            deducciones($hed, $salario,$con,$idemp,$me); 
                            $salariototal = $hed + $saux;
                            echo "EL SALARIO TOTAL ES: horas extras mas salario: ".$salariototal."<br>";
                            apropiaciones($hed,$salario,$salariototal,$con,$idemp,$me);
                        break;
                    case 3://HORA ORDINARIA DOMINICAL FESTIVA
                            echo "usted selecciono la jornada: ".$jorn."<br>";
                            $hed =($ho*1.75) * $input_horas;
                            echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$hed."<br>";
                            deducciones($hed, $salario,$con,$idemp,$me);
                            $salariototal = $hed + $saux;
                            echo "EL SALARIO TOTAL ES: horas extras mas salario: ".$salariototal."<br>";
                            apropiaciones($hed,$salario,$salariototal,$con,$idemp,$me);
                        break;
                    case 4://HORA EXTRA DIURNA DOMINICAL FESTIVA
                            echo "usted selecciono la jornada: ".$jorn."<br>";
                            $hed =($ho*2) * $input_horas;
                            echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$hed."<br>";
                            deducciones($hed, $salario,$con,$idemp,$me);
                            $salariototal = $hed + $saux;
                            echo "EL SALARIO TOTAL ES: horas extras mas salario: ".$salariototal."<br>";
                            apropiaciones($hed,$salario,$salariototal,$con,$idemp,$me);
                        break;
                    case 5://HORA EXTRA NOCTURNA DOMINICAL FESTIVA
                            echo "usted selecciono la jornada: ".$jorn."<br>";
                            $hed =($ho*2.5) * $input_horas;
                            echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$hed."<br>";
                            deducciones($hed, $salario,$con,$idemp,$me);
                            $salariototal = $hed + $saux;
                            echo "EL SALARIO TOTAL ES: horas extras mas salario: ".$salariototal."<br>";
                            apropiaciones($hed,$salario,$salariototal,$con,$idemp,$me);
                        break;
                    case 6://HORA RECARGO NOCTURNA
                            echo "usted selecciono la jornada: ".$jorn."<br>";
                            $hed =($ho*2.5) * $input_horas;
                            echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$hed."<br>";
                            deducciones($hed, $salario,$con,$idemp,$me);
                            $salariototal = $hed + $saux;
                            echo "EL SALARIO TOTAL ES: horas extras mas salario: ".$salariototal."<br>";
                            apropiaciones($hed,$salario,$salariototal,$con,$idemp,$me);
                        break;
                }
                //INSERCION DE JORNADAS Y HORAS EXTRAS\\
                $sqljorna="INSERT INTO jornadatrabajada(IdEmpleado,IdJornada,IdMes,CantidadHoras)VALUES(?,?,?,?);";
                    if($stmjor = mysqli_prepare($con, $sqljorna)){
                         mysqli_stmt_bind_param($stmjor,"iiii",$paramid,$paramjor,$param_mes,$paramhor);
                        $paramid = $idemp;
                        $paramjor = $jorn;
                        $param_mes = $me = $_POST["mesesitos"];
                        $paramhor = $input_horas;
                        $g = mysqli_stmt_execute($stmjor);
                    }           
            }else{
                echo "el salario en horas0 es: ".$salario."<br>";
                $ho= $salario / 240;
                echo "el valor de la hora ordinaria es: ".$ho."<br>";
                echo "LAS HORAS INGRESANDAS SON: ".$input_horas."<br>";
                echo "ENTRO A HORAS"."<br>";
                $hed = 0;
                $me = $_POST["mesesitos"];
                $jorn = 7;
                $salariototal = $hed + $saux;
                deducciones($hed, $salario,$con,$idemp,$input_mes);
                apropiaciones($hed,$salario,$salariototal,$con,$idemp,$input_mes);
                $sqljorna="INSERT INTO jornadatrabajada(IdEmpleado,IdJornada,IdMes,CantidadHoras)VALUES($idemp,$jorn,$me,$input_horas);";
                $h = mysqli_query($con,$sqljorna);
                echo "INSERCION DE JORNADA Y HORAS CORRECTAMENTE";
            }
        }
        if($a && $b && $c && $d && $e && $f && ($g || $h)){
            // Records updated successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
        //CIERRE DE DECLARACIONES\\
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmca);
        mysqli_stmt_close($stmte);
        mysqli_stmt_close($stmcu);
        mysqli_stmt_close($stmco);
        mysqli_stmt_close($stmsa);
        mysqli_stmt_close($stmjor);
    }
    //CIERRE DE CONEXION
    mysqli_close($con);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
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
            <div class="page-header">
                    <h1 class="form-group text-center">Agregar Empleados</h1>
            </div>
            <div class="container-fluid">
                    <p class="text-center">Favor diligenciar el siguiente formulario, para agregar el empleado.</p>
                <div class="row"> 
                    <div class="col-md-4"><!--AMCHO DE CAJONES DE -->
                        <div class="jumbotron" >
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <!-- ESPACIO primer nombre-->
                            <div class="form-group <?php echo (!empty($nombre1_error)) ? 'has-error' :''; ?>">
                                    <label for="PrimerNombre">Primer Nombre</label>
                                    <input id="PrimerNombre" type="text" name="nombre1" placeholder="Primer nombre" autofocus class="form-control" value="<?php echo $Nombre1;?>">
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
                            <div class="row"><!--PRIMER COLUMNA-->
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-4">
                        <div class="jumbotron">  
                                <!-- ESPACIO CORREO -->
                            <div class="form-group <?php echo (!empty($correo_error)) ? 'has-error' :''; ?>">
                                    <label for="Correo">Correo</label>
                                    <input id="Correo" type="email" name="Correo" class="form-control" value="<?php echo $correo; ?>">
                                    <span class="help-block"> <?php echo $correo_error; ?> </span>
                            </div>
                                <!-- ESPACIO TELEFONO-->
                            <div class="form-group <?php echo (!empty($telefono_error)) ? 'has-error' :''; ?>">
                                    <label for="telefono">Telefono</label>
                                    <input id="telefono" type="text" name="telefono" maxlenght="10" class="form-control" value="<?php echo $telefono; ?>">
                                    <span class="help-block"> <?php echo $telefono_error; ?> </span>
                            </div>
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
                            <div class="row"><!--PRIMER COLUMNA-->
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-4">
                        <div class="jumbotron">
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
                <hr class="my-4">
                    <div class="col-md-6 text-right">                            
                        <div class="form-group ">         
                                <input  class="btn btn-primary btn-lg" value="enviar" type="submit"></input>
                        </div>
                    </div>
                    <div class="col-md-6 text-left">
                        <div class="form-group">
                            <!--<input  href="index.php" type="submit" class="btn btn-success" name="modificar"></input>-->
                            <a href="index.php" class="btn btn-success btn-lg" role="button" type="button">Cancelar</a><br><br>
                        </div>
                    </div>
                </form>    
            </div>
            <hr class="my-5">
        </div>
    </body>
</html>