<?
header('Content-Type: text/plain');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="../../Abdo/A.txt"');

// The PDF source is in original.pdf
readfile('A.txt');