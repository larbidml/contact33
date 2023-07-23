<?PHP
$sub_header ="EDIT CITA NACIONALIDAD";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';
		 
//collect  data

$terminobusqueda = $_POST['id'];
//create SQL insert statement			
$sqlQuery = 
			"SELECT * FROM citanacionalidad
			WHERE id LIKE :terminobusqueda  
		
			";

$statement = $db->prepare($sqlQuery);
$statement->execute(array(':terminobusqueda' => $terminobusqueda));
$data = $statement->fetchAll();
$num_rows = $statement->rowCount() ;
$num_col = $statement->columnCount();
//print_r($data);

echo "<div class=\"container text-light bg-info\">\n";
//-- form -->
	echo "<form action=\"04-NACIONALIDAD_EDIT_R.php\" method=\"post\">\n";

			//div1----
				echo "<div class=\"form-row bg-info\">\n";
					//id
					echo "<input type=\"hidden\" class=\"form-control\" id=\"inputid\"  name=\"id\" value=\"{$data[0]["id"]}\">\n";

					// fecha
					echo "<div class=\"form-group col-md-2\">\n";
						echo "<label class=\" text-light\" for=\"course\">fecha:</label>\n";
						echo "<input  type=\"text\" class=\"form-control\" id=\"fecha\" name=\"fecha\"  value=\"{$data[0]["fecha"]}\">\n";
					echo " </div>\n";
					//hora
					echo "<div class=\"form-group col-md-2\">\n";
						echo "<label class=\" text-light\" for=\"course\"> hora:</label>\n";
						echo "<input  type=\"text\" class=\"form-control\" id=\"hora\" name=\"hora\"  value=\"{$data[0]["hora"]}\">\n";
					echo " </div>\n";
					//ref
					echo "<div class=\"form-group col-md-2\">\n";
						echo "<label class=\" text-light\"  for=\"course\"> REF:</label>\n";
						echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"ref\" name=\"ref\"  value=\"{$data[0]["ref"]}\">\n";
					echo " </div>\n";
					//nie
					echo "<div class=\"form-group col-md-2\">\n";
						echo "<label class=\" text-light\"  for=\"course\">  nie:</label>\n";
						echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"nie\" name=\"nie\" value=\"{$data[0]["nie"]}\"  >\n";
					echo " </div>\n";
				echo " </div>\n";
			//end div1----

			//div2----
				echo "<div class=\"form-row -bg-info\">\n";	
					//nombre//////////////////////
						//nombre
						echo "<div class=\"form-group col-md-4\">\n";
							echo "<label class=\" text-light\"  for=\"course\">nombre:</label>\n";
						echo "<input  type=\"text\" class=\"form-control\" id=\"nombre\" name=\"nombre\"  value=\"{$data[0]["nombre"]}\"   >\n";
						echo " </div>\n";								
						//apellido1
						echo "<div class=\"form-group col-md-3\">\n";
							echo "<label class=\" text-light\"  for=\"course\">Apellido1:</label>\n";
						echo "<input  type=\"text\" class=\"form-control\" id=\"apellido1\" name=\"apellido1\"  value=\"{$data[0]["apellido1"]}\"   >\n";
						echo " </div>\n";								
						//departe
						echo "<div class=\"form-group col-md-3\">\n";
							echo "<label class=\" text-light\"  for=\"course\">departe:</label>\n";
						echo "<input  type=\"text\" class=\"form-control\" id=\"departe\" name=\"departe\"  value=\"{$data[0]["departe"]}\"   >\n";
						echo " </div>\n";

						
						// precio
						echo "<div class=\"form-group col-md-1\">\n";
						echo "<label class=\" text-light\"  for=\"course\">precio:</label>\n";
						echo "<input  type=\"text\" class=\"form-control \" id=\"precio\" name=\"precio\"   value=\"{$data[0]["precio"]}\" >\n";
						echo " </div>\n";
						//pagado 
						echo "<div class=\"form-group col-md-1\">\n";
							echo "<label class=\" text-light\"  for=\"course\"> pagado:</label>\n";
							echo "<input  type=\"text\" class=\"form-control   \" id=\"pagado\" name=\"pagado\"  value=\"{$data[0]["pagado"]}\" >\n";
						echo " </div>\n";
					/////////////////////////////////


				echo " </div>\n";
			//end div2----
			
			//div3----
				echo "<div class=\"form-row bg-info\">\n";	
					//direccion////////////////////////

						//CORREO 
						echo "<div class=\"form-group col-md-5\">\n";
							echo "<label class=\" text-light\"  for=\"course\"> CORREO:</label>\n";
							echo "<input  type=\"text\" class=\"form-control   \" id=\"CORREO\" name=\"CORREO\"  value=\"{$data[0]["CORREO"]}\" >\n";
						echo " </div>\n";
						//TEL 
						echo "<div class=\"form-group col-md-2\">\n";
							echo "<label class=\" text-light\"  for=\"course\"> TEL:</label>\n";
							echo "<input  type=\"text\" class=\"form-control   \" id=\"TEL\" name=\"TEL\"  value=\"{$data[0]["TEL"]}\" >\n";
						echo " </div>\n";
						//nota 
						echo "<div class=\"form-group col-md-12\">\n";
							echo "<label class=\" text-light\"  for=\"course\"> nota:</label>\n";
							echo "<input  type=\"text\" class=\"form-control   \" id=\"nota\" name=\"nota\"  value=\"{$data[0]["nota"]}\" >\n";
						echo " </div>\n";

					//////////////////////////
				echo " </div>\n";
			//end div3----

			//div6----
				echo "<div class=\"form-row bg-info\">\n";
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