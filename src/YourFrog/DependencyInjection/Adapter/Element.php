<?php

namespace YourFrog\DependencyInjection\Adapter;

use Closure;
use YourFrog\DependencyInjection\Manager;
use YourFrog\DependencyInjection\ElementInterface;

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
        $callback = $this->callback;
        $this->instance = $callback($manager);

        return $this->instance;
    }
}