<html>
<body>
<?php
session_start();
/*ini_set('display_errors', 1);
error_reporting(~0);
$myFile = "fileName.html";
$fh = fopen($myFile, 'w') or die("can't open");*/
//print_r(error_get_last());
$type = $_GET['Type'];
if ($type=="default"){
    $_SESSION['numIter'] =10;
    
      $_SESSION['a1Start'] = $_GET['a1Initial'];
      $_SESSION['a1End'] = $_GET['a1Final'];
	  $_SESSION['a2Start'] = $_GET['a2Initial'];
      $_SESSION['a2End'] = $_GET['a2Final'];
      $_SESSION['b1Start'] = $_GET['b1Initial'];
      $_SESSION['b1End'] = $_GET['b1Final'];
	  $_SESSION['b2Start'] = $_GET['b2Initial'];
      $_SESSION['b2End'] = $_GET['b2Final'];
      
	  $_SESSION['sides'] =  $_GET['sides'];

      $_SESSION['a1Segs'] = ($_SESSION['a1End']- $_SESSION['a1Start'])/($_SESSION['numIter']-1);
	  $_SESSION['a2Segs'] = ($_SESSION['a2End']- $_SESSION['a2Start'])/($_SESSION['numIter']-1);
      $_SESSION['b1Segs'] = ($_SESSION['b1End']-$_SESSION['b1Start'])/($_SESSION['numIter']-1);
	  $_SESSION['b2Segs'] = ($_SESSION['b2End']-$_SESSION['b2Start'])/($_SESSION['numIter']-1);
  
  echo'<table border="1">';
echo'<tr>';
echo'<td>Decision</td>';
echo'<td>Option A </td>';
echo'<td>Option B </td>';
echo '</tr>';

$a1Sum=$_SESSION['a1Start'];
$a2Sum=$_SESSION['a2Start'];
$b1Sum=$_SESSION['b1Start'];
$b2Sum=$_SESSION['b2Start'];



for($i=1; $i<=$_SESSION['numIter']; $i++){
    echo'<tr>';
    echo'<td>'.$i.'</td>';
	if($i==1){
    echo'<td> $'.round($a1Sum,2).' if die roll is 1 <br></td>';
    echo'<td> $' . round($b1Sum,2).' if die roll is 1 <br></td>';
    echo'</tr>';
	}
	if(
    $a1Sum += $_SESSION['a1Segs'];
	$a2Sum += $_SESSION['a2Segs'];
    $b1Sum += $_SESSION['b1Segs'];
	$b2Sum += $_SESSION['b2Segs'];


}
/*
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>*/
echo'</table>';
}


echo'<form action="writeRiskTXT.php" method="GET">';
echo'File Name: <input type="text" name="fileName">';
echo'<input type="submit">';
echo'</form>';

?>
</body>
</html>
