<?PHP
$sub_header ="Modificar  contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

try{

//collect form data and store in variables
$id= $_POST['id']; $id=trim($id) ;  
$doctypo= $_POST['doctypo']; $doctypo=trim($doctypo) ;$doctypo =strtoupper($doctypo)  ;
$nif= $_POST['nif']; $nif=trim($nif) ;$nif =strtoupper($nif)  ;
$Fvenc= $_POST['Fvenc']; $Fvenc=trim($Fvenc) ;
$nombre1= $_POST['nombre1']; $nombre1=trim($nombre1) ;$nombre1 =strtoupper($nombre1)  ;
$apellido1= $_POST['apellido1']; $apellido1=trim($apellido1) ;$apellido1 =strtoupper($apellido1)  ;
$apellido2= $_POST['apellido2']; $apellido2=trim($apellido2) ;$apellido2 =strtoupper($apellido2)  ;
$tel1= $_POST['tel1']; $tel1=trim($tel1) ;
$tel2= $_POST['tel2']; $tel2=trim($tel2) ;
$CALLE= $_POST['CALLE']; $CALLE=trim($CALLE) ;$CALLE =strtoupper($CALLE)  ;
$NOCALLE= $_POST['NOCALLE']; $NOCALLE=trim($NOCALLE) ;
$PISO= $_POST['PISO']; $PISO=trim($PISO) ;
$PUERTA= $_POST['PUERTA']; $PUERTA=trim($PUERTA) ;
$CP= $_POST['CP']; $CP=trim($CP) ;
$CIUDAD= $_POST['CIUDAD']; $CIUDAD=trim($CIUDAD) ;$CIUDAD =strtoupper($CIUDAD)  ;
$CATASTRO= $_POST['CATASTRO']; $CATASTRO=trim($CATASTRO) ;
$fn2= $_POST['fn2']; $fn2=trim($fn2) ;
$CBANCARIA1= $_POST['CBANCARIA1']; $CBANCARIA1=trim($CBANCARIA1) ;$CBANCARIA1 =strtoupper($CBANCARIA1)  ;
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
$FVPASPORT= $_POST['FVPASPORT']; $FVPASPORT=trim($FVPASPORT) ;
$GENERO= $_POST['GENERO']; $GENERO=trim($GENERO) ;$GENERO =strtoupper($GENERO)  ;
$FAMILIA= $_POST['FAMILIA']; $FAMILIA=trim($FAMILIA) ;
$NACIONALIDAD= $_POST['NACIONALIDAD']; $NACIONALIDAD=trim($NACIONALIDAD) ;$NACIONALIDAD =strtoupper($NACIONALIDAD)  ;
$ESTADOCIVIL= $_POST['ESTADOCIVIL']; $ESTADOCIVIL=trim($ESTADOCIVIL) ;$ESTADOCIVIL =strtoupper($ESTADOCIVIL)  ;

$LUGAR_NACIMIENTO= $_POST['LUGAR_NACIMIENTO']; $LUGAR_NACIMIENTO=trim($LUGAR_NACIMIENTO) ;
$SOPORTE= $_POST['SOPORTE']; $SOPORTE=trim($SOPORTE) ;
$ref_renta= $_POST['ref_renta']; $ref_renta=trim($ref_renta) ;
$NSSOCIAL= $_POST['NSSOCIAL']; $NSSOCIAL=trim($NSSOCIAL) ;
$LINK= $_POST['LINK']; $LINK=trim($LINK) ;
$niftipo= $_POST['niftipo']; $niftipo=trim($niftipo) ;


$FAVORITO= "1" ;






//SQL statement to update categoriaword
$sqlUpdate = "UPDATE contactos SET

id  =:id ,
doctypo  =:doctypo ,
nif  =:nif ,
Fvenc  =:Fvenc ,
nombre1  =:nombre1 ,
apellido1  =:apellido1 ,
apellido2  =:apellido2 ,
tel1  =:tel1 ,
tel2  =:tel2 ,
CALLE  =:CALLE ,
NOCALLE  =:NOCALLE ,
PISO  =:PISO ,
PUERTA  =:PUERTA ,
CP  =:CP ,
CIUDAD  =:CIUDAD ,
CATASTRO  =:CATASTRO ,
fn2  =:fn2 ,
CBANCARIA1  =:CBANCARIA1 ,
CBANCARIA2  =:CBANCARIA2 ,
CBANCARIA3  =:CBANCARIA3 ,
CBANCARIA4  =:CBANCARIA4 ,
CBANCARIA5  =:CBANCARIA5 ,
CBANCARIA6  =:CBANCARIA6 ,
TSANITARIA  =:TSANITARIA ,
TFnumerosa  =:TFnumerosa ,
correo  =:correo ,
nota  =:nota ,
FAVORITO  =:FAVORITO ,
PASAPORTE  =:PASAPORTE ,
FVPASPORT  =:FVPASPORT ,
GENERO  =:GENERO ,
FAMILIA  =:FAMILIA ,
NACIONALIDAD  =:NACIONALIDAD ,
ESTADOCIVIL  =:ESTADOCIVIL ,
LUGAR_NACIMIENTO  =:LUGAR_NACIMIENTO  ,
SOPORTE  =:SOPORTE  ,
ref_renta  =:ref_renta  ,
NSSOCIAL  =:NSSOCIAL ,
LINK  =:LINK ,
niftipo  =:niftipo 



WHERE id=:id";

//use PDO prepared to sanitize SQL statement
$statement = $db->prepare($sqlUpdate);

//execute the statement
//hay que incluir tambien :id => $id
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
':LUGAR_NACIMIENTO' => $LUGAR_NACIMIENTO   ,              
':SOPORTE' => $SOPORTE  ,               
':ref_renta' => $ref_renta  ,
':NSSOCIAL' => $NSSOCIAL  ,
':LINK' => $LINK  ,
':niftipo' => $niftipo  

));
//end sql

$result= flashMessage("Modificación exitosa","Pass");


}
catch (PDOException $ex)
{
$result= flashMessage("$ex->getMessage()", "Fail");
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






<?PHP
include_once '../../resource/footerPage.php';
?>
