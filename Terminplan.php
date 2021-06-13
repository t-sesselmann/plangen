<?php
# author Tobias Sesselmann
# lastModified 07.09.2018

# Dieses Skript generiert einen Terminplan für das Schuljahr.
# Samstage und Sonntage werden im Kalender nicht dargestellt.

# ==================== Festlegung der Parameterwerte ==================== 

require_once( "config.php" );

# ==================== Start des Programmes ==================== 

# Bestimmung der Anzahl der Spalten
$sp = 0;
for($i=0; $i<sizeof($kl); $i++) {
	$sp = $sp + $kl[$i];
}

# Zähler für unterrichtsfreie Tage
$uFc = 0;

foreach($mo_zt as &$m) {
	?>
	<!-- <?php echo $m ?> -->
	<table style="border: 1px solid black;">
	<tr>
		<td style='text-align: center; background-color: green; border: 1px solid black;' colspan='2'><b><?php echo $m; ?></b></td>
		<td style='text-align: center; background-color: yellow; border: 1px solid black; border-left: 4px solid black;' width='28px'><b>Projekte&nbsp;und&nbsp;sonstige&nbsp;Veranstaltungen</b></td>
	</tr>
	<?php
	# Jahreswechsel
	if(strcmp($m, "Jan") == 0) {
		$sj_st++;
	}
	for($k=1; $k<=date("t", mktime(0, 0, 0, $mo_tz[$m], 1, $sj_st)); $k++) {
		if(	strcmp("Sat", date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))) != 0 && 
			strcmp("Sun", date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))) != 0 && 
			mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st) >= $fd && mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st) <= $ld) {
			?>
			<tr>
				<?php
				# Prüfung, ob ein unterrichtsfreier Tag vorliegt
				if( strcmp("Mon", date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))) == 0 ) {
					$uFc = 0;
				}
				$uf = false;
				foreach($ho as &$h) {
					if(date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) == $h) {
						$uf = true;
					}
				}
				if(date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) >= $hf && date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) <= $HF) {
					$uf = true;
				}
				if(date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) >= $ff && date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) <= $FF) {
					$uf = true;
				}
				if(date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) >= $wf && date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) <= $WF) {
					$uf = true;
				}
				if(date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) >= $of && date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) <= $OF) {
					$uf = true;
				}
				if(date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) >= $pf && date("U", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st)) <= $PF) {
					$uf = true;
				}
				if( $uf == true ) {
					$uFc++;
				}
				?>
				<td style='border: 1px solid black;<?php if( strcmp("Fri", date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))) == 0 && ( $uFc <= 5 || $uFc == $k ) ) { ?>border-bottom: 4px solid black;<?php } ?>' valign='top'><?php echo $k; ?></td>
				<td style='border: 1px solid black;<?php if( strcmp("Fri", date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))) == 0 && ( $uFc <= 5 || $uFc == $k ) ) { ?>border-bottom: 4px solid black;<?php } ?>' valign='top'><?php echo $wt[date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))]; ?></td>
				<?php
				if( $uf == true ) {
					?>
					<td style='border: 1px solid black; border-left: 4px solid black; text-align: center;<?php if( strcmp("Fri", date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))) == 0 && ( $uFc == 5 || $uFc == $k ) ) { ?>border-bottom: 4px solid black;<?php } ?>' colspan='<?php echo $sp; ?>'><b>unterrichtsfrei</b></td>
					<?php
				} else {
					?>
					<td style='border: 1px solid black; <?php if( strcmp("Fri", date("D", mktime(0, 0, 0, $mo_tz[$m], $k, $sj_st))) == 0 && $uFc <= 5 && $uFc != $k) { ?>border-bottom: 4px solid black;<?php } ?> border-left: 4px solid black;' valign='top'>&nbsp;</td>
					<?php
				}
				?>
			</tr>
			<?php
		}
	}
	?>
	</table>
	<br />
	<?php
}
?>