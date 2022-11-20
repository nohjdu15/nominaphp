<?php

require_once "conex.php";

function deducciones(){
    $salud = 0.085;
    trim($_POST["Salario"]);
    echo "el valor de salud es".$salud;    
}

deducciones();

?>