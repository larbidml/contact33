<?PHP
$sub_header ="Modificar  organizacion";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';

//collect data
	$terminobusqueda2 = $_POST['terminobusqueda2'];
	$terminobusqueda2=trim($terminobusqueda2) ;

try 
{

//create SQL 		
	$sqlQuery = 
	"SELECT * FROM organismos
	WHERE ORGANISMOnombre LIKE :terminobusqueda2 						
	";

	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':terminobusqueda2' => "%".$terminobusqueda2."%"));
	$row = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;	
	//print_r($row);
//end


//check if one new row was created
if ($statement->rowCount() >= 1) 
{

echo "<div class=\"container text-light bg-info\">\n";
echo "<form action=\"04-org_update_form_r.php\" method=\"post\">\n";

//div1
	echo "<div class=\"form-row bg-info\">\n";
	//idorg
		echo "<input type=\"hidden\" class=\"form-control\" id=\"idorg\"  name=\"idorg\" value=\"{$row[0]["idorg"]}\">\n";


	// ORGANISMOnombre
		echo "<div class=\"form-group col-md-12\">\n";
		echo "<label class=\" text-light\" for=\"course\">ORGANISMOnombre:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"ORGANISMOnombre\" name=\"ORGANISMOnombre\"  value=\"{$row[0]["ORGANISMOnombre"]}\">\n";
		echo " </div>\n";

	//bgcolor
	echo "<div class=\"form-group col-md-5\">\n";
	echo "<label class=\" text-light\"  for=\"course\">bgcolor:</label>\n";
	echo "<select class=\"form-control bg-dark text-light\" name=\"bgcolor\" id=\"bgcolor\">\n";
	$bgcolorValor = $row[0]["bgcolor"];
	echo "<option value=\"{$bgcolorValor}\" >{$bgcolorValor}</option>\n";
	echo "<option value=\"text-dark\" >negro</option>\n";
	echo "<option value=\"text-primary\" >azul</option>\n";
	echo "<option value=\"text-success\" >verde</option>\n";
	echo "<option value=\"text-danger\" >rojo</option>\n";
	echo "<option value=\"text-info\" >azul claro</option>\n";
	echo "<option value=\"text-warning\" >orange</option>\n";
	echo "</select>\n";




	echo " </div>\n";
//end div1

echo "<hr>\n";



//div6
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
