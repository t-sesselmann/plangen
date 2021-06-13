<?php
# author Tobias Sesselmann
# lastModified 07.09.2018

# ==================== Festlegung der Parameterwerte ==================== 

# Schuljahr
$sj_st = 2018; # Beginn
$sj_fi = 2019; # Ende

# Definition der Klasssen pro Jahrgangsstufe und der Klassenbezeichnungen
$kl = array(0, 0, 0, 6, 4, 4, 4);
$ja_be = array("5", "6", "7", "8", "9", "9p", "10");

# erster Schultag
$fd = mktime(0, 0, 0, 9, 11, $sj_st);
# letzter Schultag
$ld = mktime(0, 0, 0, 7, 26, $sj_fi);

# Herbstferien
$hf = mktime(0, 0, 0, 10, 29, $sj_st); # Beginn
$HF = mktime(0, 0, 0, 11, 2, $sj_st); # Ende

# Weihnachtsferien
$wf = mktime(0, 0, 0, 12, 24, $sj_st); # Beginn
$WF = mktime(0, 0, 0, 1, 4, $sj_fi); # Ende

# Faschingsferien
$ff = mktime(0, 0, 0, 3, 4, $sj_fi); # Beginn
$FF = mktime(0, 0, 0, 3, 8, $sj_fi); # Ende

# Osterferien
$of = mktime(0, 0, 0, 4, 15, $sj_fi); # Beginn
$OF = mktime(0, 0, 0, 4, 26, $sj_fi); # Ende

# Pfingstferien
$pf = mktime(0, 0, 0, 6, 10, $sj_fi); # Beginn
$PF = mktime(0, 0, 0, 6, 21, $sj_fi); # Ende

# unterrichtsfreie Tage im Schuljahr
$ho = array(mktime(0, 0, 0, 10, 3, $sj_st), mktime(0, 0, 0, 11, 21, $sj_st), mktime(0, 0, 0, 5, 1, $sj_fi), mktime(0, 0, 0, 5, 30, $sj_fi));

# Bezeichnung der Klassen
$kl_be = array("A", "B", "C", "D", "E", "F", "G");

# Bezeichnung der Wochentage
$wt = array("Mon" => "Mo", "Tue" => "Di", "Wed" => "Mi", "Thu" => "Do", "Fri" => "Fr");

# Bezeichnung der Monate
$mo_zt = array(9 => "Sep", 10 => "Okt", 11 => "Nov", 12 => "Dez", 1 => "Jan", 2 => "Feb", 3 => "M&auml;r", 4 => "Apr", 5 => "Mai", 6 => "Jun", 7 => "Jul");
$mo_tz = array("Sep" => 9, "Okt" => 10, "Nov" => 11, "Dez" => 12, "Jan" => 1, "Feb" => 2, "M&auml;r" => 3, "Apr" => 4, "Mai" => 5, "Jun" => 6, "Jul" => 7);
?>