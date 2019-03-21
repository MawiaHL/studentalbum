<?php 
namespace Core;
/**
 * HL Framework View
 *
 * Developer: Mawia HL
 *
 * 
 */
class View{

	public static function render($view, $arg = [])
	{
		extract($arg, EXTR_SKIP);
		$file = "../App/Views/$view";
		if(is_readable($file)){
			require $file;
		}else{
			throw new \Exception("$file not found");
		}
	}
}