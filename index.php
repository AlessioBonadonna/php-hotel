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



if (isset($_GET['parking']) && !empty($_GET['parking'])) {


    $temp = [];


    foreach ($hotels as $item) {
        $park = $item['parking'] ? 'si' : 'no';

        if ($park == $_GET['parking']) {

            $temp[] = $item;
        }
    }
    $hotels = $temp;
}

if (isset($_GET['vote']) && !empty($_GET['vote'])) {
    $vote = $_GET['vote'];
    $hotels = array_filter($hotels, fn ($value) => $value['vote'] >= $vote);
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>Hotels</title>
</head>

<body class="bg-success r">
    <div class="container mt-5 text-white">


        <form action="index.php" method="GET" class="text-white">
            <!-- PRENDO IL VALORE CHE MI SERVIRA DOPO IN NAME -->
            <h2 class="text-center">trova l'hotel</h2>
            <select class=" w-75" id="type" name="parking">

                <option value="" selected>Segli</option>
                <option value="si">parking</option>
                <option value="no">no parking</option>

            </select>
            <select name="vote" id="vote">
                <option value="" selected>scegli </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit">seach</button>

        </form>
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>name</th>
                    <th scope='col'>description</th>
                    <th scope='col'>parking</th>
                    <th scope='col'>vote</th>
                    <th scope='col'>distance of center</th>
                </tr>
            </thead>

            <?php

            foreach ($hotels as $hotel) {

                $park = $hotel['parking'] ? 'si' : 'no';




                echo "
  
  <tbody>
    <tr>
    
      <td>$hotel[name]</td>
      <td>$hotel[description]</td>
      <td>$park</td>
      <td>$hotel[vote]</td>
      <td>$hotel[distance_to_center] km</td>
    </tr>

  </tbody>

    ";
            }


            ?>
        </table>
    </div>
</body>

</html>