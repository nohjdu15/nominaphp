<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
</head>
    <body>
        <center>
            <h1>Agregar Empleados</h1>
            <p>Favor diligenciar el siguiente formulario, para agregar el empleado.</p>
            <form action="create.php" method="POST">
                
                <label for="Primer_Nombre">Primer_Nombre</label>
                <input id="Primer_Nombre" type="Text" name="nombre1"><br><br>
            
                <label for="Segundo_Nombre">Segundo_Nombre</label>
                <input id="Segundo_Nombre" type="Text" name="nombre2"><br><br>

                <label for="Primer_Apellido">Primer_Apellido</label>
                <input id="Primer_Apellido"type="Text" name="apellido1"><br><br>

                <label for="Segundo_Apellido">Segundo_Apellido</label>
                <input id="Segundo_Apellido" type="Text" name="apellido2"><br><br>

                <label for="Correo">Correo</label>
                <input id="Correo" type="Text" name="Correo"><br><br>

                <label for="Cedula">Cedula</label>
                <input id="Cedula" type="text" name="Cedula"><br><br>

                <label for="Salario">Salario</label>
                <input id="Salario" type="Text" name="Salario"><br><br>

                <label for="Numero_Contrato">Numero_Contrato</label>
                <input id="Numero_Contrato" type="Text" name="Numerocontrato"><br><br>

                <label for="TipoCargo">TipoCargo</label>
                <input id="TipoCargo" type="Text" name="TipoCargo"><br><br>

                <label for="jornada">jornada</label>
                <input id="jornada"type="Text" name="jornada"><br><br>

                <input type="submit" name="Agregar" class="form-control"><br><br>
                
            </form>
        </center>
    </body>
</html>