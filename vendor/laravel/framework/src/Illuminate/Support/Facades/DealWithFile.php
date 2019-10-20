<?php  
namespace Illuminate\Support\Facades;



class DealWithFile
{
	public static function rename()
	{
		$nombre = '';
		$keys = array_merge( range('a','z'), range(0,9) );
		for($i=0; $i<10; $i++)
		{
			$nombre .= $keys[array_rand($keys)];
		}
		return $nombre;
	}
}
