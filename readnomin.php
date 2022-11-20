<?php
require_once "conex.php";

/*echo "Datos del empleado"."<br>";*/

if(isset($_GET["IdEmpleado"]) && !empty(trim($_GET["IdEmpleado"]))){
$pajarito =$_GET["IdEmpleado"];
/*echo "pajarito es: ".$pajarito."<br>";*/

//VER EMPLEADO

$sqlempleados = "SELECT * FROM empleado WHERE IdEmpleado = $pajarito";
$s = mysqli_query($con,$sqlempleados);
$row = mysqli_fetch_array($s);
$idEmpl = $row['IdEmpleado'] . "</td>";
/*echo "Id del empleado".$idEmpl."<br>";*/
$Nombre1 = $row['Nombre1'] . "</td>";
/*echo "Nombre del empleado".$Nombre1."<br>";*/
$Nombre2 = $row['Nombre2'] . "</td>";
/*echo "Segundo nombre del empleado: ".$Nombre2."<br>";*/
$apellido1 = $row['Apellido1'] . "</td>";
/*echo "Apellido del empleado: ".$apellido1."<br>";*/
$apellido2 = $row['Apellido2'] . "</td>";
/*echo "Segundo apellido del empleado: ".$apellido2."<br>";*/
$Correo = $row['Correo'];
/*echo "Correo del empleado: ".$Correo."<br>";*/
$Cedula = $row['Cedula'] . "</td>";
/*echo "Cedula del empleado: ".$Cedula."<br>";*/

//VER DEVENGADO
$sqldeven = "SELECT * FROM devengado WHERE IdEmpleado = $pajarito";
$m = mysqli_query($con,$sqldeven);
$row1 = mysqli_fetch_array($m);
$IdContrato = $row1['IdContrato'] ;
/*echo "Numero de contrado: ".$IdContrato. "<br>";*/
$Salario = $row1['Salario'] ;
/*echo "Salario basico: ".$Salario. "<br>";*/
$AuxTrans = $row1['AuxTrans'] ;
/*echo "Auxilio de transporte: ".$AuxTrans. "<br>";*/
$IdMes = $row1['IdMes'] ;
/*echo "Periodo de pago: ".$IdMes. "<br>";*/
$pajaro1 = $IdMes;

//VER AUX_MES
$sqltipomes = "SELECT * FROM aux_mes WHERE IdMes = $pajaro1";
$f = mysqli_query($con,$sqltipomes);
$row7 = mysqli_fetch_array($f);
$Mes = $row7["Mes"]. "<br>";
/*echo $Mes."<br>";*/

//VER CUENTAS
$sqlcuenta = "SELECT * FROM cuentas WHERE IdEmpleado = $pajarito";
$c = mysqli_query($con,$sqlcuenta);
$row2 = mysqli_fetch_array($c);
$Banco = $row2['Banco'] . "</td>";
/*echo "El banco del empleado es: ".$Banco. "<br>";*/
$NumeroCuenta = $row2['NumeroCuenta'] . "</td>";
/*echo "Numero cuenta: ".$NumeroCuenta. "<br>";*/

//VER DEDUCCIONES
$sqldeduccion = "SELECT * FROM deducciones WHERE IdEmpleado = $pajarito";
$d = mysqli_query($con,$sqldeduccion);
$row3 = mysqli_fetch_array($d);
$SaludEmpl = $row3['SaludEmpl'] ;
/*echo "Valor de la salud: ".$SaludEmpl. "<br>";*/
$PensionEmpl = $row3['PensionEmpl'] ;
/*echo "Valor de la pension: ".$PensionEmpl. "<br>";*/

//VER TELEFONO
$sqltelefono = "SELECT * FROM telefono WHERE IdEmpleado = $pajarito";
$t = mysqli_query($con,$sqltelefono);
$row4 = mysqli_fetch_array($t);
$Telefono = $row4['Telefono'] ;
/*echo "Numero de Telefono: ".$Telefono. "<br>";*/

//VER CONTRATO
$sqlcargo = "SELECT * FROM contrato WHERE IdEmpleado = $pajarito";
$b = mysqli_query($con,$sqlcargo);
$row5 = mysqli_fetch_array($b);
$IdCargo = $row5['IdCargo'] ;
/*echo "Cargo: ".$IdCargo. "<br>";*/
$pajaro = $IdCargo;

//VER CARGO
$sqltipocargo = "SELECT * FROM cargo WHERE IdCargo = $pajaro";
$e = mysqli_query($con,$sqltipocargo);
$row6 = mysqli_fetch_array($e);
$TipoCargo = $row6["TipoCargo"]. "<br>";
/*echo $TipoCargo."<br>";*/

// VER JORNADAS
$sqljornada = "SELECT * FROM jornadatrabajada WHERE IdEmpleado = $pajarito";
$w = mysqli_query($con,$sqljornada);
$row9 = mysqli_fetch_array($w);
$IdJornada = $row9["IdJornada"];
//echo $IdJornada;
$jorna = $IdJornada;


// VER JORNADAS CANTIDAD DE HORAS
$sqlhoras = "SELECT * FROM jornadatrabajada WHERE IdEmpleado = $pajarito";
$nn = mysqli_query($con,$sqlhoras);
$row11 = mysqli_fetch_array($nn);
$CantidadHoras = $row11["CantidadHoras"];
//echo $CantidadHoras;

//JORNADAS EN NOMBRE
$sqltipojornadas = "SELECT * FROM jornadas WHERE IdJornada = $IdJornada";
$g = mysqli_query($con,$sqltipojornadas);
$row10 = mysqli_fetch_array($g);
$TipoJornada = $row10["TipoJornada"];
//echo $TipoJornada;
}

