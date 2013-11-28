<html>
<body>
<?php


//
//DEFINE FUNCTIONS FIRST
//


function build_TimeAndRiskMPL_BasicSurvey() {
    $string = '[[AdvancedFormat]]



[[Question:Matrix]]
    <strong>For each decision row choose select your preferred Option. The amounts are in dollars.</strong><br />
    &nbsp;
    <table border="1" cellpadding="1" cellspacing="1" style="width: 500px; ">
        <tbody>
            <tr>
                <td style="width: 40px; text-align: center; "><strong>Decision</strong></td>
                <td style="width: 230px; text-align: center; "><strong>Option A</strong></td>
                <td style="width: 230px; text-align: center; "><strong>Option B</strong></td>
            </tr>
        </tbody>
    </table>



[[Choices]]
    ';

    


        for($i=1; $i<=$_SESSION['numMainQuestions']; $i++){
            if($i==1){//die roll is  'one'
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">If die roll is 1 receive:<br /> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br />If die roll is 2-'.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['a2Start'].' today and $'.$_SESSION['a2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>   <td style="width: 228px; text-align: center; ">If die roll is 1 receive:<br/> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br />If die roll is 2-'.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['b2Start'].' today and $'.$_SESSION['b2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>  </tr> </tbody></table>
                ';
            }
            elseif(($i+1)==$_SESSION['sides']){// A2 and B2 print last separate probability
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">If die roll is 1-'.$i.' receive:<br /> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br />If die roll is '.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['a2Start'].' today and $'.$_SESSION['a2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td><td style="width: 228px; text-align: center; ">If die roll is 1-'.$i.' receive:<br /> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br /> If die roll is '.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['b2Start'].' today and $'.$_SESSION['b2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>  </tr> </tbody></table>
                ';
            }
            elseif(($i)>=$_SESSION['sides']){//A1 and B1 cover all of the probabilities
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">If die roll is 1-'.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].' </td><td style="width: 228px; text-align: center; ">If die roll is 1-'.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>  </tr> </tbody></table>
                ';
            }
            else{//Here we are between the first decision and the bottoming out cases above
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">If die roll is 1-'.$i.' receive:<br /> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br/>If die roll is '.($i+1).'-'.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['a2Start'].' today and $'.$_SESSION['a2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].' </td>   <td style="width: 228px; text-align: center; ">If die roll is 1-'.$i.' receive:<br /> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br />If die roll is '.($i+1).'-'.$_SESSION['sides'].' receive:<br /> $'.$_SESSION['b2Start'].' today and $'.$_SESSION['b2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].' </td>  </tr> </tbody></table>
                ';
            }
        }//end for loop



    $string .= '


[[AdvancedAnswers]]

[[Answer]]
    <strong>A</strong>
[[Answer]]
    <strong>B</strong>';

    return $string;
}

/*
function writeSurveyStringToFile($fileName, $string) {
    $file = fopen($fileName.'.txt',"w") or die ("Could not write file");
    print_r(error_get_last());
    //$cssFile = fopen($fileName.'.css',"w") or die ("Could not write file");//We are not using CSS now
    fwrite($file, $string);
    fclose($file);
    //fclose($cssFile);
    
    echo 'Your survey "'.$fileName.'" has been created';

    header("Content-disposition: attachment; filename=".$fileName.".txt");
    header("Content-type: text/plain");
    ob_clean();
    readfile($fileName.".txt");
    //exit;
}
*/

//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SESSION['isTest']) {
    /* 
     * Do nothing; this "halts" the code so that we can call functions from the
     * the test file after including this file---in other words, it keeps this 
     * file from running the code below (in the else clause)
     */
} else {
    ini_set('display_errors', 1);
    error_reporting(~0);
    include_once 'writeSurveyStringToFile.php';
   
    writeSurveyStringToFile($_GET['fileName'], '.txt', build_TimeAndRiskMPL_BasicSurvey());
    exit;
}


?>

</body>
</html>
