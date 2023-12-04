<?php
function custom_css_minify( $css_input ){
	//$css_input = file_get_contents($file);
	$css_input = str_replace(
		'@media',
		'@media ',(
			str_replace(
				'; ',
				';',
				str_replace(
					' }',
					'}',
					str_replace(
						'{ ',
						'{',
						str_replace(
							array(
								"\r\n",
								"\r",
								"\n",
								"\t",
								'  ',
								'    ',
								'    '
							),
							"",
							preg_replace(
								'!/\*[^*]*\*+([^/][^*]*\*+)*/!',
								'',
								$css_input
							)
						)
					)
				)
			)
		)
	);

	$output = $css_input;
	return $output;
	/*$fp = fopen($css_output, "w");
	fwrite($fp, $output, strlen($output));
	fclose($fp);*/

}

?>