<?PHP
$sub_header ="LINKS EDIT";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';
		 
//collect
	$idorg = $_POST['idorg'];

//create SQL insert statement			
	$sqlQuery = 
	"SELECT *

	FROM tramites 

	INNER JOIN organismos
	on organismos.idorg = tramites.idorg

	WHERE organismos.idorg LIKE :idorg 


		"; 

	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':idorg' => $idorg));
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	//print_r($data);

//END SQL

$ORGANISMOnombre = $data[0]["ORGANISMOnombre"];

echo "<div class=\"container text-light bg-info\">\n";
//-- form -->
	echo "<form action=\"04-LINK_EDIT_R.php\" method=\"post\">\n";
echo "<h3>$ORGANISMOnombre</h3>";
//div1----
	echo "<div class=\"form-row bg-info\">\n";
		//hidden
		echo "<input type=\"hidden\"  id=\"Id\"  name=\"Id\" value=\"{$data[0]["Id"]}\">\n";
		echo "<input type=\"hidden\"  id=\"idorg\"  name=\"idorg\" value=\"{$data[0]["idorg"]}\">\n";

		// TRAMITElink
		echo "<div class=\"form-group col-md-12\">\n";
			echo "<label class=\" text-light\" for=\"course\">WEB link:</label>\n";
			echo "<input  type=\"text\" class=\"form-control text-primary \" id=\"TRAMITElink\" name=\"TRAMITElink\"  value=\"{$data[0]["TRAMITElink"]}\">\n";
		echo " </div>\n";

				// SOLICITUDLINK
				echo "<div class=\"form-group col-md-12\">\n";
				echo "<label class=\" text-light\" for=\"course\">SOLICITUD link:</label>\n";
				echo "<input  type=\"text\" class=\"form-control text-primary \" id=\"SOLICITUDLINK\" name=\"SOLICITUDLINK\"  value=\"{$data[0]["SOLICITUDLINK"]}\">\n";
			echo " </div>\n";
		//DOC1
		echo "<div class=\"form-group col-md-12\">\n";
			//echo "<label class=\" text-light\" for=\"course\"> DOC1:</label>\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC1\" name=\"DOC1\"  value=\"{$data[0]["DOC1"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC2\" name=\"DOC2\"  value=\"{$data[0]["DOC2"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC3\" name=\"DOC3\"  value=\"{$data[0]["DOC3"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC4\" name=\"DOC4\"  value=\"{$data[0]["DOC4"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC5\" name=\"DOC5\"  value=\"{$data[0]["DOC5"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC6\" name=\"DOC6\"  value=\"{$data[0]["DOC6"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC7\" name=\"DOC7\"  value=\"{$data[0]["DOC7"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC8\" name=\"DOC8\"  value=\"{$data[0]["DOC8"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC9\" name=\"DOC9\"  value=\"{$data[0]["DOC9"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC10\" name=\"DOC10\"  value=\"{$data[0]["DOC10"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC11\" name=\"DOC11\"  value=\"{$data[0]["DOC11"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC12\" name=\"DOC12\"  value=\"{$data[0]["DOC12"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC13\" name=\"DOC13\"  value=\"{$data[0]["DOC13"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC14\" name=\"DOC14\"  value=\"{$data[0]["DOC14"]}\">\n";
			echo "<input  type=\"text\" class=\"form-control\" id=\"DOC15\" name=\"DOC15\"  value=\"{$data[0]["DOC15"]}\">\n";

	echo " </div>\n";
//end div1----


//div6----
	echo "<div class=\"form-row bg-info\">\n";
		echo "<button type=\"submit\" class=\"btn btn-warning\">UPDATE</button>\n";
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