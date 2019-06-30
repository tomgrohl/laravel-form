<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Hidden;

class HiddenTest extends TestCase
{
    public function testHidden()
    {
        $form = new Form('/');

        $form->add(new Hidden('user_id'));

        $html = $form->render('user_id', array('class' => 'input-field'));

        $this->assertEquals('<input type="hidden" name="user_id" class="input-field">', $html);
    }
}
