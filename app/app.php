<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost:8889;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //Get index page
    $app->get('/', function() use ($app){
        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll(), 'brands' => Brand::getAll()));
    });

    //Add a shoe store to index page
    $app->post('/add_store', function() use ($app) {
        $store = new Store($_POST['name']);
        $store->save();
        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll(), 'brands' => Brand::getAll()));
    });

    //Add a brand to index page
    $app->post('/add_brand', function() use ($app) {
        $brand = new Brand($_POST['name']);
        $brand->save();
        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll(), 'brands' => Brand::getAll()));
    });

    //Delete all stores from index page
    $app->delete('delete_stores', function() use ($app) {
        Store::deleteAll();
        return $app['twig']->render('index.html.twig', array( 'brands' => Brand::getAll(), 'stores' => Store::getAll()));
    });

    //Delete all brands from index page
    $app->delete('delete_brands', function() use ($app) {
        Brand::deleteAll();
        return $app['twig']->render('index.html.twig', array( 'stores' => Store::getAll(), 'brands' => Store::getAll()));
    });

    //Get page of a specific store
    $app->get('/store/{id}', function($id) use ($app) {
        $store = Store::findById($id);
        $brands = $store->getBrands();
        $all_brands = Brand::getAll();

        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $brands, 'all_brands' => $all_brands));
    });

    //Get page of specific brand
    $app->get('/brand/{id}', function($id) use ($app) {
        $brand = Brand::findById($id);
        $stores = $brand->getStores();
        $all_stores = Store::getAll();

        return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores' => $stores, 'all_stores' => $all_stores));

    });

    //Add a brand to specific store
    $app->post('/store/{id}/add_brand', function($id) use ($app) {
        $store = Store::findById($id);
        $brand_id = $_POST['brand_id'];
        $brand = Brand::findById($_POST['brand_id']);
        var_dump($brand);
        $store->addBrand($brand);
        $brands = $store->getBrands();
        $all_brands = Brand::getAll();

        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $brands, 'all_brands' => $all_brands));
    });

    //Add a store to specific brand
    $app->post('/brand/{id}/add_store', function($id) use ($app) {
        $brand = Brand::findById($_POST['brand_id']);
        $store = Store::findById($_POST['store_id']);
        $brand->addStore($store);
        $stores = $brand->getStores();
        $all_stores = Store::getAll();

        return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores' => $stores, 'all_stores' => $all_stores));
    });

    //Get page to edit one single store
    $app->get('/store/{id}/edit', function($id) use ($app) {
        $store = Store::findById($id);
        return $app['twig']->render('store_edit.html.twig', array('store' => $store));
    });

    //Edit one single store name
    $app->patch('/store/{id}', function($id) use ($app) {
        $name = $_POST['name'];
        $store = Store::findById($id);
        $store->update($name);
        $brands = $store->getBrands();
        $all_brands = Brand::getAll();

        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $brands, 'all_brands' => $all_brands));
    });

    //Delete one single store
    $app->delete('/store/{id}/delete', function($id) use ($app) {
        $store = Store::findById($id);
        $store->delete();
        $brands = $store->getBrands();
        $all_brands = Brand::getAll();

        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll(), 'brands' => Brand::getAll()));
    });

    return $app;

?>
