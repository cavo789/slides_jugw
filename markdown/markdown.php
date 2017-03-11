<?php 

/**
* Safely read posted variables
*
* @param type $name          f.i. "password"
* @param type $type          f.i. "string"
* @param type $default       f.i. "default"
* @return type
*/
function getParam(string $name,	string $type = 'string', $default = '',	bool $base64 = false,int $maxsize = 0) 
{
  
	$tmp='';
	$return=$default;
  
	if (isset($_POST[$name])) {
		if (in_array($type, array('int','integer'))) {
			$return=filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT);
		} elseif ($type=='boolean') {
			// false = 5 characters
			$tmp=substr(filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING), 0, 5);
			$return=(in_array(strtolower($tmp), array('on','true')))?true:false;
		} elseif ($type=='string') {
			$return=filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
			if ($base64===true) {
				$return=base64_decode($return);
			}
			if ($maxsize>0) {
				$return=substr($return, 0, $maxsize);
			}
		} elseif ($type=='unsafe') {
			$return=$_POST[$name];
		}
	} else { // if (isset($_POST[$name]))
 
		if (isset($_GET[$name])) {
			if (in_array($type, array('int','integer'))) {
				$return=filter_input(INPUT_GET, $name, FILTER_SANITIZE_NUMBER_INT);
			} elseif ($type=='boolean') {
				// false = 5 characters
				$tmp=substr(filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING), 0, 5);
				$return=(in_array(strtolower($tmp), array('on','true')))?true:false;
			} elseif ($type=='string') {
				$return=filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING);
				if ($base64===true) {
					$return=base64_decode($return);
				}
				if ($maxsize>0) {
					$return=substr($return, 0, $maxsize);
				}
			} elseif ($type=='unsafe') {
				$return=$_GET[$name];
			}
		} // if (isset($_GET[$name]))
	} // if (isset($_POST[$name]))
  
	if ($type=='boolean') {
		$return=(in_array($return, array('on','1'))?true:false);
	}
  
	return $return;
} // function getParam()
	
// Max size 20	
$folder=getParam('folder', 'string', '', false, 20);
// Sanitize : keep only letters, figures, minus and underscore; nothing else
$folder = preg_replace('/[^-a-zA-Z0-9_]/', '', $folder);	

if (!file_exists($filename=dirname(dirname(__FILE__)).'/slides/'.$folder.'/summary.md')) 
{
	die('Sorry, the file '.$folder.'/summary.md doesn\'t exists.');
}

// Load the template


// Load the markdown $filename

$markdown=file_get_contents($filename);

require_once(dirname(__FILE__).'/parsedown/Parsedown.php');
$Parsedown=new \Parsedown();
$summary=$Parsedown->text($markdown);
unset($Parsedown);

// Try to find a heading 1 and if so use that text for the title tag of the generated page
$matches=array();
try {
	preg_match_all('/<h1>(.*)<\/h1>/', $summary, $matches);
	if (count($matches[1])>0) {
		$title=((count($matches)>0)?rtrim(@$matches[1][0]):'');
	} else {
		$title='';
	}
} catch (Exception $e) {
}

/*
 * Create a table of content.  Loop each h2 and h3 and add an "id" like "h2_1", "h2_2", ... that will then
 * be used in javascript (see https://css-tricks.com/automatic-table-of-contents/)
 */

$matches=array();
$arr=array('h2','h3');

foreach ($arr as $head) 
{

	try {	
		preg_match_all('/<'.$head.'>(.*)<\/'.$head.'>/', $summary, $matches);
		if (count($matches[1])>0) {
			
			$i=0;
			
			$goTop='<a class="btnTop" href="#top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>';
			
			foreach ($matches[1] as $key=>$value)
			{
				$i+=1;
				$summary=str_replace('<'.$head.'>'.$value.'</'.$head.'>',$goTop.'<'.$head.' id="'.$head.'_'.$i.'">'.$value.'</'.$head.'>',$summary);
			}
		}
	} catch (Exception $e) {
	}
}

// Transform the HTML generated by Parsedown
$summary=str_replace('<ul>','<ul class="fa-ul">',$summary);
$summary=str_replace('<li>','<li><i class="fa-li fa fa-joomla"></i>',$summary);

$summary=str_replace('<img src="','<img class="fullimg hidden-xs hidden-sm" src="../slides/'.$folder.'/',$summary);


// And use our own template
$tmpl=file_get_contents('screen.php');
$html=str_replace('%CONTENT%',$summary,$tmpl);
$html=str_replace('%TITLE%',$title,$html);

// And output the html
echo $html;