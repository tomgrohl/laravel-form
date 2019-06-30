# Laravel Form Package

This package is a Form Builder & Manager for Laravel 5.8

## Form Manager

Part of the Form package is the Form Manager. This holds all your forms.
The best way to utilise the manager is to add forms to it through Service Providers.

The easiest way to access the Form Manager is to get it out of the service container using the interface
`Tomgrohl\Laravel\Form\FormManagerInterface`.

```
<?php

$manager = app(Tomgrohl\Laravel\Form\FormManagerInterface);

```


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

The Checkbox class has the following constructor `__construct($name, $value = null, $checked = false)`.
You can create a new Checkbox element doing the following:

```
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Checkbox;

$form = new Form('/user/create');
$form->add(new Checkbox('active');
```

#### Date

The Date class has the following constructor `__construct($name, $value = null)`. 
The Date Element renders a HTML5 input element with a type of "date".
You can create a new Date element doing the following:

```
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Date;

$form = new Form('/user/create');
$form->add(new Date('dob');

```

#### Email

The Email class has the following constructor `__construct($name, $value = null)`
The Email Element renders a HTML5 input element with a type of "email".
You can create a new Email element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Email;

$form = new Form('/user/create');
$form->add(new Email('user_email');

```

#### Hidden

The Hidden class has the following constructor `__construct($name, $value = null)`

The Hidden Element renders a HTML input element with a type of "hidden".

You can create a new Hidden element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Hidden;

$form = new Form('/user/create');
$form->add(new Hidden('id');

```


#### Number

The Number class has the following constructor `__construct($name, $value = null)`

The Number Element renders a HTML5 input element with a type of "text"
and a pattern attribute set to [0-9]+ for browser compatibility.

You can create a new Number element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Number;

$form = new Form('/user/create');
$form->add(new Number('count');
```


#### Password

The Password class has the following constructor `__construct($name)`

You can create a new Password element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Password;

$form = new Form('/user/create');
$form->add(new Password('user_password');

```

#### Phone

The Phone class has the following constructor `__construct($name, $value = null)`.

The Phone Element renders a HTML5 input element with a type of "tel".

You can create a new Phone element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Phone;

$form = new Form('/user/create');
$form->add(new Phone('telephone');

```

#### Radio

The Radio class has the following constructor `__construct($name, $value = null)`.

You can create a new Radio element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Radio;

$form = new Form('/user/create');
$form->add(new Radio('gender', 'male'));
$form->add(new Radio('gender', 'female'));

```

#### Search

The Search class has the following constructor `__construct($name, $value = null)`.

The Search Element renders a HTML5 input element with a type of "search".

You can create a new Search element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Search;

$form = new Form('/user/create');
$form->add(new Search('site_search');
```

#### Select

The Select class has the following constructor `__construct($name, array $list = array(), $selected = null)`.

You can create a new Select element doing the following:


```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Select;

$form = new Form('/user/create');
$form->add(new Select('title', array('mr' => 'Mr', 'mrs' => 'Mrs'), 'mr'));

```

#### Submit

The Submit class has the following constructor `__construct($name, $value = 'Submit')`.

You can create a new Submit element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Submit;

$form = new Form('/user/create');
$form->add(new Submit('submit', 'Save');

```

#### Text

The Text class has the following constructor `__construct($name, $value = null)`.

You can create a new Text element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Text;

$form = new Form('/user/create');
$form->add(new Text('first_name');
```


#### TextArea

The TextArea class has the following constructor `__construct($name, $value = null)`.

You can create a new TextArea element doing the following:

```php
<?php


use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\TextArea;

$form = new Form('/user/create');
$form->add(new TextArea('description');

```

#### Url

The Url class has the following constructor `__construct($name, $value = null)`.

You can create a new Url element doing the following:

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Url;

$form = new Form('/user/create');
$form->add(new Url('website');

```

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

```php
<?php

use Tomgrohl\Laravel\Form\Form;
use Tomgrohl\Laravel\Form\Element\Text;
use Tomgrohl\Laravel\Form\Element\Submit;

$form = new Form('/login', 'POST');
$form->add(new Text('username'));
$form->add(new Text('password'));
$form->add(new Submit('submit', 'Login');

```