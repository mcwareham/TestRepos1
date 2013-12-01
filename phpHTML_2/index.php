<?php



//
//DEFINE FUNCTIONS FIRST
//

function deleteTxtFiles(){//should this be in the index?
    foreach(glob("*.txt*") as $file2) {
    //echo $file2;
    unlink($file2); // Delete only .txt files through the loop
}
}
function deleteQsfFiles(){//should this be in the index?
    foreach(glob("*.qsf*") as $file2) {
    //echo $file2;
    unlink($file2); // Delete only .txt files through the loop
}
}

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
                Interative <input type="checkbox" name="iterative" class="iterativeCheckbox" value="yes"/>
                <br>
            </div>
            <div class="customQuestionDiv">
            Number of Iterative Questions <input type="text" name="numIterativeQuestions" class ="numIterativeQuestions" maxlength="3" style="width: 25px;" value="10"/>
            <br>
            <div class="errorDiv"></div>
            <br>
            Number of Main Questions <input type="text" name="numMainQuestions" class = "numMainQuestions" maxlength="3"style="width: 25px;" value="10"/>
            <br>
            <div class="errorDiv"></div>
            </div>
        </div>
';
}
function printClearFloat(){
    echo '
    <div style="clear: both;"></div>
    ';
}

function printTestButton(){
    echo'<div class="testB">
            <h3>Run Tests</h3>
            <form action="testSet.php" method="GET">
                <div id="submit">
                    <input type="submit">
                </div>
            </form>
        </div>
';
}

function printHeadHTML() {//contains files added: css, js, etc
    echo '
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="acidTabs.js"></script> 
    <script src="buildTabs.js"></script>
    <script src="formValidation.js"></script>

    <title>Individual Choice Experiments</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    
    <div id="wrapper">';
    //printTestButton();
    echo'
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
        <div class="time">
            <h2>Time</h2>
            <form action="checkTime.php" method="GET" id="timeForm">
        ';
   printSurveyMode();
   printClearFloat();
    echo'
         <div class="optionWrapper">
            <div class="amountsA1">
                <br>
                <h3>Option A</h3>
                <br>
                <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    initial amount: <input type="text" name="aInitial" class="initalAAmountInput" maxlength="9" style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="aIncrement" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        final amount: <input type="text" name="aFinal" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div style="clear: both;"></div>
              </div>
              </div>
            <div class="amountsB1">
                <br>
                <h3>Option B</h3>
                <br>
                <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    initial amount: <input type="text" name="bInitial"maxlength="9" class="initalBAmountInput" style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="bIncrement" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        final amount: <input type="text" name="bFinal" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                        
                    </div>
                </div>
            </div>
             <div class="timeDelay">
                <br>
                <h3>Time Delay</h3>
                <br>
                <div class="timeDislayDiv">
                <div class="timeDelayInput">
                    time delay: <input type="text" name="delay">
                    <br>
                    <div class="errorDiv"></div>
                </div>
                
                <select name="units" class="units">
                    <option value="days">days</option>
                    <option value="weeks">weeks</option>
                    <option value="months">months</option>
                    <option value="years">years</years>
                </select>
                </div>
            </div>
              </div>
              <div style="clear: both;"></div>
        <div id="submit">
            <input type="submit">
        </div>
            </div>
            ';
    
    echo'
       
    </form> 
        <div id=exampleTime>
            <table border="1" class="tableFormat">
                <tr>
                    <td>Decision</td>
                    <td>Option A <br> (recieve this amount <br>today)</td>
                    <td>Option B <br> (recieve this amount in <br>30<b> [Time Delay]</b> days)</td>
                </tr>
                <tr>
                <td>1</td>
                <td>8 <b>[A Initial]</b></td>
                <td>7<b>[B Initial]</td>
                </tr>
                <tr><td>2</td><td>8<b> [A $ increments <br>= 0]</b></td><td>8 <b>[B $ increments <br>= 1]</b></td></tr>
                <tr><td>3</td><td>8</td><td>9</td></tr>
                <tr><td>4</td><td>8</td><td>10</td></tr>
                <tr><td>5</td><td>8</td><td>11</td></tr>
                <tr><td>6</td><td>8</td><td>12</td></tr>
                <tr><td>7</td><td>8</td><td>13</td></tr>
                <tr><td>8</td><td>8</td><td>14</td></tr>
                <tr><td>9</td><td>8</td><td>15</td></tr>
                <tr>
                <td>10</td>
                <td>8 <b>[A Final]</b></td>
                <td>16<b>[B Final]</b></td></tr>
           </table>
        </div>
        <div style="clear: both;"></div>
    
    </div>'
    ;
}
    
