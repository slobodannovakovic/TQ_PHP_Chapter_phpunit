<?php

require '../vendor/autoload.php';

$dataRepo = new App\Repositories\DBRepository;

//$dataRepo = new App\Repositories\APIRepository;

$userController = new App\Controllers\UsersController($dataRepo);

$users = $userController->find(1);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test API</title>
</head>
<body>
	<h1>Users</h1>

	<?php echo '<pre>'; print_r($users); ?>
</body>
</html>