<?php

namespace Tomgrohl\Laravel\Form\Test;

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Text;

class TestForm extends Form {


    public function __construct()
    {

        $this->add(new Text('username'));
    }


}
