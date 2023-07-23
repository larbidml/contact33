<?PHP

//collect form data and store in variables
//FVUELO
$FVUELO = $_POST['FVUELO'];
$FVUELO=trim($FVUELO) ;
$FVUELO = $FVUELO[8].$FVUELO[9]."/".$FVUELO[5].$FVUELO[6]."/".$FVUELO[0].$FVUELO[1].$FVUELO[2].$FVUELO[3];

//$APELLIDONOMBRE
$nombre1 = $_POST['nombre1'];
$nombre1=trim($nombre1) ;
$apellido1 = $_POST['apellido1'];
$apellido1=trim($apellido1) ;
$APELLIDONOMBRE = $apellido1." ".$nombre1 ;
//NIE
$nif = $_POST['nif'];
$nif=trim($nif) ;
//PASAPORTE
$PASAPORTE = $_POST['PASAPORTE'];
$PASAPORTE=trim($PASAPORTE) ;
//tel1
$tel1 = $_POST['tel1'];
$tel1=trim($tel1) ;




//$PARAMETROS
$PARAMETROS = array
(	
	"FVOL",
	"NVOL",
	"APELLIDONOMBRE",
	"NIE",
	"PASAPORTE",
	"ADRESS",
  "TEL1",
  "TEL2"
);

//$PARAMETROSDATOS
$PARAMETROSDATOS = array
(	
	$FVUELO,
	"-",
	$APELLIDONOMBRE,
	$nif,
	$PASAPORTE,
	"TANGER",
  $tel1,
  $tel1

	
);

$ELEMENTOS = count($PARAMETROSDATOS,1);
//echo "elementos ".$ELEMENTOS ;


$xw = xmlwriter_open_memory();
xmlwriter_set_indent($xw, 1);
$res = xmlwriter_set_indent_string($xw, ' ');
//xmlwriter_start_document($xw, '1.0', 'UTF-8');

include_once 'HEADER.svg';

///////////////////////////////////////////////////////




    //<svg>
    xmlwriter_start_element($xw, 'svg');
    //variableSets
    xmlwriter_start_element($xw, 'variableSets');
    xmlwriter_start_attribute($xw, 'xmlns');
    xmlwriter_text($xw, '\&ns_vars;');
    //variableSet
    xmlwriter_start_element($xw, 'variableSet');
    xmlwriter_start_attribute($xw, 'varSetName');
    xmlwriter_text($xw, 'binding1');
    xmlwriter_start_attribute($xw, 'locked');
    xmlwriter_text($xw, 'none');



    // variables
    xmlwriter_start_element($xw, 'variables'); 
        for ($row=0; $row < $ELEMENTOS ; $row++)
        { 
        
        //variable
        xmlwriter_start_element($xw, 'variable');
        xmlwriter_start_attribute($xw, 'trait');
        xmlwriter_text($xw, 'textcontent');
        xmlwriter_start_attribute($xw, 'category');
        xmlwriter_text($xw, 'http://ns.adobe.com/Flows/1.0/');
        xmlwriter_start_attribute($xw, 'varName');
        xmlwriter_text($xw, $PARAMETROS[$row]);
        //xmlwriter_end_element($xw); 
        xmlwriter_end_element($xw);
        
        }
        xmlwriter_end_element($xw); 
    
    //v:sampleDataSet 
    xmlwriter_start_element($xw, 'v:sampleDataSets');
    xmlwriter_start_attribute($xw, 'xmlns:v');
    xmlwriter_text($xw, 'http://ns.adobe.com/Variables/1.0/');
    xmlwriter_start_attribute($xw, 'xmlns');
    xmlwriter_text($xw, 'http://ns.adobe.com/GenericCustomNamespace/1.0/');
    //v:sampleDataSet
    xmlwriter_start_element($xw, 'v:sampleDataSet');
    xmlwriter_start_attribute($xw, 'dataSetName');
    xmlwriter_text($xw, 'Data Set');


    
    for ($row=0; $row < $ELEMENTOS ; $row++)
    { 
    
      xmlwriter_start_element($xw, $PARAMETROS[$row]);
      xmlwriter_start_element($xw, 'p');
      xmlwriter_text($xw, $PARAMETROSDATOS[$row]);
      xmlwriter_end_element($xw); 
      xmlwriter_end_element($xw); 
    
    }
    

//xmlwriter_end_element($xw); // variables
//xmlwriter_start_element($xw, 'v:sampleDataSet');

xmlwriter_end_document($xw);



echo xmlwriter_output_memory($xw);

$filename = "SANITAIRE";
header("Content-Type: text/html/force-download");
header("Content-Disposition: attachment; filename=".$filename.".xml");
  ?>
  