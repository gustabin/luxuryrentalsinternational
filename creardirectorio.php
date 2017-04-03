<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php


$ruta = $_SERVER['DOCUMENT_ROOT'] . '\go\img\Puerto Rico\Dorado\abcdef';
if(!file_exists($ruta))
{
mkdir ($ruta);
echo 'Se ha creado el directorio: ' . $ruta;
} else {
echo 'la ruta: ' . $ruta . ' ya existe ';
}

?>
</body>
</html>