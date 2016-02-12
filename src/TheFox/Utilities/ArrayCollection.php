<?php

namespace TheFox\Utilities;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;

class ArrayCollection extends DoctrineArrayCollection{
	
	/*private $elements;
	
	public function __construct(array $elements = array()){
		#$this->elements = $elements;
		parent::__construct($elements);
		$this->elements = $elements;
	}*/
	
	public function keys(){
		return new static($this->getKeys());
	}
	
	public function values(){
		return new static($this->getValues());
	}
	
	public function hash(){
		$hash = array();
		foreach($this->toArray() as $element){
			$hash[$element[0]] = $element[1];
		}
		return new static($hash);
	}
	
	public function flat(){
		$flatten = array();
		$elements = $this->toArray();
		array_walk_recursive($elements, function($a) use(&$flatten){
			$flatten[] = $a;
		});
		return new static($flatten);
	}
	
	public function uniq($sort_flags = SORT_STRING){
		return new static(array_unique($this->toArray(), $sort_flags));
	}
	
	public function sort($sort_flags = SORT_REGULAR){
		$elements = $this->toArray();
		$ok = sort($elements, $sort_flags);
		return new static($ok ? $elements : array());
	}
	
	public function uasort($f){
		$elements = $this->toArray();
		$ok = uasort($elements, $f);
		return new static($ok ? $elements : array());
	}
	
	public function reverse(){
		$elements = $this->toArray();
		$ok = rsort($elements);
		return new static($ok ? $elements : array());
	}
	
	public function inc($key, $i = 1){
		$this->set($key, $this->get($key) + $i);
	}
	
	public function dec($key, $i = 1){
		$this->set($key, $this->get($key) - $i);
	}
	
	public function sum(){
		return array_sum($this->toArray());
	}
	
	public function avg(){
		return($this->sum() / $this->count());
	}
	
	public function min(){
		$elements = $this->sort(SORT_NUMERIC);
		return $elements->first();
	}
	
	public function max(){
		$elements = $this->sort(SORT_NUMERIC);
		return $elements->last();
	}
	
	public function median(){
		$elements = $this->sort(SORT_NUMERIC);
		$count = $this->count();
		$half = floor($count / 2);
		if($this->count() % 2 == 0){
			#return array($elements[$half-1], $elements[$half]);
			return new static(array($elements[$half-1], $elements[$half]));
		}
		return $elements[$half];
	}
	
	public function medianHigh(){
		$median = $this->median();
		if($median instanceof ArrayCollection){
			return $median->max();
		}
		return $median;
	}
	
	public function merge($ar){
		if($ar instanceof ArrayCollection
			|| $ar instanceof DoctrineArrayCollection){
			$ar = $ar->toArray();
		}
		$elements = $this->toArray();
		return new static(array_merge($elements, $ar));
	}
	
}
