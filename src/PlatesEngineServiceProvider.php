<?php declare(strict_types=1);

namespace Ellipse\Adapters\Templating\Plates;

use Interop\Container\ServiceProvider;

use Ellipse\Contracts\Templating\EngineAdapterFactoryInterface;

class PlatesEngineServiceProvider implements ServiceProvider
{
    public function getServices()
    {
        return [
            EngineAdapterFactoryInterface::class => function () {

                return new EngineAdapterFactory;

            },
        ];
    }
}
