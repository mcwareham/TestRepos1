<html>
<body>
<?php


//
//DEFINE FUNCTIONS FIRST
//


function build_TimeMPL_BasicSurvey($aStart, $bStart) {
    /*
     * Unfortunately finicky---gotta leave the stuff in [[]] all the way to the left margin
     */
    
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

    $aSum= $aStart;
    $bSum= $bStart;
    for($i=1; $i<=$_SESSION['numMainQuestions']; $i++){
        $string .= '
            <table border="1" cellpadding="1" cellspacing="1" style="width: 500px; "> <tbody>  <tr>   <td style="width: 64px; text-align: center; ">'.$i.'</td>   <td style="width: 228px; text-align: center; ">'.round($aSum,2).'</td>   <td style="width: 228px; text-align: center; ">'.round($bSum,2).'</td>  </tr> </tbody></table>
        ';
        $aSum += $_SESSION['aSegs'];
        $bSum += $_SESSION['bSegs'];
    }

    $string.= '
[[AdvancedAnswers]]

[[Answer]]
    <strong>A</strong>
[[Answer]]
    <strong>B</strong>
    ';
    
    return $string;
}

/*
function writeSurveyStringToFile($fileName, $ext, $string) {    
    $file = fopen($fileName.$ext,"w") or die ("Could not write file");
    print_r(error_get_last());
    //$cssFile = fopen($fileName.'.css',"w") or die ("Could not write file");//We are not using CSS now
    fwrite($file, $string);
    fclose($file);
    //fclose($cssFile);
    
    if (!($_SESSION['isTest'])) {
        header("Content-disposition: attachment; filename=".$fileName.$ext);
        header("Content-type: text/plain");
        header("Connection: keep-alive");
        
        echo 'Your survey "'.$fileName.'" has been created';

        
        ob_clean();
        readfile($fileName.$ext);
        //exit;
    }
}*/


