<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe la entrada JSON
    $data = json_decode(file_get_contents("php://input"));

    // Verifica si la imagen esta en el JSON
    if (isset($data->image)) {
        // Parsea la imagen y la guarda en imagedata
        $imageData = $data->image;
        
        $url='127.0.0.1:5000/b64comp_img';
        $curl= curl_init();
        $field= array(
            'base64' => $imageData,
            'usuario' => $_SESSION['usuario']
        );
        $json_string=json_encode($field);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        $res=curl_exec($curl);
        curl_close($curl);

        $objeto=json_decode($res);
        $json_res=$objeto -> check;

        echo json_encode(["check" => $json_res]);

    }
}
?>