<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = 'pdoexample';

	// Set DSN
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

	// Create a PDO instance
	$pdo = new PDO($dsn, $user, $password);
	//PDO::FETCH_OBJ can be set here which is used in fetch array in fetchAll 
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	$status = 'admin';

	$sql = 'SELECT * FROM user WHERE status = :status';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['status' => $status]);
	$users = $stmt->fetchAll();

	foreach($users as $user){
		//this can be used when we dont fetch data as an array
		//echo $user['name'].'<br>';
		echo $user->name.'<br>';
	}

	$name = 'Phyllis Karuoya';
	$email = 'Karuoya@gmail.com';
	$status = 'admin';

	$sql = 'INSERT INTO user(name, email, status) VALUES(:name, :email, :status)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['name'=> $name, 'email' => $email, 'status' => $status]);
	echo 'Added User';
	?>