function printRiskTab() {   
    echo '
    <div class="tabpage" id="tabpage_2">
    	
      <div class="risk">
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
            
               <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    initial amount: <input type="text" name="a1Initial"maxlength="9" class="initalA1AmountInput"style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="a1Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        final amount: <input type="text" name="a1Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="constProb">
                        <br>
                        die roll (constant) <input type="text" placeholder="1-6" name = "a1Prob" id = "a1Prob"> 
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    
              </div>
        </div>
        <div class="amountsB1">
            <br>
            <h3>Option B1</h3>
            <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    initial amount: <input type="text" name="b1Initial"maxlength="9" class="initalB1AmountInput"style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="b1Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        final amount: <input type="text" name="b1Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="constProb">
                        <br>
    
                        die roll (constant) <input type="text" placeholder="1-6" name = "b1Prob" id = "b1Prob">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    
              </div>
        </div>
        <div style="clear: both;"></div>
        <div class="amountsA2" id = "A2">
            <br>
            <h3>Option A2</h3>
            <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    initial amount: <input type="text" name="a2Initial"maxlength="9" class="initalA2AmountInput" style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="a2Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        final amount: <input type="text" name="a2Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="constProb">
                        <br>
    
                        die roll (constant) <input type="text" placeholder="1-6" name = "a2Prob" id = "a2Prob">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
              </div>
        </div>
        <div class="amountsB2" id= "B2">
            <br>
            <h3>Option B2</h3>
            <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    initial amount: <input type="text" name="b2Initial"maxlength="9" class = "initalb2AmountInput"style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="b2Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        final amount: <input type="text" name="b2Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="constProb">
                        <br>
    
                        die roll (constant) <input type="text" placeholder="1-6" name = "b2Prob" id = "b2Prob">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
              </div>	
        </div>
        <br>
        <div style="clear: both;"></div>
        <div class="flexibleProbability">
            <h3> Flexible Probability</h3>
            <br>
            <div id="numSides">
                Number of Dice sides: <input type="text" name="sides" id="sides">
                <br>
                <div class="errorDiv"></div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div id="submit">
            <input type="submit">
        </div>
       
    </form>
    </div>
	<div id="exampleRisk">
		<table border="1" class= "tableFormat">
		<tr>
			<td></td>
			<td>Option A </td>
			<td>Option B </td>
		</tr>
		<tr>
			<td>1</td>
			<td> $2.00 <b>(A1 INITIAL)</b><br> if die roll is one <br>$1.60 <b>(A2 INITIAL)</b><br>if die roll is 2-10</td>
			<td> $3.85 <b>(B1 INITIAL)</b><br>if die roll is one <br>$0.10 <b>(B2 INITIAL)</b><br> if die roll is 2-10</td>
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
			<td> $2.00 if die roll is one-10 <br> <b>(Number of sides = 10)</b></td>
			<td> $3.85 if die roll is one-10 <br> <b>(Number of sides = 10)</b></td>
		</tr>
            </table>
	</div>
<div id="exampleRisk2">
		<table border="1" class="tableFormat">
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
<br> ';
    printClearFloat();
    echo'</div> ';        
    
    
}

