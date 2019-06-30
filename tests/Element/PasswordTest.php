<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Password;

class PasswordTest extends TestCase
{
    public function testHidden()
    {
        $form = new Form('/');

        $form->add(new Password('password'));

        $html = $form->render('password', array('class' => 'input-field'));

        $this->assertEquals('<input type="password" name="password" class="input-field">', $html);
    }
}
