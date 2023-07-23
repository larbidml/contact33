<?PHP
	$sub_header ="Contactos";
	include_once '../../resource/headerPage.php';
	include_once '../../resource/Database.php';
	include_once '../../resource/utilities.php';

	$terminobusqueda = $_POST['terminobusqueda'];
	$terminobusqueda=trim($terminobusqueda) ;

	if ($terminobusqueda == "TODOS"){ $terminobusqueda = "%%";}
			
try 
{
	include_once '../../resource/PARAMETERS.php';
	$sqlQuery = 
				"SELECT * FROM contactos
				WHERE DEPARTE LIKE :terminobusqueda
				and   `REF` > 0
				ORDER BY FPCR DESC , REF DESC;
				
				";

$statement = $db->prepare($sqlQuery);
//$statement->execute(array(':DEPARTE' => "%".$DEPARTE."%"));
$statement->execute(array(':terminobusqueda' => "%".$terminobusqueda."%"));
$row = $statement->fetchAll();
$num_rows = $statement->rowCount() ;
//print_r($row);	

//check if one new row was created
if ($statement->rowCount() == 0) 
{
	$result = $messageNoResult;	
}
else
{
	//suma credito
	$suma_creditos=0;
	for ($j=0; $j < $num_rows; $j++)
	{ 
	$diferencia =    $row[$j]["PRECIO"]-$row[$j]["PAGADO"]  ; 
	$suma_creditos= $suma_creditos+ $diferencia ;                    
	}

	//display resultado

	$table_Headers=array("FPCR","REF","NOMBRE","nif","P","C","DEPARTE");
	$table_body = array("FPCR","REF","NOMBRE","nif","PRECIO","PAG","DEPARTE");

	$titulo_table = "Falta  ".$suma_creditos." Euros" ;

	//display
		echo" <div class=\"container\">";
		echo "<h3 class=\" text-white text-center \">$titulo_table</h3>\n";
		echo "<table class=\"table-responsive-md table  table-striped\">\n";

		// table header
		echo "<thead class=\"thead-dark\"\n";
			echo "<tr>\n";
			foreach($table_Headers as $value_table_header)
			{
			echo "<th>$value_table_header</th>\n";
			}
			echo "</tr>\n";
		echo "</thead>\n";
		
		//table body
			$columnas_numero =count($table_body);
			echo "<tbody class=\"bg-light\">	\n";
			for ($j=0; $j < $num_rows; $j++)
			{
				echo "<tr>\n";         
					// FPCR
					echo "<td>";
					echo $row[$j]["FPCR"];
					echo  "</td>\n";
					// REF
					echo "<td>";
					echo $row[$j]["REF"];
					echo  "</td>\n";

					// $NOMBRECOMPLETO 
					if(($row[$j]["PRECIO"]-$row[$j]["PAGADO"]) == 10)
					{ 
						$NOMBRECOMPLETO =$row[$j]["apellido1"]." ".$row[$j]["apellido2"]." , ". $row[$j]["nombre1"];
						echo "<td class=\" text-danger bg-warning \">";
						echo $NOMBRECOMPLETO ;
						echo  "</td>\n";
					}
					else
					{
						$NOMBRECOMPLETO =$row[$j]["apellido1"]." ".$row[$j]["apellido2"]." , ". $row[$j]["nombre1"];
						echo "<td >";
						echo $NOMBRECOMPLETO ;
						echo  "</td>\n";
					}

					
					// nif
					echo "<td>";
					echo $row[$j]["nif"];
					echo  "</td>\n";
					// PRECIO
					echo "<td>";
					echo $row[$j]["PRECIO"];
					echo  "</td>\n";
					// PAGADO
					echo "<td>";
					echo $row[$j]["PAGADO"];
					echo  "</td>\n";
					// DEPARTE
					echo "<td>";
					echo $row[$j]["DEPARTE"];
					echo  "</td>\n";
				echo "</tr>\n"; 			
			}
			echo"  </tbody>\n ";

		echo "</table>\n";
		echo "</div>";

	//display end
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