<?php

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

use Ellipse\Contracts\Templating\EngineAdapterInterface;

use Ellipse\Adapters\Templating\Plates\EngineAdapter;

describe('EngineAdapter', function () {

    beforeEach(function () {

        $this->decorated = Mockery::mock(Engine::class);

        $this->engine = new EngineAdapter($this->decorated);

    });

    it('should implement EngineAdapterInterface', function () {

        expect($this->engine)->to->be->an->instanceof(EngineAdapterInterface::class);

    });

    describe('->registerNamespace()', function () {

        it('should proxy the underlying plates engine ->addFolder() method', function () {

            $namespace = 'namespace';
            $path = 'path';

            $this->decorated->shouldReceive('addFolder')->once()
                ->with($namespace, $path, true);

            $this->engine->registerNamespace($namespace, $path);

        });

    });

    describe('->registerFunction()', function () {

        it('should proxy the underlying plates engine ->registerFunction() method', function () {

            $name = 'name';
            $cb = function () {};

            $this->decorated->shouldReceive('registerFunction')->once()
                ->with($name, $cb);

            $this->engine->registerFunction($name, $cb);

        });

    });

    describe('->registerExtension()', function () {

        it('should proxy the underlying plates engine ->loadExtension() method', function () {

            $extension = Mockery::mock(ExtensionInterface::class);

            $this->decorated->shouldReceive('loadExtension')->once()
                ->with($extension);

            $this->engine->registerExtension($extension);

        });

    });

    describe('->render()', function () {

        it('should proxy the underlying plates engine ->render() method', function () {

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
