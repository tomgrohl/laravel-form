<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\FormsManager;
use Tomgrohl\Laravel\Form\Test\TestForm;

class FormManagerTes2t extends TestCase
{
    /**
     * @var \Tomgrohl\Laravel\Form\FormsManager
     */
    protected $formManager;

    public function setUp()
    {
        $this->formManager = new FormsManager();
    }

    public function testFormAdding()
    {
        $this->formManager->set('test_form', new TestForm());

        $this->assertTrue($this->formManager->has('test_form'));

        $this->assertInstanceOf(TestForm::class, $this->formManager->get('test_form'));

        $this->assertCount(1, $this->formManager->getAll());

        $this->formManager->clear();

        $this->assertCount(0, $this->formManager->getAll());
    }
}

