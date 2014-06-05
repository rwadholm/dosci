<?php 
/*! Copyright 2014 | GPL v.2 | Bob Wadholm, rwadholm@indiana.edu
http://www.bob.wadholm.com/licenses.shtml */

$home = 'http://'. $_SERVER['HTTP_HOST'] .'/';
$site = 'index';
$new =  $_REQUEST['site'];
if(isset($new) && ctype_alnum($new)){
	if(file_exists("json/". $new .".json")){
		$site = $_REQUEST['site'];
	} else {
		header("LOCATION: ". $home);
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>DOSCI</title>
<meta name="description" content="The Driver Orientation Screen for Cognitive Impairment (DOSCI) is used to help screen for cognitive impairment (problems with thinking or memory), which is one part of Medical Fitness to Drive (MFD).">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/global.css">
<script src="/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/js/global.js"></script>
</head>
<body id="<?php echo $site; ?>">

	<header>
		<div id="headerInner">
			<h1>DOSCI</h1>
			<img src="/img/logo.png" alt="Steering wheel and checklist logo for DOSCI" />
			<a href="#front" id="start">Start over</a>
		</div>
	</header>
	
	<div id="front" name="front">
		<div id="frontPage">
			<h2>Driver Orientation Screen for Cognitive Impairment</h2>
			
			<p>The Driver Orientation Screen for Cognitive Impairment (DOSCI) is used to help screen for cognitive impairment (problems with thinking or memory), which is one part of Medical Fitness to Drive (MFD).</p>
		</div><!-- /frontPage -->
			
		<a href="#Q1" class="button">Begin</a>	
			
		<div id="frontInstructions">
			<h3>Rule Out</h3>
			
			<ul>
				<li>Intoxication from alcohol, prescription medication, illicit drugs, or other impairing substance</li>
				<li>Urgent medical conditions</li>
			</ul>
		</div><!-- /frontInstructions -->
    </div><!-- /front -->  
        
    
    <div id="questions">
	    <div id="Q1">
		    <h2><span>1</span> What is your date of birth?</h2>
		    <p>(Month, day, and year required; must match documents)</p>
		    <p><a href="#Q2" id="q1" class="correct">Correct</a><a href="#Q2" class="wrong">Incorrect</a></p>	    
		</div>
	    
	    
	    <div id="Q2">
		    <h2><span>2</span> What is your full home address?</h2>
		    <p>(Address provided must match document; if not, prompt for address listed on documents)</p>    
		    <p><a href="#Q3" id="q2" class="correct">Correct</a><a href="#Q3" class="wrong">Incorrect</a></p>
		</div>    
	    
	    
	    <div id="Q3">
	    	<h2><span>3</span> What state are we in now?</h2>  
		    <p><a href="#Q4" id="q3" class="correct">Correct</a><a href="#Q4" class="wrong">Incorrect</a></p>
	    </div>
	    
	    
	    <div id="Q4"> 
	    	<h2><span>4</span> What city/town are we in now?</h2>  
		    <p><a href="#Q5" id="q4" class="correct">Correct</a><a href="#Q5" class="wrong">Incorrect</a></p>
	    </div>
	    
	    
	    <div id="Q5">
		    <h2><span>5</span> Without looking at your watch, can you estimate what time it is now?</h2>
		    <p>(Answer provided must be plus or minus one hour of correct time)</p>  
		    <p><a href="#Q6" id="q5" class="correct">Correct</a><a href="#Q6" class="wrong">Incorrect</a></p>
		</div>
	    
	    
	    <div id="Q6">
		    <h2><span>6</span> What day of the week is it?</h2>
		    <p>(Month, day, and year required; must match documents)</p>  
		    <p><a href="#Q7" id="q6" class="correct">Correct</a><a href="#Q7" class="wrong">Incorrect</a></p>
	    </div>
	    
	    
	    <div id="Q7">
	    	<h2><span>7</span> What is the current month?</h2>  
		    <p><a href="#Q8" id="q7" class="correct">Correct</a><a href="#Q8" class="wrong">Incorrect</a></p>
	    </div>
	    
	    
	    <div id="Q8">
	    	<h2><span>8</span> What day of the month is it?</h2>  
		    <p><a href="#Q9" id="q8" class="correct">Correct</a><a href="#Q9" class="wrong">Incorrect</a></p>
	    </div>
	       
	       
	    <div id="Q9">
	    	<h2><span>9</span> What year is it?</h2>  
		    <p><a href="#results" id="q9" class="correct">Correct</a><a href="#results" class="wrong">Incorrect</a></p>
	    </div>
	</div><!-- /questions -->
    
    
    <div id="results">
    	<h2>Results</h2>
    	
    	<p id="explanation"></p>
    	
    	<span id="moreInfo">i</span>
    	
    	<aside>
    		<p><strong>5+ incorrect:</strong> Priority. Unsafe to drive; refer to department procedures for alternative transportation and vehicle removal</p>
    		<p><strong>3-4 incorrect:</strong> Regular or Priority. Potentially unsafe to drive; consider totality of circumstances</p>
			<p><strong>0-2 incorrect:</strong> No Referral or Regular. Based on totality of circumstances</p>
    	</aside>
    	
    	<ol>
    		<li class="q1"><span></span>What is your date of birth?</li>
    		<li class="q2"><span></span>What is your full home address?</li>
    		<li class="q3"><span></span>What state are we in now?</li>
    		<li class="q4"><span></span>What city/town are we in now?</li>
    		<li class="q5"><span></span>Without looking at your watch, can you estimate what time it is 
      now?</li>
    		<li class="q6"><span></span>What day of the week is it?</li>
    		<li class="q7"><span></span>What is the current month?</li>
    		<li class="q8"><span></span>What day of the month is it?</li>
    		<li class="q9"><span></span>What year is it?</li>   		
    	</ol>
    	
    	<h3>Additional Questions to Assist in Evaluation</h3>
    	<ul>
    		<li>Where are you coming from and where are you going?</li>
    		<li>Will you please spell your name?</li>
    		<li>Do you have an emergency contact? What is the name and phone number?</li>
    	</ul>
    	<br />
    	<br />
    </div><!-- /results -->    
    
    <div id="startOver">
		<a href="#front">Start Over</a>
	</div>
    
    <footer>
    	<p><a href="http://github.com/rwadholm/dosci">Open Source</a> | <a href="mailto:rwadholm@indiana.edu">Contact</a><br />
    	<a href="create.php">Create your own DOSCI App</a></p>
    </footer>
</body>
</html>