function printTimeAndRiskTab() {
    echo '
    <div class="tabpage" id="tabpage_3">
        <div class="riskAndTime">
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
            <div class="errorDiv"></div>
            <br>
            <br>
            delayed amount: <input type="text" name="a1Final">
            <br>
            <div class="errorDiv"></div>

        </div>
        <div class="amountsB1">
            <h3>Option B1</h3>
            <br>
            current amount: <input type="text" name="b1Initial">
            <br>
            <div class="errorDiv"></div>
            <br>
            <br>
            delayed amount: <input type="text" name="b1Final">
            <br>
            <div class="errorDiv"></div>
        </div>
        <div style="clear: both;"></div>
	<div class="amountsA2" id = "A2">
            <br>
            <h3>Option A2</h3>
            <br>
            current amount: <input type="text" name="a2Initial">
            <br>
            <div class="errorDiv"></div>
            <br>
            <br>
            delayed amount: <input type="text" name="a2Final">
            <br>
            <div class="errorDiv"></div>
        </div>
        <div class="amountsB2" id= "B2">
            <br>
            <h3>Option B2</h3>
            <br>
            current amount: <input type="text" name="b2Initial">
            <br>
            <div class="errorDiv"></div>
            <br>
            <br>
            delayed amount: <input type="text" name="b2Final">
            <br>
            <div class="errorDiv"></div>
        </div>
        <div style="clear: both;"></div>
        <br>
        <h3> Probability and Delay </h3>
        <br>
         Number of Dice sides: <input type="text" name="sides">
                        <br>
                        <div class="errorDiv"></div>
			<br>
			<br>
        <div class="timeDelay">
                <div class="timeDislayDiv">
                <div class="timeDelayInput">
                    time delay: <input type="text" name="delay">
                    <br>
                    <div class="errorDiv"></div>
                </div>
                
                <select name="units" class="units">
                    <option value="days">days</option>
                    <option value="weeks">weeks</option>
                    <option value="months">months</option>
                    <option value="years">years</years>
                </select>
                </div>
                
         </div>  
         <div style="clear: both;"></div>
         <div class="submitDiv">
         <input type="submit">
         </div>
           
        
                
        
    </form>
    </div>
    
        <div id=exampleRiskAndTime>
	<table border="1" class="tableFormat">
            <tr>
                <td>Option A </td>
                <td>Option B </td>
            </tr>
            <tr>
                <td> If die roll is 1 receive:<br/> $3.85 <b>(A1 CURRENT)</b> today  <br>
                and $0.10 <b>(A1 DELAYED)</b> 
                <br>in 30 days
                <br>If die roll is 2-10 receive:<br/> $0.10 <b>(A2 CURRENT)</b> today<br>
                and $3.85  <b>(A1 DELAYED)</b> 
                <br>in 30 days
                </td>
                <td> If die roll is 1 receive:<br/> $3.85 <b>(B1 CURRENT)</b>today <br>
                and $3.85 <b>(B1 DELAYED)</b>
                <br>in 30 days
                <br>If die roll is 2-10 receive:<br/> $0.10 <b>(B2 CURRENT)</b>today <br>
                and $0.10 <b>(B2 DELAYED)</b>
                <br>in 30 days
                 </td>
            </tr>
            <tr>
                <td> If die roll is 1-2 receive:<br/> $3.85 today and $0.10 in 30 days
                <br>If die roll is 3-10 receive:<br/> $0.10 today and $3.85 in 30 days
                </td>
                <td> If die roll is 1-2 receive:<br/> $3.85 today and $3.85 in 30 days
                <br>If die roll is 3-10 receive:<br/> $0.10 today and $0.10 in 30 days
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
            <td> If die roll is 1-10 receive:<br/> $3.85 <b>(A1 CURRENT)</b> today 
            <br> and $0.10 <b>(A1 DELAYED)</b>
            <br>in 30 days
            </td>
            <td> If die roll is 1-10 receive:<br/> $3.85 <b>(B1 CURRENT)</b>today 
            <br>and $3.85 <b>(B1 DELAYED)</b>
            <br>in 30 days
            </td>
        </tr>
        </table> 
        </div>
        ';
    printClearFloat();
    echo'
    </div>
      
    ';
}

