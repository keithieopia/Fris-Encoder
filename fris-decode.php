#!/usr/bin/env php
<?php
/*
 * fris-decode.php
 *   Decodes files created by Fris-Encoder without using eval(). Useful 
 *   for safely decoding untrusted PHP scripts.
 * 
 *   https://github.com/keithieopia/fris-decode
 * 
 * 
 *   Usage (cli only):
 *     ./fris-decode.php [PHP FILE]
 * 
 *   Versions Supported:
 *     Jul 3, 2018 (commit 8d863e9) and earlier  
 * 
 *   Original:
 *     Fris-Encoder by OGFris
 *     https://github.com/OGFris/Fris-Encoder
 * 
 *   License (GNU GPL3):
 *     Copyright (C) 2018 Timothy Keith, original concept by OGFris
 *
 *     This program is free software: you can redistribute it and/or 
 *     modify it under the terms of the GNU General Public License as 
 *     published by the Free Software Foundation, either version 3 of 
 *     the License, or (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with this program. If not, see 
 *     <http://www.gnu.org/licenses/>.
 */

	function deflate( $str ) {
		$str = str_replace("eval(gzinflate(base64_decode('", "", $str);
		$str = str_replace("')));", "", $str);
		return gzinflate( base64_decode( $str ));
	}

	function find_rounds( $str ) {
		$count = 0;
		while (substr($str, 0, 4) === 'eval') {
			$str = deflate( $str );
			$count++;
		}
		
		return $count;
	}
	
	function fris_decode( $str ) {
		$rounds = find_rounds( $str );
		for ($i = 0; $i < $rounds; $i++) {
			$str = deflate( $str );
		}
		
		return $str;
	}

	$f = fopen( $argv[1], 'r' );
	while ( ($l = fgets($f)) !== false) {
		if(strpos($l, 'eval') !== false) {
			echo fris_decode( $l );
		}
	}
	fclose($f);

?>
