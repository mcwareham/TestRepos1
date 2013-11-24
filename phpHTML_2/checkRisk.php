<html>
<body>
<?php

//
//DEFINE FUNCTIONS FIRST
//

function setSessionDollar(){
    $_SESSION['a1'] = $_GET['a1Initial'];
    $_SESSION['a2'] = $_GET['a2Initial'];
    $_SESSION['b1'] = $_GET['b1Initial'];
    $_SESSION['b2'] = $_GET['b2Initial'];
    $_SESSION['sides'] =  $_GET['sides'];
}
function setSessionProbability(){
    
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
    echo'<form action="writeRiskTXT.php" method="GET">';
    echo'File Name: <input type="text" name="fileName">';
    echo'<input type="submit">';
    echo'</form>';
}

function printConstantDollarTable() {
    for($i=1; $i<=$_SESSION['numIter']; $i++){
        echo'<tr>';
        echo'<td>'.$i.'</td>';
        if($i==1){
            echo'<td> $'.$_SESSION['a1'].' if die roll is one <br>';
            echo'$'.$_SESSION['a2'].'if die roll is 2-'.$_SESSION['sides'].'</td>';
            echo'<td> $'.$_SESSION['b1'].' if die roll is one <br>';
            echo'$'.$_SESSION['b2'].' if die roll is 2-'.$_SESSION['sides'].'</td>';
            echo'</tr>';
        }
        elseif(($i+1)==$_SESSION['sides']){
            echo'<td> $'.$_SESSION['a1'].' if die roll is one-'.$i.' <br>';
            echo'$'.$_SESSION['a2'].' if die roll is '.($i+1).'</td>';
            echo'<td> $'.$_SESSION['b1'].' if die roll is one-'.$i.' <br>';
            echo'$'.$_SESSION['b2'].' if die roll is '.($i+1).'</td>';
            echo'</tr>';
        }
        elseif(($i)>=$_SESSION['sides']){
            echo'<td> $'.$_SESSION['a1'].' if die roll is one-'.$_SESSION['sides'].' <br></td>';
            echo'<td> $'.$_SESSION['b1'].' if die roll is one-'.$_SESSION['sides'].' <br></td>';
            echo'</tr>';
        }
        else{
            echo'<td> $'.$_SESSION['a1'].' if die roll is one-'.$i.' <br>';
            echo'$'.$_SESSION['a2'].' if die roll is '.($i+1).'-'.$_SESSION['sides'].'</td>';
            echo'<td> $'.$_SESSION['b1'].' if die roll is one-'.$i.' <br>';
            echo'$'.$_SESSION['b2'].' if die roll is '.($i+1).'-'.$_SESSION['sides'].'</td>';
            echo'</tr>';
        }



    }
}

function printConstantProbabilityTable() {
    $a1Sum=$_SESSION['a1Start'];
    $a2Sum=$_SESSION['a2Start'];
    $b1Sum=$_SESSION['b1Start'];
    $b2Sum=$_SESSION['b2Start'];
    
    for($i=1; $i<=$_SESSION['numIter']; $i++){
        echo'<tr>';
        echo'<td>'.$i.'</td>';
        echo'<td>$' . number_format($a1Sum,2).' if die roll is '.$_SESSION['a1Prob'].'<br>';
        echo'$'. number_format($a2Sum,2).' if die roll is '.$_SESSION['a2Prob'].'</td>';
        echo'<td>$' . number_format($b1Sum,2).' if die roll is '.$_SESSION['b1Prob'].'<br>';
        echo'$'. number_format($b2Sum,2).' if die roll is '.$_SESSION['b2Prob'].'</td>';
        echo'</tr>';
        $a1Sum += $_SESSION['a1Segs'];
        $a2Sum += $_SESSION['a2Segs'];
        $b1Sum += $_SESSION['b1Segs'];
        $b2Sum += $_SESSION['b2Segs'];


    }
}

function deleteTxtFiles(){
    foreach(glob("*.txt*") as $file2) {
    //echo $file2;
    unlink($file2); // Delete only .txt files through the loop
}
}


//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//

session_start();//Start session to save variables
$type = $_GET['Type'];
$_SESSION['constant']=$_GET['constant'];
if ($type=="default"){//is default number of iterations =10
    $_SESSION['numIter'] =10;
}//close if default

printTableHead();

if($_SESSION['constant']=='dollar'){
    setSessionDollar();
    printConstantDollarTable();
}//close if constant==dollar
else {//constant probabilty
    setSessionProbability();
    printConstantProbabilityTable();
}

printTableTail();
printSubmitForm();


?>
</body>
</html>
