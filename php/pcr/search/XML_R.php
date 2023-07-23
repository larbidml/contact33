<?PHP

//collect form data and store in variables
$REFPCR = $_POST['REFPCR'];
$REFPCR=trim($REFPCR) ;

$nombre1 = $_POST['nombre1'];
$nombre1=trim($nombre1) ;
$apellido1 = $_POST['apellido1'];
$apellido1=trim($apellido1) ;
$apellido2 = $_POST['apellido2'];
$apellido2=trim($apellido2) ;
$nombre = $apellido1." ".$apellido2." , ".$nombre1;


$nif = $_POST['nif'];
$nif=trim($nif) ;
$ANOS = $_POST['ANOS'];
$ANOS=trim($ANOS) ;
$fn2 = $_POST['fn2'];
$fn2=trim($fn2) ;
$FechaNacimiento = $fn2[8].$fn2[9]."/".$fn2[5].$fn2[6]."/".$fn2[0].$fn2[1].$fn2[2].$fn2[3];
$GENERO = $_POST['GENERO'];
$GENERO=trim($GENERO) ;

$FPCR = $_POST['FPCR'];
$FPCR=trim($FPCR) ;
$FPCR2 = $FPCR[8].$FPCR[9]."/".$FPCR[5].$FPCR[6]."/".$FPCR[0].$FPCR[1].$FPCR[2].$FPCR[3];
$CODEPCR = $_POST['CODEPCR'];
$CODEPCR=trim($CODEPCR) ;

//$PARAMETROS
$PARAMETROS = array
(	
	"REF1",
	"REF2",
	"REF3",
	"REF4",
	"NOMBRE1",
	"NOMBRE2",
	"ANOS",
	"FNACIMIENTO",
	"NIE",
  "FTEST1",
  "FTEST2",
  "FTEST3",
  "CODE",
  "GENERO"
);

//$PARAMETROSDATOS
$PARAMETROSDATOS = array
(	
	$REFPCR ,
	$REFPCR ,
	$REFPCR ,
	$REFPCR ,
	$nombre,
	$nombre,
	$ANOS,
	$FechaNacimiento,
	$nif,
  $FPCR2,
  $FPCR2,
  $FPCR2,
  $CODEPCR,
  $GENERO
	
);

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
        for ($row=0; $row < 14 ; $row++)
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


    
    for ($row=0; $row < 14 ; $row++)
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

$filename = "xml/";
header("Content-Type: text/html/force-download");
header("Content-Disposition: attachment; filename=".$filename.".xml");
  ?>
  