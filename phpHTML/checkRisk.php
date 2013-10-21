<html>
<body>
<?php
session_start();

$type = $_GET['Type'];
$_SESSION['constant']=$_GET['constant'];
if ($type=="default"){
    $_SESSION['numIter'] =10;
		if($_SESSION['constant']=='dollar'){
    
      $_SESSION['a1'] = $_GET['a1Initial'];
	  $_SESSION['a2'] = $_GET['a2Initial'];
      $_SESSION['b1'] = $_GET['b1Initial'];
	  $_SESSION['b2'] = $_GET['b2Initial'];
      
	  $_SESSION['sides'] =  $_GET['sides'];
  
  echo'<table border="1">';
echo'<tr>';
echo'<td>Decision</td>';
echo'<td>Option A </td>';
echo'<td>Option B </td>';
echo '</tr>';

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

echo'</table>';
}//close if constant==dollar


}//close if default


echo'<form action="writeRiskTXT.php" method="GET">';
echo'File Name: <input type="text" name="fileName">';
echo'<input type="submit">';
echo'</form>';

?>
</body>
</html>
