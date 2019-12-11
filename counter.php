<?php

class counter {
    var $file = 'hits.txt';  
                
    function counter()
    {
        $this->readFile();
        $this->writeFile();
    }
     
    function readFile()
    {
        $hiti = fopen($this->file, "r");
        while(!feof($hiti)){
            $this->$hits .= fgets($hiti,128);
        }
        $this->$hits=1+$this->$hits;
        echo $this->$hits;
        fclose($hiti);
    }
     
    function writeFile()
    {
        $hito = fopen($this->file,"w+");
        fputs($hito,$this->$hits);
        fclose($hito);
    }
     
}
// Usage
// $count = new counter;
?>