<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Face</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container2">
		<h1>Ingresa al Sistema</h1>
		<?php session_start();
			echo"Hola ", $_SESSION['usuario'];
		?>

		<!—Aquí el video embebido de la webcam -->
		<div class='video-wrap'>
			<video id='video' playsinline autoplay></video>
		</div>

		<!—Botón de captura -->
		<div class='controller'>
			<button id="open_cam">Abrir Camara</button>
			<button id="stop_cam">Detener Camara</button>
			<button id='snap'>Capturar</button>
			<button id="send">Enviar</button>
		</div>

		<!—El elemento canvas -->
		<canvas id='canvas' ></canvas> 

        <p id="msg"></p>

		<form method="post">
            <button id="btn_logout" name="btn_logout">Salir</button>
        </form>
        <?php
        if(isset($_POST["btn_logout"])){
            session_destroy();
            header("location: index.php");
        }
        ?>
	</div>
</body>

<script>
    const video = document.getElementById('video');
    const snap = document.getElementById('snap');
    const canvas = document.getElementById('canvas');
    const open_cam = document.getElementById('open_cam');
    const stop_cam = document.getElementById('stop_cam');
    const send = document.getElementById('send');
    const msg = document.getElementById('msg');

    const errorMsgElement = document.querySelector('span#errorMsg');
    

    var context = canvas.getContext('2d');

    const constraints = {
        audio: false,
        video: true
    };

    // Acceso a la webcam
    async function init() {
        try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        window.stream = stream;
        video.srcObject = stream;
        } catch (e) {
        errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
        }
    };

    // Load init when open_cam is clicked
    open_cam.addEventListener('click', function(){
        init();
    });

    stop_cam.addEventListener('click', function(){
        if (stream) {
        // Get all tracks from the stream and stop them
        stream.getTracks().forEach(track => track.stop());
        video.srcObject = null; // Clear the video element
      }
    });

    send.addEventListener('click', function(){
        dataURL = canvas.toDataURL('image/jpeg');
        var b64string= dataURL.replace('data:image/jpeg;base64,', '') 
        //console.log(b64string);
        //window.location.assign('home.php');
        fetch('face_send.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ image: b64string })
        }).then(respuesta => respuesta.json())
        .then(datos => redirigir(datos));
    });

    function redirigir(datos){
        switch(datos.check){
            case "True":
                console.log("True");
                window.location.assign('home.php');
                break;
            case "False":
                msg.textContent="Las Caras No Coinciden.";
                console.log("False");
                break;
            case "Error":
                msg.textContent="Error al Realizar la Solicitud.";
                break;
        };
    };
    
    // Dibuja la imagen
    snap.addEventListener('click', function() {
		canvas.width = video.videoWidth;
		canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
    });
</script>

</html>