<?php
namespace app\filters;
//defining the Login attribute
#[\Attribute]
class JustLeave implements \app\core\AccessFilter{
	public function execute(){
		header('location:/');
		return true;
	}
}