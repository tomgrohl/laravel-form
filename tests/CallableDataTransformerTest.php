<?php

use PHPUnit\Framework\TestCase;
use Tomgrohl\Laravel\Form\CallableDataTransformer;

class CallableDataTransformerTest extends TestCase
{
    public function testTransform()
    {
        $callableDataTransformer = new CallableDataTransformer(function($value) {
            return strtoupper($value);
        }, function($value) {
            return strtolower($value);
        });

        $this->assertEquals('TOMMY', $callableDataTransformer->transform('tommy'));
        $this->assertEquals('tommy', $callableDataTransformer->reverseTransform('TOMMY'));
    }
}
