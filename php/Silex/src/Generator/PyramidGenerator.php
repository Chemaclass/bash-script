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
        } else if (self::RIGHT === $this->pointTo) {
            return $this->generateAsStringRight();
        } else if (self::DOWN === $this->pointTo) {
            return $this->generateAsStringDown();
        }
        
        return false;
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

    private function generateRowAsStringVertical($row)
    {
        $height = $this->pyramid->getHeight();
        
        $maxLenght = ($height * 2) - 1;
        $filledAmount = ($row * 2) - 1;
        $emptyAmount = ($maxLenght - $filledAmount) / 2;
        
        $emptyLeft = str_repeat($this->pyramid->getEmptyChar(), $emptyAmount);
        $filledChars = str_repeat($this->pyramid->getFilledChar(), 
                $filledAmount);
        $emptyRight = str_repeat($this->pyramid->getEmptyChar(), $emptyAmount);
        
        $newRow = $emptyLeft . $filledChars . $emptyRight;
        
        return $newRow . PHP_EOL;
    }

    private function generateAsStringRight()
    {
        $width = ( int ) $this->pyramid->getHeight();
        $height = ($width * 2) - 1;
        
        $result = '';
        for ($row = 1; $row <= $height; $row++) {
            
            if ($row <= ($height / 2) + 1) {
                $filledAmount = $row;
            } else {
                $filledAmount = $height - $row + 1;
            }
            
            if ($row === $width) {
                $emptyAmount = 0;
            } else {
                $emptyAmount = $width - $filledAmount;
            }
            
            $filledChars = str_repeat($this->pyramid->getFilledChar(), 
                    $filledAmount);
            $emptyRight = str_repeat($this->pyramid->getEmptyChar(), 
                    $emptyAmount);
            
            $newRow = $filledChars . $emptyRight;
            
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