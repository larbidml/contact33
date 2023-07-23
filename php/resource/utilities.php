<?php


function chekDuplicateEntries( $table , $column_name , $value ,$db)
{
try{      
//$sqlQuery = "SELECT * FROM " .$table. " WHERE " .$column_name. "= :$column_name ";
$sqlQuery = "SELECT * FROM $table WHERE  $column_name= :$column_name ";
$statement = $db->prepare($sqlQuery);
//$statement->execute(array(':$column_name' => $value ));
$statement->execute(array( ":$column_name"=> $value ));


if ($row = $statement->fetch()) {
return True;
}
return False ;


}catch (PDOException $ex) {
// handel exception
}


}



function flashMessage($message , $passOrFail ="Fail")
{
if($passOrFail == "Pass")
{


$data =    "<div class=\"container \">
<div class=\"row justify-content-center\">
<div class=\"col-lg-6 bg-dark \">
<h2 class=\"text-center text-info\"><hr>{$message}<hr></h2>
</div>
</div>
</div>";

}else{

$data =    "<div class=\"container \">
<div class=\"row justify-content-center\">
<div class=\"col-lg-6 bg-dark \">
<h2 class=\"text-center text-danger\"><hr>{$message}<hr></h2>
</div>
</div>
</div>";


}
return $data;
}





function obtener_edad_segun_fecha($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}



function obtener_envigor_fecha($fecha_doc)
{
$nacimiento = new DateTime($fecha_doc);
$ahora = new DateTime(date("Y-m-d"));
$diferencia = $ahora->diff($nacimiento);
if ($diferencia->format("%y") > 1) 
{
$result = "en Vigor";
}
else
{
$result = "Caducado";
}


return  $result;
}


function diaTOalphanumeric( $dia)
{


switch ($dia) 

{
case "01":
$diaalpha = "uno";
break;
case "02":
$diaalpha = "dos";
break;
case "03":
$diaalpha = "tres";
break;
case "04":
$diaalpha = "cuatro";
break;
case "05":
$diaalpha = "cinco";
break;
case "06":
$diaalpha = "seis";
break;
case "07":
$diaalpha = "siete";
break;
case "08":
$diaalpha = "ocho";
break;
case "09":
$diaalpha = "nueve";
break;
case "10":
$diaalpha = "diez";
break;
case "11":
$diaalpha = "once";
break;
case "12":
$diaalpha = "doce";
break;
case "13":
$diaalpha = "trece";
break;
case "14":
$diaalpha = "catorce";
break;
case "15":
$diaalpha = "quince";
break;
case "16":
$diaalpha = "dieciséis";
break;
case "17":
$diaalpha = "diecisiete";
break;
case "18":
$diaalpha = "dieciocho";
break;
case "19":
$diaalpha = "diecinueve";
break;
case "20":
$diaalpha = "veinte";
break;
case "21":
$diaalpha = "veintiuno";
break;
case "22":
$diaalpha = "veintidós";
break;
case "23":
$diaalpha = "veintitrés";
break;
case "24":
$diaalpha = "veinticuatro";
break;
case "25":
$diaalpha = "veinticinco";
break;
case "26":
$diaalpha = "veintiséis";
break;
case "27":
$diaalpha = "veintisiete";
break;
case "28":
$diaalpha = "veintiocho";
break;
case "29":
$diaalpha = "veintinueve";
break;
case "30":
$diaalpha = "treinta";
break;
case "31":
$diaalpha = "treinta y uno";
break;


}

return $diaalpha ;

}



function rand_chars($c, $l, $u = FALSE) 
{
if (!$u) for ($s = '', $i = 0, $z = strlen($c)-1; $i < $l; $x = rand(0,$z), $s .= $c{$x}, $i++);
else for ($i = 0, $z = strlen($c)-1, $s = $c{rand(0,$z)}, $i = 1; $i != $l; $x = rand(0,$z), $s .= $c{$x}, $s = ($s{$i} == $s{$i-1} ? substr($s,0,-1) : $s), $i=strlen($s));
return $s;
}

function flashMessage2($message)
{

    echo "<div class=\"container\">\n";
    echo "<div class=\"row justify-content-center\">\n";
    echo "<div class=\"col-lg-6 bg-light text-danger\">\n";
    echo "<h2 class=\"text-center \" ><hr>{$message}<hr></h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</div>\n";

}


function flashMessageOK($message)
{

    echo "<div class=\"container\">\n";
    echo "<div class=\"row justify-content-center\">\n";
    echo "<div class=\"col-lg-6 bg-light text-success\">\n";
    echo "<h2 class=\"text-center \" ><hr>{$message}<hr></h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</div>\n";

}



function flashMessageNotOK($message)
{

    echo "<div class=\"container\">\n";
    echo "<div class=\"row justify-content-center\">\n";
    echo "<div class=\"col-lg-6 bg-light text-danger\">\n";
    echo "<h2 class=\"text-center \" ><hr>{$message}<hr></h2>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</div>\n";

}













function comprobar_iban($iban)
{
    # definimos un array de valores con el valor de cada letra
    $letras=array("A"=>10, "B"=>11, "C"=>12, "D"=>13, "E"=>14, "F"=>15, "G"=>16,"H"=>17, "I"=>18, "J"=>19, "K"=>20, "L"=>21, "M"=>22, "N"=>23, "O"=>24, "P"=>25, "Q"=>26, "R"=>27, "S"=>28, "T"=>29, "U"=>30, "V"=>31, "W"=>32, "X"=>33, "Y"=>34, "Z"=>35);

    # Eliminamos los posibles espacios al inicio y final
    $iban=trim($iban);

    # Convertimos en mayusculas
    $iban=strtoupper($iban);

    # eliminamos espacio y guiones que haya en el iban
    $iban=str_replace(array(" ","-"),"",$iban);

    if(strlen($iban)==24)
    {
    # obtenemos los codigos de las dos letras
    $valorLetra1 = $letras[substr($iban, 0, 1)];
    $valorLetra2 = $letras[substr($iban, 1, 1)];

    # obtenemos los siguientes dos valores
    $siguienteNumeros= substr($iban, 2, 2);

    $valor = substr($iban, 4, strlen($iban)).$valorLetra1.$valorLetra2.$siguienteNumeros;

    if(bcmod($valor,97)==1)
    {
    return 1;
    flashMessage2("El IBAN es válido.");
    }else{
    return 0;
    }
    }else{
    return 0;
    }
}



