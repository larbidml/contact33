<?PHP
$sub_header ="NACIONALIDAD EXPEDIENTES EDIT";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';

//collect  data
	$terminobusqueda = $_POST['idnacionalidad'];

//create SQL 		
	$sqlQuery =" SELECT  *
	FROM contactos
	INNER JOIN nacionalidadexp
	ON contactos.id = nacionalidadexp.id
	WHERE idnacionalidad  = $terminobusqueda

	";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':terminobusqueda' => $terminobusqueda));
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_col = $statement->columnCount();
	//print_r($data);
//END SQL

$idnacionalidad = $data[0]["idnacionalidad"];
$id = $data[0]["id"];
$ref = $data[0]["ref"];
$ano = $data[0]["ano"];
$activo = $data[0]["activo"];
$ESTADO = $data[0]["ESTADO"];



//create SQL2 		
	$sqlQuery =" SELECT  *
	FROM estadosnacionalidad
	WHERE 1
	ORDER BY DESCRIESTADOS
	";
	$statement = $db->prepare($sqlQuery);
	$statement->execute();
	$data2 = $statement->fetchAll();
	$num_rows2 = $statement->rowCount() ;
	$num_col2 = $statement->columnCount();
	//print_r($data2);
//END SQL2

echo "<div class=\"container text-light bg-info\">\n";
echo "<form action=\"EDIT-NACIONALIDADEXP_R.php\" method=\"post\">\n";

//div1----
	echo "<div class=\"form-row bg-info\">\n";


	//nie
	echo "<div class=\"form-group col-md-2\">\n";
	echo "<label class=\" text-light\"  for=\"course\">  nie:</label>\n";
	echo "<input  type=\"text\" class=\"form-control text-white bg-dark\" id=\"nie\" name=\"nie\" value=\"{$data[0]["nif"]}\" disabled >\n";
	echo " </div>\n";

	//nombre
	echo "<div class=\"form-group col-md-4\">\n";
	echo "<label class=\" text-light\"  for=\"course\">  nombre:</label>\n";
	$nombreCompleto =  $data[0]["nombre1"]." ".$data[0]["apellido1"];
	echo "<input  type=\"text\" class=\"form-control text-white bg-dark\" id=\"nombre\" name=\"nombre\" value=\"{$nombreCompleto}\" disabled >\n";
	echo " </div>\n";

	//ref
	echo "<div class=\"form-group col-md-1\">\n";
	echo "<label class=\" text-light\"  for=\"course\">  ref:</label>\n";
	echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"ref\" name=\"ref\" value=\"{$data[0]["ref"]}\"  >\n";
	echo " </div>\n";

	//ano
	echo "<div class=\"form-group col-md-1\">\n";
	echo "<label class=\" text-light\"  for=\"course\">  ano:</label>\n";
	echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"ano\" name=\"ano\" value=\"{$data[0]["ano"]}\"  >\n";
	echo " </div>\n";

	//activo
	echo "<div class=\"form-group col-md-1\">\n";
	echo "<label class=\" text-light\"  for=\"course\">  activo:</label>\n";
	echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"activo\" name=\"activo\" value=\"{$data[0]["activo"]}\"  >\n";
	echo " </div>\n";

	//ESTADO
	echo "<div class=\"form-group col-md-12\">\n";
	echo "<label class=\" text-light\"  for=\"course\">  ESTADO:</label>\n";
	echo "<select class=\"form-control  \" id=\"ESTADO\" name=\"ESTADO\">\n" ;
	$valordefecto = $data[0]["ESTADO"];
	echo  "<option>$valordefecto</option>";
	for ($valor = 1; $valor <= $num_rows2; $valor++)
	{
		$valorestado = $data2[$valor]["DESCRIESTADOS"];
		echo  "<option>$valorestado</option>";
	}
	echo "</select>\n" ;
	echo " </div>\n";				

	echo " </div>\n";
//end div1----



//div6----
echo "<div class=\"form-row bg-info\">\n";
	//hidden
	echo "<input type=\"hidden\"  name=\"idnacionalidad\"   value=\"$idnacionalidad\">\n" ;
	echo "<input type=\"hidden\"  name=\"id\"   value=\"$id\">\n" ;
	echo "<input type=\"hidden\"  name=\"ref\"   value=\"$ref\">\n" ;
	echo "<input type=\"hidden\"  name=\"ano\"   value=\"$ano\">\n" ;
	

echo "<button type=\"submit\" class=\"btn btn-primary\">UPDATE</button>\n";
echo " </div>\n";
echo "<br>\n";
echo " </div>\n";
//end div6----

echo "</form>\n";
// end form
echo " </div>\n";



?>	



<?PHP
include_once '../../resource/footerPage.php';
?>