<?php



//
//DEFINE FUNCTIONS FIRST
//
function printSurveyMode(){
    echo'
        <div class ="surveyMode">
            <h3>Survey Mode</h3>
            <br>
            <div class="defaultDiv">
                <select name="Type" class="Type">
                    <option value="default"selected="selected">Default</option>s
                    <option value="custom">Custom</option>
                </select>
            </div>
            <div class="iterativeDiv">
                Interative <input type="checkbox" name="iterative" class="iterativeCheckbox"/>
                <br>
            </div>
            <div class="customQuestionDiv">
            Number of Iterative Questions <input type="text" name="numIterativeQuestions" class ="numIterativeQuestions" maxlength="3" value="10"/>
            <br>
            <br>
            Number of Main Questions <input type="text" name="numMainQuestions" class = "numMainQuestions" maxlength="3" value="10"/>
            </div>
        </div>
';
}
function printClearFloat(){
    echo '
    <div style="clear: both;"></div>
    ';
}

function printHeadHTML() {//contains files added: css, js, etc
    echo '
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.6.min.js"></script>
    <script src="acidTabs.js"></script> 
    <script src="buildTabs.js"></script>

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
        ';
   printSurveyMode();
   printClearFloat();
    echo'
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
         <div class = "constant" id="constChoice">
            <h4>What is constant?
            <input type="radio" name="constant" value="dollar" id="dollar" checked>Dollar Amount 
            <input type="radio" name="constant" value="probability" id ="probability">Probability
            </h4>
        </div>';
    printSurveyMode();
    printClearFloat();
    echo '
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
	<div id="exampleRisk">
		<table border="1">
		<tr>
			<td></td>
			<td>Option A </td>
			<td>Option B </td>
		</tr>
		<tr>
			<td>1</td>
			<td> $2.00 if die roll is one <br>(A1 INITIAL)<br>$1.60 if die roll is 2-10<br> (A2 INITIAL)</td>
			<td> $3.85 if die roll is one <br>(B1 INITIAL)<br>$0.10 if die roll is 2-10<br>(B2 INITIAL)</td>
		</tr>
		<tr>
			<td>2</td>
			<td> $2.00 if die roll is one-2 <br>$1.60 if die roll is 3-10</td>
			<td> $3.85 if die roll is one-2 <br>$0.10 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>3</td>
			<td> $2.00 if die roll is one-3 <br>$1.60 if die roll is 4-10</td>
			<td> $3.85 if die roll is one-3 <br>$0.10 if die roll is 4-10</td>
		</tr>
		<tr>
			<td>4</td>
			<td> $2.00 if die roll is one-4 <br>$1.60 if die roll is 5-10</td>
			<td> $3.85 if die roll is one-4 <br>$0.10 if die roll is 5-10</td>
		</tr>
		<tr>
			<td>5</td>
			<td> $2.00 if die roll is one-5 <br>$1.60 if die roll is 6-10</td>
			<td> $3.85 if die roll is one-5 <br>$0.10 if die roll is 6-10</td>
		</tr>
		<tr>
			<td>6</td>
			<td> $2.00 if die roll is one-6 <br>$1.60 if die roll is 7-10</td>
			<td> $3.85 if die roll is one-6 <br>$0.10 if die roll is 7-10</td>
		</tr>
		<tr>
			<td>7</td>
			<td> $2.00 if die roll is one-7 <br>$1.60 if die roll is 8-10</td>
			<td> $3.85 if die roll is one-7 <br>$0.10 if die roll is 8-10</td>
		</tr>
		<tr>
			<td>8</td>
			<td> $2.00 if die roll is one-8 <br>$1.60 if die roll is 9-10</td>
			<td> $3.85 if die roll is one-8 <br>$0.10 if die roll is 9-10</td>
		</tr>
		<tr>
			<td>9</td>
			<td> $2.00 if die roll is one-9 <br>$1.60 if die roll is 10</td>
			<td> $3.85 if die roll is one-9 <br>$0.10 if die roll is 10</td>
		</tr>
		<tr>
			<td>10</td>
			<td> $2.00 if die roll is one-10 </td>
			<td> $3.85 if die roll is one-10 </td>
		</tr>
	</table>
	</div>
<div id="exampleRisk2">
		<table border="1">
		<tr>
			<td></td>
			<td>Option A </td>
			<td>Option B </td>
		</tr>
		<tr>
			<td>1</td>
			<td> $1.00 if die roll is one <br>(A1 INITIAL/ die roll)<br>$0.50 if die roll is 2-10<br> (A2 INITIAL/ die roll)</td>
			<td> $2.50 if die roll is one-2 <br>(B1 INITIAL/ die roll)<br>$2.00 if die roll is 3-10<br>(B2 INITIAL/ die roll)</td>
		</tr>
		<tr>
			<td>2</td>
			<td> $2.00 if die roll is one <br>$0.50 if die roll is 2-10</td>
			<td> $3.00 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>3</td>
			<td> $3.00 if die roll is one <br>$0.50 if die roll is 2-10</td>
			<td> $3.50 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>4</td>
			<td> $4.00 if die roll is one  <br>$0.50 if die roll is 2-10</td>
			<td> $4.00 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>5</td>
			<td> $5.00 if die roll is one  <br>$0.50 if die roll is 2-10</td>
			<td> $4.50 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>6</td>
			<td> $6.00 if die roll is one  <br>$0.50 if die roll is 2-10</td>
			<td> $5.00 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>7</td>
			<td> $7.00 if die roll is one  <br>$0.50 if die roll is 2-10</td>
			<td> $5.50 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>8</td>
			<td> $8.00 if die roll is one  <br>$0.50 if die roll is 2-10</td>
			<td> $6.00 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>9</td>
			<td> $9.00 if die roll is one  <br>$0.50 if die roll is 2-10</td>
			<td> $6.50 if die roll is one-2 <br>$2.00 if die roll is 3-10</td>
		</tr>
		<tr>
			<td>10</td>
			<td> $10.00 if die roll is one <br>(A1 Final)<br>$0.50 if die roll is 2-10 <br>(A2 FINAL)</td>
			<td> $7.00 if die roll is one-2 <br>(B1 FINAL) <br> $2.00 if die roll is 3-10 <br>(B2 FINAL)</td>
		</tr>
	</table>
	</div>
<br>
<br>  
    </div>          
    
    '; 
    
}

