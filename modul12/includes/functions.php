<?php  
session_start();

if(!function_exists('e')){
	function e($var){
		echo htmlentities($var);
	}
}

if (!function_exists('redirect')) {
    function redirect($var)
    {
        return header('location: '.$var);
    }
}

if (!function_exists('base_url')) {
    function base_url($str = "")
    {
        $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 's' : '') . '://';
        $url  = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
        return $http . $_SERVER['HTTP_HOST'] . $url . $str;
    }
}

if(!function_exists('post')){
	function post($var){
		return isset($_POST[$var]) ? $_POST[$var] : null;
	}
}

if(!function_exists('get')){
	function get($var){
		return isset($_GET[$var]) ? $_GET[$var] : null;
	}
}

if(!function_exists('validation')){
	function validation($inputs){
		$errors = '';
		foreach ($inputs as $input => $regulations) {
			foreach ($regulations as $regulation => $value) {
				switch ($regulation) {
					case 'required':
						if(post($input) === null || post($input) === '')
							$errors .= '<li>'.$input.' harus diisi</li>';
						break;
					
					case 'numeric':
						if(is_numeric(post($input)))
							$errors .= '<li>'.$input.' harus diisi</li>';
						break;
					case 'min':
						if(strlen(post($input)) < $value){
							$errors .= '<li>'.$input.' minimal '.$value.' karakter</li>';
						}
						break;
					case 'max':
						if(strlen(post($input)) > $value){
							$errors .= '<li>'.$input.' maksimal '.$value.' karakter</li>';
						}
						break;
				}	
			}
		}
		if(!empty($errors)){
			return '<ul class="error">'.$errors.'</ul>';
		}
	}
}