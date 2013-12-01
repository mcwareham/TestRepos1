<html>
<body>
<?php


//
//DEFINE FUNCTIONS FIRST
//

function build_AmbiguityMPL_BasicSurvey($a1Start, $a1End, $a2Start, $a2End, $b1Start, $b1End, $b2Start, $b2End) {
    /*
     * Unfortunately finicky---gotta leave the stuff in [[]] all the way to the left margin
     */
    
   $string = '[[AdvancedFormat]]


[[Question:MC:SingleAnswer:Vertical]]
<strong>Urn A contains 10 balls: 5 red and 5 black. &nbsp;Urn B contains 10 balls: some are red, some are black, but the amount of each is unknown. &nbsp;Pick a color to bet on, and keep this choice in mind when making decisions for the next set of questions to follow below:</strong>
[[Choices]]
red
black




[[Question:Matrix]]
<strong>Keeping your ball color choice in mind from above, as well as the information given about Urn A and Urn B, for each decision row choose which urn you would prefer. &nbsp;For each ball in the urn you choose, you will receive the first amount listed *if* the color of the ball is the color you chose above (remember this applies to each decision row separately for all the balls in the urn you choose).</strong>
<div>&nbsp;</div>

<div>&nbsp;</div>

<table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">
	<tbody>
		<tr>
			<td style="width: 40px; text-align: center;"><strong>Decision</strong></td>
			<td style="width: 230px; text-align: center;"><strong>Option A: Urn A</strong>
			<table border="1" cellpadding="1" cellspacing="1" style="text-align: center; height: 40px; width: 230px;">
				<tbody>
					<tr>
						<td style="text-align: left;">If the ball is the color chosen</td>
						<td style="text-align: left;">If the ball is&nbsp;<em><strong>not</strong></em>&nbsp;the color chosen</td>
					</tr>
				</tbody>
			</table>
			</td>
			<td style="width: 230px; text-align: center;"><strong>Option B: Urn B</strong>
			<table border="1" cellpadding="1" cellspacing="1" style="text-align: center; height: 40px; width: 230px;">
				<tbody>
					<tr>
						<td style="text-align: left;">If the ball is the color chosen</td>
						<td style="text-align: left;">If the ball is&nbsp;<em><strong>not</strong></em>&nbsp;the color chosen</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>



[[Choices]]
    ';

    $a1Sum= $a1Start;
    $a2Sum= $a2Start;
    $b1Sum= $b1Start;
    $b2Sum= $b2Start;
    
    for($i=1; $i<=$_SESSION['numMainQuestions']; $i++){
        $string .= '
            <table border="1" cellpadding="1" cellspacing="1" style="width: 556px; "> <tbody>  <tr>   <td style="width: 58px; text-align: center; ">'.$i.'</td>   <td style="width: 225px; text-align: left; ">   <table border="1" cellpadding="1" cellspacing="1" style="width: 225px;">    <tbody>     <tr>      <td style="text-align: center; width: 94px;">$'.round($a1Sum,2).'</td>      <td style="text-align: center;">$'.round($a2Sum,2).'</td>     </tr>    </tbody>   </table>   </td>   <td style="width: 225px; text-align: left; ">   <table border="1" cellpadding="1" cellspacing="1" style="width: 225px;">    <tbody>     <tr>      <td style="text-align: center; width: 94px;">$'.round($b1Sum,2).'</td>      <td style="text-align: center;">$'.round($b2Sum,2).'</td>     </tr>    </tbody>   </table>   </td>  </tr> </tbody></table>
        ';
        $a1Sum += $_SESSION['a1Segs'];
        $a2Sum += $_SESSION['a2Segs'];
        $b1Sum += $_SESSION['b1Segs'];
        $b2Sum += $_SESSION['b2Segs'];
    }

    $string.= '
[[AdvancedAnswers]]

[[Answer]]
    <strong>A</strong>
[[Answer]]
    <strong>B</strong>
    ';
    
    return $string;
}


/* 
 * Needed to delete the iterative stuff for now, no worries, it will be dealt
 * with...
 */
 
 




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
    /*ini_set('display_errors', 1);
    error_reporting(~0);*/
    date_default_timezone_set('America/Anchorage');
    include_once 'writeSurveyStringToFile.php';
   
    writeSurveyStringToFile($_GET['fileName'], '.txt', build_AmbiguityMPL_BasicSurvey($_SESSION['a1Start'], $_SESSION['a1End'],$_SESSION['a2Start'],$_SESSION['a2End'], $_SESSION['b1Start'],$_SESSION['b1End'],$_SESSION['b2Start'],$_SESSION['b2End']));
    exit;
}



?>

</body>
</html>
