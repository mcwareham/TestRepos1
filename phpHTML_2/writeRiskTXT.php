<html>
<body>
<?php


//
//DEFINE FUNCTIONS FIRST
//


function build_RiskMPL_BasicSurvey() {
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

    if($_SESSION['constant']=='dollar'){


        for($i=1; $i<=$_SESSION['numMainQuestions']; $i++){
            if($i==1){//die roll is  'one'
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one <br> $'.$_SESSION['a2'].' if die roll is 2-'.$_SESSION['sides'].'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one <br>$'.$_SESSION['b2'].' if die roll is 2-'.$_SESSION['sides'].'</td>  </tr> </tbody></table>
                ';
            }
            elseif(($i+1)==$_SESSION['sides']){// A2 and B2 print last separate probability
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one-'.$i.' <br>$'.$_SESSION['a2'].' if die roll is '.($i+1).'</td><td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one-'.$i.' <br>$'.$_SESSION['b2'].' if die roll is '.($i+1).'</td>  </tr> </tbody></table>
                ';
            }
            elseif(($i)>=$_SESSION['sides']){//A1 and B1 cover all of the probabilities
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one-'.$_SESSION['sides'].' </td><td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one-'.$_SESSION['sides'].'</td>  </tr> </tbody></table>
                ';
            }
            else{//Here we are between the first decision and the bottoming out cases above
                $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one-'.$i.' <br> $'.$_SESSION['a2'].' if die roll is '.($i+1).'-'.$_SESSION['sides'].'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one-'.$i.'<br>$'.$_SESSION['b2'].' if die roll is '.($i+1).'-'.$_SESSION['sides'].'</td>  </tr> </tbody></table>
                ';
            }
        }//end for loop

    }//end if constant is 'dollar'

    else{//constant probability


        $a1Sum=$_SESSION['a1Start'];
        $a2Sum=$_SESSION['a2Start'];
        $b1Sum=$_SESSION['b1Start'];
        $b2Sum=$_SESSION['b2Start'];

        for($i=1; $i<=$_SESSION['numMainQuestions']; $i++){


            $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.number_format($a1Sum,2).' if die roll is '.$_SESSION['a1Prob'].' <br> $'.number_format($a2Sum,2).' if die roll is '.$_SESSION['a2Prob'].'</td>   <td style="width: 228px; text-align: center; ">$'.number_format($b1Sum,2).' if die roll is '.$_SESSION['b1Prob'].' <br>$'.number_format($b2Sum,2).' if die roll is '.$_SESSION['a2Prob'].'</td>  </tr> </tbody></table>
            ';


            $a1Sum += $_SESSION['a1Segs'];
            $a2Sum += $_SESSION['a2Segs'];
            $b1Sum += $_SESSION['b1Segs'];
            $b2Sum += $_SESSION['b2Segs'];  
        }
    }



    $string .= '


[[AdvancedAnswers]]

[[Answer]]
    <strong>A</strong>
[[Answer]]
    <strong>B</strong>';

    return $string;
}


//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//

//if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
//}



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
   
    writeSurveyStringToFile($_GET['fileName'], '.txt', build_RiskMPL_BasicSurvey());
    exit;
}

?>

</body>
</html>
