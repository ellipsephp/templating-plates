<?php declare(strict_types=1);

namespace Ellipse\Adapters\Templating\Plates;

use Ellipse\Contracts\Templating\EngineAdapterFactoryInterface;
use Ellipse\Contracts\Templating\EngineAdapterInterface;

use League\Plates\Engine;

class EngineAdapterFactory implements EngineAdapterFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function getEngine(string $path, array $options = []): EngineAdapterInterface
    {
        $extension = $options['extensions'] ?? 'php';

        $adapter = new Engine($path, $extension);

        return new EngineAdapter($adapter);
    }
}
