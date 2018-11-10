<?php


	// $share = [];
	$share['url'] = get_permalink();
	// $share['url'] = $_SERVER['REQUEST_SCHEME'] . '://' . 'www.socklint.com' . $_SERVER['REQUEST_URI'];
	$share['title'] = $data[0]->title;
	$share['body'] = 'Check out “' . $share['title'] . '” on World Series of Esports at <' . $share['url'] . '>.';
	$share['tweet'] = 'Check out “' . $share['title'] . '” on World Series of Esports at ' . $share['url'] . ' #wsoe #esports';
	foreach ($share as $item){
		$item = urlencode($item);
		$item = str_replace('#', '%35', $item);
	}
	$share['url'] = urlencode($share['url']);
	$share['title'] = urlencode($share['title']);
	$share['body'] = urlencode($share['body']);
	$share['tweet'] = urlencode($share['tweet']);
	$share['url'] = str_replace('+', '%20', $share['url']);
	$share['title'] = str_replace('+', '%20', $share['title']);
	$share['body'] = str_replace('+', '%20', $share['body']);
	$share['tweet'] = str_replace('+', '%20', $share['tweet']);
?>

			<a href="mailto:?Subject=<?php echo $share['title'] ?>&amp;body=<?php echo $share['body']; ?>"><i class="fas fa-envelope"></i></a>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share['url'] ?>&amp;src=sdkpreparse" target="_blank"><i class="fab fa-facebook-f"></i></a>
			<a href="https://twitter.com/intent/tweet?text=<?php echo $share['tweet'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>