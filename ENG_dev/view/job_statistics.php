<style>
    #unsupported{
        display:none;
        margin: 10px 20px;
        padding: 10px !important;
        border: 1px solid silver;
    }
    #supported{
        display:none;
        padding: 10px;
        padding-bottom: 0px;
    }
</style>
    
<!-- Include graph engine (http://flotcharts.org)-->
<script type="text/javascript" src="jquery.flot.js"></script>
<script type="text/javascript" src="jquery.flot.tooltip.js"></script>

<script>
    
    //Returns true/false depending on canvas support
    //Used to display message for older browsers
    function isCanvasSupported(){
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    }
    
	$(document).ready(function(){

        //Check for canvas support
        if(isCanvasSupported()){
            
            //Show containing div
            $('#supported').show();

            //Set graph options
            var options = {
                grid: { 
                    borderWidth: 1
                },
                xaxis: {
                    mode: "time",
                    show: false //Remove xaxis points
                },
                series: {
                    lines: { show: true }, 
                    color: "#2F3F53" //Line colour
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    xDateFormat: '%d %b %y',	
                    content: "%x: %y Page Views",
                    defaultTheme:   false        
                }

            };

            //Get data from impressions manager class
            var data = [<?php echo Impression_Manager::get_instance()->get_job_impression_graph_data_str($job->get_job_id(), $from_date, $to_date); ?>];
		
            //Draw graph
            $.plot($("#statsGraphPlaceholder"), data , options); 
             
        }else{ //If canvas isn't supported, then display error message
        
            $('#unsupported').show();

        }
	});
    
</script>

<div class="ebSection">

	<h1>Job Page Views Chart</h1>
	
    <p>
		<b>Job:</b> <?php echo $job->get_job_desc() ?><br>
		<b>Organisation:</b> <?php echo $job->get_org_name() ?>	
	</p>
    
    <p id="unsupported">
        Your browser does not support this graph.<br><br>
        Please upgrade to the latest version of your browser or try another browser such as the later versions of Chrome or Firefox.
        If you continue to have problems <a target="_blank" href="mailto:<?php echo INFO_EMAIL ?>">contact us</a> for help.
    </p>
    
	<div id="supported">
		
        <div id="statsGraphPlaceholder" style="width:650px;height:300px; "></div>

        <p style="margin-top: 10px; text-align: center; color: #444444">
            Total page views <?php echo date('d F Y', strtotime($from_date)) ?>&nbsp;&nbsp;&#8211;&nbsp;&nbsp;<?php echo date('d F Y',strtotime($to_date)) ?>
        </p>
        
    </div>
    
	<p>
		<b>Total page views:</b> <?php echo $impression_totals_arr['total']; ?> <br>
		<b>Unique page views:</b> <?php echo $impression_totals_arr['unique_total']; ?>
	</p>
    <p>Page views do not include today.</p>
</div>
