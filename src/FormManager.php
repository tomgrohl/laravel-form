<?php

/*
 * This file is part of the Tomgrohl Laravel Form package.
 *
 * (c) Tom Ellis
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tomgrohl\Laravel\Form;

/**
 * Class FormManager
 * @package Tomgrohl\Laravel\Form
 */
class FormManager implements FormManagerInterface
{
    /**
     * @var iterable Form
     */
    protected $forms = [];

    public function __construct(iterable $forms = [])
    {
        $this->forms = $forms;
    }

    /**
     * @param $name
     * @param FormInterface $form
     * @return $this
     */
    public function set($name, FormInterface $form)
    {
        $this->forms[$name] = $form;
        return $this;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->forms[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return isset($this->forms[$name]);
    }

    /**
     * @return $this
     */
    public function clear()
    {
        $this->forms = [];
        return $this;
    }

    /**
     * @return iterable
     */
    public function getAll()
    {
        return $this->forms;
    }
}
