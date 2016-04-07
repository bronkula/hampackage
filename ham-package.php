<?

// Created by Hamilton Cline hamdiggy@gmail.com
// Last edit 2016 a super good year

class HamPackage{
	public $stream = "";

	function gather($arr){
		$this->stream = "";
		foreach($arr as $key=>$file) {
			$fileContents = @file_get_contents($file);
			if($fileContents===false){
				$this->buildfail("Couldn't read contents of ".$file);
			} else {
				$this->stream .= $fileContents;
			}
		}
	}
	function runPackage($output){
		$this->buildPackage($this->stream,$output);
	}
	function buildPackage($input,$output){
		if(@file_put_contents($output,$input)===false) {
			$this->buildfail("Couldn't build to ".output);
		}
	}
	function runLocal(){
		if(eval($this->streamStrip($this->stream))===false) {
			$this->buildfail("Couldn't stream to php");
		}
	}
	function streamStrip($str){
		return preg_replace("/^\<\?php|\?\>$/","",$str);
	}
	function minify(){
		$patterns = array(
			'/\/\*.+?\*\//s',
			'/[ \t]{2,}/',
			'/[ \t\n\r]{2,}/',
			'/\?>\<\?php/',
			'/[ \t\n\r]{2,}/'
			);
		$replacements = array(
			"",
			" ",
			"\n",
			"",
			"\n"
			);
		$this->stream = preg_replace($patterns,$replacements,$this->stream);
	}

	function buildfail($string){
		die($string);
	}
}

?>
