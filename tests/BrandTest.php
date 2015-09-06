<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Brand.php';
    require_once 'src/Store.php';

    $server = 'mysql:host=localhost:8889;dbname=shoe_stores_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
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

        function testSave()
        {
            //Arrange
            $name = "Brand 1";
            $test_brand = new Brand($name);

            //Act
            $test_brand->save();
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand], $result);
        }

        function testGetAll()
        {
            //Arrange
            $name = "Brand 1";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "Brand 2";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = "Brand 1";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "Brand 2";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            //Act
            Brand::deleteAll();
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testFindById()
        {
            //Arrange
            $name = "Brand 1";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "Brand 2";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            //Act
            $search_id = $test_brand->getId();
            $result = Brand::find($search_id);

            //Assert
            $this->assertEquals($test_brand, $result);

        }

        function testAddStore()
        {
            //Arrange
            $brand_name = "Brand 1";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $name2 = "Brand 2";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            $name = "Shoe Store 1";
            $test_store = new Store($name);
            $test_store->save();

            //Act
            $test_brand->addStore($test_store);
            $result = $test_brand->getStores();

            //Assert
            $this->assertEquals([$test_store], $result);
        }

        function testGetStores()
        {
            //Arrange
            $name = "Shoe Store 1";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Shoe Store 2";
            $test_store2 = new Store($name2);
            $test_store2->save();

            $brand_name = "Brand 1";
            $test_brand = new Brand($brand_name);
            $test_brand->save();


            //Act
            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);

            $result = $test_brand->getStores();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }





    }

 ?>
