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
        return $app['twig']->render('index.html.twig');
    });

    //Add a shoe store to index page
    $app->post('/shoe_stores', function() use ($app) {
        $store = new Store($_POST['name']);
        $store->save();
        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll()));
    });

    //Delete all stores from index page
    $app->post('delete_stores', function() use ($app) {
        Store::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    //Get a specific store page
    $app->get('/store/{id}', function() use ($app) {
        

    });

    return $app;

?>
