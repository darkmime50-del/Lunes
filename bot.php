<?php
// Token
$token = "8562233583:AAEz6CqI8yuic7lyKIYelh8AOPwnh7bsS3M"; 

// Obtener la actualización de Telegram 
$update = json_decode(file_get_contents("php://input"), TRUE);
$chatId = $update["message"]["chat"]["id"];
$mensaje = strtolower(trim($update["message"]["text"]));

// Productos y mensajes requeridos
switch ($mensaje) {
    case "carne":
    case "queso":
    case "jamon":
        $respuesta = "Pasillo 1";
        break;
    case "leche":
    case "yogurth":
    case "cereal":
        $respuesta = "Pasillo 2";
        break;
    case "bebidas":
    case "jugos":
        $respuesta = "Pasillo 3";
        break;
    case "pan":
    case "pasteles":
    case "tortas":
        $respuesta = "Pasillo 4";
        break;
    case "detergente":
    case "lavaloza":
        $respuesta = "Pasillo 5";
        break;
    default:
        $respuesta = "No entiendo la pregunta."; 
}

// Envío de la respuesta automatizada 
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chatId&text=".urlencode($respuesta));
?>