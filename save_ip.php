<?php
  // Configuración de la base de datos
  $db_host = 'a84935b9-4f17-4063-8ac7-57543aaa0bc9';
  $db_username = 'production';
  $db_password = '58316126-b5a3-4d0d-9ad6-173d54195cb3';
  $db_name = 'earnest-nourishment';

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
