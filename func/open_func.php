<?php 
    if(isset($_POST["btn_open"])){
        $url='127.0.0.1:5000/open';
        $curl= curl_init();
        $field= array(
            'status' => True
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
    }
?>