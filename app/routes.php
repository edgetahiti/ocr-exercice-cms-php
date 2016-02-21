<?php

// Home page
$app->get('/', function () use ($app) {
    $livres = $app['dao.livre']->findAll();
    return $app['twig']->render('index.html.twig', array('livres' => $livres));
})->bind('home');

// Livre details with comments
$app->get('/livre/{id}', function ($id) use ($app) {
    $livre = $app['dao.livre']->find($id);
    $authors = $app['dao.author']->findAllByLivre($id);
    return $app['twig']->render('livre.html.twig', array('livre' => $livre, 'authors' => $authors));
})->bind('livre');