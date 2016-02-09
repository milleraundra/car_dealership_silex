<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $image;

        function worthBuying($max_price)
        {
            return $this->price < ($max_price + 100);
        }

        function maxMileage($max_mileage)
        {
            return $this->miles < $max_mileage;
        }

        function setMake_Model($new_make_model)
        {
            $this->make_model = $new_make_model;
        }

        function getMake_Model()
        {
            return $this->make_model;
        }

        function setPrice($car_price)
        {
            $this->price = $car_price;
        }

        function getPrice()
        {
            return $this->price;
        }

        function setMiles($car_miles)
        {
            $this->miles = $car_miles;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function setImage($car_image)
        {
            $this->image = $car_image;
        }

        function getImage()
        {
            return $this->image;
        }
    }

    $porsche = new Car();
    $porsche->setMake_Model("2014 Porsche 911");
    $porsche->setPrice(112344);
    $porsche->setMiles(1245);
    $porsche->setImage("images/porsche.jpg");


    $ford = new Car();
    $ford->setMake_Model("2014 Ford f450");
    $ford->setPrice(56892);
    $ford->setMiles(12465);
    $ford->setImage("images/ford.jpg");

    $lexus = new Car();
    $lexus->setMake_Model("2013 Lexus RX 350");
    $lexus->setPrice(44700);
    $lexus->setMiles(20000);
    $lexus->setImage("images/lexus.jpg");

    $mercedes = new Car();
    $mercedes->setMake_Model("Mercedes Benz CLS550");
    $mercedes->setPrice(39900);
    $mercedes->setMiles(37979);
    $mercedes->setImage("images/mercedes.jpg");

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($_GET["price"]) && $car->maxMileage($_GET["mileage"])) {
            array_push($cars_matching_search, $car);
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Car Dealership</title>
  </head>
  <body>
    <h1>Car!</h1>
    <ul>
        <?php
            if(empty($cars_matching_search)) {
                echo "<h2> Sorry, no cars matched your search. </h2>";
            } else {
                foreach ($cars_matching_search as $car) {
                    $car_make = $car->getMake_Model();
                    $car_price = $car->getPrice();
                    $car_miles = $car->getMiles();
                    $car_image = $car->getImage();
                    echo "<li> $car_make </li>";
                    echo "<ul>";
                        echo "<li> $car_price </li>";
                        echo "<li> Miles: $car_miles </li>";
                        echo "<li> <img src='$car_image'> </li>";
                    echo "</ul>";
                }
            }
        ?>
    </ul>
  </body>
</html>
