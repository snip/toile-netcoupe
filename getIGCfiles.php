#!/usr/bin/php
<?php

$urlListFileName = 'php://stdin';

if (isset($argv[1])) {
  $urlListFileName = $argv[1];
  fwrite(STDERR,"Using '$urlListFileName' as input file.\n");
} else {
  fwrite(STDERR,"No input file specified using STDIN as default.\n");
}

$handle = @fopen($urlListFileName, 'r');

if (!$handle) {
  fwrite(STDERR,"Unable to open '$exportFileName'.\n");
  exit(1);
}

if (isset($argv[2])) {
  $igcDir = $argv[2];
  fwrite(STDERR,"Using '$igcDir' as output firectory for IGC files.\n");
} else {
  fwrite(STDERR,"No output directory specified, using 'igc/'.\n");
  $igcDir = 'igc';
}

@mkdir($igcDir);


while ($buffer = fgets($handle)) {
  if (preg_match('/http:\/\/.+?FileID=(\d+)/',$buffer,$matches)) {
    $outputIGCfileName = $matches[1].'.IGC';
    fwrite(STDERR,"Writing $igcDir/$outputIGCfileName\n");
    $buffer=rtrim($buffer);
    file_put_contents($igcDir.'/'.$outputIGCfileName,file_get_contents($buffer));
    sleep(0.3);
  }
}

fclose($handle);

?>
