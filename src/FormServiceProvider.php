<?php

namespace Tomgrohl\Laravel\Form;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Class FormServiceProvider
 * @package Tomgrohl\Laravel\Form
 */
class FormServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(FormManagerInterface::class, function(Application $app) {
            return new FormManager($app->tagged('tomgrohl.form'));
        });
    }
}
