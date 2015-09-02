<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";


    $app = new Silex\Application();

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
    $app->post('delete_stores', function() use ($app) {
        Store::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    //Get page of a specific store
    $app->get('/store/{id}', function($id) use ($app) {
        $store = Store::findById($id);
        $brands = Store::getBrands($store);
    return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $brands));
    });

    //Add a brand to specific store page
    $app->post('/store/{id}/add_brand', function($id) use ($app) {
        $store = Store::findById($id);
        $brand = new Brand($_POST['name']);
        $store->addBrand($brand);
        $brands = $store->getBrands();

        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $brands));
    });

    //Get page to edit one single store
    $app->get('/store/{id}/edit', function($id) use ($app) {
        $store = Store::findById($id);
        return $app['twig']->render('store_edit.html.twig', array('store' => $store));
    });
    //
    // //Edit one single store name
    // $app->patch('/store/{id}', function($id) use ($app) {
    //     $name = $_POST['name'];
    //     $store = Store::findById($id);
    //     $store->update($name);
    //     return $app['twig']->render('store.html.twig', array('Store' => $store, 'brands' => $store->getBrands()));
    // });
    //
    //
    // //Delete one single store
    // $app->delete('/store/{id}', function($id) use ($app) {
    //     $store = Store::find($id);
    //     $store->delete();
    //     return $app['twig']->render('index.html.twig', array('stores' => Store::getAll()));
    // });

    return $app;

?>
