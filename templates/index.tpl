<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Lista de Precios Tunnel</title>
</head>
<body>
    <div>TEST</div>
    <ul>
    {foreach $marcas as $marca}
        <li>{$marca['id']} {$marca['marca']}</li>
    {/foreach}
    </ul>
</body>
</html>
