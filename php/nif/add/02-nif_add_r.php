<?PHP
$sub_header ="Añadir contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
?>

<?php
include_once '../../resource/Database.php';

//collect form data and store in variables
$id= $_POST['id']; $id=trim($id) ;
$doctypo= $_POST['doctypo']; $doctypo=trim($doctypo) ;
$nif= $_POST['nif']; $nif=trim($nif) ;
// $Fvenc= $_POST['Fvenc']; $Fvenc=trim($Fvenc) ;
$nombre1= $_POST['nombre1']; $nombre1=trim($nombre1) ;
$apellido1= $_POST['apellido1']; $apellido1=trim($apellido1) ;
$apellido2= $_POST['apellido2']; $apellido2=trim($apellido2) ;
$tel1= $_POST['tel1']; $tel1=trim($tel1) ;
$tel2= $_POST['tel2']; $tel2=trim($tel2) ;
$CALLE= $_POST['CALLE']; $CALLE=trim($CALLE) ;
$NOCALLE= $_POST['NOCALLE']; $NOCALLE=trim($NOCALLE) ;
$PISO= $_POST['PISO']; $PISO=trim($PISO) ;
$PUERTA= $_POST['PUERTA']; $PUERTA=trim($PUERTA) ;
$CP= $_POST['CP']; $CP=trim($CP) ;
$CIUDAD= $_POST['CIUDAD']; $CIUDAD=trim($CIUDAD) ;
$CATASTRO= $_POST['CATASTRO']; $CATASTRO=trim($CATASTRO) ;
// $fn2= $_POST['fn2']; $fn2=trim($fn2) ;
$CBANCARIA1= $_POST['CBANCARIA1']; $CBANCARIA1=trim($CBANCARIA1) ;
$CBANCARIA2= $_POST['CBANCARIA2']; $CBANCARIA2=trim($CBANCARIA2) ;
$CBANCARIA3= $_POST['CBANCARIA3']; $CBANCARIA3=trim($CBANCARIA3) ;
$CBANCARIA4= $_POST['CBANCARIA4']; $CBANCARIA4=trim($CBANCARIA4) ;
$CBANCARIA5= $_POST['CBANCARIA5']; $CBANCARIA5=trim($CBANCARIA5) ;
$CBANCARIA6= $_POST['CBANCARIA6']; $CBANCARIA6=trim($CBANCARIA6) ;
$TSANITARIA= $_POST['TSANITARIA']; $TSANITARIA=trim($TSANITARIA) ;
$TFnumerosa= $_POST['TFnumerosa']; $TFnumerosa=trim($TFnumerosa) ;
$correo= $_POST['correo']; $correo=trim($correo) ;
$nota= $_POST['nota']; $nota=trim($nota) ;
// $FAVORITO= $_POST['FAVORITO']; $FAVORITO=trim($FAVORITO) ;
$PASAPORTE= $_POST['PASAPORTE']; $PASAPORTE=trim($PASAPORTE) ;
// $FVPASPORT= $_POST['FVPASPORT']; $FVPASPORT=trim($FVPASPORT) ;
$GENERO= $_POST['GENERO']; $GENERO=trim($GENERO) ;
$FAMILIA= $_POST['FAMILIA']; $FAMILIA=trim($FAMILIA) ;
$NACIONALIDAD= $_POST['NACIONALIDAD']; $NACIONALIDAD=trim($NACIONALIDAD) ;
$ESTADOCIVIL= $_POST['ESTADOCIVIL']; $ESTADOCIVIL=trim($ESTADOCIVIL) ;

$SOPORTE= $_POST['SOPORTE']; $SOPORTE=trim($SOPORTE) ;


$FAVORITO = "1";


///////////////////////////////
$Fvendia = $_POST['Fvendia'];
$Fvendia=trim($Fvendia) ;
$Fvenmes = $_POST['Fvenmes'];
$Fvenmes=trim($Fvenmes) ;
$Fvenano = $_POST['Fvenano'];
$Fvenano=trim($Fvenano) ;
$Fvenc =$Fvenano."/".$Fvenmes."/".$Fvendia ;
///////////////////////////////


///////////////////////////////
$fn2dia = $_POST['fn2dia'];
$fn2dia=trim($fn2dia) ;
$fn2mes = $_POST['fn2mes'];
$fn2mes=trim($fn2mes) ;
$fn2ano = $_POST['fn2ano'];
$fn2ano=trim($fn2ano) ;
$fn2 =$fn2ano."/".$fn2mes."/".$fn2dia ;
///////////////////////////////

///////////////////////////////
$FVPASPORTdia = $_POST['FVPASPORTdia'];
$FVPASPORTdia=trim($FVPASPORTdia) ;
$FVPASPORTmes = $_POST['FVPASPORTmes'];
$FVPASPORTmes=trim($FVPASPORTmes) ;
$FVPASPORTano = $_POST['FVPASPORTano'];
$FVPASPORTano=trim($FVPASPORTano) ;
$FVPASPORT =$FVPASPORTano."/".$FVPASPORTmes."/".$FVPASPORTdia ;
///////////////////////////////







