<?php declare(strict_types=1);

namespace Ellipse\Adapters\Templating\Plates;

use League\Plates\Engine;

use Ellipse\Contracts\Templating\EngineInterface;

class EngineAdapter implements EngineInterface
{
    /**
     * The underlying plates instance.
     *
     * @var \League\Plates\Engine
     */
    private $plates;

    /**
     * Set up a plates adapter with the given plates instance.
     *
     * @param \League\Plates\Engine $plates
     */
    public function __construct(Engine $plates)
    {
        $this->plates = $plates;
    }

    /**
     * @inheritdoc
     */
    public function registerFunction(string $name, callable $cb): void
    {
        $this->plates->registerFunction($name, $cb);
    }

    /**
     * @inheritdoc
     */
    public function render(string $file, array $data = []): string
    {
        return $this->plates->render($file, $data);
    }
}
