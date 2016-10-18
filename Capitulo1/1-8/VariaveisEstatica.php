<?php

function percorre($quilometros){
	static $total;
	$total += $quilometros;
	echo "percorreu o total de {$total}<br>\n";
}

percorre(100);
percorre(200);
percorre(50);