function build_TimeMPL_IterativeSurvey($surveyName, $surveyDescription, $surveyBrandID, $currentTime, $totalDecisionsInMainQuestion, $totalDecisionsInSubQuestions, $aStart, $bStart, $aIncrement, $bIncrement) {

    ///
    ///
    ///Define static string pieces first
    ///
    ///

    $s1 = '{"SurveyEntry":{"SurveyID":"SV_3ryZZhkxrr81I8J","SurveyName":"';
    $s2 = '","SurveyDescription":"';
    $s3 = '","SurveyOwnerID":"UR_7Ve0zlCwbmiJXz7","SurveyBrandID":"';
    $s4 = '","DivisionID":null,"SurveyLanguage":"EN","SurveyActiveResponseSet":"RS_5pdz4KH5gDW6bRj","SurveyStatus":"Inactive","SurveyStartDate":"0000-00-00 00:00:00","SurveyExpirationDate":"0000-00-00 00:00:00","SurveyCreationDate":"';
    $s5 = '","CreatorID":"UR_7Ve0zlCwbmiJXz7","LastModified":"';
    $s6 = '","LastAccessed":"0000-00-00 00:00:00","LastActivated":"0000-00-00 00:00:00","Deleted":null},"SurveyElements":[{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"BL","PrimaryAttribute":"Survey Blocks","SecondaryAttribute":null,"TertiaryAttribute":null,"Payload":[{"Type":"Default","Description":"Default Question Block","ID":"';
    $s7 = '","BlockElements":[{"Type":"Question","QuestionID":"QID';
    $s8 = '"}]},{"Type":"Trash","Description":"Trash \/ Unused Questions","ID":"';
    $s9 = '","BlockElements":[]},{"Type":"Standard","SubType":"","Description":"Block ';//be  very careful, remember there's a space after Block...
    $s10 = '","ID":"';
    $s11 = '"}]},{"Type":"Standard","SubType":"","Description":"Block ';//careful space after Block..
    $s12 = '"}]}]},{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"FL","PrimaryAttribute":"Survey Flow","SecondaryAttribute":null,"TertiaryAttribute":null,"Payload":{"Type":"Root","FlowID":"FL_1","Flow":[{"Type":"Block","ID":"';    
    $s13 = '","FlowID":"FL_';
    $s14 = '"},{"Type":"Branch","FlowID":"FL_';
    $s15 = '","Description":"New Branch","BranchLogic":{"0":{"0":{"LogicType":"Question","QuestionID":"QID1","QuestionIsInLoop":"no","ChoiceLocator":"q:\/\/QID1\/SelectableChoice\/';
    $s16 = '\/2","Operator":"Selected","QuestionIDFromLocator":"QID1","LeftOperand":"q:\/\/QID1\/SelectableChoice\/';
    $s17 = '\/2","Type":"Expression","Description":"<span class=\"ConjDesc\">If<\/span> <span class=\"QuestionDesc\">For each decision row choose your preferred option. The amounts are in dollars.\n&nbsp;\nDecision\n\t\t\tOpt...<\/span> <span class=\"LeftOpDesc\">&lt;table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px;\"&gt;\n &lt;tbody&gt;\n  &lt;tr&gt;\n   &lt;td style=\"width: 64px; text-align: center;\"&gt;';
    $s17_2 = '\/2","Type":"Expression","Description":"<span class=\"ConjDesc\">If<\/span> <span class=\"QuestionDesc\">For each decision row choose your preferred option. The a...<\/span> <span class=\"LeftOpDesc\">&lt;table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px;\"&gt;\n &lt;tbody&gt;\n  &lt;tr&gt;\n   &lt;td style=\"width: 64px; text-align: center;\"&gt;';
    $s18 = '&lt;\/td&gt;\n   &lt;td style=\"width: 228px; text-align: center;\"&gt;';
    $s19 = '&lt;\/td&gt;\n  &lt;\/tr&gt;\n &lt;\/tbody&gt;\n&lt;\/table&gt; - &lt;strong&gt;B&lt;\/strong&gt;<\/span> Is <span class=\"OpDesc\">Selected<\/span> "},"Type":"If"},"Type":"BooleanExpression"},"Flow":[{"Type":"';
    $s19_a = 'Block","ID":"';
    $s19_b = 'Standard","ID":"';
    $s20 = '"},{"Type":"EndSurvey","FlowID":"FL_';
    $s21 = '"}]},{"Type":"Branch","FlowID":"FL_';
    $s22 = '"}]}],"Properties":{"Count":';
    $s23 = '}}},{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"NT","PrimaryAttribute":"NT_dmslIRrP7xPliSx","SecondaryAttribute":null,"TertiaryAttribute":null,"Payload":{"Notes":[],"UserStatuses":{"UR_7Ve0zlCwbmiJXz7":"Expanded"},"ParentID":"QID1","ID":"NT_dmslIRrP7xPliSx"}},{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"SO","PrimaryAttribute":"Survey Options","SecondaryAttribute":null,"TertiaryAttribute":null,"Payload":{"BackButton":"false","SaveAndContinue":"true","SurveyProtection":"PublicSurvey","BallotBoxStuffingPrevention":"false","OneCompletePerIP":"false","SurveyExpiration":"None","SurveyTermination":"DefaultMessage","Header":"","Footer":"","ProgressBarDisplay":"None","PartialData":"+1 week","ValidationMessage":"","PreviousButton":"  <<  ","NextButton":"  >>  ","SkinLibrary":"Qualtrics","SkinType":"MQ","Skin":"QualtricsLight","NewScoring":1}},{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"SCO","PrimaryAttribute":"Scoring","SecondaryAttribute":null,"TertiaryAttribute":null,"Payload":{"ScoringCategories":[],"ScoringCategoryGroups":[],"ScoringSummaryCategory":null,"ScoringSummaryAfterQuestions":0,"ScoringSummaryAfterSurvey":0,"DefaultScoringCategory":null,"AutoScoringCategory":null}},{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"STAT","PrimaryAttribute":"Survey Statistics","SecondaryAttribute":null,"TertiaryAttribute":null,"Payload":{"MobileCompatible":true,"ID":"Survey Statistics"}},{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"QC","PrimaryAttribute":"Survey Question Count","SecondaryAttribute":"';
    $s24 = '","TertiaryAttribute":null,"Payload":null},{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"RS","PrimaryAttribute":"RS_5pdz4KH5gDW6bRj","SecondaryAttribute":"Default Response Set","TertiaryAttribute":null,"Payload":null},';
    
    

    ///
    ///
    ///Retreive or create required dynamic variables
    ///
    ///
    
    $blockIDs = produceBlockIDSet($totalDecisionsInMainQuestion, 15); //array of block id strings; if n total choices in main question, there are n-1 "iterative"/"zoomed-in" questions, so a total of n block ids are needed---one will be the default block housing the main question, and the n-1 rest hold the n-1 each of the iterative possibilities respectively...oops, it's actually n+1 b/c need a trash block id....we'll use convention that pos 0 of array is default block id, last pos of array is trash block id, and then 1 to size-2 is 1, to size-2 iterative blocks....
    $flowIDCounter = 2;//start at 2....the properties variable at the end is the number of flow ids by the end



    ///
    ///
    ///Main Function Logic
    ///
    ///


    //
    //Build Head of $string
    //
    
    
    
    $string = "{$s1}{$surveyName}{$s2}{$surveyDescription}{$s3}{$surveyBrandID}{$s4}{$currentTime}{$s5}{$currentTime}{$s6}" . $blockIDs[0] . $s7 . '1' . $s8 . $blockIDs[count($blockIDs)-1] . $s9;
    
    
    //
    //Define Blocks: if n questions in Main Default Question, then there is 1 block (default block) for that question, and (n-1) blocks for the possible iterative questions; there's a block for the trash, but that was already included above;
    //
    
 

    for ($i = 1; $i < $totalDecisionsInMainQuestion; $i++) {
        /*for ($z = 1; $z < 11111; $z++)
                   //echo $blockIDs[$i] . '  ' . $z . '<br>';
            echo $s10 . $blockIDs[$i] . $s7 . ($i+1) . '<br>';*/
        $string .= "{$i}{$s10}" . $blockIDs[$i] . $s7 . ($i+1);

        if ($i < $totalDecisionsInMainQuestion - 1) {               
            $string .= $s11;
        } else {
            $string .= $s12;
        }
    }

    //
    //Define Survey Flow
    //

    //every time we use $flowIDCounter below, we post increment it ($flowIDCounter++);

    $string .= $blockIDs[0] . $s13 . $flowIDCounter++ . $s14;

    $optionA = $aStart;
    $optionB = $bStart;

    for ($i = 1; $i < $totalDecisionsInMainQuestion; $i++) {
        $optionA += $aIncrement;
        $optionB += $bIncrement;
        
        
        if ($i == 1)
            $s19_end = $s19_a;
        else 
            $s19_end = $s19_b;
        if ($i == 2 || $i == 3)
            $s17_x = $s17_2;
        else 
            $s17_x = $s17;
            
        $string .= $flowIDCounter++ . $s15 . ($i+1) . $s16 . ($i+1) . $s17_x . ($i+1) . $s18 . round($optionA,2). $s18 . round($optionB,2) . $s19 . $s19_end .$blockIDs[$i] . $s13 . $flowIDCounter++ . $s20 . $flowIDCounter++;

        if($i < $totalDecisionsInMainQuestion - 1) {
            $string .= $s21;
        } else {
            $string .= "{$s22}{$flowIDCounter}{$s23}{$totalDecisionsInMainQuestion}{$s24}";
        }
    }

    //
    //Create Each Question Table
    //
    
    

    for ($i = 0; $i < $totalDecisionsInMainQuestion; $i++) { 

        if ($i == 0) { //the Main Question
            $optionAStart = $aStart;
            $optionBStart = $bStart;
            $optionAIncrement = $aIncrement;
            $optionBIncrement = $bIncrement;
            $totalDecisions = $totalDecisionsInMainQuestion;

        } else { //an Iterative Question
            $optionAIncrement = ($aIncrement / $totalDecisionsInSubQuestions); //assumed same number of choices as in main question, can change this later to be another parameter
            $optionBIncrement = ($bIncrement / $totalDecisionsInSubQuestions);
            $optionAStart = $aStart + (($i-1) * $aIncrement) + $optionAIncrement;
            $optionBStart = $bStart + (($i-1) * $bIncrement) + $optionBIncrement;
            $totalDecisions = $totalDecisionsInSubQuestions;
            
            
        }

        $string .= buildSingleQuestionTable(($i+1), $totalDecisions, $optionAStart, $optionBStart, $optionAIncrement, $optionBIncrement);

        if ($i < $totalDecisionsInMainQuestion - 1) {
            $string .= ',';
        } else {
            $string .= ']}';
        }
    }


    return $string;

}

