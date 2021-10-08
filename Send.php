<?php
$name = $_POST['name'];
$family = $_POST['family'];
$Otch = $_POST['Otch'];
$email = $_POST['email'];
$Phone = $_POST['Phone'];
$file = fopen("$family.txt","at");
fwrite($file,"\n Имя:$name
Фамилия:$family
Отчество:$Otch
email:$email
Телефон:$Phone
\n");
fclose($file);

header("Location: index.php");
?>