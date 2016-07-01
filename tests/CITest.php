<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicCI()
    {
        //$this->visit('/patents')->see('/login');
        //$this->visit('/patents')->dontsee('/patents');
        
        $this->visit('/patents')->see('/login');
        $this->visit('/patents')->see('/patents');
        $this->visit('/patents')->see('/login')->type('admin@test.com', 'email')->type('admin', 'password')->press('login')->seePageIs('/patents');
    }
}
