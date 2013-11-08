<?php

//
//DEFINE FUNCTIONS FIRST
//

function printHeadHTML() {
    echo '
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
              <li id="tabHeader_4">Ambiguity</li>
            </ul>
        </div>
        <div class="tabscontent">
      ';
}

function printTimeTab() {
    echo '
  	<div class="tabpage" id="tabpage_1">
    	<h2>Time</h2>
    <form action="checkTime.php" method="GET">
        <select name="Type">
        <option value="default">Default</option>
        <option value="custom">Custom</option>
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
    </div>'
    ;
}
    
function printRiskTab() {   
    echo '
    <div class="tabpage" id="tabpage_2">
    	<h2>Risk</h2>
    <form action="checkRisk.php" method="GET" id="risk">
        <div class ="default">
            <h3>Survey Mode</h3>
            <select name="Type">
            <option value="default">Default</option>
            <option value="custom">Custom</option>
            </select>
        </div>
        <div class = "constant" id="constChoice">
            <h3>What is constant?</h3>
            <input type="radio" name="constant" value="dollar" checked>Dollar Amount<br>
            <input type="radio" name="constant" value="probability">Probability
        </div>
        <div class="amountsA1">
            <br>
            <h3>Option A1</h3>
            <br>
            initial amount: <input type="text" name="a1Initial">
            <br>
            <br>
            final amount: <input type="text" name="a1Final" id = "a1Final">
            <br>
            <br>
            die roll (constant) <input type="text" placeholder="1-6" name = "a1Prob" id = "a1Prob">
        </div>
        <div class="amountsA2" id = "A2">
            <br>
            <h3>Option A2</h3>
            <br>
            initial amount: <input type="text" name="a2Initial">
            <br>
            <br>
            final amount: <input type="text" name="a2Final" id ="a2Final">
            <br>
            <br>
            die roll (constant) <input type="text" placeholder="1-6" name = "a2Prob" id = "a2Prob">
        </div>
        <div class="amountsB1">
            <br>
            <h3>Option B1</h3>
            <br>
            initial amount: <input type="text" name="b1Initial">
            <br>
            <br>
            final amount: <input type="text" name="b1Final" id ="b1Final">
            <br>
            <br>
            die roll (constant) <input type="text" placeholder="1-6" name = "b1Prob" id = "b1Prob">		
        </div>
        <div class="amountsB2" id= "B2">
            <br>
            <h3>Option B2</h3>
            <br>
            initial amount: <input type="text" name="b2Initial">
            <br>
            <br>
            final amount: <input type="text" name="b2Final" id="b2Final">
            <br>
            <br>
            die roll (constant) <input type="text" placeholder="1-6" name = "b2Prob" id = "b2Prob">		
        </div>
        <br>
        <h3> Flexible Probability</h3>
        <br>
        <div id="numSides">
            Number of Dice sides: <input type="text" name="sides" id="sides">
        </div>
        <div id="submit">
            <input type="submit">
        </div>
    </form>
    </div>           
    '; 
    
}

function printTimeAndRiskTab() {
    echo '
    <div class="tabpage" id="tabpage_3">
    	<h2>Page 3</h2>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p><p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. 
      Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum 
      sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</p><p>Donec non enim in turpis 
      pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis 
      luctus, metus.
      </p>
    </div>
      
    ';
}

function printAmbiguityTab() {
    echo '
    <div class="tabpage" id="tabpage_4">
    	<h2>Page 4</h2>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p><p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. 
      Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum 
      sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</p><p>Donec non enim in turpis 
      pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis 
      luctus, metus.
      </p>
    </div>
      
    ';
}

function printTailHTML() {
    echo '
        </div>
    </div>
    </body>
    </html>  
    ';
}

function getJavaScriptLogic() {
    //in a later edit, the JavaScript at the bottom will be moved into a separate file and imported/"called" from this method
   
}


//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//

printHeadHTML();
printTimeTab();
printRiskTab();
printTimeAndRiskTab();
printAmbiguityTab();
printTailHTML();
//getJavaScriptLogic(); //to be uncommented later

?>



<html>    
<script src='http://code.jquery.com/jquery-1.6.min.js'></script>
<script src='acidTabs.js'></script> 
<script>
$(document).ready(function(){
   $('#tabContainer').acidTabs();
	var $A1 = $('#a1Final'),
	$A2 = $('#a2Final'),
	$B1 = $('#b1Final'),
    $B2 = $('#b2Final'),
	$sides = $('#sides')
	$a1Prob =$('#a1Prob'),
	$a2Prob =$('#a2Prob'),
	$b1Prob =$('#b1Prob'),
	$b2Prob =$('#b2Prob');
	/*$a1Prob.attr('disabled', 'disabled').val('');
	$a2Prob.attr('disabled', 'disabled').val('');
	$b1Prob.attr('disabled', 'disabled').val('');
	$b2Prob.attr('disabled', 'disabled').val('');*/
        
        if($('input:radio[name=constant]').val()=='dollar'){
                        $A1.attr('disabled', 'disabled').val('');
			$A2.attr('disabled', 'disabled').val('');
			$B1.attr('disabled', 'disabled').val('');
			$B2.attr('disabled', 'disabled').val('');
                        
                        $a1Prob.attr('disabled', 'disabled').val('');
			$a2Prob.attr('disabled', 'disabled').val('');
			$b1Prob.attr('disabled', 'disabled').val('');
			$b2Prob.attr('disabled', 'disabled').val('');
        }
        else{
                        $sides.attr('disabled', 'disabled').val('');
        }
        
	$('input:radio[name=constant]').click(function (){
    var constVal = $(this).val();  
    	if (constVal=='dollar'){
			$A1.attr('disabled', 'disabled').val('');
			$A2.attr('disabled', 'disabled').val('');
			$B1.attr('disabled', 'disabled').val('');
			$B2.attr('disabled', 'disabled').val('');

			$sides.removeAttr('disabled');
			$a1Prob.attr('disabled', 'disabled').val('');
			$a2Prob.attr('disabled', 'disabled').val('');
			$b1Prob.attr('disabled', 'disabled').val('');
			$b2Prob.attr('disabled', 'disabled').val('');

			
		}
		else{
			$A1.removeAttr('disabled');
			 $A2.removeAttr('disabled');
			$B1.removeAttr('disabled');
			$B2.removeAttr('disabled');

			$sides.attr('disabled', 'disabled').val('');
			$a1Prob.removeAttr('disabled');
			 $a2Prob.removeAttr('disabled');
			$b1Prob.removeAttr('disabled');
			$b2Prob.removeAttr('disabled');

			
		}
  });
 });
</script>
</html>
    
