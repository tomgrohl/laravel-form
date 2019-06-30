<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Submit;

class SubmitTest extends TestCase
{
    public function testSubmit()
    {
        $form = new Form('/');

        $form->add(new Submit('submitForm', 'Save'));

        $html = $form->render('submitForm');

        $this->assertEquals('<input type="submit" name="submitForm" value="Save">', $html);
    }
}
