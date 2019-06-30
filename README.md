# Laravel Form Package

This package is a Form Builder & Manager for Laravel 5.8

## Form Manager

Part of the Form package is the Form Manager. This holds all your forms.
The best way to utilise the manager is to add forms to it through Service Providers.

The easiest way to use the Form Manager is to make sure your Controllers extend
`Tomgrohl\Laravel\Form\FormManagerInterface`.


## Creating a Form

To create a form you create an instance of `Tomgrohl\Laravel\Form\Form`.

```php
<?php

use Tomgrohl\Laravel\Form\Form;

$form = new Form('/update');


```

The Form class has the following constructor `__construct($url, $method = 'POST', $model = null, array $oldInput = array(), array $attributes = array())`

* $url - URL form goes to. Populates the action attribute of the form.
* $method - Form Method. Populates the method attribute of the form.
* $model - Model, Person class for instance. Gets populated by form data.
* $oldInput - Old form data, usually taken from the Request or Input class.
* $attributes - Additional attributes to add to the form during output.

You then add Form Elements to your Form. See the next section to see what 
Form Elements there are and how to add them.

### Form Elements

#### Checkbox
#### Date
#### Email
#### Hidden
#### Number
#### Password
#### Phone
#### Radio
#### Search
#### Select
#### Submit
#### Text
#### TextArea
#### Url

## Data Transformers

Data transformers allow you to change a value before it is rendered by a form control 
or when input is being bound to a model.

This package comes with one simple data transformer `CallableDataTransformer`.

You pass it 2 closures, 1st first for transforming a value, the 2nd for reversing the transform.

For example say you had `dob` property on model and it was an instance of `\DateTime`, 
you would want to transform it to a string before it is rendered by the form control. And when the `dob` 
is taken from the request and given to the form, it will be reverse transformed before being given to the model.

```php
<?php

use DateTime;
use App\User;
use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Text;
use Tomgrohl\Laravel\Form\CallableDataTransformer;

$form = new Form('/');
$form->add(new Text('dob'));

$form->addTransformer('dob', new CallableDataTransformer(function($dateTime) {
    return $dateTime instanceof DateTime ? $dateTime->format('Y-m-d') : $dateTime;
}, function($dateTime) {
    return DateTime::createFromFormat('Y-m-d', $dateTime);
}));

```

## Example Form