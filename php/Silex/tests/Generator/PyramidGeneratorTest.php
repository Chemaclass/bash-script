<?php
use Silex\WebTestCase;
use Generator\PyramidGenerator;
use Model\Pyramid;

class PyramidGeneratorTest extends WebTestCase
{

	public function createApplication()
	{
		$app = require __DIR__ . '/../../src/app.php';
		require __DIR__ . '/../../config/dev.php';
		require __DIR__ . '/../../src/controllers.php';
		$app['session.test'] = true;
	
		return $this->app = $app;
	}
	
	/**
	 * @dataProvider providerGenerateAsString
	 * @param string $expected
	 * @param int $height
	 */
	public function testGenerateAsString($expected, $height)
	{
		$pyramid = new Pyramid($height);
		$pyramidGenerator = new PyramidGenerator($pyramid);
		$this->assertEquals($expected, $pyramidGenerator->generateAsString());
	}

	public function providerGenerateAsString()
	{
		return [
			[
				'*',
				1 
			],
			[
				'_*_' . PHP_EOL . 
				'***',
				2 
			],
			[
				'__*__' . PHP_EOL . 
				'_***_' . PHP_EOL . 
				'*****',
				3 
			] ,
			[
				'___*___' . PHP_EOL .
				'__***__' . PHP_EOL .
				'_*****_' . PHP_EOL .
				'*******',
				4
			] ,
		];
	}
	
	/**
	 * @dataProvider providerGenerateAsArray
	 * @param string $expected
	 * @param int $height
	 */
	public function testGenerateAsArray($expected, $height)
	{
		$pyramid = new Pyramid($height);
		$pyramidGenerator = new PyramidGenerator($pyramid);
		$this->assertEquals($expected, $pyramidGenerator->generateAsArray());
	}
	
	public function providerGenerateAsArray()
	{
		return [
			[
				[['*']],
				1
			],
			[
				[
					['_','*','_'],
					['*','*','*'],
				],
				2
			],
			[
				[
						['_','_','*','_','_'],
						['_','*','*','*','_'],
						['*','*','*','*','*'],
				],
				3
			],
			[
				[
						['_','_','_','*','_','_','_'],
						['_','_','*','*','*','_','_'],
						['_','*','*','*','*','*','_'],
						['*','*','*','*','*','*','*'],
				],
				4
			],
		];
	}

}
