<?php

namespace Model;

/**
 *
 * @author chema
 */
class Pyramid
{
    const EMPTY_CHAR = '_';
    const FILLED_CHAR = '*';

    /** @var int */
    private $height;

    /** @var string */
    private $filledChar;

    /** @var string */
    private $emptyChar;

    /**
     *
     * @param int $height        	
     * @param string $filledChar        	
     * @param string $emptyChar        	
     */
    public function __construct(
        $height, 
        $filledChar = self::FILLED_CHAR, 
        $emptyChar = self::EMPTY_CHAR
    )
    {
        $this->height = $height;
        $this->filledChar = $filledChar;
        $this->emptyChar = $emptyChar;
    }

    /**
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     *
     * @param int $height        	
     */
    public function setHeight($height)
    {
        $this->height = $height;
        
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getFilledChar()
    {
        return $this->filledChar;
    }

    /**
     *
     * @param string $filledChar        	
     */
    public function setFilledChar($filledChar)
    {
        $this->filledChar = $filledChar;
        
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getEmptyChar()
    {
        return $this->emptyChar;
    }

    /**
     *
     * @param string $filledChar        	
     */
    public function setEmptyChar($emptyChar)
    {
        $this->emptyChar = $emptyChar;
        
        return $this;
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('Pyramid{ height: %d, filledChar: %s, emptyChar: %s }', 
                $this->height, $this->filledChar, $this->emptyChar);
    }
}