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
/*<input  class="btn btn-primary btn-lg" value="enviar" type="submit"></input>
                        <!--<input type="submit" class="btn btn-primary" value="Submit">-->
                        <a href="index.php" class="btn btn-default">Cancelar</a>


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
                        <input  class="btn btn-primary btn-lg" value="enviar" type="submit"></input>
                            <a href="index.php" class="btn btn-default">Cancelar</a>

                            
                            <?php echo "<a href='readnominparaf.php?IdEmpleado=". $row['IdEmpleado']."data-toggle='tooltip'<span class='btn btn-primary btn-lg'role='button' type='button'></span>Apropiaciones</a>"; ?>


                    </div>*/
?>          
