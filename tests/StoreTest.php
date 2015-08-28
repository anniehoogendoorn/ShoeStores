<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Store.php';
    require_once 'src/Brand.php';

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Store::deleteAll();
            // Brand::deleteAll();
        }


        function testGetName()
        {
            //Arrange
            $name = "Shoe Store 1";
            $test_store = new Store($name);

            //Act
            $result = $test_store->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testGetId()
        {
            //Arrange
            $name = "Shoe Store 1";
            $id = 1;
            $test_store = new Store($name, $id);

            //Act
            $result = $test_store->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSave()
        {
            //Arrange
            $name = "Shoe Store 1";
            // $id = 1;
            $test_store = new Store($name);
            $test_store->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store], $result);
        }

        function testGetAll()
        {
            //Arrange
            $name = "Shoe Store 1";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Shoe Store 2";
            $test_store2 = new Store($name2);
            $test_store2->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = "Shoe Store 1";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Shoe Store 2";
            $test_store2 = new Store($name2);
            $test_store2->save();

            //Assert
            Store::deleteAll();
            $result = Store::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testFindById()
        {
            //Arrange
            $name = "Shoe Store 1";
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();

            $name2 = "Shoe Store 2";
            $id = 2;
            $test_store2 = new Store($name2, $id);
            $test_store2->save();

            //Act
            $search_id = $test_store->getId();
            $result = Store::findById($search_id);

            //Assert
            $this->assertEquals($test_store, $result);
        }

        function testUpdate()
        {
            //Arrange
            $name = "Shoe Store 1";
            $test_store = new Store($name);
            $test_store->save();

            $new_name = "Shoe Store 2";

            //Act
            $test_store->update($new_name);
            $result = $test_store->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function testDelete()
        {
            //Arrange
            $name = "Shoe Store 1";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Shoe Store 2";
            $test_store2 = new Store($name2);
            $test_store2->save();

            //Act
            $test_store->delete();
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store2], $result);
        }

        // function testAddBrand()
        // {
        //     //Arrange
        //     $name = "Shoe Store 1";
        //     $test_store = new Store($name);
        //     $test_store->save();
        //
        //     $brand_name = "Brandname1";
        //     $test_brand = new Brand($brand_name);
        //     $test_brand->save();
        //
        //     //Act
        //     $test_store->addBrand();
        //     $result = $test_store->getBrand();
        //
        //     //Assert
        //     $this->assertEquals([$test_brand], $result);
        // }
        //
        // function testGetBrands()
        // {
        //     //Arrange
        //     $name = "Shoe Store 1";
        //     $test_store = new Store($name);
        //     $test_store->save();
        //
        //     $brand_name = "Brand name 1";
        //     $test_brand = new Brand($brand_name);
        //     $test_brand->save();
        //
        //     $brand_name2 = "Brand name 2";
        //     $test_brand2 = new Brand($brand_name2);
        //     $test_brand2->save();
        //
        //     //Act
        //     $test_store->addBrand($test_brand);
        //     $test_store->addBrand($test_brand2);
        //
        //     $result = $test_store->getBrands();
        //
        //     //Assert
        //     $this->assertEquals([$test_brand, $test_brand2], $result);
        // }




    }


?>
