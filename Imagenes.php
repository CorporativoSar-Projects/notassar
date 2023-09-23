<!DOCTYPE html>
<html>
    <head>
        <title>Subida y guardado de logos</title>
        <link rel="stylesheet" href="assets/css/styles.css">

    </head>
    <body>
        <div class="container">
            <form action="subida.php" method="POST" enctype="multipart/form-data">
                <span class="file status">No hay un archivo seleccionado</span>
                <label class="btn" for="custom-file-input"> escoge un archivo</label>
                <input type="file" name="file" id="custom-file-input"/>
                <input type="submit" class="btn" name="upload" value="Upload"/>
            </form>
        </div>

    </body>
</html>