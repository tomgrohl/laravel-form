<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Number;

class NumberTest extends TestCase
{
    public function testHidden()
    {
        $form = new Form('/');

        $form->add(new Number('age'));

        $html = $form->render('age', array('class' => 'input-field'));

        $this->assertEquals('<input type="text" name="age" pattern="[0-9]*" class="input-field">', $html);
    }
}
