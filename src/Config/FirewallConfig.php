<?php

/*


	Author : Ahmad Dwiyan <ahmad.dwiyan14@gmail.com>
	
	Organization : ICWR - TECH Research And Development

	License : MIT


*/


return [

		"pattern"=>[

			"sqli"=>[
		          
                '#\b(union|select|group|db|order by)\b#',

            ],

            "xss" =>[
                '#(<[^>]+[\x00-\x20\"\'\/])(form|formaction|on\w*|style|xmlns|xlink:href)[^>]*>?#iUu',
				'!((java|live|vb)script|mocha|feed|data):(\w)*!iUu',
                '#-moz-binding[\x00-\x20]*:#u',
				'#</*(applet|meta|xml|blink|link|style|script|embed|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base|img)[^>]*>?#i'

		],

			"command_injection" => [

				 '#\b(cat (.*)|uname (.*))\b#',

			],
			"rfi"=>[
				    '#(http|ftp){1,1}(s){0,1}://.*#i',
			],
			"lfi"=>[
				                '#\.\/#is',
			]
	],

		"all_pattern" => ["underwaf.pattern.sqli","underwaf.pattern.xss","underwaf.pattern.command_injection","underwaf.pattern.rfi","underwaf.pattern.lfi"]
		
	
		

];