function printTimeAndRiskTab() {
    echo '
    <div class="tabpage" id="tabpage_3">
    	<h2>Risk and Time</h2>
      	<form action="checkRiskAndTime.php" method="GET" id="riskAndTime">
        ';
    printSurveyMode();
    printClearFloat();
    echo'
     	<div class="amountsA1">
            <h3>Option A1</h3>
            <br>
            current amount: <input type="text" name="a1Initial">
            <br>
            <br>
            delayed amount: <input type="text" name="a1Final">

        </div>
        <div class="amountsB1">
            <h3>Option B1</h3>
            <br>
            current amount: <input type="text" name="b1Initial">
            <br>
            <br>
            delayed amount: <input type="text" name="b1Final">	
        </div>
		<div class="amountsA2" id = "A2">
            <br>
            <h3>Option A2</h3>
            <br>
            current amount: <input type="text" name="a2Initial">
            <br>
            <br>
            delayed amount: <input type="text" name="a2Final">
        </div>
        <div class="amountsB2" id= "B2">
            <br>
            <h3>Option B2</h3>
            <br>
            current amount: <input type="text" name="b2Initial">
            <br>
            <br>
            delayed amount: <input type="text" name="b2Final">
        </div>
        <br>
        <h3> Probability and Delay </h3>
        <br>
        <div id="numSides">
            Number of Dice sides: <input type="text" name="sides">
			<br>
			<br>
			time delay: <input type="text" name="delay">
        <select name="units">
                    <option value="days">days</option>
                    <option value="weeks">weeks</option>
                    <option value="months">months</option>
                    <option value="years">years</years>
                </select>
                <br>
                <br>
                <div id="submit">
                <input type="submit">
                </div>
        </div>
    </form>
    
        <div id=exampleRiskAndTime>
	<table border="1">
            <tr>
                <td>Option A </td>
                <td>Option B </td>
            </tr>
            <tr>
                <td> If die roll is 1 receive:<br/> $3.85 today and $0.10 in 30 days
                <br> (A1 CURRENT/ A1 DELAYED)
                <br>If die roll is 2-10 receive:<br/> $0.10 today and $3.85 in 30 days
                 <br> (A2 CURRENT/ A2 DELAYED)
                </td>
                <td> If die roll is 1 receive:<br/> $3.85 today and $3.85 in 30 days
                <br> (B1 CURRENT)/ B1 DELAYED)
                <br>If die roll is 2-10 receive:<br/> $0.10 today and $0.10 in 30 days
                <br> (B2 CURRENT/ B2 DELAYED)
                 </td>
            </tr>
            <tr>
                <td> If die roll is 1-2 receive:<br/> $3.85 today and $0.10 in 30 days
                 <br> (A1 CURRENT/ A1 DELAYED)
                <br>If die roll is 3-10 receive:<br/> $0.10 today and $3.85 in 30 days
                 <br> (A2 CURRENT/ A2 DELAYED)
                </td>
                <td> If die roll is 1-2 receive:<br/> $3.85 today and $3.85 in 30 days
                <br> (B1 CURRENT)/ B1 DELAYED)
                <br>If die roll is 3-10 receive:<br/> $0.10 today and $0.10 in 30 days
                <br> (B2 CURRENT/ B2 DELAYED)
                </td>
            </tr>
            
            <tr>
                <td> If die roll is 1-3 receive:<br/> $3.85 today and $0.10 in 30 days
                <br>If die roll is 4-10 receive:<br/> $0.10 today and $3.85 in 30 days
                </td>
                <td> If die roll is 1-3 receive:<br/> $3.85 today and $3.85 in 30 days
                <br>If die roll is 4-10 receive:<br/> $0.10 today and $0.10 in 30 days
                </td>
            </tr>
            <tr>
                <td> If die roll is 1-4 receive:<br/> $3.85 today and $0.10 in 30 days
                <br>If die roll is 5-10 receive:<br/> $0.10 today and $3.85 in 30 days
                </td>
                <td> If die roll is 1-4 receive:<br/> $3.85 today and $3.85 in 30 days
                <br>If die roll is 5-10 receive:<br/> $0.10 today and $0.10 in 30 days
                </td>
            </tr>
            <tr>
                 <td> If die roll is 1-5 receive:<br/> $3.85 today and $0.10 in 30 days
                 <br>If die roll is 6-10 receive:<br/> $0.10 today and $3.85 in 30 days
                 </td>
                 <td> If die roll is 1-5 receive:<br/> $3.85 today and $3.85 in 30 days
                 <br>If die roll is 6-10 receive:<br/> $0.10 today and $0.10 in 30 days
                 </td>
             </tr>
             <tr>
                <td> If die roll is 1-6 receive:<br/> $3.85 today and $0.10 in 30 days
                <br>If die roll is 7-10 receive:<br/> $0.10 today and $3.85 in 30 days
                </td>
                <td> If die roll is 1-6 receive:<br/> $3.85 today and $3.85 in 30 days
                <br>If die roll is 7-10 receive:<br/> $0.10 today and $0.10 in 30 days
                </td>
             </tr>
             <tr>
             <td> If die roll is 1-7 receive:<br/> $3.85 today and $0.10 in 30 days
             <br>If die roll is 8-10 receive:<br/> $0.10 today and $3.85 in 30 days
             </td>
             <td> If die roll is 1-7 receive:<br/> $3.85 today and $3.85 in 30 days
             <br>If die roll is 8-10 receive:<br/> $0.10 today and $0.10 in 30 days
             </td>
         </tr>
         <tr>
            <td> If die roll is 1-8 receive:<br/> $3.85 today and $0.10 in 30 days
            <br>If die roll is 9-10 receive:<br/> $0.10 today and $3.85 in 30 days
            </td>
            <td> If die roll is 1-8 receive:<br/> $3.85 today and $3.85 in 30 days
            <br>If die roll is 9-10 receive:<br/> $0.10 today and $0.10 in 30 days
            </td>
         </tr>
         <tr>
            <td> If die roll is 1-9 receive:<br/> $3.85 today and $0.10 in 30 days<br>
            If die roll is 10 receive:<br/> $0.10 today and $3.85 in 30 days
            </td>
            <td> If die roll is 1-9 receive:<br/> $3.85 today and $3.85 in 30 days
            <br>If die roll is 10 receive:<br/> $0.10 today and $0.10 in 30 days
            </td>
        <tr>
            <td> If die roll is 1-10 receive:<br/> $3.85 today and $0.10 in 30 days
            <br>(A1 CURRENT/ A1 DELAYED)
            </td>
            <td> If die roll is 1-10 receive:<br/> $3.85 today and $3.85 in 30 days
            <br>(B1 CURRENT/ B1 DELAYED)
            </td>
        </tr>
        </table> 
        </div>
    </div>
      
    ';
}

