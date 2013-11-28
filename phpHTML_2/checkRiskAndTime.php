<html>
<body>
<?php

//
//DEFINE FUNCTIONS FIRST
//


function setSessionProbabilityAndDollar(){

	$_SESSION['sides'] =  $_GET['sides'];	
	$_SESSION['delay'] = $_GET['delay'];
    $_SESSION['units'] = $_GET['units'];

    $_SESSION['a1Start'] = $_GET['a1Initial'];
    $_SESSION['a1End'] = $_GET['a1Final'];

    $_SESSION['a2Start'] = $_GET['a2Initial'];
    $_SESSION['a2End'] = $_GET['a2Final'];

    $_SESSION['b1Start'] = $_GET['b1Initial'];
    $_SESSION['b1End'] = $_GET['b1Final'];

    $_SESSION['b2Start'] = $_GET['b2Initial'];
    $_SESSION['b2End'] = $_GET['b2Final'];

    $_SESSION['a1Segs'] = ($_SESSION['a1End']- $_SESSION['a1Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['a2Segs'] = ($_SESSION['a2End']- $_SESSION['a2Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['b1Segs'] = ($_SESSION['b1End']-$_SESSION['b1Start'])/($_SESSION['numMainQuestions']-1);
    $_SESSION['b2Segs'] = ($_SESSION['b2End']-$_SESSION['b2Start'])/($_SESSION['numMainQuestions']-1);
    
}

function printTableHead() {
    echo'<table border="1">';
    echo'<tr>';
    echo'<td>Decision</td>';
    echo'<td>Option A </td>';
    echo'<td>Option B </td>';
    echo '</tr>';
}

//keeps things tidy, in case this needs to be expanded with more closing tabs
function printTableTail() {
    echo'</table>';
}

function printSubmitForm() {
    echo'<form action="writeRiskAndTimeTXT.php" method="GET">';
    echo'File Name: <input type="text" name="fileName">';
    echo'<input type="submit">';
    echo'</form>';
}

function printRiskAndDollarTable() {

    for($i=1; $i<=$_SESSION['numMainQuestions']; $i++){
        echo'<tr>';
        echo'<td>'.$i.'</td>';
        if($i==1){
            echo'<td> If die roll is 1 receive:<br/> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br>';
            echo'If die roll is 2-'.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['a2Start'].' today and $'.$_SESSION['a2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>';
            echo'<td> If die roll is 1 receive:<br/> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br>';
            echo'If die roll is 2-'.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['b2Start'].' today and $'.$_SESSION['b2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>';
            echo'</tr>';
        }
        elseif(($i+1)==$_SESSION['sides']){

			echo'<td> If die roll is 1-'.$i.' receive:<br/> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br>';
            echo'If die roll is '.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['a2Start'].' today and $'.$_SESSION['a2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>';
			echo'<td> If die roll is 1-'.$i.' receive:<br/> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br>';
            echo'If die roll is '.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['b2Start'].' today and $'.$_SESSION['b2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>';

        }
        elseif(($i)>=$_SESSION['sides']){
			echo'<td> If die roll is 1-'.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br></td>';
			echo'<td> If die roll is 1-'.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br></td>';
            echo'</tr>';
        }
        else{
			echo'<td> If die roll is 1-'.$i.' receive:<br/> $'.$_SESSION['a1Start'].' today and $'.$_SESSION['a1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br>';
            echo'If die roll is '.($i+1).'-'.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['a2Start'].' today and $'.$_SESSION['a2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>';
            echo'<td> If die roll is 1-'.$i.' receive:<br/> $'.$_SESSION['b1Start'].' today and $'.$_SESSION['b1End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'<br>';
            echo'If die roll is '.($i+1).'-'.$_SESSION['sides'].' receive:<br/> $'.$_SESSION['b2Start'].' today and $'.$_SESSION['b2End'].' in '.$_SESSION['delay'].' '.$_SESSION['units'].'</td>';
            echo'</tr>';
        }



    }
}



//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//


session_start();//Start session to save variables
$type = $_GET['Type'];
$_SESSION['isTest'] = false;

if ($type=="default"){//is default number of iterations =10
    $_SESSION['numMainQuestions'] =10;
}//close if default

setSessionProbabilityAndDollar();

printTableHead();

printRiskAndDollarTable();

printTableTail();
printSubmitForm();


?>
</body>
</html>
