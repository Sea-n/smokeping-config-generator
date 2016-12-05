<?php
require('config.php');

echo '*** Targets ***

probe = FPing

menu = Top
title = Smokeping 網路延遲圖表
remark = 由 Sean 所維護，記載與各大服務間的 ping 延遲

';
echo createConfig(CONFIG);


function createConfig($data, string $prefix = '', int $seq = 1): string {
	$result = '';
	foreach ($data as $key => $val) {
		if (is_array($val)) {
			$result .= str_repeat('+', $seq) . " $key\nmenu = $key\ntitle = $key\nhost = " . getHosts("$prefix/$key", $val) . "\n\n";
			$result .= createConfig($val, "$prefix/$key", $seq+1);
		} else
			$result .= str_repeat('+', $seq) . " $key\nmenu = $key\ntitle = $key\nhost = $val\n\n";
	}
	return $result;
}

function getHosts(string $prefix, array $config): string {
	$result = '';
	foreach ($config as $key => $val) {
		if (is_array($val))
			$result .= getHosts("$prefix/$key", $val) . " \\\n";
		else
			$result .= "$prefix/$key \\\n";
	}
	$result = substr($result, 0, -3);
	return $result;
}
