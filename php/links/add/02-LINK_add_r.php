<?PHP
$sub_header ="Añadir LINK ";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
?>

<?php
include_once '../../resource/Database.php';

//collect 
  $ORGANISMOnombre= $_POST['ORGANISMOnombre']; $ORGANISMOnombre=trim($ORGANISMOnombre) ;
  $bgcolor= $_POST['bgcolor']; $bgcolor=trim($bgcolor) ;
  $BUSQUIDA = $ORGANISMOnombre;
//


if(chekDuplicateEntries("organismos","ORGANISMOnombre",$ORGANISMOnombre ,$db))
{
$result= flashMessage("nif ya existe", "Fail");
}
else
{
try 
{

//create SQL insert statement
  $sqlInsert = "INSERT INTO organismos (
  ORGANISMOnombre ,
  bgcolor 

  )
  VALUES 
  (
  :ORGANISMOnombre ,
  :bgcolor 


  ) ";

  $statement = $db->prepare($sqlInsert);
  $statement->execute(array(	

  ':ORGANISMOnombre' => $ORGANISMOnombre ,
  ':bgcolor' => $bgcolor 


  ));
  //print_r($statement);
//

//create SQL insert statement			
  $sqlQuery = 
  "SELECT *
  FROM organismos
  WHERE ORGANISMOnombre LIKE :BUSQUIDA

    "; 

  $statement = $db->prepare($sqlQuery);
  $statement->execute(array(':BUSQUIDA' => $BUSQUIDA));
  $data = $statement->fetchAll();
  $num_rows = $statement->rowCount() ;
  //print_r($data);

//END SQL
$idorg  = $data[0]["idorg"];

//create SQL2 insert 
  $sqlInsert = "INSERT INTO tramites (
  idorg 


  )
  VALUES 
  (
  :idorg 



  ) ";

  $statement = $db->prepare($sqlInsert);
  $statement->execute(array(	

  ':idorg' => $idorg 



  ));
  //print_r($statement);
//


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










  }  


?>


</div>



<?PHP
include_once '../../resource/footerPage.php';
?>