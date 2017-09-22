<?php declare(strict_types=1);

namespace Ellipse\Adapters\Templating\Plates;

use Interop\Container\ServiceProviderInterface;

use Ellipse\Contracts\Templating\EngineAdapterFactoryInterface;

class PlatesEngineServiceProvider implements ServiceProviderInterface
{
    public function getFactories()
    {
        return [
            EngineAdapterFactoryInterface::class => function () {

                return new EngineAdapterFactory;

            },
        ];
    }

    public function getExtensions()
    {
        //
    }
}
