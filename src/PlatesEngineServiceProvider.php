<?php declare(strict_types=1);

namespace Ellipse\Adapters\Templating\Plates;

use Interop\Container\ServiceProvider;

use Ellipse\Contracts\Templating\EngineInterface;

use League\Plates\Engine;

class PlatesEngineServiceProvider implements ServiceProvider
{
    public function getServices()
    {
        return [
            EngineInterface::class => function ($container) {

                $path = $container->get('templating.path');

                $extension = $container->has('templating.options.extension')
                    ? $container->get('templating.options.extension')
                    : 'php';

                $plates = new Engine($path, $extension);

                return new EngineAdapter($plates);

            },
        ];
    }
}
