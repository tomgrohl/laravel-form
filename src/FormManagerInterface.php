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
 * Interface FormManagerInterface
 * @package Tomgrohl\Laravel\Form
 */
interface FormManagerInterface
{
    /**
     * @param $name
     * @param FormInterface $form
     * @return mixed
     */
    public function set($name, FormInterface $form);

    /**
     * @param $name
     * @return mixed
     */
    public function get($name);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param $name
     * @return bool
     */
    public function has($name);

    /**
     * @return $this
     */
    public function clear();
}
