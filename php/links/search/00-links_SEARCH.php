<?PHP
$sub_header ="LINKS";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';




	
//create SQL 		
	$sqlQuery ="SELECT * 
										
	FROM organismos
	ORDER BY ORGANISMOnombre

	"; 

	$statement = $db->prepare($sqlQuery);
	$statement->execute();
	$row = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_col = $statement->columnCount();
	//print_r($row);
//


echo "<div class=\"container text-light bg-info\">\n";
echo "<form action=\"00-links_SEARCH_R.php\" method=\"post\">\n";
//div1
	echo "<div class=\"form-row bg-info\">\n";

	echo "<div class=\"form-group col-md-8\">\n";
	echo "<label class=\" text-light\"  for=\"course\">Tipo:</label>\n";
		echo"<select class=\"form-control  \" id=\"idorg\" name=\"idorg\">\n";
		for ($j=0; $j < $num_rows; $j++)
		{  
			$valor1 =$row[$j]["idorg"];					
			$valor2 =$row[$j]["ORGANISMOnombre"];
			$valor3 =$row[$j]["bgcolor"];					

			echo "<option  class=\"$valor3\"  value=$valor1><b>{$valor2}</b></option>\n";                                             												
		}
		echo "</select>\n";
	echo " </div>\n";

	echo " </div>\n";
//end div1






//div6 boton
echo "<div class=\"form-row bg-info\">\n";
//boton
	echo "<button type=\"submit\" class=\"btn btn-primary\">search</button>\n";
	echo " </div>\n";
	echo "<br>\n";

echo " </div>\n";
//end div6

echo "</form>\n";
echo " </div>\n";


?>


<?PHP   include_once '../../resource/footerPage.php'; ?>

