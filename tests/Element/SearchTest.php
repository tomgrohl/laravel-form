<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Search;

class SearchTest extends TestCase
{
    public function testHidden()
    {
        $form = new Form('/');

        $form->add(new Search('search'));

        $html = $form->render('search', array('class' => 'input-field'));

        $this->assertEquals('<input type="search" name="search" class="input-field">', $html);
    }
}
