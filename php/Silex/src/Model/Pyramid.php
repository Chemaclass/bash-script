<?php

namespace Model;

/**
 * @author chema
 */
class Pyramid
{
	
	/** @int */
	private $height;
	
	/**
	 * @param int $height
	 */
	public function __construct($height)
	{
		$this->height = $height;
	}
	
	/**
	 * @return int
	 */
	public function getHeight()
	{
		return $this->height;
	}
	
	/**
	 * @param int $height
	 */
	public function setHeight($height)
	{
		$this->height = $height;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return sprintf('Pyramid{ height: %d }', $this->height);
	}
}