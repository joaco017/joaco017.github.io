<?php
  // Configuración de la base de datos
  $db_host = 'localhost';
  $db_username = 'joaco017';
  $db_password = '1234';
  $db_name = 'baseqwert';

  // Conectar a la base de datos
  $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

  // Verificar conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Obtener la dirección IP y la fecha de registro
  $ipAddress = $_POST['ip'];
  $date = date('Y-m-d H:i:s');

  // Insertar la información en la tabla
  $sql = "INSERT INTO ip_addresses (ip_address, date_registered) VALUES ('$ipAddress', '$date')";
  $conn->query($sql);

  // Cerrar la conexión
  $conn->close();
?>
