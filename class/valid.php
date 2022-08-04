<?
/*
author : vishv sahdev
website : v23.in
email : vishv23@gmail.com
date: 26 June 2017
*/

class validation{
public $err=array();
		public function valid($post,$fn)
		{
		$error=array();
		$fnx['s']=1;
		$fnx['text']="Success";
			foreach($post as $k=>$v){
				if(isset($fn[$k])){
				
				$fn[$k]['default_value']=$v;
					if(isset($fn[$k]['valid'])){
					$validstr= $fn[$k]['valid'];
						
							
							$e = $this->_valid($v,$validstr,$k);
						
						if($e)
						{
							$ee=explode("|",$validstr);
						$fnx['error'][$k]=end($ee);
						$fnx['s']=0;
						$fnx['text']="Please correct the errors on this form";
						}
					}
				}
				
			}
		return $fnx;	
		}

		public function _valid($str,$rule,$k)
		{
		$op='';
		if(!preg_match('/required/',$rule) && $str == '')
		return $op;
		else
		{
			$e=explode("|",$rule);
		foreach($e as $r)
		$op .= $this->__valid($str,$r,$k);
		}
		
		return $op;
		}

		private function __valid($str,$rule,$k)
		{ 
		
		
		if($rule=="digit"){
			if(!preg_match('/^[0-9]+$/',$str)){
			return true;
			}
		}
		elseif($rule=="mobile"){
			if(!preg_match('/^[\d]{10}$/m',$str)){
			return true;
			}
		}
		elseif(substr($rule,0,3) == "==:"){
			if($str != substr($rule,3)){
			return true;
			}
		}
		elseif(substr($rule,0,3) == "<=:"){
			if($str > substr($rule,3)){
			return true;
			}
		}
		elseif(substr($rule,0,3) == ">=:"){
			if($str < substr($rule,3)){
			return true;
			}
		}
		elseif(substr($rule,0,3) == "lt:"){
		if(strlen($str) > substr($rule,3)){
			return true;
			}
		}	
		elseif(substr($rule,0,3) == "gt:"){
		if(strlen($str) <= substr($rule,3)){
			return true;
			}
		}	
		elseif(substr($rule,0,3) == "eq:"){
		if(strlen($str) != substr($rule,3)){
			return true;
			}
		}	
		elseif($rule=="decimal"){
			if(!preg_match('/^[0-9.]+$/',$str)){
			return true;
			}
		}
		elseif($rule=="alphasmall"){
			if(!preg_match('/^[a-z]+$/',$str)){
			return true;
			}
		}
		elseif($rule=="alphaupper"){
			if(!preg_match('/^[A-Z]+$/',$str)){
			return true;
			}
		}
		elseif($rule=="alpha"){
			if(!preg_match('/^[a-zA-Z]+$/',$str)){
			return true;
			}
		}
		elseif($rule=="alphanum"){
			if(!preg_match('/^[a-zA-Z0-9]+$/',$str)){
			return true;
			}
		}
		elseif($rule=="safetitle"){
			if(!preg_match('/^[a-zA-Z0-9\- ]+$/',$str)){
			return true;
			}
		}
		elseif($rule=="alphaall"){
			if(!preg_match('/^[A-Za-z0-9_.\-+ ]+$/',$str)){
			return true;
			}
		}	
		elseif($rule=="email"){
		if(!preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',$str)){
			return true;
			} 
		}			
		elseif($rule=="ip"){
		if(!preg_match('/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/',$str)){
			return true;
			} 
		}		
		elseif($rule=="url"){
		if(!preg_match('/^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/',$str)){
			return true;
			} 
		}	
		elseif($rule=="hex"){
		if(!preg_match('/^#?([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?$/',$str)){
			return true;
			} 
		}	
		elseif($rule=="float"){
		if(!preg_match('/^[-+]?[0-9]+[.]?[0-9]*([eE][-+]?[0-9]+)?$/',$str)){
			return true;
			} 
		}	
		elseif($rule=="name"){
		if(!preg_match('/^[a-zA-Z]+(([a-zA-Z ])?[a-zA-Z]*)*$/',$str)){
			return true;
			} 
		}	
		elseif($rule=="mac"){
		if(!preg_match('/^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$/',$str)){
			return true;
			}
		}	
		elseif($rule=="creditcard"){
		if(!preg_match('/^((4\d{3})|(5[1-5]\d{2})|(6011)|(7\d{3}))-?\d{4}-?\d{4}-?\d{4}|3[4,7]\d{13}$/',$str)){
			return true;
			}
		}	
		elseif($rule=="safetext"){
		if(!preg_match('/^[a-zA-Z0-9 .\-_,!]+$/',$str)){
			return true;
			}
		}	
		elseif($rule=="english"){
		if(!preg_match('/^[ -~]+$/',$str)){
			return true;
			}
		}	
		elseif($rule=="fullurl"){
		if(!preg_match('/^((((https?|ftps?|gopher|telnet|nntp):\/\/)|(mailto:|news:))(%[0-9A-Fa-f]{2}|[-()_.!~*\';\/?:@&=+$A-Za-z0-9])+)([).!\';\/?:][[:blank:]])?$/',$str)){
			return true;
			}
		}	
		elseif($rule=="imagefile"){
		if(!preg_match('/\w+\.(gif|png|jpg|jpeg)$/i',$str)){
			return true;
			}
		}	
		elseif($rule=="zipfile"){
		if(!preg_match('/\w+\.(zip|gz|rar)$/i',$str)){
			return true;
			}
		}	
			elseif($rule=="pfile"){
		if(!preg_match('/\w+\.(php|txt|js|css|jpg|gif|png)$/i',$str)){
			return true;
			}
		}	
		elseif($rule=="required"){
		if(strlen($str) < 1 ){
			return true;
			}
		}	
		elseif($rule=="mmddyy"){
		if(!preg_match('^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$',$str)){
			$ret['message']= " mmddyy";
			return true;
			}
		}	
		elseif(substr($rule,0,3) == "rx:"){
		if(!preg_match('/^('.$rule.')+$/',substr($rule,3))){
			return true;
			}
		}
		else
		return false;
	}
	
	
public function render_temp($file, $data = array()) {
if (file_exists($file)) {
	extract($data);
	ob_start();
	require($file);
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
} else {
	return false;
}
}
	
private function is_ajax(){
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
$this->show(array("error"=>"xmlhttprequest Request failed..."));
exit;
}
}
else{
$this->show(array("error"=>"Invalid Request..."));
exit;
}	
}



function signup(){
	$this->is_ajax();
$ar = array(
	"email"=>array("valid"=>"required|lt:100|email|invalid email"),
	"username"=>array("valid"=>"required|gt:4|lt:20|alphanum|username"),
	"password"=>array("valid"=>"required|gt:6|lt:15|Password must be between 6 and 15 characters!"),
	"passwordConfirm"=>array("valid"=>"required|gt:6|lt:15|==:{$_POST['password']}|Password confirmation does not match password!")
	);
$er=$this->valid($_POST,$ar);
	
if($er['s'] == 1)
{
	$this->show(array("s"=>1,"url"=>"temp/registration-successful.html"));		
}
$this->show($er);
}


function show($e)
{
header('content-type: application/json; charset=utf-8');
echo json_encode($e);	
exit;	
}
	
}	