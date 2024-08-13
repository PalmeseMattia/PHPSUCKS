<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>PHP SUCKS</title>
</head>

<body>

	<div class="center-title center">
		<h2>LIST OF WORDS THAT APPEARS IN A TEXT SORTED BY OCCURENCE!</h2>
		<h2>Made with PHP 8 with love <3 </h2>
	</div>

	<?php
	include 'main.php';
	if ($argc < 2) {
		exit("Please provide the file path!\nUsage: php index.php <file_path> OR make <file_path>\n");
	}
	$file = $argv[1];
	$dictionary = count_words($file);
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
			print_colored_words($file, $dictionary);
		?>
		</div>
	</div>

</body>
</html>
