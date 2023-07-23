<?PHP
$sub_header ="Modificar  contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

try{

//collect form data and store in variables
$idnacionalidad= $_POST['idnacionalidad']; 
$id= $_POST['id']; $id=trim($id) ;
$ref= $_POST['ref']; $ref=trim($ref) ;
$ano= $_POST['ano']; $ano=trim($ano) ;
$activo= $_POST['activo']; $activo=trim($activo) ;
$ESTADO= $_POST['ESTADO']; $ESTADO=trim($ESTADO) ;
    


//SQL statement to update categoriaword
$sqlUpdate = "UPDATE nacionalidadexp SET

idnacionalidad  =:idnacionalidad ,
id  =:id ,
ref  =:ref ,
ano  =:ano ,
activo  =:activo ,
ESTADO  =:ESTADO 



WHERE idnacionalidad=:idnacionalidad";


$statement = $db->prepare($sqlUpdate);
$statement->execute(array(

':idnacionalidad' => $idnacionalidad ,
':id' => $id ,
':ref' => $ref ,
':ano' => $ano ,
':activo' => $activo ,
':ESTADO' => $ESTADO              





));
//end sql








$result= flashMessage("Modificación exitosa","Pass");


}
catch (PDOException $ex)
{
$result= flashMessage("$ex->getMessage()", "Fail");
}




?>

<?php if (isset($result)) echo $result; ?>

<!-- end -->
<?PHP
include_once '../../resource/footerPage.php';
?>
