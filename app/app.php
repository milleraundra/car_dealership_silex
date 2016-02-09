<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/car.php';

    $app = new Silex\Application();
$app['debug']=true;
    $app->get("/", function() {
        return "<!DOCTYPE html>
        <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>
                <title>Find a Car</title>
            </head>
            <body>
                <div class='container'>
                    <h1>Find a Car!</h1>
                    <form class='' action='/car_search'>
                        <div class='form-group'>
                            <label for='price'>Enter Maximum Price:</label>
                            <input type='number' name='price' value='price'>
                        </div>
                        <div class='form-group'>
                            <label for='mileage'>Enter Maximum Mileage:</label>
                            <input type='number' name='mileage' value='mileage'>
                        </div>
                        <button type='submit' class='btn-success'>Submit</button>
                    </form>

                </div>
            </body>
        </html>";
    });

    $app->get("/car_search", function() {
        $porsche = new Car();
        $porsche->setMake_Model("2014 Porsche 911");
        $porsche->setPrice(112344);
        $porsche->setMiles(1245);
        $porsche->setImage("/images/porsche.jpg");


        $ford = new Car();
        $ford->setMake_Model("2014 Ford f450");
        $ford->setPrice(56892);
        $ford->setMiles(12465);
        $ford->setImage("/images/ford.jpg");

        $lexus = new Car();
        $lexus->setMake_Model("2013 Lexus RX 350");
        $lexus->setPrice(44700);
        $lexus->setMiles(20000);
        $lexus->setImage("/images/lexus.jpg");

        $mercedes = new Car();
        $mercedes->setMake_Model("Mercedes Benz CLS550");
        $mercedes->setPrice(39900);
        $mercedes->setMiles(37979);
        $mercedes->setImage("/images/mercedes.jpg");
        $cars = array($porsche, $ford, $lexus, $mercedes);
        $cars_matching_search = array();

        foreach ($cars as $car) {
            if ($car->worthBuying($_GET["price"]) && $car->maxMileage($_GET["mileage"])) {
                array_push($cars_matching_search, $car);
            }
        }

        if(empty($cars_matching_search)) {
            return "<h2> Sorry, no cars matched your search. </h2>";
        } else {
            $output = "";
            foreach ($cars_matching_search as $car) {
                $car_make = $car->getMake_Model();
                $car_price = $car->getPrice();
                $car_miles = $car->getMiles();
                $car_image = $car->getImage();

                $output = $output . "<li> $car_make </li>
                <ul>
                    <li> $car_price </li>
                    <li> Miles: $car_miles </li>
                    <li> <img style='max-width:300px' src='$car_image'> </li>
                </ul>";
            }

            return $output;
        }


    });

    return $app;


?>