//QID is the QID for the whole table
function buildSingleQuestionTable($QID, $numQuestionsInTable, $aStart, $bStart, $aIncrement, $bIncrement) {
    $s1 = '{"SurveyID":"SV_3ryZZhkxrr81I8J","Element":"SQ","PrimaryAttribute":"QID';
    $s2 = '","SecondaryAttribute":"For each decision row choose your preferred option. The amounts are in dollars.\n\u00a0\nDecision\n\t\t\tOptio","TertiaryAttribute":null,"Payload":{"QuestionText":"<strong>For each decision row choose your preferred option. The amounts are in dollars.<\/strong><br \/>\n&nbsp;\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px;\">\n\t<tbody>\n\t\t<tr>\n\t\t\t<td style=\"width: 40px; text-align: \n\ncenter; \"><strong>Decision<\/strong><\/td>\n\t\t\t<td style=\"width: 230px; text-align: \n\ncenter; \"><strong>Option A<\/strong><br \/>\n\t\t\t(receive this amount today)<\/td>\n\t\t\t<td style=\"width: 230px; text-align: \n\ncenter; \"><strong>Option B<\/strong><br \/>\n\t\t\t(receive this amount in 30 days)<\/td>\n\t\t<\/tr>\n\t<\/tbody>\n<\/table>","DefaultChoices":false,"DataExportTag":"Q';
    $s3 = '","QuestionType":"Matrix","Selector":"Likert","SubSelector":"SingleAnswer","Configuration":{"QuestionDescriptionOption":"UseText","TextPosition":"inline","ChoiceColumnWidth":25,"RepeatHeaders":"none","WhiteSpace":"OFF"},"QuestionDescription":"For each decision row choose your preferred option. The amounts are in dollars.\n\u00a0\nDecision\n\t\t\tOption...","Choices":{"';
    $s4 = '":{"Display":"<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px;\">\n <tbody>\n  <tr>\n   <td style=\"width: 64px; text-align: center;\">';
    $s5 = '<\/td>\n   <td style=\"width: 228px; text-align: center;\">';
    $s6 = '<\/td>\n  <\/tr>\n <\/tbody>\n<\/table>"},"';
  
    $s7a = '<\/td>\n  <\/tr>\n <\/tbody>\n<\/table>"}},"ChoiceOrder":[';
    //$s7a is added to further down in a for loop...
    $s7b = '],"Validation":{"Settings":{"ForceResponse":"OFF","ForceResponseType":"ON","Type":"None"}},"GradingData":[],"Language":[],"Answers":{"1":{"Display":"<strong>A<\/strong>"},"2":{"Display":"<strong>B<\/strong>"}},"AnswerOrder":[1,2],"ChoiceDataExportTags":false,"QuestionID":"QID';
    
    $s8 = '"}}';
    
    for ($i = 1; $i <= $numQuestionsInTable; $i++) {
        if ($i == $numQuestionsInTable) {
            $s7a .= $i;
        } else {
            $s7a .= $i . ',';
        }
    }

    $s7 = $s7a . $s7b; //only ended up doing this because I messed up at first...otherwise would have like $s9 and $s10 I guess....

    $finalString = "{$s1}{$QID}{$s2}{$QID}{$s3}";

    $optionA = $aStart;
    $optionB = $bStart;

    for ($i = 1; $i <= $numQuestionsInTable; $i++) {
        $finalString .= "{$i}{$s4}{$i}{$s5}" . round($optionA,2) . $s5 . round($optionB,2);
        if ($i < $numQuestionsInTable)
            $finalString .= $s6;
        else 
            $finalString .= "{$s7}{$QID}{$s8}";	

        $optionA += $aIncrement;
        $optionB += $bIncrement;

    }

    return $finalString;

}



