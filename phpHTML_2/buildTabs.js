<script src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script src="acidTabs.js"></script>
<script>
$(document).ready(function(){
   $("#tabContainer").acidTabs();
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
        
        if($("input:radio[name=constant]").val()=='dollar'){
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
        
	$("input:radio[name=constant]").click(function (){
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