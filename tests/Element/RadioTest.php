<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Radio;

class RadioTest extends TestCase
{
    public function testRadioChecked()
    {
        $form = new Form('/');

        $form->add(new Radio('status', 'active', true));

        $html = $form->render('status', array('class' => 'input-field'));

        $this->assertEquals('<input type="radio" name="status" value="active" class="input-field" checked="checked">', $html);
    }

    public function testRadioUnchecked()
    {
        $form = new Form('/');

        $form->add(new Radio('status', 'active'));

        $html = $form->render('status', array('class' => 'input-field'));

        $this->assertEquals('<input type="radio" name="status" value="active" class="input-field">', $html);
    }

    public function testRadioMethods()
    {
        $radio = new Radio('status', 'active');

        $this->assertFalse($radio->isChecked());

        $radio->setChecked(true);

        $this->assertTrue($radio->isChecked());
    }
}
