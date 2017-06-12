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

    describe('->render()', function () {

        it('should proxy the underlying plates instance render method', function () {

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
