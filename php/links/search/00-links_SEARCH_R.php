<?PHP
$sub_header ="LINKS";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

//collect form data and store in variables
$idorg = $_POST['idorg'];

			
try 
{

	
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
	$row = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	//print_r($row);

//END SQL




	$num_col = $statement->columnCount();
	//print_r($row);

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
//echo "<h2 class=\"text-center text-light\">$num_rows $titulo_table</h2>\n";
echo "</div >\n";

   
for ($j=0; $j < $num_rows; $j++)
{              
echo" <div class=\"container bg-light\">\n";
          

                      

echo "<div class=\"row\">\n";
$ORGANISMOnombre=$row[$j]["ORGANISMOnombre"];
echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \"><h1>{$ORGANISMOnombre}</h1></div>\n";
echo "</div>\n"; 

if(strlen($row[$j]["TRAMITElink"])>2)
{
echo "<div class=\"row\">\n";
	$TRAMITElink=$row[$j]["TRAMITElink"];                    
	//secho "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$TRAMITElink}</div>\n";
	echo "<div class=\" col-8 col-sm-8 col-md-10   col-lg-10  \"><a href=\"{$TRAMITElink}/\"><b>WEB link</b></a></div>\n";  
echo "</div>\n";
}
 
if(strlen($row[$j]["SOLICITUDLINK"])>2)
{
echo "<div class=\"row\">\n";
	$SOLICITUDLINK=$row[$j]["SOLICITUDLINK"];  
	ECHO $SOLICITUDLINK ;                  
	//secho "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$SOLICITUDLINK}</div>\n";
	echo "<div class=\" col-8 col-sm-8 col-md-10   col-lg-10  \"><a href=\"{$SOLICITUDLINK}/\"><b>SOLICITUD LINK</b></a></div>\n";  
echo "</div>\n"; 
 }

for ($k=1; $k < 16; $k++)
{  
$valordoc = "DOC".$k;	
if(strlen($row[$j]["$valordoc"])>1)
{
$DOC1=$row[$j]["$valordoc"];
echo "<div class=\"row\">\n";
//echo "<div class=\" col-4 col-sm-1 col-md-1   col-lg-1  \">-</div>\n";                    
echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \"> {$DOC1}</div>\n";
echo "</div>\n"; 
}
}






echo "</div>\n"; 

}

//container 
echo "<div class=\"container bg-light\">\n" ;
echo "<div class=\"form-row bg-light\">\n" ;
			//form edit
			echo "<form  action=\"03-LINK_EDIT.php\" method=\"post\">\n" ;
			echo "<input type=\"hidden\"  name=\"idorg\"   value=\"$idorg\">\n" ;			
			echo "<div class=\"form-group col-md-12\">\n" ;
			echo "<button type=\"bg-warning\" class=\"btn btn-warning\">edit</button>\n" ;
			echo "</div>\n" ;
			echo "</form>\n" ;

			//form return
			echo "<form  action=\"00-links_SEARCH.php\" method=\"post\">\n" ;
			//echo "<input type=\"hidden\"  name=\"Hmes\"   value=\"$Hmes\">\n" ;
			echo "<div class=\"form-group col-md-12\">\n" ;
			echo "<button type=\"bg-warning\" class=\"btn btn-success\">Return</button>\n" ;
			echo "</div>\n" ;
			echo "</form>\n" ;

echo "</div>\n" ; 
echo "</div>\n" ;// end container -->


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