$TOTALDEVENGADO = $Salario + $AuxTrans;

$TOTALDEDUCCIONES = $PensionEmpl + $SaludEmpl;
/*echo $TOTALDEDUCCIONES;*/



if($CantidadHoras != 0){
    $horaOr = $Salario / 240;
    

    switch($jorna){
        case 1: // HORA EXTRA DIURNA
                //echo "selecciono la jornada: ".$jorna."<br>";
                $porcentaje = "1.25";
                $he= ($horaOr*1.25) * $CantidadHoras;
                //echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$he."<br>";
                $totalde = $he + $TOTALDEVENGADO;
                //echo "EL SALARIO TOTAL ES: ".$totalde."<br>";
                $jorna = $TipoJornada;
                echo round($he);
            break;
        case 2:// HORA EXTRA NOCTURNA
                //echo "Selecciono la jornada: ".$jorna."<br>";
                $porcentaje = "1.75";
                $he =($horaOr*1.75) * $CantidadHoras;
                //echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$he."<br>";
                $totalde = $he + $TOTALDEVENGADO;
                //echo "EL SALARIO TOTAL ES: ".$totalde."<br>";
                $jorna = $TipoJornada;
            break;
        case 3://HORA ORDINARIA DOMINICAL FESTIVA
                //echo "Selecciono la jornada: ".$jorna."<br>";
                $porcentaje = "1.75";
                $he =($horaOr*1.75) * $CantidadHoras;
                //echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$he."<br>";
                $totalde = $he + $TOTALDEVENGADO;
                //echo "EL SALARIO TOTAL ES: ".$totalde."<br>";
                $jorna = $TipoJornada;
                echo round($he);
            break;
        case 4://HORA EXTRA DIURNA DOMINICAL FESTIVA
                //echo "Selecciono la jornada: ".$jorna."<br>";
                $porcentaje = "2";
                $he =($horaOr*2) * $CantidadHoras;
                //echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$he."<br>";
                $totalde = $he + $TOTALDEVENGADO;
                //echo "EL SALARIO TOTAL ES: ".$totalde."<br>";
                $jorna = $TipoJornada;
            break;
        case 5://HORA EXTRA NOCTURNA DOMINICAL FESTIVA
                //echo "Selecciono la jornada: ".$jorna."<br>";
                $porcentaje = "2.5";
                $he =($horaOr*2.5) * $CantidadHoras;
                //echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$he."<br>";
                $totalde = $he + $TOTALDEVENGADO;
                //echo "EL SALARIO TOTAL ES: ".$totalde."<br>";
                $jorna = $TipoJornada;
            break;
        case 6://HORA RECARGO NOCTURNA
                //echo "Selecciono la jornada: ".$jorna."<br>";
                $porcentaje = "2.25";
                $he =($horaOr*2.5) * $CantidadHoras;
                //echo "EL VALOR DE LAS HORAS EXTRAS ES: ".$he."<br>";
                $totalde = $he + $TOTALDEVENGADO;
                //echo "EL SALARIO TOTAL ES:".$totalde."<br>";
                $jorna = $TipoJornada;
            break;
    }
}

