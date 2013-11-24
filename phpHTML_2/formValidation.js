/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


history.navigationMode = 'compatible';
$(document).ready(function(){
    
    $.validator.addMethod('positiveNumber',///this function checks for positive numbers
    function (value) { 
        return Number(value) >= 0;
    }, 'Enter a positive number.');
    
    $.validator.addMethod("greaterThan",//this function check to see if the final amount is greaterthan the initial
        function(value, element, param) {
           return value >= $(param).val();}, 'Final must be greater <br>than inital amount');
       
   $.validator.addMethod('integer', function(value, element, param) {//no decimals for iterative and custom
            return !(value % 1);
        }, 'Please enter a non decimal.');
    
   $.validator.addMethod('validProbability',//this function checks for a BASIC valid probabilty
   function (value) {
       var parts = value.split("-");
       if(parts.length>2){
           return false;
       }
       for(var i=0;i<parts.length;i++){
           
           var newPart = parts[i].trim();
           if($.isNumeric(newPart)===false && newPart.toLowerCase()!=='one'){
               
               return false;
           }
       }
       return true;
       
    }, 'Not a valid Probabilty'
    );
    
    
    
   jQuery.validator.setDefaults({//this function places the errors under the text box
    errorPlacement: function(error, element) {
        error.appendTo(element.next().next());
         
    }
});
    
    
     $('#timeForm').validate({ // check time variables
        rules: {
            aInitial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            bInitial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            delay:{
                required: true,
                number: true,
                positiveNumber:true
            },
            aFinal:{
                required: true,
                number: true,
                positiveNumber:true
               // greaterThan: '.initalAAmountInput'
            },
            bFinal:{
                required: true,
                number: true,
                positiveNumber:true
                //greaterThan: '.initalBAmountInput'
            },
            aIncrement:{
                required: true,
                number: true
            },
            bIncrement:{
                required: true,
                number: true
            },
            numIterativeQuestions:{
                required: true,
                number: true,
                positiveNumber:true,
                integer:true
            },
            numMainQuestions:{
                required: true,
                number: true,
                positiveNumber:true,
                integer:true
            }
        }
    });

     $('#risk').validate({ // check time variables
        rules: {
            a1Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            a2Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            b1Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            b2Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            sides:{
                required: true,
                number: true,
                positiveNumber:true,
                integer:true
            },
            a1Increment:{
                required: true,
                number: true
            },
            a2Increment:{
                required: true,
                number: true
            },
            b1Increment:{
                required: true,
                number: true
            },
            b2Increment:{
                required: true,
                number: true
            },
            a1Final:{
                required: true,
                number: true,
                positiveNumber:true
                //greaterThan: '.initalA1AmountInput'
            },
            b1Final:{
                required: true,
                number: true,
                positiveNumber:true
                //greaterThan: '.initalB1AmountInput'
            },
            a2Final:{
                required: true,
                number: true,
                positiveNumber:true
                //greaterThan: '.initalA2AmountInput'
            },
            b2Final:{
                required: true,
                number: true,
                positiveNumber:true
                //greaterThan: '.initalb2AmountInput'
            },
            a1Prob:{
                required: true,
                validProbability:true
            },
            b1Prob:{
                required: true,
                validProbability:true
            },
            a2Prob:{
                required: true,
                validProbability:true
            },
            b2Prob:{
                required: true,
                validProbability:true
            }
        }
     });
    
    $('#riskAndTime').validate({ // check time variables
    rules: {
            a1Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            a2Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            b1Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            b2Initial: {
                required: true,
                number: true,
                positiveNumber:true
            },
            a1Final: {
                required: true,
                number: true,
                positiveNumber:true
            },
            b1Final: {
                required: true,
                number: true,
                positiveNumber:true
            },
            a2Final: {
                required: true,
                number: true,
                positiveNumber:true
            },
            b2Final: {
                required: true,
                number: true,
                positiveNumber:true
            },
            sides:{
                required: true,
                number: true,
                positiveNumber:true,
                integer:true
            },
           delay:{
                required: true,
                number: true,
                positiveNumber:true
            }
    }
    
    });
});