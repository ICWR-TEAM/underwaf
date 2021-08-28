<?php

namespace Icwrtech\Underwaf;

/*


	Author : Ahmad Dwiyan <ahmad.dwiyan14@gmail.com>
	
	Organization : ICWR - TECH Research And Development

	License : MIT


*/

use Icwrtech\Underwaf\Helper\UnderwafHelper;

use Closure;
use Log;

class UnderwafLaravel {

	use UnderwafHelper;

	public function handle($request , Closure $next){

        if ($this->check($this->getUnderwafPattern(),$request)){

            return response()->view("underwaf::block",["ip"=>$this->getIp()]);
        }

        return $next($request);
	}


	public function check($patterns , $request){

			foreach($patterns as $pattern){
				$match_word = $this->match($pattern,$request);
				
				if($match_word){

					return true;
					break;

				} else {

					continue;

				}

			}

			return false;
	}




	public function match($pattern , $request){

	foreach($request->input() as $key => $value){

			$word_pattern = $this->getCurrentPattern($pattern);
		
		foreach($word_pattern as $word){

				if(preg_match($word,strtolower($value))){
        			
        			$this->writeAttackLog($value,$pattern);
            		return true;
				
				}
		}

	}

	return false;
}

	public function getCurrentPattern($pattern_req){
		return config($pattern_req);
	}

	public function getUnderwafPattern(){

		return config('underwaf.all_pattern');

	}
 
}