<?PHP
$sub_header ="ALQUILER";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

//collect
	$id = $_POST['id'];
//

try 
{
	
//create SQL 		
	$sqlQuery =
	"SELECT *
	FROM alquilerdetalles
	INNER JOIN contactos
	on alquilerdetalles.id = contactos.id

	where  alquilerdetalles.id = :id
	";


	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':id' => $id));
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	//print_r($data);


//

//check if row is not null
if ($statement->rowCount() == 0) 
{
$result = flashMessage("no hay resultados", "Fail");

}
else
{

$titulo_table ="registro";
// display resultados
echo" <div class=\"container \">\n";
echo "<h2 class=\"text-center text-light\">$num_rows $titulo_table</h2>\n";
echo "</div >\n";

   
for ($row=0; $row < $num_rows ; $row++)
{              
echo" <div class=\"container bg-light\">\n";
if(isset($data))
{



//nombre
	if(strlen($data[$row]["nombre1"]) >1 )
	{
	$NOMBRECOMPLETO = $data[$row]["nombre1"]." ".$data[$row]["apellido1"]." ".$data[$row]["apellido2"];
	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">NOMBRE</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$NOMBRECOMPLETO}</div>\n";
	echo "</div>\n"; 
	}
//


//datainici
	if($data[$row]["datainici"] > 1 )
	{
	$datainici = $data[$row]["datainici"][8].$data[$row]["datainici"][9].
	"/".
	$data[$row]["datainici"][5].$data[$row]["datainici"][6].
	"/".
	$data[$row]["datainici"][0].$data[$row]["datainici"][1].$data[$row]["datainici"][2].$data[$row]["datainici"][3];

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">Fecha inicio</div>\n";                    
	echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-9  text-dark \">{$datainici}</div>\n";
	//echo obtener_envigor_fecha($data[$row][2]);
	echo "</div>\n";

	}
//

//datafi
	if($data[$row]["datafi"] > 1 )
	{
	$datafi = $data[$row]["datafi"][8].$data[$row]["datafi"][9].
	"/".
	$data[$row]["datafi"][5].$data[$row]["datafi"][6].
	"/".
	$data[$row]["datafi"][0].$data[$row]["datafi"][1].$data[$row]["datafi"][2].$data[$row]["datafi"][3];

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">Fecha final</div>\n";                    
	echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-9  text-dark \">{$datafi}</div>\n";
	//echo obtener_envigor_fecha($data[$row][2]);
	echo "</div>\n";

	}
//


//importealquiler
	if(strlen($data[$row]["importealquiler"]) >1 )
	{
	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3 bg-dark text-white \">importe alquiler</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["importealquiler"]}</div>\n";
	echo "</div>\n"; 
	}
//

//contractaRenovat

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">contracta Renovat</div>\n";
	if($data[$row]["contractaRenovat"]){
	$valorcontractaRenovat = "Si";
	}   
	else{
		$valorcontractaRenovat = "No";
	}                 
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$valorcontractaRenovat }</div>\n";
	echo "</div>\n"; 
	
//


//fechacontratoanterior

	$fechacontratoanterior = $data[$row]["fechacontratoanterior"][8].$data[$row]["fechacontratoanterior"][9].
	"/".
	$data[$row]["fechacontratoanterior"][5].$data[$row]["fechacontratoanterior"][6].
	"/".
	$data[$row]["fechacontratoanterior"][0].$data[$row]["fechacontratoanterior"][1].$data[$row]["fechacontratoanterior"][2].$data[$row]["fechacontratoanterior"][3];

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">fecha contrato anterior</div>\n";                    
	echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-9  text-dark \">{$fechacontratoanterior}</div>\n";
	//echo obtener_envigor_fecha($data[$row][2]);
	echo "</div>\n";

	
//

	//tipoarrendador

		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">tipo arrendador</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["tipoarrendador"]}</div>\n";
		echo "</div>\n"; 
		
	//

//PERSONAFISICAOJURIDICA

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">FISICA O JURIDICA</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["PERSONAFISICAOJURIDICA"]}</div>\n";
	echo "</div>\n"; 
	
//

//JURIDICAEMPRESA

echo "<div class=\"row\">\n";
echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">JURIDICA EMPRESA</div>\n";                    
echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["JURIDICAEMPRESA"]}</div>\n";
echo "</div>\n"; 

//

//JURIDICACIF

echo "<div class=\"row\">\n";
echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">JURIDICA CIF</div>\n";                    
echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["JURIDICACIF"]}</div>\n";
echo "</div>\n"; 

//


//nombrearrendador

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">nombre arrendador</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["nombrearrendador"]}</div>\n";
	echo "</div>\n"; 
	
//

//apellido1arrendador

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">apellido1 arrendador</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["apellido1arrendador"]}</div>\n";
	echo "</div>\n"; 
	
//


//apellido2arrendador

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">apellido2 arrendador</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["apellido2arrendador"]}</div>\n";
	echo "</div>\n"; 
	
//


//niearrendador

	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-3  bg-dark text-white \">nie arrendador</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-9  \">{$data[$row]["niearrendador"]}</div>\n";
	echo "</div>\n"; 
	
//



echo "</div>\n"; 


}

?>  

<div class="container bg-light">
<div class="row  bg-dark text-white">







<!-- boton UPDATE -->
<!-- <form method="post" action="../update/03-nif_update_form.php"> -->
<form method="post"  action="DETTALLES_EDIT.php?var1=x&amp;var2=y&amp;var3=z" TARGET="_blanc">
<?PHP 
$nif =$data[$row]["nif"];
echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"id\" name=\"id\" value=\"$id\" >";
?>
<div class="row-sm">
<button type="submit" class="btn bg-secondary">update</button>
</div>



</form>		




</div>
</div>
</div>
<div class="row  bg-dark text-white">
</div>


<?PHP 
echo "<br>\n";

}
//display end
}
} 
catch (PDOException $ex) 
{
$result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: " . $ex->getMessage() . "</p>";
}


if (isset($result)) echo $result;

?>

<?PHP   include_once '../../resource/footerPage.php'; ?>