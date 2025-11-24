<?php
// cotizacion.php

// Configuración del correo destino
$destinatario = "futuro@distribuidorafuturo.cl";
$asunto = "Nueva solicitud de cotización";

// Sanitizar y capturar datos del formulario
$nombre    = htmlspecialchars($_POST['nombre']);
$rut       = htmlspecialchars($_POST['rut']);
$empresa   = htmlspecialchars($_POST['empresa']);
$giro      = htmlspecialchars($_POST['giro']);
$direccion = htmlspecialchars($_POST['direccion']);
$retiro    = htmlspecialchars($_POST['retiro']);
$telefono  = htmlspecialchars($_POST['telefono']);
$detalle   = htmlspecialchars($_POST['detalle']);

// Construir mensaje
$mensaje = "
Solicitud de Cotización:

Nombre: $nombre
RUT: $rut
Empresa: $empresa
Giro: $giro
Dirección: $direccion
Retiro/Despacho: $retiro
Teléfono: $telefono

Detalle:
$detalle
";

// Cabeceras
$cabeceras = "From: noreply@distribuidorafuturo.cl\r\n";
$cabeceras .= "Reply-To: $destinatario\r\n";
$cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar correo
if(mail($destinatario, $asunto, $mensaje, $cabeceras)){
    echo "<h2>✅ Su solicitud ha sido enviada correctamente. Pronto nos pondremos en contacto.</h2>";
} else {
    echo "<h2>❌ Hubo un error al enviar la solicitud. Intente nuevamente.</h2>";
}
?>