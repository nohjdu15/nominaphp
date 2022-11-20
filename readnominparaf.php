<?php
require_once "conex.php";


/*echo "Datos del empleado"."<br>";*/
if(isset($_GET["IdEmpleado"]) && !empty(trim($_GET["IdEmpleado"]))){
$gatito =$_GET["IdEmpleado"];

//VER EMPLEADO
$sqlempleados1 = "SELECT * FROM empleado WHERE IdEmpleado = '$gatito';";
$ab = mysqli_query($con,$sqlempleados1);
$row11 = mysqli_fetch_array($ab);
$idEmple = $row11['IdEmpleado'] . "</td>";
/*echo "Id del empleado".$idEmple."<br>";*/
$Nombre11 = $row11['Nombre1'] . "</td>";
/*echo "Nombre del empleado".$Nombre11."<br>";*/
$Nombre22 = $row11['Nombre2'] . "</td>";
/*echo "Segundo nombre del empleado: ".$Nombre22."<br>";*/
$apellido11 = $row11['Apellido1'] . "</td>";
/*echo "Apellido del empleado: ".$apellido11."<br>";*/
$apellido22 = $row11['Apellido2'] . "</td>";
/*echo "Segundo apellido del empleado: ".$apellido22."<br>";*/
$Correo1 = $row11['Correo'];
/*echo "Correo del empleado: ".$Correo1."<br>";*/
$Cedula1 = $row11['Cedula'] . "</td>";
/*echo "Cedula del empleado: ".$Cedula1."<br>";*/

//VER DEVENGADO
$sqldeven1 = "SELECT * FROM devengado WHERE IdEmpleado = '$gatito'";
$cd = mysqli_query($con,$sqldeven1);
$row12 = mysqli_fetch_array($cd);
$IdContrato1 = $row12['IdContrato'] ;
/*echo "Numero de contrado: ".$IdContrato. "<br>";*/
$Salario1 = $row12['Salario'] ;
/*echo "Salario basico: ".$Salario1. "<br>";*/
$AuxTrans1 = $row12['AuxTrans'] ;
/*echo "Auxilio de transporte: ".$AuxTrans1. "<br>";*/
$IdMes1 = $row12['IdMes'] ;
/*echo "Periodo de pago: ".$IdMes1. "<br>";*/
$gatito1 = $IdMes1;

//VER AUX_MES
$sqltipomes12 = "SELECT * FROM aux_mes WHERE IdMes = '$gatito1'";
$ef = mysqli_query($con,$sqltipomes12);
$row13 = mysqli_fetch_array($ef);
$Mes1 = $row13["Mes"]. "<br>";
/*echo $Mes1."<br>";*/

//VER CUENTAS
$sqlcuenta1 = "SELECT * FROM cuentas WHERE IdEmpleado = '$gatito'";
$gh = mysqli_query($con,$sqlcuenta1);
$row14 = mysqli_fetch_array($gh);
$Banco1 = $row14['Banco'] . "</td>";
/*echo "El banco del empleado es: ".$Banco1. "<br>";*/
$NumeroCuenta1 = $row14['NumeroCuenta'] . "</td>";
/*echo "Numero cuenta: ".$NumeroCuenta1. "<br>";*/

//VER TELEFONO
$sqltelefono1 = "SELECT * FROM telefono WHERE IdEmpleado = '$gatito' ";
$ij = mysqli_query($con,$sqltelefono1);
$row15 = mysqli_fetch_array($ij);
$Telefono1 = $row15['Telefono'] ;
/*echo "Numero de Telefono: ".$Telefono1. "<br>";*/

//VER CONTRATO
$sqlcargo1 = "SELECT * FROM contrato WHERE IdEmpleado = '$gatito' ";
$kl = mysqli_query($con,$sqlcargo1);
$row16 = mysqli_fetch_array($kl);
$IdCargo1 = $row16['IdCargo'] ;
/*echo "Cargo: ".$IdCargo1. "<br>";*/
$gatito2 = $IdCargo1;

//VER CARGO
$sqltipocargo1 = "SELECT * FROM cargo WHERE IdCargo = '$gatito2'";
$mn = mysqli_query($con,$sqltipocargo1);
$row20 = mysqli_fetch_array($mn);
$TipoCargo1 = $row20["TipoCargo"]. "<br>";
/*echo $TipoCargo1."<br>";*/

//VER APROPIACIONES
$sqlapropiacion = "SELECT * FROM apropiaciones WHERE IdEmpleado = '$gatito' ";
$op = mysqli_query($con,$sqlapropiacion);
$row21 = mysqli_fetch_array($op);
$Pension = $row21['Pension'];
/*echo "pension: ".$Pension. "<br>";*/
$Salud = $row21['Salud'];
/*echo "salud: ".$Salud. "<br>";*/
$ARL = $row21['ARL'];
/*echo "ARL: ".$ARL. "<br>";*/
$Sena = $row21['Sena'];
/*echo "sena: ".$Sena. "<br>";*/
$ICBF = $row21['ICBF'];
/*echo "ICBF: ".$ICBF. "<br>";*/
$Caja_Compen = $row21['Caja_Compen'];
/*echo "caja compensacion: ".$Caja_Compen. "<br>";*/

$Total_Apropiaciones = $Pension + $Salud + $ARL + $Sena + $ICBF + $Caja_Compen;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apropiacionesc</title>
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
                        <h2 class="text-center">Documento Apropiaciones</h2>  
                    </div>
                        <span class="border border-primary">
                        <div class="form-group" style="text-align: right">
                                <label>Id empleado: </label>
                                <?php echo $row11['IdEmpleado']. "<br>"; ?>   
                                <label>Nombre empleado: </label>
                                <?php echo $row11['Nombre1']." ".$row11['Nombre2']. "<br>"; ?>
                                <label>Apellidos empleado: </label>
                                <?php echo $row11['Apellido1']." ".$row11['Apellido2']. "<br>"; ?>
                                <label>Cedula: </label>
                                <?php echo $row11['Cedula']. "<br>";; ?>
                                <label>Cargo: </label>
                                <?php echo $row20["TipoCargo"]. "<br>";; ?>
                                <label>Numero de contrato: </label>
                                <?php echo $row12['IdContrato']. "<br>";; ?>
                                <label>Numero de cuenta: </label>
                                <?php echo $row14['NumeroCuenta']. "<br>"; ?>
                                <label>Periodo de pago: </label>
                                <?php echo $row13["Mes"]; ?>   
                            </div>
                            <!--TABLA DEVENGADO-->
                            <table class="table table table-bordered caption-top-center">
                                <caption class="text-center">APROPIACIONES</caption>
                                <thead style="background-color: #4699CC ">
                                    <tr> 
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Salud</td>
                                        <td> 8.5 % </td>
                                        <?php echo "<td>" .$row21['Salud']. "</td>"?>
                                    </tr>
                                    <tr> 
                                        <td scope="2">Pension</td>
                                        <td> 12 % </td>
                                        <?php echo "<td>" .$row21['Pension']. "</td>"?>
                                    </tr>
                                    <tr> 
                                        <td scope="2">ARL</td>
                                        <td> 0.522 % </td>
                                        <?php echo "<td>" .$row21['ARL']. "</td>"?>
                                    </tr>
                                    <tr> 
                                        <td scope="2">Sena</td>
                                        <td> 2 % </td>
                                        <?php echo "<td>" .$row21['Sena']. "</td>"?>
                                    </tr>
                                    <tr> 
                                        <td scope="2">ICBF</td>
                                        <td> 3 % </td>
                                        <?php echo "<td>" .$row21['ICBF']. "</td>"?>
                                    </tr>
                                    <tr> 
                                        <td scope="2">Caja de compensacion</td>
                                        <td> 4 % </td>
                                        <?php echo "<td>" .$row21['Caja_Compen']. "</td>"?>
                                    </tr>
                                    <tr>
                                        <td></td>                    
                                        <td scope="3">Total Apropiaciones</td>
                                        <?php echo "<td>" .$Total_Apropiaciones."</td>"?>
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
            </div>
        </div>    
    </div>   
    </div>
</body>
</html>