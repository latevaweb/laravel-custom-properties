<?php

namespace LaTevaWeb\CustomProperties\Tests;

use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected $fake;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase($this->app);
    }

    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        // Fake model migration
        $this->app['db']->connection()->getSchemaBuilder()->create('fakes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('custom_properties')->nullable();
        });

        // Create fake model to test
        $this->fake = new Fake;
        $this->fake->save();
    }
}
