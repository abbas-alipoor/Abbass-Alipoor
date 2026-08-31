<?php

// Student Name: Abbass Alipoor
// Student ID: 


// ==========================
// Task 1
// ==========================

// This class is related to the library
class Library {

    // This value is constant and does not change
    const MAX_BOOKS = 3;
}

// Display the maximum number of books
echo "Maximum books allowed: " . Library::MAX_BOOKS;

echo "<br><br>";


// ==========================
// Task 2
// ==========================

// This class counts the number of students
class StudentCounter {

    // This variable is shared by the entire class
    public static $count = 0;

    // This method increases the number of students by one
    public static function addStudent() {
        self::$count++;
    }
}

// Call the method three times
StudentCounter::addStudent();
StudentCounter::addStudent();
StudentCounter::addStudent();

// Display the final number of students
echo "Total students: " . StudentCounter::$count;

echo "<br><br>";


// ==========================
// Task 3
// ==========================

// The Vehicle class is an abstract class
abstract class Vehicle {

    // Every child class must implement this method
    abstract public function start();
}


// The Car class inherits from Vehicle
class Car extends Vehicle {

    // Implementation of the start method
    public function start() {
        echo "Car engine started";
    }
}


// The Bike class inherits from Vehicle
class Bike extends Vehicle {

    // Implementation of the start method
    public function start() {
        echo "Bike started";
    }
}


// Creating an object from the Car class
$car = new Car();

// Calling the start method
$car->start();

echo "<br>";

// Creating an object from the Bike class
$bike = new Bike();

// Calling the start method
$bike->start();

?>