<?php
declare(strict_types=1);

namespace cleveruz\phpunit;

use cleveruz\phpunit\User;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testClassConstructor()
    {
        $user = new User('Sher', 33);

        $this->assertSame('Sher', $user->getName());
        $this->assertSame(33, $user->getAge());
        $this->assertEmpty($user->favoriteMovies);
    }

    public function testGreating()
    {
        $user = new User("Sher", 34);

        $this->assertIsString($user->greating());
        $this->assertStringContainsString("Sher", $user->greating());
        $this->assertStringContainsString("34", $user->greating());
    }

    public function testAddFavoriteMovie()
    {
        $user = new User("Abdulbosit", 18);

        $this->assertEmpty($user->favoriteMovies);
        $this->assertTrue($user->addFavoriteMovie("Shaytanat"));
        $this->assertCount(1, $user->favoriteMovies);
        $this->assertContains("Shaytanat", $user->favoriteMovies);
    }

    public function testRemoveFavoriteMovie() 
    {
        $user = new User("Mirjamol", 22);

        $this->assertTrue($user->addFavoriteMovie("Don't give up"));
        $this->assertTrue($user->addFavoriteMovie("You'll never go to the see"));
        $this->assertCount(2, $user->favoriteMovies);

        $this->assertTrue($user->removeFavoriteMovie("Don't give up"));
        $this->assertNotContains("Don't give up", $user->favoriteMovies);
        $this->expectException(InvalidArgumentException::class);
        $user->removeFavoriteMovie("Shaytanat");
        $this->assertCount(1, $user->favoriteMovies);
    }
}
