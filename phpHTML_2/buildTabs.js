history.navigationMode = 'compatible';
$(document).ready(function(){
   $('#tabContainer').acidTabs();
   
   
   
    $('.tabpage').each(function(){
        if ($(this).find('.time').length ==0) {
             $(this).find('.Type').prop('disabled', 'disabled');
        }
    });
   
    //logic for Default or Custom setting
    
    
    
    $('.Type').each(function(){
    


    if($(this).val()==='default'){
        $(this).parent().parent().find('.iterativeDiv').hide();
        $(this).parent().parent().find('.customQuestionDiv').hide();
        
    }
    else{
        $(this).parent().parent().find('.iterativeDiv').show();
        $(this).parent().parent().find('.customQuestionDiv').show();
        if($(this).parent().parent().find('.iterativeCheckbox').is(':checked')){
            $(this).parent().parent().find('.numIterativeQuestions').removeAttr('disabled');
        }
        else{
            $(this).parent().parent().find('.numIterativeQuestions').attr('disabled', 'disabled').val('');
        }
    }


 });
    
    
    
    $('.Type').click(function (){//if they change it after the page loads
       
        if($(this).val()==='default'){
           
            $(this).parent().parent().find('.iterativeDiv').hide();
            $(this).parent().parent().find('.customQuestionDiv').hide();
        }
        else{//Custom Choice
             $(this).parent().parent().find('.iterativeDiv').show();
            $(this).parent().parent().find('.customQuestionDiv').show();
           if($(this).parent().parent().find('.iterativeCheckbox').is(':checked')){
            $(this).parent().parent().find('.numIterativeQuestions').removeAttr('disabled').val('10');
            }
            else{
            $(this).parent().parent().find('.numIterativeQuestions').attr('disabled', 'disabled').val('');
            }
        
        }
   
    });
    
    $('.iterativeCheckbox').click(function (){
        if($(this).is(':checked')){
            $(this).parent().parent().find('.numIterativeQuestions').removeAttr('disabled').val('10');
            }
            else{
            $(this).parent().parent().find('.numIterativeQuestions').attr('disabled', 'disabled').val('');
            }
    
    
    
    });
   
        //logic for Risk MPL (constant dollar and probability.
	var $A1 = $('#a1Final'),
	$A2 = $('#a2Final'),
	$B1 = $('#b1Final'),
        $B2 = $('#b2Final'),
	$sides = $('#sides'),
	$a1Prob =$('#a1Prob'),
	$a2Prob =$('#a2Prob'),
	$b1Prob =$('#b1Prob'),
	$b2Prob =$('#b2Prob'),
	$constDollarDisplay =$('#exampleRisk'),
	$constProbabiltyDisplay=$('#exampleRisk2');
        
        if($('#dollar').is(':checked')){//BUG has been fixed
			$constDollarDisplay.show();
			$constProbabiltyDisplay.hide();
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
						$constDollarDisplay.hide();
						$constProbabiltyDisplay.show();
                        $sides.attr('disabled', 'disabled').val('');
        }
        
	$('input:radio[name=constant]').click(function (){
    var constVal = $(this).val();  
    	if (constVal=='dollar'){
			$constDollarDisplay.show();
			$constProbabiltyDisplay.hide();
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
			$constDollarDisplay.hide();
			$constProbabiltyDisplay.show();

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
 
