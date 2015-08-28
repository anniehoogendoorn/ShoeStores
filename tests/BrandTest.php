<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Brand.php';
    require_once 'src/Brand.php';

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            // Brand::deleteAll();
            // Store::deleteAll();
        }

        function testGetName()
        {
            //Arrange
            $name = "Brand 1";
            $test_brand = new Brand($name);

            //Act
            $result = $test_brand->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testGetId()
        {
            //Arrange
            $name = "Brand 1";
            $id = 1;
            $test_brand = new Brand($name, $id);

            //Act
            $result = $test_brand->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        


    }

 ?>
