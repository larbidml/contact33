<?PHP
$sub_header ="ALQUILER EDIT";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';

//collect data
$id = $_POST['id'];


try 
{

//create SQL 		
	$sqlQuery =
	"SELECT *
	FROM alquiler
	INNER JOIN contactos
	on alquiler.id = contactos.id

	where  alquiler.id = :id
	";


	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':id' => $id));
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	//print_r($data);

//


//check if one new row was created
if ($statement->rowCount() >= 1) 
{

echo "<div class=\"container text-light bg-info\">\n";
echo "<form action=\"EDIT-ALQUILER_R.php\" method=\"post\">\n";

//div1
	echo "<div class=\"form-row bg-info\">\n";
	//id hidden
		echo "<input type=\"hidden\" class=\"form-control\" id=\"inputid\"  name=\"id\" value=\"{$data[0]["id"]}\">\n";
		echo "<input type=\"hidden\" class=\"form-control\" id=\"idalquiler\"  name=\"idalquiler\" value=\"{$data[0]["idalquiler"]}\">\n";

		//


	// nif
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\" for=\"course\">NIF:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"nif\" name=\"nif\"  value=\"{$data[0]["nif"]}\">\n";
		echo " </div>\n";
	//

	//nombre1
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\"  for=\"course\">Nombre1:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"nombre1\" name=\"nombre1\"  value=\"{$data[0]["nombre1"]}\"   >\n";
		echo " </div>\n";
	// 	

	//apellido1
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\"  for=\"course\">Apellido1:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"apellido1\" name=\"apellido1\"  value=\"{$data[0]["apellido1"]}\"   >\n";
		echo " </div>\n";
	//
	//PRECIO
		echo "<div class=\"form-group col-md-1\">\n";
		echo "<label class=\" text-light\"  for=\"course\">PRECIO:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"PRECIO\" name=\"PRECIO\"  value=\"{$data[0]["PRECIO"]}\"   >\n";
		echo " </div>\n";
	//

	//PAGADO
		echo "<div class=\"form-group col-md-1\">\n";
		echo "<label class=\" text-light\"  for=\"course\">PAGADO:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"PAGADO\" name=\"PAGADO\"  value=\"{$data[0]["PAGADO"]}\"   >\n";
		echo " </div>\n";
	//

	//LISTO ++SELECT+++
		echo "<div class=\"form-group col-md-1\">\n";
		echo "<label class=\" text-light\"  for=\"course\">LISTO:</label>\n";
		echo "<select class=\"form-control\" name=\"LISTO\" id=\"LISTO\">\n";
			if($data[0]["LISTO"])
			{
				echo "<option value=\"{$data[0]["LISTO"]}\" >SI</option>\n";
			}
			else
			{
				echo "<option value=\"{$data[0]["LISTO"]}\" >NO</option>\n";
			}
			
			echo "<option value=\"1\" >SI</option>\n";
			echo "<option value=\"0\" >NO</option>\n";
		echo "</select>\n";
		echo " </div>\n";
	//

	//DOCS ++SELECT+++
	echo "<div class=\"form-group col-md-1\">\n";
	echo "<label class=\" text-light\"  for=\"course\">DOCS:</label>\n";
	echo "<select class=\"form-control\" name=\"DOCS\" id=\"DOCS\">\n";
		if($data[0]["DOCS"])
		{
			echo "<option value=\"{$data[0]["DOCS"]}\" >SI</option>\n";
		}
		else
		{
			echo "<option value=\"{$data[0]["DOCS"]}\" >NO</option>\n";
		}
		
		echo "<option value=\"1\" >SI</option>\n";
		echo "<option value=\"0\" >NO</option>\n";
	echo "</select>\n";
	echo " </div>\n";
//

	echo " </div>\n";
//end div1

echo "<hr>\n";





//div6 boton
echo "<div class=\"form-row bg-info\">\n";
//boton
	echo "<button type=\"submit\" class=\"btn btn-primary\">UPDATE</button>\n";
	echo " </div>\n";
	echo "<br>\n";

echo " </div>\n";
//end div6

echo "</form>\n";
echo " </div>\n";


}
else
{
$result = "<p style='padding:20px; border: 1px solid gray; color: red;'> there is no result</p>";
}
} 
catch (PDOException $ex) 
{
$result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: " . $ex->getMessage() . "</p>";
}
if (isset($result)) echo $result;
?>	

<?PHP
include_once '../../resource/footerPage.php';
?>
