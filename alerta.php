<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta: Su sistema fue hackeado</title>
    <style>
        /* Estilos para centrar el GIF y el texto con fondo negro */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: red;
            animation: blink 1s infinite;
        }
        .alert-container img {
            max-width: 100%;
            height: auto;
        }
        /* Efecto de parpadeo para el mensaje */
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="alert-container">
        <h1>Alerta: Su sistema fue hackeado</h1>
        <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="Anonymous GIF">
    </div>
</body>
</html>