function printAmbiguityTab() {
    echo '
    <div class="tabpage" id="tabpage_4">
    	<h2>Ambiguity Aversion</h2>
        <form action="checkAmbiguity.php" method="GET" id="riskAndTime">
       ';
        printSurveyMode();
        printClearFloat();
        
    echo'
     	<div class="amountsA1">
            <h3>Option A (correctly guessed)</h3>
            <br>
            Starting amount: <input type="text" name="a1Initial">
            <br>
            <br>
            Ending amount: <input type="text" name="a1Final">

        </div>
        <div class="amountsB1">
            <h3>Option B (correctly guessed)</h3>
            <br>
            Starting amount: <input type="text" name="b1Initial">
            <br>
            <br>
            Ending amount: <input type="text" name="b1Final">	
        </div>
	<div class="amountsA2" id = "A2">
            <br>
            <h3>Option A (incorrectly guessed)</h3>
            <br>
            Starting amount: <input type="text" name="a2Initial">
            <br>
            <br>
            Ending amount: <input type="text" name="a2Final">
        </div>
        <div class="amountsB2" id= "B2">
            <br>
            <h3>Option B (incorrectly guessed)</h3>
            <br>
            current amount: <input type="text" name="b2Initial">
            <br>
            <br>
            delayed amount: <input type="text" name="b2Final">
        </div>
        <br>
        <h3> Probability and Delay </h3>
        <br>
        <div id="numSides">
            Number of Dice sides: <input type="text" name="sides">
			<br>
			<br>
			time delay: <input type="text" name="delay">
        <select name="units">
                    <option value="days">days</option>
                    <option value="weeks">weeks</option>
                    <option value="months">months</option>
                    <option value="years">years</years>
                </select>
                <br>
                <br>
                <div id="submit">
                <input type="submit">
                </div>
        </div>
        
  
    </form>
      
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




//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//

printHeadHTML();//contains javascript files
printTimeTab();
printRiskTab();
printTimeAndRiskTab();
printAmbiguityTab();
printTailHTML();


?>