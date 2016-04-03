#!/usr/bin/php
<?php

$exportFileName = 'Export_Club.xls';

if (isset($argv[1])) {
  $exportFileName = $argv[1];
  fwrite(STDERR,"Using '$exportFileName' as input file.\n");
} else {
  fwrite(STDERR,"No input file specified, using default '$exportFileName'.\n");
}

$handle = @fopen($exportFileName, 'r');

if (!$handle) {
  fwrite(STDERR,"Unable to open '$exportFileName'.\n");
  exit(1);
}

if (isset($argv[2])) {
  $urlListFileName = $argv[2];
  fwrite(STDERR,"Using '$urlListFileName' as output file.\n");
} else {
  fwrite(STDERR,"No output file specified, using STDOUT.\n");
  $urlListFileName = 'php://stdout';
}

$outputHandle = @fopen($urlListFileName, 'w');

while ($buffer = fgets($handle)) {
  // String to match from Export file
  //         <td nowrap>http://archive2015.netcoupe.net/Download/DownloadIGC.aspx?FileID=35767                         </td>
  if (preg_match('/<td nowrap>(http:\/\/.+\d)/',$buffer,$matches)) {
    fwrite($outputHandle,$matches[1]."\n");
  }
  //echo $buffer;
}

fclose($outputHandle);
fclose($handle);

?>
