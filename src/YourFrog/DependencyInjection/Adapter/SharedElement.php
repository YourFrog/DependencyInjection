<?php

namespace YourFrog\DependencyInjection\Adapter;

use Closure;
use YourFrog\DependencyInjection\Manager;
use YourFrog\DependencyInjection\ElementInterface;

/**
 *  Obsługa obiektu który może mieć tylko jedną instancję
 *
 * @package YourFrog\DependencyInjection
 */
class SharedElement
{
    /**
     *  Callback który odpowiada za utworzenie obiektu
     *
     * @var Closure
     */
    private $callback;

    /**
     *  Instancja która została utworzona
     *
     * @var bool
     */
    private $instance = null;

    /**
     *  Konstruktor
     *
     * @param $callback
     */
    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @inheritdoc
     */
    public function create(Manager $manager)
    {
        if( $this->instance === null ) {
            return $this->instance;
        }

        $callback = $this->callback;
        $this->instance = $callback($manager);

        return $this->instance;
    }
}