function getSurveyDescription() {
    return 'Default Description';
}

function getSurveyBrandID() {
    return 'uaa';
}

//this format: 2013-10-31 14:51:13
function getCurrentTime() {
    return date("Y-m-d H:i:s");
}

function produceBlockIDSet($totalIDs, $numChars) {
    $set[] = 'BL_' . generateRandomCharString($numChars);

    for ($i = 1; $i < $totalIDs; $i++) {
        $random = generateRandomCharString($numChars);

        while (in_array($random, $set)) {
            $random = generateRandomCharString($numChars);
        }
        
        $random = 'BL_' . $random;
        
        $set[] = $random;
    }
    
    return $set;
}

function generateRandomCharString($length) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $random = $chars[mt_rand(0, strlen($chars)-1)];


    
    
    for ($i = 1; $i < $length; $i++) {   
        $random .= $chars[mt_rand(0, strlen($chars)-1)];
    }

    return $random;

}




//
//EXECUTE RELEVANT LOGIC FOR THIS PAGE
//

//if (session_status() != PHP_SESSION_ACTIVE) {//Hold off for our server
    session_start();
//}

date_default_timezone_set('America/Anchorage');



if ($_SESSION['isTest']) {
    /* 
     * Do nothing; this "halts" the code so that we can call functions from the
     * the test file after including this file---in other words, it keeps this 
     * file from running the code below (in the else clause)
     */
} else {
    
    /*ini_set('display_errors', 1);
    error_reporting(~0);*/
    include_once 'writeSurveyStringToFile.php';
    /*
     * Notice: default (with 10 main questions) vs. "custom" with just the main
     * question count different than 10, both use the exact same method 
     * call to create a survey.  So I changed the method name to build_TimeMPL_Basic
     * for now.  Also, during refactoring at a later point, it might make sense to
     * either go one of two ways: pass the parameters like I did with the 
     * build_TimeMPL_IterativeSurvey (even though they're global $SESSION), or simply 
     * use the fact that the $_SESSION variables are already defined, as you had 
     * with the build_TimeMPL_BasicSurvey---we'll see, low priority right now!
     */
 
    if ($_SESSION['isIterative'] == 'true') {
        writeSurveyStringToFile($_GET['fileName'], '.qsf', build_TimeMPL_IterativeSurvey($_GET['fileName'], getSurveyDescription(), getSurveyBrandID(), getCurrentTime(), $_SESSION['numMainQuestions'], $_SESSION['numIterativeQuestions'], $_SESSION['aStart'], $_SESSION['bStart'], $_SESSION['aSegs'], $_SESSION['bSegs']));
    } else {
        writeSurveyStringToFile($_GET['fileName'], '.txt', build_TimeMPL_BasicSurvey($_SESSION['aStart'], $_SESSION['bStart']));
    }

    /*
     * Below if chain was original logic, but the above if chain results in the same 
     * thing with less repetition, at the expense of it maybe being a tiny bit less
     * clear...maybe.
     */

    //Left this as it goes with the above comment and also just in case...eventually can delete though.
    /*
    if ($_SESSION['type'] == 'default') {
        writeSurveyStringToFile($_GET['fileName'], '.txt', build_TimeMPL_BasicSurvey($_SESSION['aStart'], $_SESSION['bStart']));
    } elseif ($_SESSION['type'] == 'custom') { //elseif might be unnecessary, it doesn't matter much though right now at last...
        if ($_SESSION['isIterative'] == 'true') {               
            writeSurveyStringToFile($_GET['fileName'], '.qsf', build_TimeMPL_IterativeSurvey($_GET['fileName'], getSurveyDescription(), getSurveyBrandID(), getCurrentTime(), $_SESSION['numMainQuestions'], $_SESSION['numIterativeQuestions'], $_SESSION['aStart'], $_SESSION['bStart'], $_SESSION['aSegs'], $_SESSION['bSegs']));
        } else {
            writeSurveyStringToFile($_GET['fileName'], '.txt', build_TimeMPL_BasicSurvey($_SESSION['aStart'], $_SESSION['bStart']));
        }
    }
    */

    exit;

}


?>

</body>
</html>
