<?php
	$env = parse_ini_file('.env');
	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false
	];
	$host = $env['hostname'];
	$dbname = $env['database'];
	$dsn = "mysql:host=$host;dbname=$dbname";
	try{
		$pdo = new PDO($dsn, $env['username'], $env['password'], $options);
	}catch (PDOException $e) {
		die("Pieslegties neizdevas: " . $e->getMessage());
	}
?>