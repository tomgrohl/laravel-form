<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Date;

class DateTest extends TestCase
{

    public function testDate()
    {
        $form = new Form('/');

        $form->add(new Date('date'));

        $html = $form->render('date', array('class' => 'input-field'));

        $this->assertEquals('<input type="date" name="date" class="input-field">', $html);
    }
}
