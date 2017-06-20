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
            Engine::class => function ($container) {

                $path = $container->get('templating.path');
                $options = $container->get('templating.options');

                $extension = $options['extensions'] ?? 'php';

                return new Engine($path, $extension);

            },

            EngineInterface::class => function ($container) {

                $plates = $container->get(Engine::class);

                return new EngineAdapter($plates);

            },
        ];
    }
}
