<?php

$blacklist = array(" ", "");
$trim_chars = "(){}[],.;!?:";

function count_words($file_path)
{
	global $blacklist;
	global $trim_chars;
	$myfile = fopen($file_path, "r") or die("Unable to open file!");
	$dict = array();
	
	while(!feof($myfile)) {
		$line = strtolower(fgets($myfile));
		$line = trim(trim($line), $trim_chars);	// Remove undesired characters
		$words = explode(" ", $line);
		foreach($words as $word) {
			if (!in_array($word, $blacklist)) {
				if (!array_key_exists($word, $dict)) {
					$dict[$word] = 1; 
				} else {
					$dict[$word] = $dict[$word] + 1;
				}
			}
		}
	}
	fclose($myfile);
	arsort($dict, SORT_NUMERIC);
	return $dict;
}

function create_shade($r, $g)
{
	$rgb_shade = 'rgb(' . $r . ', ' . $g . ', 0)';
	return $rgb_shade;
}

function print_colored_words($filepath, $dict)
{
	global $blacklist;
	global $trim_chars;
	$max = current($dict);
	$red = array(255,0,0);
	$green = array(0, 255, 0);
	$myfile = fopen($filepath, "r") or die("Unable to open file!");
	
	while(!feof($myfile)) {
		$line = strtolower(fgets($myfile));
		$line = trim(trim($line), $trim_chars);
		$words = explode(" ", $line);

			foreach($words as $word) {
				if (!in_array($word, $blacklist)) {
					$occurence = $dict[$word];
					$percentage = ($occurence / $max);
					$green_factor = round(255 + $percentage * -255);
					$red_factor = round($percentage * 255);
					echo '<span style="color:' . create_shade($red_factor, $green_factor) . '">'  . $word . ' ' . '</span>';	
				} else {
					echo $word . " ";
				}
		}
		echo "<br>";
	}
	fclose($myfile);
}
?>
