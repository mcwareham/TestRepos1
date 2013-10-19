

<html>

<body>


<?php
$numIt = 10;
echo $numIt;
echo $_GET['Type'];
/*$type = $_GET['Type'];
if ($type=="default"){
  $aStart = $_GET['aInitial'];
  $aEnd = $_GET['aFinal'];
  $bStart = $_GET['bInitial'];
  $bEnd = $_GET['bFinal'];
  $delay = $_Get['delay'];
  $units = $_Get['units'];
  $aSegs = $aEnd- $aStart;
  $bSegs = $bEnd-$bStart;
  
}


echo $type;

echo'<table border="1">';
echo'<tr>';
echo'<td>Decision</td>';
echo'<td>Option A <br> (revieve this amount today)</td>';
echo'<td>Option B <br> (revieve this amount ' . $delay . ' ' .$units . ')</td>';
echo '</tr>';
/*
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>*/
//echo'</table>';

?>

</body>
</html>
