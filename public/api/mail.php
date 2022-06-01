<?php


function getResponse($success, $error) {


    $array;

    if($success) {
        $array = array(
            "status" => 200,
            "message" => "El correo se ha enviado correctamente. Muchas gracias por tus comentarios."
        )
    } else {
        $array = array(
            "status" => 500,
            "message" => "Ha habido un problema enviando el email, por favor contacta con el administrador.",
            "error" => $error ? json_encode($error) : null
        )
    }

}

try {



header('Content-type: application/json');
header('Access-Control-Allow-Headers: Content-Type');
header("Access-Control-Allow-Origin: *");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$name = $input['name'];
$email = $input['email'];
$message = $input['message'];
$to=$input['to'];
$subject=$input['subject'];

$NAME_RPLC = '[#NAME]';
$EMAIL_RLPC = '[#MAIL]';
$MESSAGE_RLPC = '[#MESSAGE]';


$template = "

    <div>

        <h2> Contacto CryptoWorld </h2>
        <ul>
            <li>
                <p> <b>Nombre:</b> $MESSAGE_RLPC </p>
            </li>
            <li>
                <p> <b>Email:</b> $MESSAGE_RLPC </p>
            </li>
            <li>
                <p><i> $MESSAGE_RLPC </i></p>
            </li>

        </ul>

    </div>

";

$template = str_replace($template, $NAME_RPLC, $name);
$template = str_replace($template, $EMAIL_RPLC, $email);
$template = str_replace($template, $MESSAGE_RPLC, $message);

mail($to, $subject, $template);

} catch (Exception $e) {
    echo json_encode(getResponse(false, $e))
}

echo json_encode(getResponse(true));
