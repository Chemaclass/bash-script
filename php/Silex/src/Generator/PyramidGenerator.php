<?php

namespace Generator;

use Model\Pyramid;

/**
 * @author chema
 */
class PyramidGenerator
{
	const EMPTY_CHAR = '_';
	const FILL_CHAR = '*';

	/** @int */
	private $pyramid;

	/**
	 * @param int $height
	 */
	public function __construct(Pyramid $pyramid)
	{
		$this->pyramid = $pyramid;
	}

	/**
	 * @return string
	 */
	public function generateAsString()
	{
		$height = $this->pyramid->getHeight();
		$maxLenght = ($height * 2) - 1;
		$result = '';
		
		for ($row = 1; $row <= $height; $row++) {
			
			$filledAmount = ($row * 2) - 1;
			$emptyAmount = ($maxLenght - $filledAmount) / 2;
			if ($emptyAmount < 0) {
				$emptyAmount = 0;
			}
			
			$emptyLeft = str_repeat(self::EMPTY_CHAR, $emptyAmount);
			$filledChars = str_repeat(self::FILL_CHAR, $filledAmount);
			$emptyRight = str_repeat(self::EMPTY_CHAR, $emptyAmount);
			
			$newRow = $emptyLeft . $filledChars . $emptyRight;
			
			$result .= $newRow . PHP_EOL;
		}
		
		return rtrim($result);
	}

	/**
	 * @return array
	 */
	public function generateAsArray()
	{
		$result = [];
		
		$height = $this->pyramid->getHeight();
		$maxLenght = ($height * 2) - 1;
		
		for ($row = 1; $row <= $height; $row++) {
			
			$filledAmount = ($row * 2) - 1;
			$emptyAmount = ($maxLenght - $filledAmount) / 2;
			
			$newRow = [];
			$this->addChars($newRow, self::EMPTY_CHAR, $emptyAmount);
			$this->addChars($newRow, self::FILL_CHAR, $filledAmount);
			$this->addChars($newRow, self::EMPTY_CHAR, $emptyAmount);
			
			$result[] = $newRow;
		}
		
		return ($result);
	}

	/**
	 * 
	 * @param array $newRow
	 * @param string $char
	 * @param int $amount Amount of chars to include into the row
	 */
	private function addChars(&$row, $char, $amount)
	{
		for ($i = 0; $i < $amount; $i++) {
			$row[] = $char;
		}
	}
}