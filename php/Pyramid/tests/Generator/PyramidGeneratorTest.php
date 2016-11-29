<?php

use Silex\WebTestCase;
use Generator\PyramidGenerator;
use Model\Pyramid;

class PyramidGeneratorTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../../src/app.php';
        require __DIR__.'/../../config/dev.php';
        require __DIR__.'/../../src/controllers.php';
        $app['session.test'] = true;

        return $this->app = $app;
    }

    /**
     * @dataProvider providerGenerateAsStringUp
     *
     * @param string $expected
     * @param int    $height
     */
    public function testGenerateAsStringUp($expected, $height)
    {
        $pyramid = new Pyramid($height, '*', '_');
        $pyramidGenerator = new PyramidGenerator($pyramid,  PyramidGenerator::UP);
        $this->assertEquals($expected, $pyramidGenerator->generateAsString());
    }

    public function providerGenerateAsStringUp()
    {
        return [
            [
                '*',
                1,
            ],
            [
                '_*_'.PHP_EOL.
                '***',
                2,
            ],
            [
                '__*__'.PHP_EOL.
                '_***_'.PHP_EOL.
                '*****',
                3,
            ],
            [
                '___*___'.PHP_EOL.
                '__***__'.PHP_EOL.
                '_*****_'.PHP_EOL.
                '*******',
                4,
            ],
        ];
    }

    /**
     * @dataProvider providerGenerateAsStringDown
     *
     * @param string $expected
     * @param int    $height
     */
    public function testGenerateAsStringDown($expected, $height)
    {
        $pyramid = new Pyramid($height, '*', '_');
        $pyramidGenerator = new PyramidGenerator($pyramid, PyramidGenerator::DOWN);
        $this->assertEquals($expected, $pyramidGenerator->generateAsString());
    }

    public function providerGenerateAsStringDown()
    {
        return [
            [
                '*',
                1,
            ],
            [
                '***'.PHP_EOL.
                '_*_',
                2,
            ],
            [
                '*****'.PHP_EOL.
                '_***_'.PHP_EOL.
                '__*__',
                3,
            ],
            [
                '*******'.PHP_EOL.
                '_*****_'.PHP_EOL.
                '__***__'.PHP_EOL.
                '___*___',
                4,
            ],
        ];
    }

    /**
     * @dataProvider providerGenerateAsStringRight
     *
     * @param string $expected
     * @param int    $height
     */
    public function testGenerateAsStringRight($expected, $height)
    {
        $pyramid = new Pyramid($height, '*', '_');
        $pyramidGenerator = new PyramidGenerator($pyramid, PyramidGenerator::RIGHT);
        $this->assertEquals($expected, $pyramidGenerator->generateAsString());
    }

    public function providerGenerateAsStringRight()
    {
        return [
            [
                '*',
                1,
            ],
            [
                '*_'.PHP_EOL.
                '**'.PHP_EOL.
                '*_',
                2,
            ],
            [
                '*__'.PHP_EOL.
                '**_'.PHP_EOL.
                '***'.PHP_EOL.
                '**_'.PHP_EOL.
                '*__',
                3,
            ], [
                '*___'.PHP_EOL.
                '**__'.PHP_EOL.
                '***_'.PHP_EOL.
                '****'.PHP_EOL.
                '***_'.PHP_EOL.
                '**__'.PHP_EOL.
                '*___',
                4,
            ],
        ];
    }

    /**
     * @dataProvider providerGenerateAsStringLeft
     *
     * @param string $expected
     * @param int    $height
     */
    public function testGenerateAsStringLeft($expected, $height)
    {
        $pyramid = new Pyramid($height, '*', '_');
        $pyramidGenerator = new PyramidGenerator($pyramid, PyramidGenerator::LEFT);
        $this->assertEquals($expected, $pyramidGenerator->generateAsString());
    }

    public function providerGenerateAsStringLeft()
    {
        return [
            [
                '*',
                1,
            ],
            [
                '_*'.PHP_EOL.
                '**'.PHP_EOL.
                '_*',
                2,
            ],
            [
                '__*'.PHP_EOL.
                '_**'.PHP_EOL.
                '***'.PHP_EOL.
                '_**'.PHP_EOL.
                '__*',
                3,
            ], [
                '___*'.PHP_EOL.
                '__**'.PHP_EOL.
                '_***'.PHP_EOL.
                '****'.PHP_EOL.
                '_***'.PHP_EOL.
                '__**'.PHP_EOL.
                '___*',
                4,
            ],
        ];
    }

    /**
     * @dataProvider providerGenerateAsArray
     *
     * @param string $expected
     * @param int    $height
     */
    public function testGenerateAsArray($expected, $height)
    {
        $pyramid = new Pyramid($height, '*', '_');
        $pyramidGenerator = new PyramidGenerator($pyramid);
        $this->assertEquals($expected, $pyramidGenerator->generateAsArray());
    }

    public function providerGenerateAsArray()
    {
        return [
            [
                [['*']],
                1,
            ],
            [
                [
                    ['_', '*', '_'],
                    ['*', '*', '*'],
                ],
                2,
            ],
            [
                [
                    ['_', '_', '*', '_', '_'],
                    ['_', '*', '*', '*', '_'],
                    ['*', '*', '*', '*', '*'],
                ],
                3,
            ],
            [
                [
                    ['_', '_', '_', '*', '_', '_', '_'],
                    ['_', '_', '*', '*', '*', '_', '_'],
                    ['_', '*', '*', '*', '*', '*', '_'],
                    ['*', '*', '*', '*', '*', '*', '*'],
                ],
                4,
            ],
        ];
    }
}
