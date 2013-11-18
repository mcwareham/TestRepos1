<html>
<body>
<?php

//
//DEFINE FUNCTIONS FIRST
//

//shared? common?  trying to think of best word!
function setSharedTimeMPLSessionVars() {
    $_SESSION['aStart'] = $_GET['aInitial'];
    $_SESSION['aEnd'] = $_GET['aFinal'];
    $_SESSION['bStart'] = $_GET['bInitial'];
    $_SESSION['bEnd'] = $_GET['bFinal'];
    $_SESSION['delay'] = $_GET['delay'];
    $_SESSION['units'] = $_GET['units'];
    $_SESSION['aSegs'] = ($_SESSION['aEnd']- $_SESSION['aStart'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['bSegs'] = ($_SESSION['bEnd']-$_SESSION['bStart'])/($_SESSION['numMainQuestions']-1);
}

function setDefaultTimeMPLSessionVars() {
    $_SESSION['numMainQuestions'] = 10;

    setSharedTimeMPLSessionVars();    

    echo'<table border="1">';
    echo'<tr>';
    echo'<td>Decision</td>';
    echo'<td>Option A <br> (recieve this amount today)</td>';
    echo'<td>Option B <br> (recieve this amount in ' . $_SESSION['delay'] . ' ' .$_SESSION['units'] . ')</td>';
    echo '</tr>';

    $aSum=$_SESSION['aStart'];
    $bSum=$_SESSION['bStart'];
    for($i=1; $i<=$_SESSION['numMainQuestions']; $i++) {
        echo'<tr>';
        echo'<td>'.$i.'</td>';
        echo'<td>' . round($aSum,2).'</td>';
        echo'<td>' . round($bSum,2).'</td>';
        echo'</tr>';
        $aSum += $_SESSION['aSegs'];
        $bSum += $_SESSION['bSegs'];
    }
    /*
    <tr>
    <td>row 2, cell 1</td>
    <td>row 2, cell 2</td>
    </tr>*/
    echo'</table>';
}

function setCustomTimeMPLSessionVars(){//Set custom variables
    $_SESSION['numMainQuestions']= $_GET['numMainQuestions'];//this sets the custom number of questions
     setSharedTimeMPLSessionVars();  
    
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
    echo'<form action="writeTimeTXT.php" method="GET">';
    echo'File Name: <input type="text" name="fileName">';
    echo'<input type="submit">';
    echo'</form>';
}

function isValidTimeMPLParameters() {
    //validation stub---this will likely call some JavaScript code
    //we'll see
    return true;
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

$_SESSION['type'] = $_GET['Type'];
 

if ($_SESSION['type'] == "default" && isValidTimeMPLParameters()) {    
    setDefaultTimeMPLSessionVars();
}

if ($_SESSION['type'] == "custom" /*might need another condition like above*/) {//New 
    setCustomTimeMPLSessionVars();//function sets number of main questions and iterative questions
    //to be made...
}

if (isValidTimeMPLParameters()) {
    /* idea would be to not allow a submission until valid, but we might remove
     * the if test and do all this in JS as mentioned previously     * 
     */
    printSubmitLogic();
}


?>
</body>
</html>
