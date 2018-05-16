<?php

namespace YourFrog\DependencyInjection;

/**
 *  Obsługa tworzenia elementów w DI
 *
 * @package YourFrog\DependencyInjection
 */
interface ElementInterface
{
    /**
     *  Utworzenie obiektu
     *
     * @param Manager $manager
     *
     * @return object
     */
    public function create(Manager $manager);
}