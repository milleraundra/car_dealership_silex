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






?>
