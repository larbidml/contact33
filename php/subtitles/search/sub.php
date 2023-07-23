

<?php
    $d = dir(getcwd());
    while (($file = $d->read()) !== false)
        {
            $patternsrt = "/.srt/";
            IF (preg_match($patternsrt, $file) !== 0)
            {
                //echo "filename: " . $file . "<br>";
                $filename = $file;
            }
        }
    $d->close();

    $pattern = "/.srt/";
    $titlename = preg_replace($pattern, "", $filename); 

    $titlename = $titlename."_N";
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../../../images/ico/icono33.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?PHP   ECHO "<title>$titlename</title>"; ?>
</head>
<body >

<?php 
$lines = file($filename);
$count = 0;
foreach($lines as $line) 
{
    $count += 1;    
    if (strlen($line) > 3) {        
        $pattern = "/-->/";
        IF (preg_match($pattern, $line) == 0){echo $line."<BR>\n";}
        }     
}
?>

