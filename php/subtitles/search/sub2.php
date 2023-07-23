


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
    $lines = file( $filename );
    $count = 0;
    foreach($lines as $line) 
    {
        $count += 1;
        // echo str_pad($count, 2, 0, STR_PAD_LEFT).". ".$line."<BR>\n";
        $pattern1 = "/[0-9]/";

        if (preg_match($pattern1, $line) == 0){ 
        
            $pattern2 = "/-->/";
            IF (preg_match($pattern2, $line) == 0){echo $line."<BR>\n";}
            }
    }
    
?>
</body>
</html>
   
