<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title><?php echo $title; ?></title>
	<style>
	/* http://meyerweb.com/eric/tools/css/reset/ 
	   v2.0 | 20110126
	   License: none (public domain)
	*/

	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, embed, 
	figure, figcaption, footer, header, hgroup, 
	menu, nav, output, ruby, section, summary,
	time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}
	/* HTML5 display-role reset for older browsers */
	article, aside, details, figcaption, figure, 
	footer, header, hgroup, menu, nav, section {
		display: block;
	}
	body {
		line-height: 1;
	}
	ol, ul {
		list-style: none;
	}
	blockquote, q {
		quotes: none;
	}
	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}
	
	body{
		padding:10px;
	}
	small{
		font-size:small;
	}
	sup{
		vertical-align: top;
		font-size:smaller;
	}
	</style>
  </head>
  <body>
    <?php 

	echo $content; 

	$end = microtime();
	list($s0,$s1) = explode(' ',$begin);
	list($e0,$e1) = explode(' ',$end);
	echo sprintf('<hr><small>this page took %.7f seconds to be generated.',($e0+$e1)-($s0+$s1));
	if(($e0+$e1)-($s0+$s1) < 0.001){
		echo ' => less than a millisecond.';
	}else if(($e0+$e1)-($s0+$s1) < 0.25){
		echo ' => less than &frac14; of a second.';
	}else if(($e0+$e1)-($s0+$s1) < 0.5){
		echo ' => less than &frac12; of a second.';
	}
	else if(($e0+$e1)-($s0+$s1) < 1){
		echo ' => less than a second.';
	}
	echo '</small>';
	?>
  </body>
</html>