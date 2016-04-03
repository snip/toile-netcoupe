toile-netcoupe
==============

bouts de scripts utilisés pour faire un graph de la netcoupe

voir http://www.volavoile.net/index.php?showtopic=10382

Usage:
- Do an export from Netcoupe with default parameters.
- Generate a list of URLs from this exported file:
```
./NetcoupeExport2urlList.php Export_Club.xls Export_Club.urllist
```
- Get all files from Netcoupe and store it in igc/ directory:
```
./getIGCfiles.php Export_Club.urllist igc/
```
- Get infos from all IGC files and generate a csv with consolidated data (count.csv):
```
./igcFiles2csv.php igc/
```
- Generate a png image (out.png) from the csv file (count.csv):
```
./to_png.php
```
- View the output on a map overlay by opening trace.html in a web browser

licence : domaine public
