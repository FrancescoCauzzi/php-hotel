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
    
    // table top
    $table_top = '';
    $table_top .= '<table class="table table-striped">';
    $table_top .= '<thead>';
    $table_top .= '<tr>';
    $table_top .= '<th scope="col">#</th>';
    foreach ($hotels[0] as $chiave => $valore){        
        $table_top .= '<th scope="col">'. ucfirst($chiave) . '</th>';              
    }
    $table_top .= '</tr>';
    $table_top .= '</thead>';
    $table_top .= '<tbody>'; 
      

    // table bottom
    $table_bottom = '</tbody>';
    $table_bottom .= '</table>';
    $table_bottom .= '</div>';

    // all hotels 
    $all_hotels = '';
    foreach ($hotels as $index => $hotel) {
        $all_hotels .= '<tr>';
        $all_hotels .= '<th scope="row">' . $index + 1 . '</th>';
        $all_hotels .= '<td>' . $hotel['name'] . '</td>';
        $all_hotels .= '<td>' . $hotel['description'] . '</td>';
        $all_hotels .= '<td>' . ($hotel['parking'] ? 'Yes' : 'No') . '</td>';
        $all_hotels .= '<td>' . $hotel['vote'] . '</td>';
        $all_hotels .= '<td>' . $hotel['distance_to_center'] . ' km</td>';
        $all_hotels .= '</tr>';
    };

    // my table
    $myArrayTest = [];
    $my_table = '';
    foreach ($myArrayTest as $index => $element){
        $my_table .= '<tr>';
        $my_table .= '<th scope="row">' . $index + 1 . '</th>';
        $my_table .= '<td>' . $element['name'] . '</td>';
        $my_table .= '<td>' . $element['description'] . '</td>';
        $my_table .= '<td>' . ($element['parking'] ? 'Yes' : 'No') . '</td>';
        $my_table .= '<td>' . $element['vote']  . '</td>';
        $my_table .= '<td>' . $element['distance_to_center'] . ' km</td>';
        $my_table .= '</tr>';          
    }       
    
    // no results
    $no_result_found = '<tr>';
    $no_result_found .= '<th scope="row">' . '??' . '</th>';
    $no_result_found .= '<td>' . 'No results found' . '</td>';  
    $no_result_found .= '<td>' . '??' . '</td>';                        
    $no_result_found .= '<td>' . '??' . '</td>';                        
    $no_result_found .= '<td>' . '??' . '</td>';                        
    $no_result_found .= '<td>' . '??' . '</td>';                       
    $no_result_found .= '</tr>';

    
    

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
        <section class='mb-5'>
            <h2>Bonus</h2>
            <!-- The action attribute of the form is set to htmlspecialchars($_SERVER["PHP_SELF"]), which is a security measure to prevent XSS attacks. This ensures that the form data is submitted to the same PHP script that generated the form. -->
            <form class="mb-3 form-check d-flex flex-column" method='get' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div>                
                    <label class="form-check-label" for="exampleCheck1">Parking lot</label>
                    <input type="checkbox" class="form-check-input" id="has-hotel" name='has_parking[]'>
                </div>
                <div>
                    <label for="vote">Vote:</label>
                    <input type="number" id="vote" name="vote" min="0" max="5" step="1">
                </div>
                <div>
                    <input type="submit" name="submit" value="Submit">
                </div>                    
            </form>
            <?php      
            // var_dump(isset($_GET['has_parking']));  
            // var_dump(isset($_GET['vote']));     
            // var_dump($_GET['vote'] );      

                echo $table_top;
                
                if(isset($_GET['has_parking']) && !empty($_GET['vote'])){
                    $myArray = [];
                    
                    foreach ($hotels as $index => $hotel){
                        if(($hotel['parking'] == true) &&  $hotel['vote'] >= $_GET['vote'] ) {
                            array_push($myArray, $hotel);                        
                        } 
                    }   
                    if(empty($myArray)){
                        echo $no_result_found;
                         

                    }else{
                        foreach ($myArray as $index => $element){
                            echo '<tr>';
                            echo '<th scope="row">' . $index + 1 . '</th>';
                            echo '<td>' . $element['name'] . '</td>';
                            echo '<td>' . $element['description'] . '</td>';
                            echo '<td>' . ($element['parking'] ? 'Yes' : 'No') . '</td>';
                            echo '<td>' . $element['vote']  . '</td>';
                            echo '<td>' . $element['distance_to_center'] . ' km</td>';
                            echo '</tr>';  
                        }     

                    }
                               

                }elseif(!isset($_GET['has_parking']) && !empty($_GET['vote'])){
                    $myArray = [];
                    foreach ($hotels as $index => $hotel){
                        if( $hotel['vote'] >= $_GET['vote']) {
                            
                            array_push($myArray, $hotel);                               
                            
                        }
                    }   
                    foreach ($myArray as $index => $element){
                        echo '<tr>';
                        echo '<th scope="row">' . $index + 1 . '</th>';
                        echo '<td>' . $element['name'] . '</td>';
                        echo '<td>' . $element['description'] . '</td>';
                        echo '<td>' . ($element['parking'] ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . $element['vote']  . '</td>';
                        echo '<td>' . $element['distance_to_center'] . ' km</td>';
                        echo '</tr>';  
                    }                               
                }elseif(isset($_GET['has_parking']) && empty($_GET['vote'])){
                    $myArray = [];
                    foreach ($hotels as $index => $hotel){
                        if(($hotel['parking'] == true)) {                            
                            
                            array_push($myArray, $hotel);
                        }
                    }
                    foreach ($myArray as $index => $element){
                        echo '<tr>';
                        echo '<th scope="row">' . $index + 1 . '</th>';
                        echo '<td>' . $element['name'] . '</td>';
                        echo '<td>' . $element['description'] . '</td>';
                        echo '<td>' . ($element['parking'] ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . $element['vote']  . '</td>';
                        echo '<td>' . $element['distance_to_center'] . ' km</td>';
                        echo '</tr>';  
                    }      
                }else{
                    echo $all_hotels;
                }     
                             
                
                echo $table_bottom;

            
            ?>


            
        


        </section>


        <!-- prima parte dell'esrcizio -->
        <section>

            
            <div class="container">
                <h4 class="">All hotels</h4>        
                <?php
                // echo '<div class="container">';
                
                echo $table_top;
                echo $all_hotels;                
                echo $table_bottom;

                
                ?>
            </div>
        </section>

        

        


           
    </div>



    <!-- Bootstrap scritpt -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</body>
</html>

