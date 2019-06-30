<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Phone;

class PhoneTest extends TestCase
{
    public function testHidden()
    {
        $form = new Form('/');

        $form->add(new Phone('mobile_number'));

        $html = $form->render('mobile_number', array('class' => 'input-field'));

        $this->assertEquals('<input type="tel" name="mobile_number" class="input-field">', $html);
    }
}
