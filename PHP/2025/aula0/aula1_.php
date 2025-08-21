<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conversão de Temperatura</title>
</head>
<body>

<form method="get" action="processa.php">
  Temperatura: 
  <input type="float" name="temperatura"><br>
  Selecione: 
  <select name="select_temp">
    <option value="FpC">°F para °C</option>
    <option value="CpF" selected>°C para °F</option>
  </select>
  <br>
  <input type="submit" value="Enviar">
</form>
</body>
</html>