<script type="text/javascript">
$(function() {
    
    $("#feedbackFormDiv").dialog({
        autoOpen: false,
        width:650,
        modal: true
    });
		
	//Attach a submit handler to the form
    $( "#feedbackFormButton" ).click(function( event ) {
        //Check feedback comment has been entered
        if($( "#feedback" ).val() == ''){
            alert('Please enter a comment');
            return false;
        }
        
        //Send form contents to feedback form controller
        $.post( "feedback", $( "#feedbackForm" ).serialize() );
        $('#feedback').val('');
        $('#email').val('');
        $('#feedbackFormDiv').dialog('close');
    });
});
</script>

<style>  
    #feedbackFormDiv{
        display:none;
        align:center;
    }
    #feedbackFormDiv input[type='text']{
        padding:3px; width:300px;
    }
    #feedbackFormDiv textarea{
        padding:3px; width:500px; height: 45px
    }
</style>

<!-- The link, style by CSS to appear on the right of the page. Use noMobile so it doesn't display on mobile -->
<a href="javascript:void(0)" onClick="$('#feedbackFormDiv').dialog('open');$('.ui-dialog-titlebar-close').show();" id="feedbackRight" class="noMobile">feedback</a>

<div id="feedbackFormDiv" title="Feedback - tell us what you think" style="display:none">
    <form id="feedbackForm" action="javascript:void(0)">
        <table>
            <tr>
                <td align="left" >Comment: </td>
                <td>
                    <textarea name="feedback" id="feedback" class="text ui-widget-content ui-corner-all" ></textarea>
                 </td>
            </tr>
            <tr>
                <td align="left">Email (Optional):&nbsp;&nbsp;</td>
                <td align="left">
                    <input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all" />
                 </td>
            </tr>
            <tr>
                <td></td>
                <td align="left">
                    <input type="submit" value="Send" id="feedbackFormButton" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" ></input>
                </td>
            </tr>
        </table>
    </form>
</div>