function mesTOalphanumeric($mes)
{


    switch ($mes) 

    {
    case "01":
    $mesalpha = "Enero";
    break;
    case "02":
    $mesalpha = "Febrero";
    break;
    case "03":
    $mesalpha = "Marzo";
    break;
    case "04":
    $mesalpha = "Abril";
    break;
    case "05":
    $mesalpha = "Mayo";
    break;
    case "06":
    $mesalpha = "Junio";
    break;
    case "07":
    $mesalpha = "Julio";
    break;
    case "08":
    $mesalpha = "Agosto";
    break;
    case "09":
    $mesalpha = "Septiembre";
    break;
    case "10":
    $mesalpha = "Octubre";
    break;
    case "11":
    $mesalpha = "Noviembre";
    break;
    case "12":
    $mesalpha = "Diciembre";
    break;

    }

    return $mesalpha ;

}



function verificarDNI($dni) 
{
    $patron = "/^[0-9]{8}[A-Za-z]$/"; // Expresión regular para comprobar el formato del DNI
    if (preg_match($patron, $dni)) {
    $numero = substr($dni, 0, 8); // Extraer el número del DNI
    $letra = strtoupper(substr($dni, -1)); // Extraer la letra del DNI y convertirla a mayúscula
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; // Letras correspondientes a cada número
    $indice = $numero % 23; // Obtener el índice de la letra correspondiente al número
    $letra_correcta = $letras[$indice]; // Obtener la letra correcta
    if ($letra_correcta == $letra) {
    return true; // El DNI es válido
    } else {
    return false; // El DNI no es válido
    }
    } else {
    return false; // El DNI no tiene un formato válido
    }
}



function verificarNIE($nie) 
{
    $patron = "/^[XYZ][0-9]{7}[A-Za-z]|[XYZ][-][0-9]{7}[A-Za-z]$/"; // Expresión regular para comprobar el formato del NIE
    if (preg_match($patron, $nie)) {
    $letra = substr($nie, 0, 1); // Extraer la letra del NIE
    switch ( $letra)
    {
    case "X":
    $nie = "0".substr($nie, 1, 9); 
    break;
    case "Y":
    $nie = "1".substr($nie, 1, 9); 
    break;
    case "Z":
    $nie = "2".substr($nie, 1, 9); 
    break;

    }

    $numero = substr($nie, 0, 8); // Extraer el número del NIE
    $numero = str_replace("-", "", $numero); // Eliminar el guión, si lo hay
    $letraV = strtoupper(substr($nie, -1)); // Extraer la letra VERIFICACION del NIE y convertirla a mayúscula
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; // Letras correspondientes a cada número
    $indice = intval($numero) % 23; // Obtener el índice de la letra correspondiente al número
    $letra_correcta = $letras[$indice]; // Obtener la letra correcta
    if ($letra_correcta ==   $letraV) {
    return true; // El NIE es válido
    } else {
    return false; // El NIE no es válido
    }
    } else {
    return false; // El NIE no tiene un formato válido
    }
}


function validarIBAN($iban) 
{
    $iban = strtolower(str_replace(' ', '', $iban)); // convertir a minúsculas y eliminar espacios en blanco
    $letras = 'abcdefghijklmnopqrstuvwxyz';
    $numeros = '0123456789';

    // Verificar la longitud y el formato del IBAN
    if (strlen($iban) != 24 || !preg_match('/^[a-z]{2}[0-9]{22}$/', $iban)) {
    return false;
    }

    // Mover los primeros cuatro caracteres al final
    $iban = substr($iban, 4) . substr($iban, 0, 4);

    // Reemplazar letras por números
    $iban = str_replace(str_split($letras), range(10, 35), $iban);

    // Verificar la validez del IBAN
    $resto = 0;
    foreach (str_split($iban, 7) as $parte) {
    $resto = ($resto . intval($parte)) % 97;
    }
    return $resto == 1;
    flashMessage2("El IBAN es válido.");
}


function valcuenta_bancaria($cuenta1,$cuenta2,$cuenta3,$cuenta4)
{
    if (strlen($cuenta1)!=4) return false;
    if (strlen($cuenta2)!=4) return false;
    if (strlen($cuenta3)!=2) return false;
    if (strlen($cuenta4)!=10) return false;
    
    if (mod11_cuenta_bancaria("00".$cuenta1.$cuenta2)!=$cuenta3{0}) return false;
    if (mod11_cuenta_bancaria($cuenta4)!=$cuenta3{1}) return false;
    return true;
    
}

function mod11_cuenta_bancaria($numero)
{
    if (strlen($numero)!=10) return "?";
    
    $cifras = Array(1,2,4,8,5,10,9,7,3,6);
    $chequeo=0;
    for ($i=0; $i < 10; $i++)
        $chequeo += substr($numero,$i,1) * $cifras[$i];
    
    $chequeo = 11 - ($chequeo % 11);
    if ($chequeo == 11) $chequeo = 0;
    if ($chequeo == 10) $chequeo = 1;
    return $chequeo;
}


?>