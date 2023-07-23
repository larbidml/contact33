<?PHP
$sub_header ="DETALLES EDIT";
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
	FROM alquilerdetalles
	INNER JOIN contactos
	on alquilerdetalles.id = contactos.id

	where  alquilerdetalles.id = :id
	";


	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':id' => $id));
	$row = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	//print_r($data);
//end


//check if one new row was created
if ($statement->rowCount() >= 1) 
{

echo "<div class=\"container text-light bg-info\">\n";
echo "<form action=\"DETTALLES_EDIT_R.php\" method=\"post\">\n";


//div1
	echo "<div class=\"form-row bg-info\">\n";
	//id hidden
		echo "<input type=\"hidden\" class=\"form-control\" id=\"inputid\"  name=\"id\" value=\"{$row[0]["id"]}\">\n";
	//

	//nombre
		echo "<div class=\"form-group col-md-4\">\n";
		echo "<label class=\" text-light\"  for=\"course\">Nombre:</label>\n";
		$nombrecompleto =  $row[0]["nombre1"]." ".$row[0]["apellido1"]." ".$row[0]["apellido2"];
		echo "<input  type=\"text\" class=\"form-control bg-dark text-white\" id=\"nombre1\" name=\"nombre1\"  value=\"{$nombrecompleto}\"  disabled >\n";
		echo " </div>\n";
	// 	

    //contractaRenovat ++SELECT+++
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\"  for=\"course\">C Renovat:</label>\n";

		echo "<select class=\"form-control\" name=\"contractaRenovat\" id=\"contractaRenovat\">\n";
		if($row[0]["contractaRenovat"]){
			$valorcontract = "Si";
			$valorcontract1 = "1";
		}
		else{
			$valorcontract = "No";
			$valorcontract1 = "0";
		}
		echo "<option value=\"$valorcontract1\" >$valorcontract </option>\n";
			echo "<option value=\"1\" >Si</option>\n";
			echo "<option value=\"0\" >No</option>\n";
		echo "</select>\n";
		echo " </div>\n";
	//

	// fechacontratoanterior
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\" for=\"course\">F C anterior:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"fechacontratoanterior\" name=\"fechacontratoanterior\"  value=\"{$row[0]["fechacontratoanterior"]}\">\n";
		echo " </div>\n";
	//




	echo " </div>\n";
//end div1

echo "<hr>\n";

//div2
	echo "<div class=\"form-row -bg-info\">\n";	

	// datainici
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\" for=\"course\">data inici:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"datainici\" name=\"datainici\"  value=\"{$row[0]["datainici"]}\">\n";
		echo " </div>\n";
	//

	// datafi
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\" for=\"course\">data fi:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"datafi\" name=\"datafi\"  value=\"{$row[0]["datafi"]}\">\n";
		echo " </div>\n";
	//

	// importealquiler
		echo "<div class=\"form-group col-md-2\">\n";
		echo "<label class=\" text-light\" for=\"course\">importe alquiler:</label>\n";
		echo "<input  type=\"text\" class=\"form-control\" id=\"importealquiler\" name=\"importealquiler\"  value=\"{$row[0]["importealquiler"]}\">\n";
		echo " </div>\n";
	//





	echo " </div>\n";
//end div2

echo "<hr>\n";

//div3
	echo "<div class=\"form-row -bg-info\">\n";

    //tipoarrendador ++SELECT+++
	echo "<div class=\"form-group col-md-2\">\n";
	echo "<label class=\" text-light\"  for=\"course\">Tipo:</label>\n";

	echo "<select class=\"form-control\" name=\"tipoarrendador\" id=\"tipoarrendador\">\n";
	$valuetipoarrendador = $row[0]["tipoarrendador"];
	echo "<option value=\"$valuetipoarrendador \" >$valuetipoarrendador </option>\n";
		echo "<option value=\"PROPIETARI\" >PROPIETARI</option>\n";
		echo "<option value=\"AMINISTRADOR\" >AMINISTRADOR</option>\n";
	echo "</select>\n";
	echo " </div>\n";
//

//PERSONAFISICAOJURIDICA ++SELECT+++
	echo "<div class=\"form-group col-md-2\">\n";
	echo "<label class=\" text-light\"  for=\"course\">FISICA O JURIDICA :</label>\n";

	echo "<select class=\"form-control bg-warning\" name=\"PERSONAFISICAOJURIDICA\" id=\"PERSONAFISICAOJURIDICA\">\n";
	$valuePERSONAFISICAOJURIDICA = $row[0]["PERSONAFISICAOJURIDICA"];
	echo "<option value=\"$valuePERSONAFISICAOJURIDICA \" >$valuePERSONAFISICAOJURIDICA </option>\n";
		echo "<option value=\"FISICA\" >FISICA</option>\n";
		echo "<option value=\"JURIDICA\" >JURIDICA</option>\n";
	echo "</select>\n";
	echo " </div>\n";
//
// JURIDICACIF
echo "<div class=\"form-group col-md-2\">\n";
echo "<label class=\" text-light\" for=\"course\">JURIDICACIF:</label>\n";
echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"JURIDICACIF\" name=\"JURIDICACIF\"  value=\"{$row[0]["JURIDICACIF"]}\">\n";
echo " </div>\n";
//
// JURIDICAEMPRESA
echo "<div class=\"form-group col-md-5\">\n";
echo "<label class=\" text-light\" for=\"course\">JURIDICAEMPRESA:</label>\n";
echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"JURIDICAEMPRESA\" name=\"JURIDICAEMPRESA\"  value=\"{$row[0]["JURIDICAEMPRESA"]}\">\n";
echo " </div>\n";
//







	echo " </div>\n";
//end div3

echo "<hr>\n";
//div4
echo "<div class=\"form-row -bg-info\">\n";
// nombrearrendador
echo "<div class=\"form-group col-md-2\">\n";
echo "<label class=\" text-light\" for=\"course\">nombre arrendador:</label>\n";
echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"nombrearrendador\" name=\"nombrearrendador\"  value=\"{$row[0]["nombrearrendador"]}\">\n";
echo " </div>\n";
//

// apellido1arrendador
echo "<div class=\"form-group col-md-2\">\n";
echo "<label class=\" text-light\" for=\"course\">apellido1 arrendador:</label>\n";
echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"apellido1arrendador\" name=\"apellido1arrendador\"  value=\"{$row[0]["apellido1arrendador"]}\">\n";
echo " </div>\n";
//

// apellido2arrendador
echo "<div class=\"form-group col-md-2\">\n";
echo "<label class=\" text-light\" for=\"course\">apellido2 arrendador:</label>\n";
echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"apellido2arrendador\" name=\"apellido2arrendador\"  value=\"{$row[0]["apellido2arrendador"]}\">\n";
echo " </div>\n";
//

// niearrendador
echo "<div class=\"form-group col-md-2\">\n";
echo "<label class=\" text-light\" for=\"course\">nie arrendador:</label>\n";
echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"niearrendador\" name=\"niearrendador\"  value=\"{$row[0]["niearrendador"]}\">\n";
echo " </div>\n";
//


echo " </div>\n";
//end div4




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
