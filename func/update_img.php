<?php 
    if(isset($_POST["btn_upload"])){
        function convertImageToBase64($imageFile) {
            $imageData = file_get_contents($imageFile);
            return base64_encode($imageData);
        }

        if (isset($_FILES['face']) && $_FILES['face']['error'] === UPLOAD_ERR_OK) {
            $imageFile = $_FILES['face']['tmp_name'];
            $base64Image = convertImageToBase64($imageFile);
            
            $url='127.0.0.1:5000/b64img_save';
            $curl= curl_init();
            $field= array(
                'base64' => $base64Image,
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
            echo $res;   

        } else {
            echo "No se ha seleccionado la imagen<br>";
        }

    }
?>