<?php
namespace AdminBundle\Utils;
 
class Helpers
{
	private function isAssoc(array $arr)
	{
	    if (array() === $arr) return false;
	    return array_keys($arr) !== range(0, count($arr) - 1);
	}
}