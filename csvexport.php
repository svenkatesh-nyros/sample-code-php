<?php

// $data needs to array of data.

function convertToExcelCSV($data) {
    if(!is_array($data)) { return ''; }
    $csv = '';
    foreach($data as $record) {
      if(is_array($record)) {
        $csv .= convertArrayToCSV($record) . "rn";
      }
    }
    return $csv;
}
 
// convert an array to csv
function convertArrayToCSV($record) {
    if(!is_array($record)) { return ''; }
    $ret = '';
    foreach($record as $field) {
      if (is_array($field)) {
        
        $ret .= convertArrayToCSV($field);
      }
      else {
        // if field has double quotes or commas
        if (strpos($field,'"')!==false || strpos($field,',')!==false) {
          $ret .= '"' . str_replace('"','""',$field) . '"';
        }
        else {
          $ret .= $field;
        }
      }
      // comma separated values
      $ret .= ',';
    }
    // strip last comma
    return substr($ret, 0, strlen($ret)-1);
}
 
?>