<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Text;
use Illuminate\Contracts\Validation\Validator;
use Tomgrohl\Laravel\Form\Test\Model;
use Tomgrohl\Laravel\Form\Test\Model2;

class FormModelInputHandlingTest extends TestCase
{

    public function testValuesAreTakenFromModelWhenRendering()
    {
        $peep = new Model();

        $peep->setName('Tom Ellis');
        $peep->setAge(27);

        $form = new Form('/', 'POST');
        $form->setModel($peep);

        $form->add(new Text('name'));

        $html = $form->render('name');

        $this->assertEquals('<input type="text" name="name" value="Tom Ellis">', $html);

    }

    public function testHandleInputNoGetSetMethods()
    {
        $peep = new Model2();

        $peep->name = 'Tom Ellis';
        $peep->age = 27;

        $form = new Form('/', 'POST');
        $form->setModel($peep);

        $form->add(new Text('name'));
        $form->add(new Text('age'));

        $html = $form->render('name');

        $this->assertEquals('<input type="text" name="name" value="Tom Ellis">', $html);

        $html = $form->render('age');

        $this->assertEquals('<input type="text" name="age" value="27">', $html);

    }

    public function testInputIsUsedWhenRendering()
    {
        $peep = new Model();

        $peep->setName('Tom Ellis');
        $peep->setAge(27);

        $form = new Form('/', 'POST');
        $form->setModel($peep);
        $form->setInput( array(
            'name' => 'Tommy'
        ));

        $form->add(new Text('name'));
        $form->add(new Text('age'));

        $html = $form->render('name');
        $this->assertEquals('<input type="text" name="name" value="Tommy">', $html);
    }

    public function testIsValidWithNoValidation()
    {
        $form = new Form('/', 'POST');
        $this->assertTrue($form->isValid());
    }

    public function testHandleInputWithFailedValidation()
    {
        $input = array();

        $validator = $this->getValidator();

        $peep = new Model();

        $peep->setName('Tom Ellis');
        $peep->setAge(27);

        $form = new Form('/', 'POST');
        $form->setModel($peep);
        $form->setValidator($validator);
        $form->add(new Text('name'));
        $form->handleInput($input);
        $this->assertFalse($form->isValid());
    }

    public function testhandleInputWithValidValidation()
    {
        $input = array(
            'name' => 'Tommy Ellis'
        );

        $validator = $this->getValidator(false);

        $peep = new Model();

        $peep->setName('Tom Ellis');
        $peep->setAge(27);

        $form = new Form('/', 'POST');
        $form->setModel($peep);
        $form->setValidator($validator);
        $form->add(new Text('name'));

        $form->handleInput($input);

        $this->assertTrue($form->isValid());
        $this->assertEquals('Tommy Ellis', $peep->getName());
    }

    public function testLatehandleInputing()
    {
        $input = array(
            'name' => 'Tommy Ellis'
        );

        $validator = $this->getValidator(false);

        $peep = new Model();

        $peep->setName('Tom Ellis');
        $peep->setAge(27);

        $form = new Form('/', 'POST');
        $form->setModel($peep);
        $form->setValidator($validator);
        $form->add(new Text('name'));
        $form->handleInput($input);


        $this->assertInstanceOf(Model::class, $form->getModel());
        $this->assertTrue($form->isValid());
        $this->assertEquals('Tommy Ellis', $peep->getName());
    }

    public function testhandleInputWithValidValidationNoSetter()
    {
        $input = array(
            'name' => 'Tommy Ellis'
        );

        $validator = $this->getValidator(false);

        $peep = new Model2();

        $peep->name = 'Tom Ellis';
        $peep->age = 27;

        $form = new Form('/', 'POST');
        $form->setModel($peep);

        $form->setValidator($validator);
        $form->add(new Text('name'));
        $form->handleInput($input);
        $this->assertTrue($form->isValid());
        $this->assertEquals('Tommy Ellis', $peep->name);
    }

    protected function getValidator(bool $fails = true)
    {
        $validator = $this->createMock(Validator::class);

        $validator->expects($this->once())
            ->method('fails')
            ->willReturn($fails)
        ;

        return $validator;
    }

}
