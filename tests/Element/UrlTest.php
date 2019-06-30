<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Url;

class UrlTest extends TestCase
{
    public function testTextAreaNoValue()
    {
        $form = new Form('/');

        $form->add(new Url('website'));

        $html = $form->render('website');

        $this->assertEquals('<input type="url" name="website">', $html);
    }
}
