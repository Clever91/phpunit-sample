<?php

use cleveruz\phpunit\User;

require __DIR__ . '/vendor/autoload.php';

$user = new User("Sher", 33);
// echo $user->getName();
// echo "\nAge: {$user->getAge()}\n";
// var_dump($user->favoriteMovies);

$user->addFavoriteMovie("Don't give up");
$user->addFavoriteMovie("You'll never go to the see");
var_dump($user->favoriteMovies);
$user->removeFavoriteMovie("Don't give up");
var_dump($user->favoriteMovies);