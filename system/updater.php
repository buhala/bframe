<?php
class updater{
	/**
	*Gets the two variables
	**/
	public function __construct(){
		$this->curversion=file_get_contents('http://buhalblog.free.bg/bframe/version.txt');
		$this->offversion=$GLOBALS['system']['version'];
	}
	/**
	*SHUT.DOWN.EVERYTHING if the version is incorrect
	**/
	public function checkVersion(){
		if($this->curversion!=$this->offversion){
			die('UPDATE_FRAMEWORK');
		}
	}
}