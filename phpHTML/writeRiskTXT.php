<html>
<body>
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(~0);
$fileName = $_GET['fileName'];
$file = fopen($fileName.'.txt',"w") or die ("Could not write file");
print_r(error_get_last());
//$cssFile = fopen($fileName.'.css',"w") or die ("Could not write file");//We are not using CSS now



//write to txt file

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


for($i=1; $i<=$_SESSION['numIter']; $i++){
	if($i==1){

	$string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one <br> $'.$_SESSION['a2'].'if die roll is 2-'.$_SESSION['sides'].'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one <br>$'.$_SESSION['b2'].' if die roll is 2-'.$_SESSION['sides'].'</td>  </tr> </tbody></table>
';

	}
	elseif(($i+1)==$_SESSION['sides']){
	$string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one-'.$i.' <br>$'.$_SESSION['a2'].' if die roll is '.($i+1).'</td><td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one-'.$i.' <br>$'.$_SESSION['b2'].' if die roll is '.($i+1).'</td>  </tr> </tbody></table>
';
	
	}
	elseif(($i)>=$_SESSION['sides']){
	$string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one-'.$_SESSION['sides'].' </td><td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one-'.$_SESSION['sides'].'</td>  </tr> </tbody></table>
';

	}
	else{

	$string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['a1'].' if die roll is one-'.$i.' <br> $'.$_SESSION['a2'].' if die roll is '.($i+1).'-'.$_SESSION['sides'].'</td>   <td style="width: 228px; text-align: center; ">$'.$_SESSION['b1'].' if die roll is one-'.$i.'<br>$'.$_SESSION['b2'].' if die roll is '.($i+1).'-'.$_SESSION['sides'].'</td>  </tr> </tbody></table>
';

	}



    

}

$string.='


[[AdvancedAnswers]]

[[Answer]]
<strong>A</strong>
[[Answer]]
<strong>B</strong>';


}//end if constant is 'dollar'

fwrite($file, $string);

fclose($file);
//fclose($cssFile);


//echo 'Your survey "'.$fileName.'" has been created';

header("Content-disposition: attachment; filename=".$fileName.".txt");
header("Content-type: text/plain");
readfile($fileName.".txt");
?>

</body>
</html>
