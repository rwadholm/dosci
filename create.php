<?php 
/*! Copyright 2014 | GPL v.2 | Bob Wadholm, rwadholm@indiana.edu
http://www.bob.wadholm.com/licenses.shtml */

$home = 'http://'. $_SERVER['HTTP_HOST'] .'/';
$site = 'index';
$new =  $_REQUEST['url'];
$text = $_REQUEST['newText'];
$explanation = json_decode(@file_get_contents('json/index.json'));
if(isset($new) && isset($text) && $new !== ''){
	$new = preg_replace('/[^0-9a-zA-Z]/','', $new);
	
	// Catch if the URL is already being used
	if(!file_exists("json/". $new .".json")){
		
		// Clean all input (no html allowed except URLs)
		$text = strip_tags($text);
		$text = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $text);
		
		// Create a new json file
		$explanation->explanation[3] = $text; 
		@file_put_contents('json/'. $new .'.json', json_encode($explanation));
		
		// Provide success message and link to user
		echo 'Success! You can visit your new site at: <a href="'. $home . $new .'">'. $home . $new .'</a>';
		
	} else {
		// Provide error message
		echo 'That URL is already being used. Try a different URL.';	
	}
} else if ($new === ''){
	echo 'Make sure to type in a new URL.';		
} else {
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
		<h2>Create your own DOSCI site</h2>		
		<form method="post">
			<p>
			<br />
				<label for="url"><strong>New URL (only letters and numbers allowed)</strong></label><br />
				<?php echo $home; ?><input type="text" id="url" name="url" required="required" /><br /><br />
				<label for="newText"><strong>New wording for Results page PRIORITY level:</strong> </label><br />
				<small>(No html&mdash;URLs will automatically be turned into links)</small><br />
				<textarea id="newText" name="newText" rows="4" required="required"><?php echo $explanation->explanation[3]; ?></textarea><br /><br />
				<button class="button" id="create">Create</button><br /><br />
			</p>
		</form>		
		
    </div><!-- /front -->
    <footer>
    	<p><a href="http://github.com/rwadholm/dosci">Open Source</a> | <a href="mailto:rwadholm@indiana.edu">Contact</a></p>
    </footer>
</body>
</html>
<?php } ?>