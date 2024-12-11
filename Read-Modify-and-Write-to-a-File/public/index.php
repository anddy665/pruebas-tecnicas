<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Modifier</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

</head>

<body>
    <div class="container">
        <h1>Arrastra y suelta tu PDF</h1>
        <div id="drop-area">
            <p>Arrastra tu archivo aquí o haz clic para seleccionar un archivo.</p>
            <input type="file" id="file-input" accept="application/pdf">
        </div>
        <div id="output"></div>
    </div>
    <script src="./script.js"></script>
</body>

</html>