<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="image"></input>
	<input type="submit"></input>
</form>
</body>
</html>

<?php

var_dump($_POST);

var_dump($_FILES);

?>