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
 * Interface DataTransformerInterface
 *
 * Inspired by Symfonys Form Data Transformers.
 *
 * @package Tomgrohl\Laravel\Form
 */
interface DataTransformerInterface
{
    /**
     * Transform a value
     *
     * Transforms a value to go in a form element
     *
     * e.g get the id from an entity
     *
     * @param $value
     * @return mixed
     */
    public function transform($value);

    /**
     * Reverse a transform
     *
     * Transforms a value from form input to go in a model
     *
     * e.g lookup an entity using id from form input
     *
     * @param $value
     * @return mixed
     */
    public function reverseTransform($value);
}
