<?PHP
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

    $PASAPORTE = $_POST['PASAPORTE'];
    $PASAPORTE=trim($PASAPORTE) ;

    //echo $APELLIDONOMBRE;


$dato1 ="}{\\rtlch\\fcs1 \\af31507 \\ltrch\\fcs0 \\insrsid1592208\\charrsid1848743 \\hich\\af31506\\dbch\\af31505\\loch\\f Laboratoire FRANCO MAROCAIN 8 , Rue erriche, Jamaa Mokraa CIN/N°Passeport number: ";
$dato2 =$PASAPORTE;
$dato3 =" name: ";
$dato4 =$APELLIDONOMBRE;
$dato5 =" /Search for SARS COV 2 virus RNA by RT-PCR: NOT DETECTED- NEGATIVE}{\\rtlch\\fcs1 \\af31507 \\ltrch\\fcs0 \\insrsid9654131\\charrsid1848743 \\hich\\af31506\\dbch\\af31505\\loch\\f
    ";

echo $dato1.$dato2.$dato3.$dato4.$dato5;

$filename = "qr";
header("Content-Type: text/html/force-download");
header("Content-Disposition: attachment; filename=".$filename.".txt");


?>