<?php

use League\Plates\Engine;

use Ellipse\Contracts\Templating\EngineInterface;

use Ellipse\Adapters\Templating\Plates\EngineAdapter;

describe('EngineAdapter', function () {

    beforeEach(function () {

        $this->decorated = Mockery::mock(Engine::class);

        $this->engine = new EngineAdapter($this->decorated);

    });

    it('should implement EngineInterface', function () {

        expect($this->engine)->to->be->an->instanceof(EngineInterface::class);

    });

    describe('->registerNamespace()', function () {

        it('should proxy the underlying plates engine addFolder method', function () {

            $namespace = 'namespace';
            $path = 'path';

            $this->decorated->shouldReceive('addFolder')->once()
                ->with($namespace, $path, true);

            $this->engine->registerNamespace($namespace, $path);

        });

    });

    describe('->registerFunction()', function () {

        it('should proxy the underlying plates engine registerFunction method', function () {

            $name = 'name';
            $cb = function () {};

            $this->decorated->shouldReceive('registerFunction')->once()
                ->with($name, $cb);

            $this->engine->registerFunction($name, $cb);

        });

    });

    describe('->render()', function () {

        it('should proxy the underlying plates engine render method', function () {

            $name = 'name';
            $data = ['data'];
            $expected = 'expected';

            $this->decorated->shouldReceive('render')->once()
                ->with($name, $data)
                ->andReturn($expected);

            $test = $this->engine->render($name, $data);

            expect($test)->to->be->equal($expected);

        });

    });

});
