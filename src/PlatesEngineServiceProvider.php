<?php declare(strict_types=1);

namespace Ellipse\Adapters\Templating\Plates;

use Exception;

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

                try {

                    $extension = $container->get('templating.options.extension');

                }

                catch (Exception $e) {

                    $extension = 'php';

                }

                $plates = new Engine($path, $extension);

                return new EngineAdapter($plates);

            },
        ];
    }
}
