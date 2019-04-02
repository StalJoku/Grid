<?php

namespace App\Services;

class GridObject 
{

	private $gridSize;

	public function __construct($gridSize)
	{
		$this->gridSize = $gridSize;

	}

	public function getGrid()
	{
		return $this->gridSize;
	}

	public function distanceSum( $x, $y, $n)
	{ 
	    $sum = 0; 
	  
	    // for each point, finding  
	    // distance to rest of  
	    // the point 
	    for($i = 0; $i < $n; $i++) 
	        for ($j = $i + 1; $j < $n; $j++) 
	            $sum += (abs($x[$i] - $x[$j]) + 
	                     abs($y[$i] - $y[$j])); 
	    return $sum; 
	} 
	
}