    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    </head>
    <body>
    <div class="container">

    <?php
        include("conexion.php");
        $sql="select * from consultas";
        $resultado=mysqli_query($conn,$sql);
    ?>
       
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Ciudad</th>
                    <th>Humedad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                
                    <th class="lista"><?php echo  $filas['ciudad']?></th>
                    <th class="lista"><?php echo $filas['humedad']?></th>
                    <th class="lista"><?php echo $filas['fecha']?></th>
                
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
            mysqli_close($conn);
        ?>
    </div>

    <!-- Importar los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-r9o2aW5q1rslXdJh+aBZjHIZcrNgOWAfP34T+lT6iq/cdb1JoFwxin9Klyr3Y05G"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-xw7IM0sTb0pi7VfmPkzFdbuw9ViNSZ3exrY0bp+3dvcwLkzGSIVtTTlOaVdjCt/l"
        crossorigin="anonymous"></script>
    </body>
    </html>