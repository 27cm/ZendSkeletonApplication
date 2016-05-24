<?php

namespace Examples\Di;

class Foo
{
    /**
     * @var Bar
     */
    protected $bar;

    /**
     * @param Bar $bar
     *
     * @return $this
     */
    public function setBar(Bar $bar)
    {
        $this->bar = $bar;
        return $this;
    }

    /**
     * @return Bar
     */
    public function getBar()
    {
        return $this->bar;
    }
}