$TOTAL_A_PAGAR = $totalde - $TOTALDEDUCCIONES;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Empleado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class = "m-4 p-4 border">
    <div class="wrapper">
        <div class="container-border">
            <div class="row">
                <div class="col-md-16">
                    <div class="page-header clearfix"> 
                        <h2 class="text-center">Documento desprendible de pago</h2>  
                    </div>
                        <span class="border border-primary">
                            <div class="form-group" style="text-align: right">
                                <label>Id empleado: </label>
                                <?php echo $row['IdEmpleado']. "<br>"; ?>   
                                <label>Nombre empleado: </label>
                                <?php echo $row['Nombre1']." ".$row['Nombre2']. "<br>"; ?>
                                <label>Apellidos empleado: </label>
                                <?php echo $row['Apellido1']." ".$row['Apellido2']. "<br>"; ?>
                                <label>Cedula: </label>
                                <?php echo $row['Cedula']. "<br>";; ?>
                                <label>Cargo: </label>
                                <?php echo $row6["TipoCargo"]. "<br>";; ?>
                                <label>Numero de contrato: </label>
                                <?php echo $row1['IdContrato']. "<br>";; ?>
                                <label>Numero de cuenta: </label>
                                <?php echo $row2['NumeroCuenta']. "<br>"; ?>
                                <label>Periodo de pago: </label>
                                <?php echo $row7["Mes"]; ?>   
                            </div>
                        <!--TABLA DEVENGADO-->
                            <table class="table table table-bordered caption-top-center">
                                <caption class="text-center">DEVENGADO</caption>
                                <thead style="background-color: #4699CC ">
                                    <tr> 
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Salario</td>
                                        <td> 30 </td>
                                        <?php echo "<td>" .$row1['Salario'] ."</td>"?>  
                                    </tr>
                                    <tr> 
                                        <td scope="2">Auxilio Transporte</td>
                                        <td> 30 </td>
                                        <?php echo "<td>" .$row1['AuxTrans']. "</td>"?>
                                    </tr>
                                    <tr>
                                        <td></td>                    
                                        <td scope="3">Total Devengado</td>
                                        <?php echo "<td>" .$TOTALDEVENGADO."</td>"?>
                                    </tr>
                                </tbody>
                                </table>
                                <!--TABLA HORAS EXTRAS-->
                                <table class="table table table-bordered caption-top">
                                <caption class="text-center">HORAS EXTRAS</caption>
                                    <thead class="table-dark" style="background-color: #4699CC ">
                                        <tr>
                                            <th scope="col">Concepto</th>
                                            <th scope="col">Porcentaje</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <?php echo "<td>".$jorna."</td>"?>
                                            <?php echo "<td>".$porcentaje."</td>"?>
                                            <?php echo "<td>" .round($he). "</td>"?>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--TABLA DEDUCCIONES-->
                                <table class="table table table-bordered caption-top">
                                <caption class="text-center">DEDUCCIONES</caption>
                                    <thead class="table-dark" style="background-color: #4699CC ">
                                        <tr>
                                            <th scope="col">Concepto</th>
                                            <th scope="col">Porcentaje</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Fondo de salud</th>
                                            <td>4 %</td>
                                            <?php echo "<td>" .$row3['SaludEmpl']. "</td>"?>
                                        </tr>
                                        <tr>
                                            <th scope="row">fondo de pension</th>
                                            <td scope="2">4 %</td>
                                            <?php echo "<td>" .$row3['PensionEmpl']. "</td>"?>
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <td scope="3">Total Deducciones</td>
                                            <?php echo "<td>" .$TOTALDEDUCCIONES. "</td>"?>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--TABLA VALOR A PAGAR-->
                                <table class="table table table-bordered caption-top">
                                <caption class="text-center">VALOR A PAGAR</caption>
                                    <thead style="background-color: #4699CC "></thead>
                                    <tbody >
                                        <tr>
                                            <th scope="row" style="background-color: #4699CC ">valor Total</th>
                                            <?php echo "<td>" .round($TOTAL_A_PAGAR). "</td>"?>
                                        </tr>
                                    </tbody>
                                </table>
                        </span>
                   </div>          
               </div>
               <hr class="my-5 ">
               <div class="col-md-6 text-right">                            
                        <div class="form-group ">         
                            <a href="index.php" class="btn btn-success btn-lg" role="button" type="button">Volver</a><br><br>
                        </div>
                    </div>
                    <div class="col-md-6 text-left">                            
                        <div class="form-group ">         
                        <?php echo "<a href='readnominparaf.php?IdEmpleado=". $row['IdEmpleado']."data-toggle='tooltip'<span class='btn btn-primary btn-lg'role='button' type='button'></span>Apropiaciones</a>"; ?>
                        </div>
                    </div>

                    
            </div>
        </div>    
    </div>   
    </div>
</body>
</html>
