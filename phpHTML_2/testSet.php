
<?php


//
//DEFINE FUNCTIONS FIRST
//



function compareFiles($file_a, $file_b)
{
    //clearstatcache();

    if (filesize($file_a) == filesize($file_b))
    {
        $fp_a = fopen($file_a, 'rb');
        $fp_b = fopen($file_b, 'rb');
        
        $contents_a = fread($fp_a, filesize($file_a));
        $contents_b = fread($fp_b, filesize($file_b));
        
        fclose($fp_a);                
        fclose($fp_b);
        
        if ($contents_a === $contents_b) {
            return true;    
        }    
   
        return false;
        
     
        /*
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
         
         */
        
        
    }

    return false;
}

function testTimeMPL_Basic($aStart, $bStart, $delay, $units, $aSegs, $bSegs, $numMainQuestions, $oldFile, $newFile) {
    //header("Connection: keep-alive");
    
    $_SESSION['aStart'] = $aStart;
    $_SESSION['bStart'] = $bStart;
    $_SESSION['delay'] = $delay;
    $_SESSION['units'] = $units;
    $_SESSION['aSegs'] = $aSegs;
    $_SESSION['bSegs'] = $bSegs;
    $_SESSION['numMainQuestions'] = $numMainQuestions;
    
    
    $arr = explode('.', $newFile);
  
    $fileName = $arr[0];
    $ext = '.' . $arr[1];
    
    
    include_once 'writeTimeTXT.php';
    
   $s = build_TimeMPL_BasicSurvey($aStart, $bStart); 
    
    
    writeSurveyStringToFile($fileName, $ext, $s);
    
     
    if (compareFiles($oldFile, $newFile)) {
        unlink($newFile); 
        return 'TimeMPL_Basic test of "' . $newFile . '" compared to "' . $oldFile . '" PASSED!';
    } 
    unlink($newFile); 
    return 'TimeMPL_Basic test of "' . $newFile . '" compared to "' . $oldFile . ' FAILED!';
}

function testRiskMPL_Basic_ConstantDollar($a1, $a2, $b1, $b2, $sides, $numMainQuestions, $oldFile, $newFile) {
    $_SESSION['a1'] = $a1;
    $_SESSION['a2'] = $a2;
    $_SESSION['b1'] = $b1;
    $_SESSION['b2'] = $b2;
    $_SESSION['sides'] = $sides;
    $_SESSION['numMainQuestions'] = $numMainQuestions;
    $_SESSION['constant'] = 'dollar';
    
    $arr = explode('.', $newFile);
  
    $fileName = $arr[0];
    $ext = '.' . $arr[1];
    
    
    //include_once 'writeRiskTXT.php'; //DON'T KNOW WHY IT WON'T LET YOU PUT THIS TWICE?!?!?!?
    
     
    writeSurveyStringToFile($fileName, $ext, build_RiskMPL_BasicSurvey());
    
 
    if (compareFiles($oldFile, $newFile)) {
        unlink($newFile); 
        return 'RiskMPL_Basic with constant dollar test of "' . $newFile . '" compared to "' . $oldFile . '" PASSED!';
    } 
    unlink($newFile); 
    return 'RiskMPL_Basic with constant dollar test of "' . $newFile . '" compared to "' . $oldFile . ' FAILED!';
}


//I commented out the ends because we don't use them right now, but might later
function testRiskMPL_Basic_ConstantProbability($a1Start, /*$a1End, */$a1Segs, $a1Prob, $a2Start, /*$a2End, */$a2Segs, $a2Prob, $b1Start, /*$b1End, */$b1Segs, $b1Prob, $b2Start, /*$b2End, */$b2Segs, $b2Prob, $numMainQuestions, $oldFile, $newFile) {
    
    $_SESSION['a1Start'] = $a1Start;
    //$_SESSION['a1End'] = $a1End;
    $_SESSION['a1Segs'] = $a1Segs;
    $_SESSION['a1Prob'] = $a1Prob;
    $_SESSION['a2Start'] = $a2Start;
    //$_SESSION['a2End'] = $a2End;
    $_SESSION['a2Segs'] = $a2Segs;
    $_SESSION['a2Prob'] = $a2Prob;
    $_SESSION['b1Start'] = $b1Start;
    //$_SESSION['b1End'] = $b1End;
    $_SESSION['b1Segs'] = $b1Segs;
    $_SESSION['b1Prob'] = $b1Prob;
    $_SESSION['b2Start'] = $b2Start;
    //$_SESSION['b2End'] = $b2End;
    $_SESSION['b2Segs'] = $b2Segs;
    $_SESSION['b2Prob'] = $b2Prob;
    $_SESSION['numQuestions'] = $numMainQuestions;        
    $_SESSION['constant'] = 'probability';

    
    $arr = explode('.', $newFile);
  
    $fileName = $arr[0];
    $ext = '.' . $arr[1];
    
    
    //include_once 'writeRiskTXT.php'; //DON'T KNOW WHY IT WON'T LET YOU PUT THIS TWICE?!?!?!?

   
    writeSurveyStringToFile($fileName, $ext, build_RiskMPL_BasicSurvey());
    
   
 
    if (compareFiles($oldFile, $newFile)) { 
        unlink($newFile);        
        return 'RiskMPL_Basic with constant probability test of "' . $newFile . '" compared to "' . $oldFile . '" PASSED!';
    } 
    unlink($newFile);
    return 'RiskMPL_Basic with constant probability test of "' . $newFile . '" compared to "' . $oldFile . ' FAILED!';
    
    
    
}

