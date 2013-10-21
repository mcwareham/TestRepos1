<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Individual Choice Experiments</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
  <h1>Creating my first jQuery Plugin Acid Tabs</h1>
<div id="tabContainer">
  <div class="tabs">
    <ul>
      <li id="tabHeader_1">Time</li>
      <li id="tabHeader_2">Risk</li>
      <li id="tabHeader_3">Time & Risk</li>
    </ul>
  </div>
  <div class="tabscontent">
  	<div class="tabpage" id="tabpage_1">
    	<h2>Time</h2>
    	<form action="checkTime.php" method="GET">
<select name="Type">
<option value="default">Default</option>
<option value="nondefault">Nondefault</option>
</select>
    <div class="amountsA">
    <br>
    <h3>Option A</h3>
    <br>
    initial amount: <input type="text" name="aInitial">
    <br>
    <br>
    final amount: <input type="text" name="aFinal">
    </div>
    <div class="amountsB">
    <br>
    <h3>Option B</h3>
    <br>
    initial amount: <input type="text" name="bInitial">
    <br>
    <br>
    final amount: <input type="text" name="bFinal">
    time delay: <input type="text" name="delay">
    <select name="units">
        <option value="days">days</option>
        <option value="weeks">weeks</option>
        <option value="months">months</option>
        <option value="years">years</years>
    </select>
    </div>
    <input type="submit">
</form>
      
    </div>
    <div class="tabpage" id="tabpage_2">
    	<h2>Risk</h2>
      <form action="checkRisk.php" method="GET">
	<div class ="default">
		<select name="Type">
		<option value="default">Default</option>
		<option value="nondefault">Nondefault</option>
		</select>
	</div>
    <div class="amountsA1">
		<br>
		<h3>Option A1</h3>
		<br>
		initial amount: <input type="text" name="a1Initial">
		<br>
		<br>
		final amount: <input type="text" name="a1Final">
    </div>
	<div class="amountsA2">
		<br>
		<h3>Option A2</h3>
		<br>
		initial amount: <input type="text" name="a2Initial">
		<br>
		<br>
		final amount: <input type="text" name="a2Final">
    </div>
    <div class="amountsB1">
		<br>
		<h3>Option B1</h3>
		<br>
		initial amount: <input type="text" name="b1Initial">
		<br>
		<br>
		final amount: <input type="text" name="b1Final">
		
    </div>
<div class="amountsB2">
		<br>
		<h3>Option B2</h3>
		<br>
		initial amount: <input type="text" name="b2Initial">
		<br>
		<br>
		final amount: <input type="text" name="b2Final">
		
    </div>
<br>
		<h3>Probability</h3>
<br>
    Dice sides: <input type="text" name="sides">
		
	<input type="submit">
</form>
    </div>
    <div class="tabpage" id="tabpage_3">
    	<h2>Page 3</h2>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p><p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. 
      Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum 
      sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</p><p>Donec non enim in turpis 
      pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis 
      luctus, metus.
      </p>
    </div>
      </div>
    </div>

<script src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script src="acidTabs.js"></script>
<script>
$(document).ready(function(){
   $("#tabContainer").acidTabs();
 });
</script>

</body>
</html>
