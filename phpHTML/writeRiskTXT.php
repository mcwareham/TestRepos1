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
			<td style="width: 230px; text-align: center; "><strong>Option A</strong><br />
			(receive this amount today)</td>
			<td style="width: 230px; text-align: center; "><strong>Option B</strong><br />
			(receive this amount in '.$_SESSION['delay'].' '.$_SESSION['units'].')</td>
		</tr>
	</tbody>
</table>



[[Choices]]

';

$aSum=$_SESSION['aStart'];
$bSum=$_SESSION['bStart'];
for($i=1; $i<=$_SESSION['numIter']; $i++){

    $string .= '<table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">'.round($aSum,2).'</td>   <td style="width: 228px; text-align: center; ">'.round($bSum,2).'</td>  </tr> </tbody></table>
';

    $aSum += $_SESSION['aSegs'];
    $bSum += $_SESSION['bSegs'];

}

$string.='


[[AdvancedAnswers]]

[[Answer]]
<strong>A</strong>
[[Answer]]
<strong>B</strong>';



fwrite($file, $string);

fclose($file);
//fclose($cssFile);


echo 'Your survey "'.$fileName.'" has been created';

header("Content-disposition: attachment; filename=".$fileName.".txt");
header("Content-type: text/plain");
readfile($fileName.".txt");
?>

</body>
</html>
