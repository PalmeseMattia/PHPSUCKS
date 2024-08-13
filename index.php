<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>PHP SUCKS</title>
</head>

<body>

	<div class="center-title center">
		<h2>List of words that appears in the Bible sorted by occurence!</h2>
		<h2>Made with PHP 8 with love <3 </h2>
	</div>

<?php
	// Iterate over the file to get occurences of every word
	$myfile = fopen("bible_copy.txt", "r") or die("Unable to open file!");
	$dictionary = array();
	$blacklist = array("the", "and", "in", "of", "to", "a", "it", "", " ", "was", "that", "he", "i", "be", "is");
	while(!feof($myfile)) {
		$line = strtolower(fgets($myfile));
		$line = trim(trim($line), ",.;!?i:");	// Remove undesired characters
		$words = explode(" ", $line);
		foreach($words as $word) {
			if (!in_array($word, $blacklist)) {
				if (!array_key_exists($word, $dictionary)) {
    					$dictionary[$word] = 1; 
				} else {
					$dictionary[$word] = $dictionary[$word] + 1;
				}
			}
		}
	}
	fclose($myfile);
	arsort($dictionary, SORT_NUMERIC);	// Sort descending
?>
	<div class="container">
	<table class="">
	  <tr>
	    <th>Word</th>
	    <th>Count</th>
	  </tr>
<?php
	// Iterate through each word and create a table of occurences
	foreach($dictionary as $k => $v) {
		echo "<tr><th>". $k . "</th><th>" . $v . "</th></tr>";
	}
?>
	</table>
	
	<div class="bible">
<?php
	// Print every word with a color based on the occurence of the word
	$myfile = fopen("bible.txt", "r") or die("Unable to open file!");
	$max = current($dictionary);
	while(!feof($myfile)) {
		$line = strtolower(fgets($myfile));
		$line = trim(trim($line), ",.;!?i:");
		$words = explode(" ", $line);
			foreach($words as $word) {
			if (!in_array($word, $blacklist)) {
				echo $word . " ";	
			} else {
				echo $word . " ";
			}
		}
		echo "<br>";
	}
	fclose($myfile);
?>
	</div>
	</div>

</body>
</html>
