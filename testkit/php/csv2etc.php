<?php
/**
 * Converts the CSV file into an JSON, XML or PHP files.
 * (any other convertion must use http://csvkit.rtfd.org/)
 * @see  php csv2etc.php -h 
 * @version 1.0 beta1
 * @author P P Krauss and collaborators at https://github.com/ppKrauss/habemus-papam
 * @licence MIT
 */

// // CONFIG:
  $_outputFile = '../../_cache/habemus-papam';
  $_strut = json_decode( file_get_contents('../../datapackage.json'), true);
// // 
$opt = array_pop(array_keys( getopt('hxjp') ));
if (!$opt || $opt=='h') die("
   -h help
   -p PHP format
   -j JSON format
   -x XML format\n
");

$fields = array_column($_strut['resources'][0]['schema']['fields'], 'name');
$fcsv = "../../{$_strut['resources'][0]['path']}";

$all = array();
$n=0;
foreach (getStdCSV($fcsv) as $row) {
  if ($n && $row[0]) {
    $all[$n] = array();  
    foreach($fields as $idx=>$f) 
      $all[$n][$f] = $row[$idx];
  } elseif (!$n && $row!=$fields) {
    echo "\nERROR: fields not match first CSV line,";
    print_r($fields);
    print_r($row);
    die("\n");
  }
  $n++;
}// foreach

switch ($opt) {
  case 'p':
    $fout = "$_outputFile.php";
    $output = "<?php\n\$input = ". var_export($all,true) .";\n";
    break;

  case 'j':
    $fout = "$_outputFile.json";
    $output = json_encode($all);  // JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | ...
    break;

  case 'x':
    $fout = "$_outputFile.xml";
    $output = xml_encode($all);
    break;
  
  default:
    die("\nERROR 2: unknowed option, use -h\n");
}

file_put_contents($fout, $output);
print "\n Ok, see $fout\n";


// // // // // // // // // // 
// // // //  LIB  // // // //

function getStdCSV($fcsv) {
  return array_map("str_getcsv", explode("\n", file_get_contents($fcsv)));
}

function xml_encode($strut) {
  // or use  SimpleXMLElement() as suggested by http://stackoverflow.com/a/29214164/287948
  $OUT = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>'.
        "\n<!-- CSV data converted by csv2etc.php -->".
        "\n<table>";
  foreach ($strut as $row) { // ops need escape \" of $v! 
    $OUT.= "\n\t<row"; {foreach($row as $k=>$v) $OUT.= " $k=\"$v\"";} $OUT.= "/>\n";
  }
  $OUT .= "\n</table>\n";
  return $OUT;
}

?>


