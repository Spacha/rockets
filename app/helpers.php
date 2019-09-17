<?php

function assetVersion($file) {
	$manifestPath = ROOT_PATH . '/public/mix-manifest.json';
	
	if (!file_exists($manifestPath))
		return $file;

	$manifest = @json_decode(
		file_get_contents($manifestPath)
	);

	if (empty($manifest) || !property_exists($manifest, $file))
		return $file;

	return $manifest->$file;
}
