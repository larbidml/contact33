<?PHP

//collect form data and store in variables

////
$GENERO = $_POST['GENERO'];
$GENERO=trim($GENERO) ;
$IPMAROC = $_POST['IPMAROC'];
$IPMAROC=trim($IPMAROC) ;
if ($GENERO == "HOMBRE") {
  $SIR = "M";
} else {
  $SIR = "Mme";
}
$nombre1 = $_POST['nombre1'];
$nombre1=trim($nombre1) ;
$apellido1 = $_POST['apellido1'];
$apellido1=trim($apellido1) ;
$APELLIDONOMBRE = $apellido1." ".$nombre1 ;
$APELLIDONOMBRE = $SIR." ".$APELLIDONOMBRE." Ip".$IPMAROC;

//FNACIMIENTO
$fn2 = $_POST['fn2'];
$fn2=trim($fn2) ;
$FechaNacimiento = $fn2[8].$fn2[9]."/".$fn2[5].$fn2[6]."/".$fn2[0].$fn2[1].$fn2[2].$fn2[3];
$Fdia = $fn2[8].$fn2[9];
$Fmes = $fn2[5].$fn2[6];
$Fano = $fn2[0].$fn2[1].$fn2[2].$fn2[3];
//age
$ANOS = $_POST['ANOS'];
$ANOS=trim($ANOS) ;
//PCRMAROCHORA
$PCRMAROCHORA = $_POST['PCRMAROCHORA'];
$PCRMAROCHORA=trim($PCRMAROCHORA) ;
//PCRMAROCMINUTO
$PCRMAROCMINUTO = $_POST['PCRMAROCMINUTO'];
$PCRMAROCMINUTO=trim($PCRMAROCMINUTO) ;

//FPCRMAROC
$FPCRMAROC = $_POST['FPCRMAROC'];
$FPCRMAROC=trim($FPCRMAROC) ;
$FPCRMAROCdia = $FPCRMAROC[8].$FPCRMAROC[9];
$FPCRMAROCmes = $FPCRMAROC[5].$FPCRMAROC[6];
$FPCRMAROCano = $FPCRMAROC[0].$FPCRMAROC[1].$FPCRMAROC[2].$FPCRMAROC[3];







//NIE
$nif = $_POST['nif'];
$nif=trim($nif) ;
//PASAPORTE
$PASAPORTE = $_POST['PASAPORTE'];
$PASAPORTE=trim($PASAPORTE) ;
//DOSSIER
$DOSSIER = $_POST['DOSSIER'];
$DOSSIER=trim($DOSSIER) ;

//CPATIENT
$CPATIENT = $_POST['CPATIENT'];
$CPATIENT=trim($CPATIENT) ;






//$PARAMETROS
$PARAMETROS = array
(	
	"NAME1",
	"NAME2",
	"NAME3",
	"NAME4",
	"dia1",
	"dia2",

  "mes1",
	"mes2",
	"DOS1",
	"DOS2",
  "DOS3",
  "DOS4",
  "CPATIENT",
  "Fdia1",
  "Fdia2",
  "Fmes1",
  "Fmes2",
  "FANO1",
  "FANO2",
  "AGE",
  "THORA",
  "TMINUTO"


);

//$PARAMETROSDATOS
$PARAMETROSDATOS = array
(	
	$APELLIDONOMBRE,
	$APELLIDONOMBRE,
	$APELLIDONOMBRE,
	$APELLIDONOMBRE,
	$FPCRMAROCdia,
	$FPCRMAROCdia,
  $FPCRMAROCmes ,
	$FPCRMAROCmes,
	$DOSSIER,
	$DOSSIER,
  $DOSSIER,
  $DOSSIER,
  $CPATIENT,
  $Fdia,
  $Fdia,
  $Fmes ,
  $Fmes ,
  $Fano ,
  $Fano ,
  $ANOS ,
  $PCRMAROCHORA,
  $PCRMAROCMINUTO

	
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
        for ($row=0; $row < 22 ; $row++)
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


    
    for ($row=0; $row < 22 ; $row++)
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

$filename = "MAROC-PCR";
header("Content-Type: text/html/force-download");
header("Content-Disposition: attachment; filename=".$filename.".xml");
  ?>
  