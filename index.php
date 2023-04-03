<!DOCTYPE html>
<html>

<head>
    <title>Mapa y humedad de ciudades</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <h1 style="text-align: center">Mapa y humedad de ciudades</h1>
    <!-- Código HTML actualizado -->
    <form method="post" class="container">
  <div class="btn-group">
    <button type="submit" name="miami" value="Consultar Miami" class="btn btn-primary">Miami</button>
    <button type="submit" name="orlando" value="Consultar Orlando" class="btn btn-primary">Orlando</button>
    <button type="submit" name="newyork" value="Consultar New York" class="btn btn-primary">New York</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Historial
    </button>
  </div>

  <div class="form-group mt-3">
    <label for="ciudad">Ciudad:</label>
    <input type="text" id="ciudad" name="ciudad" class="form-control">
  </div>

  <button type="submit" name="submit" value="Consultar" class="btn btn-primary mt-3">Consultar</button>

  <!-- Botón de historial con modal -->
</form>



    <?php
        include("conexion.php");
        $default_city = 'Miami';
            
              if(isset($_POST['miami'])) {
                // Consultar la humedad de Miami
                $apikey = 'feba8bfb2c87e0aa11676e3934558eb7';
                $url = 'https://api.openweathermap.org/data/2.5/weather?q=Miami&appid=' . $apikey;
                $response = file_get_contents($url);
                $data = json_decode($response, true);
                $humidity = $data['main']['humidity'];
        // Guardar los datos en la base de datos
        $ciudad = 'Miami';
        $sql = "INSERT INTO consultas (ciudad, humedad) VALUES ('$ciudad', $humidity)";
        if (mysqli_query($conn, $sql)) {
            echo "Datos guardados correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
                

                // Mostrar el mapa de Miami
                echo '<h2>Humedad en Miami: ' . $humidity . '%</h2>';
                echo '<div id="map"></div>';
                echo '<script>
                    function initMap() {
                        var miami = { lat: 25.7617, lng: -80.1918 };
                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 11,
                            center: miami,
                        });
                        var markerMiami = new google.maps.Marker({
                            position: miami,
                            map: map,
                            title: "Miami",
                        });
                    }
                </script>';
                echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkzFZQ5j3U2DCkKj-6F9rXd84JBTa7Xt4&callback=initMap"
                      async defer></script>';
              } elseif(isset($_POST['newyork'])) {
                // Consultar la humedad de new york
                $apikey = 'feba8bfb2c87e0aa11676e3934558eb7';
                $url = 'https://api.openweathermap.org/data/2.5/weather?q=New York&appid=' . $apikey;
                $response = file_get_contents($url);
                $data = json_decode($response, true);
                $humidity = $data['main']['humidity'];
                // Guardar los datos en la base de datos
        $ciudad = 'New York';
        $sql = "INSERT INTO consultas (ciudad, humedad) VALUES ('$ciudad', $humidity)";
        if (mysqli_query($conn, $sql)) {
            echo "Datos guardados correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

                // Mostrar el mapa de New York
                echo '<h2>Humedad en New York: ' . $humidity . '%</h2>';
                echo '<div id="map"></div>';
                echo '<script>
                    function initMap() {
                        var newyork = { lat: 40.71427, lng: -74.00597 };
                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 11,
                            center: newyork,
                        });
                        var markerNewYork = new google.maps.Marker({
                            position: newyork,
                            map: map,
                            title: "New york",
                        });
                    }
                </script>';
                echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkzFZQ5j3U2DCkKj-6F9rXd84JBTa7Xt4&callback=initMap"
                      async defer></script>';
              }elseif(isset($_POST['orlando'])) {
                // Consultar la humedad de Orlando
                $apikey = 'feba8bfb2c87e0aa11676e3934558eb7';
                $url = 'https://api.openweathermap.org/data/2.5/weather?q=Orlando&appid=' . $apikey;
                $response = file_get_contents($url);
                $data = json_decode($response, true);
                $humidity = $data['main']['humidity'];
                // Guardar los datos en la base de datos
        $ciudad = 'Orlando';
        $sql = "INSERT INTO consultas (ciudad, humedad) VALUES ('$ciudad', $humidity)";
        if (mysqli_query($conn, $sql)) {
            echo "Datos guardados correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

                // Mostrar el mapa de Orlando
                echo '<h2>Humedad en Orlando: ' . $humidity . '%</h2>';
                echo '<div id="map"></div>';
                echo '<script>
                    function initMap() {
                        var orlando = { lat: 28.5383, lng: -81.3792 };
                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 11,
                            center: orlando,
                        });
                        var markerOrlando = new google.maps.Marker({
                            position: orlando,
                            map: map,
                            title: "Orlando",
                        });
                    }
                </script>';
                echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkzFZQ5j3U2DCkKj-6F9rXd84JBTa7Xt4&callback=initMap"
                      async defer></script>';
              }elseif(isset($_POST['submit'])) {
                // Obtener la ciudad ingresada por el usuario
                $ciudad = $_POST['ciudad'];
                // Consultar la humedad de la ciudad
                $apikey = 'feba8bfb2c87e0aa11676e3934558eb7';
                $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . urlencode($ciudad) . '&appid=' . $apikey;
                $response = file_get_contents($url);
                $data = json_decode($response, true);
                if(isset($data['main']['humidity'])) {
                  $humidity = $data['main']['humidity'];
                  // Guardar los datos en la base de datos
                  $sql = "INSERT INTO consultas (ciudad, humedad) VALUES ('$ciudad', $humidity)";
                  if (mysqli_query($conn, $sql)) {
                    echo "Datos guardados correctamente";
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  // Mostrar el mapa de la ciudad
                  echo '<h2>Humedad en ' . $ciudad . ': ' . $humidity . '%</h2>';
                  echo '<div id="map"></div>';
                  echo '<script>
                    function initMap() {
                        var ciudad = { lat: ' . $data['coord']['lat'] . ', lng: ' . $data['coord']['lon'] . '};
                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 11,
                            center: ciudad,
                        });
                        var markerCiudad = new google.maps.Marker({
                            position: ciudad,
                            map: map,
                            title: "' . $ciudad . '",
                        });
                    }
                </script>';
                  echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkzFZQ5j3U2DCkKj-6F9rXd84JBTa7Xt4&callback=initMap"
                  async defer></script>';
                } else {
                  echo 'No se pudo obtener la humedad de la ciudad ' . $ciudad;
                }
              }
              
            ?>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Historial de consultas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php include("historial.php"); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>



</html>
