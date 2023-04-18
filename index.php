<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $length = count($hotels);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-HOTEL</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <!-- for (initialization; condition; increment/decrement) {
  // code to be executed} -->

    <div class="container">
        <h1>PHP-HOTEL-EXERCISE</h1>
        <?php
        // echo '<div class="container">';
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Description</th>';
        echo '<th scope="col">Parking</th>';
        echo '<th scope="col">Vote</th>';
        echo '<th scope="col">Distance to Center</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($hotels as $index => $hotel) {
            echo '<tr>';
            echo '<th scope="row">' . $index + 1 . '</th>';
            echo '<td>' . $hotel['name'] . '</td>';
            echo '<td>' . $hotel['description'] . '</td>';
            echo '<td>' . ($hotel['parking'] ? 'Yes' : 'No') . '</td>';
            echo '<td>' . $hotel['vote'] . '</td>';
            echo '<td>' . $hotel['distance_to_center'] . ' km</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        ?>

        

        


           
    </div>



    <!-- Bootstrap scritpt -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</body>
</html>

