<?php

namespace Generator;

use Model\Pyramid;

/**
 * @author chema
 */
class PyramidGenerator
{
    const UP = 'up';
    const DOWN = 'down';
    const LEFT = 'left';
    const RIGHT = 'right';

    /** @int */
    private $pyramid;

    /** @var string */
    private $pointTo;

    /**
     * @param int $height
     */
    public function __construct(Pyramid $pyramid, $pointTo = self::UP)
    {
        $this->pyramid = $pyramid;
        $this->pointTo = $pointTo;
    }

    /**
     *
     * @return string
     */
    public function getPointTo()
    {
        return $this->pointTo;
    }

    /**
     *
     * @param string $pointTo
     */
    public function setPointTo($pointTo)
    {
        $this->pointTo = $pointTo;
        
        return $this;
    }

    /**
     * @return string
     */
    public function generateAsString()
    {
        if (self::UP === $this->pointTo) {
            return $this->generateAsStringUp();
        }
        
        if (self::DOWN === $this->pointTo) {
            return $this->generateAsStringDown();
        }
        
        if (in_array($this->pointTo, [self::RIGHT, self::LEFT])) {
            return $this->generateAsStringHorizontal();
        }
        
        return sprintf('Unknoun direction %s', $this->pointTo);
    }

    private function generateAsStringUp()
    {
        $result = '';
        
        $height = $this->pyramid->getHeight();
        for ($row = 1; $row <= $height; $row++) {
            $result .= $this->generateRowAsStringVertical($row);
        }
        
        return rtrim($result);
    }

    private function generateAsStringDown()
    {
        $result = '';
        
        $height = $this->pyramid->getHeight();
        for ($row = $height; $row >= 1; $row--) {
            $result .= $this->generateRowAsStringVertical($row);
        }
        
        return rtrim($result);
    }

    /**
     * 
     * @param int $row
     * @return string
     */
    private function generateRowAsStringVertical($row)
    {
        $height = $this->pyramid->getHeight();
        
        $baseLenght = ($height * 2) - 1;
        $filledAmount = ($row * 2) - 1;
        $emptyAmount = ($baseLenght - $filledAmount) / 2;
        
        $emptyLeft = str_repeat($this->pyramid->getEmptyChar(), $emptyAmount);
        $filledChars = str_repeat($this->pyramid->getFilledChar(), 
                $filledAmount);
        $emptyRight = str_repeat($this->pyramid->getEmptyChar(), $emptyAmount);
        
        $newRow = $emptyLeft . $filledChars . $emptyRight;
        
        return $newRow . PHP_EOL;
    }

    private function generateAsStringHorizontal()
    {
        $height = (int) $this->pyramid->getHeight();
        $base = ($height * 2) - 1;
        $result = '';
        
        for ($row = 1; $row <= $base; $row++) {
            $result .= $this->generateRowAsStringHorizontal($row);
        }
        
        return rtrim($result);
    }

    /**
     * 
     * @param int $row
     * @return string
     */
    private function generateRowAsStringHorizontal($row)
    {
        $height = (int) $this->pyramid->getHeight();
        $base = ($height * 2) - 1;
        
        if ($row <= ($base / 2) + 1) {
            $filledAmount = $row;
        } else {
            $filledAmount = $base - $row + 1;
        }
        
        if ($row === $height) {
            $emptyAmount = 0;
        } else {
            $emptyAmount = $height - $filledAmount;
        }
        
        $filledChars = str_repeat($this->pyramid->getFilledChar(), 
                $filledAmount);
        $emptyChars = str_repeat($this->pyramid->getEmptyChar(), $emptyAmount);
        
        if (self::RIGHT === $this->pointTo) {
            $newRow = $filledChars . $emptyChars;
        } else {
            $newRow = $emptyChars . $filledChars;
        }
        
        return $newRow . PHP_EOL;
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
            $this->addChars($newRow, $this->pyramid->getEmptyChar(), 
                    $emptyAmount);
            $this->addChars($newRow, $this->pyramid->getFilledChar(), 
                    $filledAmount);
            $this->addChars($newRow, $this->pyramid->getEmptyChar(), 
                    $emptyAmount);
            
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