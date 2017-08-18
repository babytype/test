<?
echo <<<END
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="program.php" method="post" enctype='multipart/form-data'>
<input type="file" name="filename" size='10' >
<input type='text' name='name' size='50' placeholder='Имя и фамилия' required='required'>
<input type="submit" name="filename" value="posting">
</form>
END;
	if($_FILES){
	$name=$_FILES['filename']['name'];
	switch($_FILES['filename']['type']){
	case 'image/jpeg': $ext='jpg'; break;
	case 'image/gif':  $ext='gif'; break;
	case 'image/png':  $ext='png'; break;
	case 'image/tiff': $ext='tif'; break;
	default:            $ext='';    break;
	}
	if($ext){
	$n="image.$ext";
	move_uploaded_file($_FILES['filename']['tmp_name'], $n);
	echo "Загружено изображение '$name' под именем '$n':<br>";
	echo "<img src='$n'>";
	}
	else echo "good";
	}
	else echo "problems";
echo "</body></html>";



?>