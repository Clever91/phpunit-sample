<?php

namespace cleveruz\phpunit;

use InvalidArgumentException;

class User
{
    private string $name;
    private int $age;
    public array $favoriteMovies = [];

    /**
     * cunstructor
     *
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function greating(): string 
    {
        return "Hi, my name is {$this->name} and my age is {$this->age}";
    }

    public function addFavoriteMovie(string $movie): bool
    {
        $this->favoriteMovies[] = $movie;

        return true;
    }

    public function removeFavoriteMovie(string $movie): bool
    {
        if (!in_array($movie, $this->favoriteMovies)) {
            throw new InvalidArgumentException();
        }

        unset($this->favoriteMovies[array_search($movie, $this->favoriteMovies)]);

        return true;
    }
}
