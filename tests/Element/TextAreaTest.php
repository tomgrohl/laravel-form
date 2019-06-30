<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\TextArea;

class TextAreaTest extends TestCase
{
    public function testTextAreaNoValue()
    {
        $form = new Form('/');

        $form->add(new TextArea('comments'));

        $html = $form->render('comments');

        $this->assertEquals('<textarea name="comments"></textarea>', $html);
    }
}
