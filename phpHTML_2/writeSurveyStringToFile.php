<?php

function writeSurveyStringToFile($fileName, $ext, $string) {    
    $file = fopen($fileName.$ext,"w") or die ("Could not write file");
    print_r(error_get_last());
    //$cssFile = fopen($fileName.'.css',"w") or die ("Could not write file");//We are not using CSS now
    fwrite($file, $string);
    fclose($file);
    //fclose($cssFile);
    
    if (!($_SESSION['isTest'])) {
        header("Content-disposition: attachment; filename=".$fileName.$ext);
        header("Content-type: text/plain");
        header("Connection: keep-alive");
        
        echo 'Your survey "'.$fileName.'" has been created';

        
        ob_clean();
        readfile($fileName.$ext);
        //exit;
    }
}

?>