function printAmbiguityTab() {
    echo '
    <div class="tabpage" id="tabpage_4">
        <div class="ambiguity">
    	<h2>Ambiguity Aversion</h2>
        <form action="checkAmbiguity.php" method="GET" id="Ambiguity">
       ';
        printSurveyMode();
        printClearFloat();
        
    echo'
         <div class="amountsA1">
            <h3>Option A (Win)</h3>
            <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                     Starting amount: <input type="text" name="a1Initial"maxlength="9" class = "initalA1AmountInput"style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="a1Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        Ending amount: <input type="text" name="a1Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
          </div>
      </div>
       <div class="amountsB1">
          <h3>Option B (Win)</h3>
          <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                     Starting amount: <input type="text" name="b1Initial"maxlength="9" class = "initalB1AmountInput"style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="b1Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        Ending amount: <input type="text" name="b1Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
          </div>
     </div>
        
        <div style="clear: both;"></div>
        <div class="amountsA2">
            <br>
            <h3>Option A (Lose)</h3>
            <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    Starting amount: <input type="text" name="a2Initial"maxlength="9" class="initalA2AmountInput" style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="a2Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        Ending amount: <input type="text" name="a2Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
              </div>
        </div>
        
        <div class="amountsB2" id= "B2">
            <br>
           <h3>Option B (Lose)</h3>
            <div class="incrementSelect">
                    <select name="count" class="count">
                        <option value="increments"selected="selected">$ Increments</option>
                        <option value="finalValue">Starting & Ending</option>
                    </select>
                    <br>
                    <br>
                    Starting amount: <input type="text" name="b2Initial"maxlength="9" class = "initalb2AmountInput"style="width: 50px;">
                    <br>
                    <div class="errorDiv"></div>
                    <div class ="incrementalDiv">
                        <br>
                        $ increments: <input type="text" name="b2Increment" class="incrementVal"value="0" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
                    <div class="finalAmountDiv">
                        <br>
                        Ending amount: <input type="text" name="b2Final" class="finalAmountVal" maxlength="9" style="width: 50px;">
                        <br>
                        <div class="errorDiv"></div>
                    </div>
              </div>	
        </div>
        
        <div style="clear: both;"></div>
        <div id="submit">
            <input type="submit">
        </div>
      
        
  
    </form>
    </div>
    <div id=exampleAmbiguity>
        
             
             <table border="1" cellpadding="1" cellspacing="1" style="width: 300px;" class="tableFormat">
                <tbody>
		<tr>
			<td style="width: 40px; text-align: center;"><strong>Decision</strong></td>
			<td style="width: 130px; text-align: center;"><strong>Option A: Urn A</strong>
			<table border="1" cellpadding="1" cellspacing="1" style="text-align: center; height: 40px; width: 130px;">
				<tbody>
					<tr>
						<td style="text-align: left;">If the ball is the color chosen</td>
						<td style="text-align: left;">If the ball is&nbsp;<em><strong>not</strong></em>&nbsp;the color chosen</td>
					</tr>
				</tbody>
			</table>
			</td>
			<td style="width: 120px; text-align: center;"><strong>Option B: Urn B</strong>
			<table border="1" cellpadding="1" cellspacing="1" style="text-align: center; height: 40px; width: 120px;">
				<tbody>
					<tr>
						<td style="text-align: left;">If the ball is the color chosen</td>
						<td style="text-align: left;">If the ball is&nbsp;<em><strong>not</strong></em>&nbsp;the color chosen</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
            <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">1</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$20.00<br> <b>A (Win)<br> Starting</b></td>      
                                <td style="text-align: center;width: 66px;">$0.00<br> <b>A (Lose)<br> Starting</b></td>        
                                <td style="text-align: center;width: 66px;">$10.00<br> <b>B (Win)<br> Starting</b></td>      
                                <td style="text-align: center;width: 66px;">$0.00<br><b> B (Lose)<br> Starting</b></td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">2</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$18.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">3</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$16.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">4</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$14.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
              <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">5</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$12.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">6</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">7</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$8.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">8</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$6.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">9</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$4.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>        
                                <td style="text-align: center;width: 66px;">$10.00</td>      
                                <td style="text-align: center;width: 66px;">$0.00</td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
              <table border="1" cellpadding="1" cellspacing="1" style="width: 320px; "class="tableFormat"> 
                <tbody>  
                    <tr>   
                        <td style="width: 55px; text-align: center; ">10</td>
                              
                                  
                                <td style="text-align: center;width: 66px;">$2.00<br> <b>A (Win)<br> Ending</b></td>      
                                <td style="text-align: center;width: 66px;">$0.00<br> <b>A (Lose)<br> Ending</b></td>        
                                <td style="text-align: center;width: 66px;">$10.00<br><b> B (Win)<br> Ending</b></td>      
                                <td style="text-align: center;width: 66px;">$0.00<br> <b>B (Lose)<br> Ending</b></td>     
                                  
                                </tbody>   
                            </table>   
                          </td>  
                    </tr> 
                 </tbody>
             </table>
             


    </div>';
    printClearFloat();
    echo'
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
deleteTxtFiles();//deletes all txt files
deleteQsfFiles();//deletes all qsf files
printHeadHTML();//contains javascript files
printTimeTab();
printRiskTab();
printTimeAndRiskTab();
printAmbiguityTab();
printTailHTML();

?>