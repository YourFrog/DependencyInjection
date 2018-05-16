<?php

namespace YourFrog\DependencyInjection\Adapter;

use Closure;

/**
 *  Struktura obsługująca pojedyńczy element w managerze
 *
 * @package YourFrog\DependencyInjection
 */
class Element implements ElementInterface
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
        if( $this->share && $this->instance !== null ) {
            return $this->instance;
        }

        $callback = $this->callback;
        $this->instance = $callback($manager);

        return $this->instance;
    }
}