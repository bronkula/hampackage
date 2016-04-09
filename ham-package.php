<?
// Created by Hamilton Cline hamdiggy@gmail.com
// Last updated on 2016/04/07

class HamPackage{
	private $stream = "";
	function gather($arr,$append=true){
		$output = "";
		foreach($arr as $key=>$file) {
			if(!$file) continue;
			$fileContents = @file_get_contents($file);
			if($fileContents===false){
				$this->buildfail("Couldn't read contents of ".$file);
			} else {
				$output .= $fileContents;
			}
		}
		return $append ? $this->append($output) : $output;
	}
	function arrange($arr,$append=true){
		return $append ? $this->append(implode("",$arr)) : implode("",$arr);
	}
	function append($str) {
		return $this->stream.=$str;
	}
	function buildPackage($output,$input=false){
		if(@file_put_contents($output,$input!==false?$input:$this->stream)===false) {
			$this->buildfail("Couldn't build to ".output);
		}
	}
	function runLocal($isPHP=true){
		if(!$isPHP) {
			echo $this->stream;
		}
		else if(eval($this->streamStrip($this->stream))===false) {
			$this->buildfail("Couldn't stream to php");
		}
	}
	function streamStrip($str){
		return preg_replace("/^\<\?php|\?\>$/","",$str);
	}
	function minify(){
		$patterns = array(
			'/\/\*.+?\*\//s',
			'/\/\/.+/',
			'/[ \t]{2,}/',
			'/[ \t\n\r]+/',
			'/\?>\<\?php/',
			'/[ \t\n\r]+/'
			);
		$replacements = array(
			"",
			"",
			" ",
			" ",
			"",
			" "
			);
		return preg_replace($patterns,$replacements,$this->stream);
	}
	function buildfail($string){
		die($string);
	}
}
?>
