<?php
namespace Icwrtech\Underwaf\Helper;

/*


	Author : Ahmad Dwiyan <ahmad.dwiyan14@gmail.com>
	
	Organization : ICWR - TECH Research And Development

	License : MIT


*/

use Log;

trait UnderwafHelper {


	public function getIp(){

    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
    return request()->ip(); // it will return server ip when no client ip found
}


	public function writeAttackLog($value_request, $attack_pattern){

		$message = "[Underwaf] : Attack Detected ! Request : '".$value_request."', Pattern Category : '".$attack_pattern."', Attacker IP : '".$this->getIp()."'" ;
        Log::alert($message);

        return true;

	}


}