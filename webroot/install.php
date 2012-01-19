<html>
<head><title>Install</title></head>

<body>
<?php 
	require_once(__DIR__ . "/../lib/hydrogen/hydrogen.inc.php");
	use hydrogen\database\DatabaseEngineFactory;
	
	$mode = 'install';
	$error = '';
	echo '<!-- Create SQL -->';
	execute('create.sql');
	echo '<!-- Insert SQL -->';
	execute('insert.sql');
	
	
	
	function execute($sqlFile){
		$fileLines = file(__DIR__ . '/../database/' . $sqlFile);
		$file = '';
		foreach($fileLines as $line){
			$file = $file . ' ' . trim($line);
		}
		
		$queries = explode(';', $file);
		
		$db = DatabaseEngineFactory::getEngine();
		foreach($queries as $query){
			
			$stmt = $db->prepare($query);
			if($stmt->execute())	
				echo '<p>Statement Executed - ' . $query . '</p>';
			else 
				$error = $error . '<p>Error with - ' . $query . '</p>';
		}
	}
	echo '<h1>ERRORS!</h1>';
	echo $error;
?>
</body>
</html>
