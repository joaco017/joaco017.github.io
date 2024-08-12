**index.html**
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dirección IP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        #ip-address {
            font-size: 24px;
            font-weight: bold;
            color: #00698f;
        }
    </style>
</head>
<body>
    <h1>Tu dirección IP es:</h1>
    <p id="ip-address"></p>

    <script>
        const ipAddressElement = document.getElementById('ip-address');
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://api.ipify.org?format=json', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                ipAddressElement.textContent = response.ip;
                sendIpToServer(response.ip);
            } else {
                ipAddressElement.textContent = 'Error: No se pudo obtener la dirección IP';
            }
        };
        xhr.send();
    </script>

    <script>
        function sendIpToServer(ipAddress) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'save_ip.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('ip=' + ipAddress);
        }
    </script>
</body>
</html>

**save_ip.php**
<?php
  $ipAddress = $_POST['ip'];
  $date = date('Y-m-d H:i:s');
  $file = 'ip_addresses.txt';
  $content = "$date - $ipAddress\n";
  file_put_contents($file, $content, FILE_APPEND);
?>

**ip_addresses.txt** (archivo vacío que se creará en la misma carpeta que el archivo save_ip.php)