function testTimeAndRiskMPL_Basic($sides, $delay, $units, $a1Start, $a1End, $a2Start, $a2End, $b1Start, $b1End, $b2Start, $b2End, $numMainQuestions, $oldFile, $newFile) {
    

  	$_SESSION['sides'] =  $sides;
	$_SESSION['delay'] = $delay;
    $_SESSION['units'] = $units;
    $_SESSION['numMainQuestions'] = $numMainQuestions;

    $_SESSION['a1Start'] = $a1Start;
    $_SESSION['a1End'] = $a1End;

    $_SESSION['a2Start'] = $a2Start;
    $_SESSION['a2End'] = $a2End;

    $_SESSION['b1Start'] = $b1Start;
    $_SESSION['b1End'] = $b1End;

    $_SESSION['b2Start'] = $b2Start;
    $_SESSION['b2End'] = $b2End;

    $_SESSION['a1Segs'] = ($_SESSION['a1End']- $_SESSION['a1Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['a2Segs'] = ($_SESSION['a2End']- $_SESSION['a2Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['b1Segs'] = ($_SESSION['b1End']-$_SESSION['b1Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['b2Segs'] = ($_SESSION['b2End']-$_SESSION['b2Start'])/($_SESSION['numMainQuestions']-1);
    
    
    $arr = explode('.', $newFile);
  
    $fileName = $arr[0];
    $ext = '.' . $arr[1];
    
    
    include_once 'writeRiskAndTimeTXT.php';    
    writeSurveyStringToFile($fileName, $ext, build_TimeAndRiskMPL_BasicSurvey());
   
 
    if (compareFiles($oldFile, $newFile)) {
        unlink($newFile); 
        return 'TimeAndRiskMPL_Basic test of "' . $newFile . '" compared to "' . $oldFile . '" PASSED!';
    } 
    unlink($newFile); 
    return 'TimeAndRiskMPL_Basic test of "' . $newFile . '" compared to "' . $oldFile . ' FAILED!';
 
}

function testAmbiguityMPL_Basic($a1Start, $a1End, $a2Start, $a2End, $b1Start, $b1End, $b2Start, $b2End, $numMainQuestions, $oldFile, $newFile) {
    $_SESSION['numMainQuestions'] = $numMainQuestions;

    $_SESSION['a1Start'] = $a1Start;
    $_SESSION['a1End'] = $a1End;
    $_SESSION['a2Start'] = $a2Start;
    $_SESSION['a2End'] = $a2End;
    $_SESSION['b1Start'] = $b1Start;
    $_SESSION['b1End'] = $b1End;
    $_SESSION['b2Start'] = $b2Start;
    $_SESSION['b2End'] = $b2End;
    
    $_SESSION['a1Segs'] = ($_SESSION['a1End']- $_SESSION['a1Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['a2Segs'] = ($_SESSION['a2End']- $_SESSION['a2Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['b1Segs'] = ($_SESSION['b1End']-$_SESSION['b1Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['b2Segs'] = ($_SESSION['b2End']-$_SESSION['b2Start'])/($_SESSION['numMainQuestions']-1);
    
    
    $arr = explode('.', $newFile);
  
    $fileName = $arr[0];
    $ext = '.' . $arr[1];
    
    
    include_once 'writeAmbiguityTXT.php';    
    writeSurveyStringToFile($fileName, $ext, build_AmbiguityMPL_BasicSurvey($_SESSION['a1Start'], $_SESSION['a1End'],$_SESSION['a2Start'],$_SESSION['a2End'], $_SESSION['b1Start'],$_SESSION['b1End'],$_SESSION['b2Start'],$_SESSION['b2End']));
    
     
    if (compareFiles($oldFile, $newFile)) {
        unlink($newFile); 
        return 'AmbiguityMPL_Basic test of "' . $newFile . '" compared to "' . $oldFile . '" PASSED!';
    } 
    unlink($newFile); 
    return 'AmbiguityMPL_Basic test of "' . $newFile . '" compared to "' . $oldFile . ' FAILED!';
    
    
}


    


    
//
//EXECUTE TEST LOGIC
//


if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$_SESSION['isTest'] = true;
$resultString = "";



include_once 'writeSurveyStringToFile.php';
define('DS', DIRECTORY_SEPARATOR);//define directory /'s for Windows and Linux

//Time MPL Test(s)
//echo getcwd();
//exit;
$resultString .= testTimeMPL_Basic(8, 7, 30, 'days', 0, 1, 10, getcwd().DS ."verificationFiles".DS."testTimeMPL_compare_1.txt", "testTimeMPL_1.txt") . '<br>'; 
$resultString .= testTimeMPL_Basic(20, 0, 7, 'days', 5, 10, 10, getcwd().DS."verificationFiles".DS."testTimeMPL_compare_2.txt", "testTimeMPL_2.txt") . '<br>'; 
$resultString .= testTimeMPL_Basic(50000, 20000, 100, 'days', 5000, 20000, 10, getcwd().DS ."verificationFiles".DS ."testTimeMPL_compare_3.txt", "testTimeMPL_3.txt") . '<br>'; 



//Risk MPL Test(s)

/*
 * Bah, include_once not working as it says it does,
 * so have to use it only *once* here >.<...
 */


include_once 'writeRiskTXT.php';

//shoot, notice: for 1.60, if you don't use '1.60', it takes it as 1.6, so it may be best to just use '#' instead of just # for all cases for consistency, but it doesn't really matter
$resultString .= testRiskMPL_Basic_ConstantDollar(2, '1.60', 3.85, '0.10', 10, 10, getcwd().DS."verificationFiles".DS."testRiskMPL_compare_1.txt", "testRiskMPL_1.txt") . '<br>';
$resultString .= testRiskMPL_Basic_ConstantDollar(200, 0, 40, 50, 10, 10, getcwd().DS."verificationFiles".DS."testRiskMPL_compare_3.txt", "testRiskMPL_3.txt") . '<br>';
$resultString .= testRiskMPL_Basic_ConstantDollar(0, 123456, 123456, 0, 10, 10, getcwd().DS."verificationFiles".DS."testRiskMPL_compare_4.txt", "testRiskMPL_4.txt") . '<br>';


$resultString .= testRiskMPL_Basic_ConstantProbability(1, 1, 'one', 0.50, 0, '2-10', 2.50, 0.50, 'one-2', 2, 0, '3-10', 10, getcwd().DS."verificationFiles".DS."testRiskMPL_compare_2.txt", "testRiskMPL_2.txt") . '<br>';
$resultString .= testRiskMPL_Basic_ConstantProbability(1000, 1000, 'one', 500, -50, '2-20', 200, 800, 'one-50', 200, 0, '51-70', 10, getcwd().DS."verificationFiles".DS."testRiskMPL_compare_5.txt", "testRiskMPL_5.txt") . '<br>';
$resultString .= testRiskMPL_Basic_ConstantProbability(1000, -200, 'one-100', 500, -50, '101-156', 200, -50, 'one-53', 200, 0, '51-86', 10, getcwd().DS."verificationFiles".DS."testRiskMPL_compare_6.txt", "testRiskMPL_6.txt") . '<br>';



//Time and Risk MPL Test(s)

$resultString .= testTimeAndRiskMPL_Basic(10, 30, 'days', 3.85, '0.10', '0.10', 3.85, 3.85, 3.85, '0.10', '0.10', 10, getcwd().DS."verificationFiles".DS."testTimeAndRiskMPL_compare_1.txt", "testTimeAndRiskMPL_1.txt") . '<br>';
$resultString .= testTimeAndRiskMPL_Basic(7, 1, 'days', 3.85, '0.10', '0.10', 3.85, 3.85, 3.85, '0.10', '0.10', 10, getcwd().DS."verificationFiles".DS."testTimeAndRiskMPL_compare_2.txt", "testTimeAndRiskMPL_2.txt") . '<br>';
$resultString .= testTimeAndRiskMPL_Basic(15, 16, 'days', 3.85, '0.10', '0.10', 3.85, 3.85, 3.85, '0.10', '0.10', 10, getcwd().DS."verificationFiles".DS."testTimeAndRiskMPL_compare_3.txt", "testTimeAndRiskMPL_3.txt") . '<br>';
    


//Ambiguity MPL Test(s)

$resultString .= testAmbiguityMPL_Basic(20, 2, 0, 0, 10, 10, 0, 0, 10, getcwd().DS."verificationFiles".DS."testAmbiguityMPL_compare_1.txt", "testAmbiguityMPL_1.txt") . '<br>';
$resultString .= testAmbiguityMPL_Basic(500, -500, -50, -50, 100, 0, 50, -50, 10, getcwd().DS."verificationFiles".DS."testAmbiguityMPL_compare_2.txt", "testAmbiguityMPL_2.txt") . '<br>';
$resultString .= testAmbiguityMPL_Basic(-500, 500, -50, -50, -1000, 3000, 50, -50, 10, getcwd().DS."verificationFiles".DS."testAmbiguityMPL_compare_3.txt", "testAmbiguityMPL_3.txt") . '<br>';




echo $resultString;

    
?>
    