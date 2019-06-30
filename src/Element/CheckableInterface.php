<?php

namespace Tomgrohl\Laravel\Form\Element;

interface CheckableInterface
{
    /**
     * @param bool $checked
     * @return $this
     */
    public function setChecked($checked);

    /**
     * @return bool
     */
    public function getChecked();

    /**
     * @return bool
     */
    public function isChecked();
}
