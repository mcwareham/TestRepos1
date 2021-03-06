<html>
<body>
<?php

//
//DEFINE FUNCTIONS FIRST
//


function setDefaultAmbiguityMPLSessionVars() {
    $_SESSION['numMainQuestions'] =10;

   $_SESSION['numIter'] =10;
    
    
    $_SESSION['a1Start'] = $_GET['a1Initial'];
    if (isset($_GET['a1Increment'])){//increment mode for a1
        $_SESSION['a1Segs']=$_GET['a1Increment'];
    }
    else{//not increment mode for a1
        $_SESSION['a1End'] = $_GET['a1Final'];
        $_SESSION['a1Segs'] = ($_SESSION['a1End']- $_SESSION['a1Start'])/($_SESSION['numIter']-1);
    }
    $_SESSION['a1Prob']=$_GET['a1Prob'];
    
    $_SESSION['a2Start'] = $_GET['a2Initial'];
    if (isset($_GET['a2Increment'])){//increment mode for a2
        $_SESSION['a2Segs']=$_GET['a2Increment'];
    }
    else{//not increment mode for a2
        $_SESSION['a2End'] = $_GET['a2Final'];
        $_SESSION['a2Segs'] = ($_SESSION['a2End']- $_SESSION['a2Start'])/($_SESSION['numIter']-1);
    }
    $_SESSION['a2Prob']=$_GET['a2Prob'];
    
    $_SESSION['b1Start'] = $_GET['b1Initial'];
    if (isset($_GET['b1Increment'])){//increment mode for b1
        $_SESSION['b1Segs']=$_GET['b1Increment'];
    }
    else{//not increment mode for b1
        $_SESSION['b1End'] = $_GET['b1Final'];
        $_SESSION['b1Segs'] = ($_SESSION['b1End']- $_SESSION['b1Start'])/($_SESSION['numIter']-1);
    }
    $_SESSION['b1Prob']=$_GET['b1Prob'];
    
     $_SESSION['b2Start'] = $_GET['b2Initial'];
    if (isset($_GET['b2Increment'])){//increment mode for b1
        $_SESSION['b2Segs']=$_GET['b2Increment'];
    }
    else{//not increment mode for b1
        $_SESSION['b2End'] = $_GET['b2Final'];
        $_SESSION['b2Segs'] = ($_SESSION['b2End']- $_SESSION['b2Start'])/($_SESSION['numIter']-1);
    }
    $_SESSION['b2Prob']=$_GET['b2Prob'];
   
    echo'<strong>Urn A contains 10 balls: 5 red and 5 black. 
        <br>Urn B contains 10 balls: some are red, some are black, but the amount of each is unknown. 
        <br>Pick a color to bet on, and keep this choice in mind when making decisions for the next set of questions to follow below:</strong>
        <br/>
        <br>
        
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
</table>';

    $a1Sum=$_SESSION['a1Start'];
    $a2Sum=$_SESSION['a2Start'];
    $b1Sum=$_SESSION['b1Start'];
    $b2Sum=$_SESSION['b2Start'];
    for($i=1; $i<=$_SESSION['numMainQuestions']; $i++) {
        echo'<table border="1" cellpadding="1" cellspacing="1" style="width: 535px; "> 
                <tbody>  
                    <tr>   
                        <td style="width: 58px; text-align: center; ">'.$i.'</td>
                        <td style="width: 225px; text-align: left; ">   
                            <table border="1" cellpadding="1" cellspacing="1" style="width: 225px;">    
                                <tbody>     
                                <tr>      
                                <td style="text-align: center; width: 94px;">$'. number_format($a1Sum,2).'</td>      
                                <td style="text-align: center;">$'. number_format($a2Sum,2).'</td>     
                                </tr>    
                                </tbody>   
                            </table>   
                         </td>   
                         <td style="width: 225px; text-align: left; ">   
                            <table border="1" cellpadding="1" cellspacing="1" style="width: 225px;">    
                                <tbody>     
                                <tr>      

                                <td style="text-align: center; width: 94px;">$'. number_format($b1Sum,2).'</td>      
                                <td style="text-align: center;">$'. number_format($b2Sum,2).'</td>     
                                </tr>    
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>';
       
        $a1Sum += $_SESSION['a1Segs'];
        $a2Sum += $_SESSION['a2Segs'];
        $b1Sum += $_SESSION['b1Segs'];
        $b2Sum += $_SESSION['b2Segs'];
        
    }
   //echo'</table>';
   
}

function setCustomAmbiguityMPLSessionVars(){//Set custom variables
    if(isset($_GET['iterative'])){//it's iterative
       $_SESSION['isIterative']='true';
       $_SESSION['numIterativeQuestions']= $_GET['numIterativeQuestions'];//set number of iterative questions
    }
    else{//it's not
       $_SESSION['isIterative']='false';
       $_SESSION['numIterativeQuestions']=0;
    }
    
}

function printSubmitLogic() {
    echo'<form action="writeAmbiguityTXT.php" method="GET">';
    echo'File Name: <input type="text" name="fileName">';
    echo'<input type="submit">';
    echo'</form>';
}



//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//


session_start();
/*ini_set('display_errors', 1);
error_reporting(~0);
$myFile = "fileName.html";
$fh = fopen($myFile, 'w') or die("can't open");*/
//print_r(error_get_last());

$type = $_GET['Type'];
$_SESSION['isTest'] = false;


if ($type=="default") {    
   
    setDefaultAmbiguityMPLSessionVars();
}

if ($type=="custom" /*might need another condition like above*/) {//New 
    setCustomAmbiguityMPLSessionVars();//function sets number of main questions and iterative questions
    //to be made...
    
}

   
printSubmitLogic();



?>
</body>
</html>
