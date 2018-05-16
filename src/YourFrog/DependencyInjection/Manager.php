<?php

namespace YourFrog\DependencyInjection;

use Closure;
use YourFrog\DependencyInjection\Adapter;

/**
 *  Klasa obsugujca zaleności
 */
class Manager
{
    /**
     *  Elementy przechowywane przez managera
     *
     * @var ElementInterface[]
     */
    private $elements = [];

    /**
     *  Ustawienie elementu którego instancja będzie każdorazowo tworzona od nowa
     *
     * @param string $name
     * @param Closure $callback
     */
    public function set($name, Closure $callback)
    {
        $this->elements[$name] = new Adapter\Element($callback);
    }

    /**
     *  Ustawienie elementu którego będzie istniała jedyna instancja
     *
     * @param string $name
     * @param Closure $callback
     */
    public function setShared($name, Closure $callback)
    {
        $this->elements[$name] = new Adapter\SharedElement($callback);
    }

    /**
     *  Pobranie elementu
     *
     * @param string $name
     *
     * @throws DependencyInjectionException
     */
    public function get($name)
    {
        if( array_key_exists($name, $this->elements) === false ) {
            throw new DependencyInjectionException('Element under "' . $name . '" not exists');
        }

        return $this->elements[$name]->create($this);
    }
}