if(chekDuplicateEntries("contactos","nif",$nif ,$db))
{

$result= flashMessage("nif ya existe", "Fail");


}
else
{
try 
{


//VERIFICARDNI($nif);

//create SQL insert statement
$sqlInsert = "INSERT INTO contactos (

id ,
doctypo ,
nif ,
Fvenc ,
nombre1 ,
apellido1 ,
apellido2 ,
tel1 ,
tel2 ,
CALLE ,
NOCALLE ,
PISO ,
PUERTA ,
CP ,
CIUDAD ,
CATASTRO ,
fn2 ,
CBANCARIA1 ,
CBANCARIA2 ,
CBANCARIA3 ,
CBANCARIA4 ,
CBANCARIA5 ,
CBANCARIA6 ,
TSANITARIA ,
TFnumerosa ,
correo ,
nota ,
FAVORITO ,
PASAPORTE ,
FVPASPORT ,
GENERO ,
FAMILIA ,
NACIONALIDAD ,
ESTADOCIVIL, 
SOPORTE													

)

VALUES (
:id ,
:doctypo ,
:nif ,
:Fvenc ,
:nombre1 ,
:apellido1 ,
:apellido2 ,
:tel1 ,
:tel2 ,
:CALLE ,
:NOCALLE ,
:PISO ,
:PUERTA ,
:CP ,
:CIUDAD ,
:CATASTRO ,
:fn2 ,
:CBANCARIA1 ,
:CBANCARIA2 ,
:CBANCARIA3 ,
:CBANCARIA4 ,
:CBANCARIA5 ,
:CBANCARIA6 ,
:TSANITARIA ,
:TFnumerosa ,
:correo ,
:nota ,
:FAVORITO ,
:PASAPORTE ,
:FVPASPORT ,
:GENERO ,
:FAMILIA ,
:NACIONALIDAD ,
:ESTADOCIVIL , 
:SOPORTE


) ";

//use PDO prepared to sanitize data
$statement = $db->prepare($sqlInsert);

//add the data into the database
$statement->execute(array(	

':id' => $id ,
':doctypo' => $doctypo ,
':nif' => $nif ,
':Fvenc' => $Fvenc ,
':nombre1' => $nombre1 ,
':apellido1' => $apellido1 ,
':apellido2' => $apellido2 ,
':tel1' => $tel1 ,
':tel2' => $tel2 ,
':CALLE' => $CALLE ,
':NOCALLE' => $NOCALLE ,
':PISO' => $PISO ,
':PUERTA' => $PUERTA ,
':CP' => $CP ,
':CIUDAD' => $CIUDAD ,
':CATASTRO' => $CATASTRO ,
':fn2' => $fn2 ,
':CBANCARIA1' => $CBANCARIA1 ,
':CBANCARIA2' => $CBANCARIA2 ,
':CBANCARIA3' => $CBANCARIA3 ,
':CBANCARIA4' => $CBANCARIA4 ,
':CBANCARIA5' => $CBANCARIA5 ,
':CBANCARIA6' => $CBANCARIA6 ,
':TSANITARIA' => $TSANITARIA ,
':TFnumerosa' => $TFnumerosa ,
':correo' => $correo ,
':nota' => $nota ,
':FAVORITO' => $FAVORITO ,
':PASAPORTE' => $PASAPORTE ,
':FVPASPORT' => $FVPASPORT ,
':GENERO' => $GENERO ,
':FAMILIA' => $FAMILIA ,
':NACIONALIDAD' => $NACIONALIDAD ,
':ESTADOCIVIL' => $ESTADOCIVIL ,

':SOPORTE' => $SOPORTE 

));
//print_r($statement);

//check if one new row was created
if ($statement->rowCount() == 1) 
{
$result= flashMessage("Añadido exitos","Pass");
}
} catch (PDOException $ex) 
{

$result= flashMessage("$ex->getMessage()", "Fail");
}	

}


?>	



<?php  
  if (isset($result))
  {
  flashMessage2($result);

  $patron = "/^[XYZ][0-9]{7}[A-Za-z]|[XYZ][-][0-9]{7}[A-Za-z]$/";//formato nie
  if (preg_match($patron,$nif))
  {
  if(verificarNIE($nif))
  {
  echo flashMessageOK("El nie ".$nif." es válido");
  } 
  else
  {
  echo flashMessageNotOK("El nie ".$nif." no es válido");
  }
  }


  $patron = "/^[0-9]{8}[A-Za-z]$/"; // formato DNI
  if (preg_match($patron,$nif))
  {
  if(verificarDNI($nif))
  {
  echo flashMessageOK("El DNI ".$nif." es válido");
  } 
  else
  {
  echo flashMessageNotOK("El DNI ".$nif." no es válido");
  }
  }








  }  

  //comprobariban($cuentaBancaria3);


  $iban = $CBANCARIA1.$CBANCARIA2.$CBANCARIA3.$CBANCARIA4.$CBANCARIA5.$CBANCARIA6 ;


  if (strlen($iban) > 1)
  {

  if (validarIBAN($iban)) {
  echo flashMessageOK("El iban ".$iban." es válido");
  } else {
  echo flashMessageNotOK("El iban ".$iban." no es válido");
  }
  echo "<hr>";

  }


?>


</div>



<?PHP
include_once '../../resource/footerPage.php';
?>