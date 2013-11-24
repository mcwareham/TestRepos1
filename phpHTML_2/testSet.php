
<?php

function compareFiles($file_a, $file_b)
{
    if (filesize($file_a) == filesize($file_b))
    {
        $fp_a = fopen($file_a, 'rb');
        $fp_b = fopen($file_b, 'rb');

        while (($b = fread($fp_a, 4096)) !== false)
        {
            $b_b = fread($fp_b, 4096);
            if ($b !== $b_b)
            {
                fclose($fp_a);
                fclose($fp_b);
                return false;
            }
        }

        fclose($fp_a);
        fclose($fp_b);

        return true;
    }

    return false;
}





//test Ambiguity



session_start();
$_SESSION['numIter'] =10;
   $_SESSION['a1Start'] = 20;
    $_SESSION['a1End'] = 2;
    $_SESSION['a2Start'] = 0;
    $_SESSION['a2End'] = 0;
    $_SESSION['b1Start'] = 10;
    $_SESSION['b1End'] = 10;
    $_SESSION['b2Start'] = 0;
    $_SESSION['b2End'] = 0;
    
 
    
    $_SESSION['a1Segs'] = ($_SESSION['a1End']- $_SESSION['a1Start'])/($_SESSION['numIter']-1);
    $_SESSION['a2Segs'] = ($_SESSION['a2End']- $_SESSION['a2Start'])/($_SESSION['numIter']-1);
    $_SESSION['b1Segs'] = ($_SESSION['b1End']-$_SESSION['b1Start'])/($_SESSION['numIter']-1);
    $_SESSION['b2Segs'] = ($_SESSION['b2End']-$_SESSION['b2Start'])/($_SESSION['numIter']-1);
    
   
    $_GET['fileName']="testMonster";
   include'writeAmbiguityTXT.php';
   $_GET['fileName']="newTest";
   include'writeTime.php';
    $fileNew="testMonster.txt";
    $fileOld="testMonsterComp.txt";
    if(compareFiles($fileNew, $fileOld)){
        echo'test passed';
    }
    else{
        echo'test failed';
    }
    
    ?>
    