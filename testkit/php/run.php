<?php
/**
 * Runs by terminal the indicated template system.
 * @see  php run.php -h 
 * @version 1.0 beta1
 * @author P P Krauss and collaborators at https://github.com/ppKrauss/habemus-papam
 * @licence MIT
 *
 * USE EXAMPLES:
 *   php run.php -h
 *   php run.php --mst -o 
 *   php run.php --mst -m 
 *   php run.php --xsl -o
 *   php run.php --xsl -s
 */

// // CONFIG:
  $_outputPath = '../../_result/php';
  $types    = array('o'=>'official', '2'=>'official2', 'm'=>'multilingual', 's'=>'simple');
  $tplExts  = array('xsl','mst','sst','ssc'); // template-file extensions
// // //

$opt = array_keys( getopt('homs',$tplExts) );
$tpl = array_pop($opt);
if (strlen($tpl)==1) {
	$type = $tpl;	
	$tpl = array_pop($opt);
} else
	$type = array_pop($opt);
$type = isset($types[$type])? $types[$type]: 'h';
if ($type=='h') die("\n Runs the indicated (flag+option) template and processor.
	-h help
	-o official
	-m multilingual
	-s simple
	-2 official2
	--xsl XSLT templates
	--mst Mustache templates
	--sst Simplest PHP templates
	--php Pure PHP templates
	--ssc Simplest-C templates\n
");

$input = "../../_cache/habemus-papam.php";  // can change to more adequate one
switch ($tpl) {
	case 'sst':
		include($input); // redefine	
		$template = "../../templates/$type.sst";
		$OUT = SstTS_templateProcessor($input,$template);
		break;

	case 'mst':
		include($input); // redefine
		$input = array('table'=>$input);
		$template = "../../templates/$type.mst";
		$OUT = MST_templateProcessor($input,$template);
		break;

	case 'xsl':
		$input = "../../_cache/habemus-papam.xml";
		$template = "../../templates/$type.xsl";
		$OUT = XSL_templateProcessor($input,$template);
		break;

	default: // XSLT
		die( "\nERROR 2: unknowed template, use -h\n" );
} // switch

$fout = "$_outputPath/{$tpl}_{$type}.htm";
file_put_contents($fout,$OUT);
print "\n Ok, see $fout\n";


// // // // // // // // // // 
// // // //  LIB  // // // //


// // //  BEGIN:TPLPROCESSORS // // //

/**
 * XSLT template processor, use PHP's driver for libxml2.
 * @param $fxml string input XML filename.
 * @param $fxsl string XSLT filename.
 * @return string XML or HTML.
 */
function XSL_templateProcessor($fxml,$fxsl) {
	$xmldoc = DOMDocument::load($fxml);
	$xsldoc = DOMDocument::load($fxsl);
	$proc = new XSLTProcessor();
	$proc->registerPHPFunctions();  // for official2.
	$proc->importStyleSheet($xsldoc);
	return $proc->transformToXML($xmldoc);
}

/**
 * Mustache template processor, installed by
 *  git clone https://github.com/bobthecow/mustache.php.
 * @param $input array.
 * @param $fmst string Mustache template filename.
 * @return string XML or HTML.
 */
function MST_templateProcessor($input,$fmst) {
	// see https://github.com/bobthecow/mustache.php/wiki
	require('../../../mustache.php/src/Mustache/Autoloader.php');
	Mustache_Autoloader::register();
	$m = new Mustache_Engine;
	return $m->render( file_get_contents($fmst), $input );	
}

/**
 * SstTS template processor, see lib of tools bellow.
 * @see https://github.com/ppKrauss/smallest-template-system
 * @param $input array.
 * @param $ftpl string SstTS template filename.
 * @return string XML or HTML.
 */
function SstTS_templateProcessor($input,$ftpl) {
	$T = file_get_contents($ftpl);
	// não faz loop... precisa de recurso para loop
	return sst_expandVars($T,$input, $prefix='\$', $lazy);
}

// // //  END:TPLPROCESSORS // // //


// // //  BEGIN:TOOLS // // //

function SstTS_expandVars($T,$X, $prefix='\$', $lazy=0) { // it is a Template Processor!
    return preg_replace_callback(
        "/$prefix([a-z][a-z0-9_]*)/i",
        function($m,$X=NULL) use ($X) {
            return array_key_exists($m[1],$X)? $X[$m[1]]: ($lazy? $m[0] :'');
        },
        $T
    );
}


?>
