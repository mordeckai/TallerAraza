<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="CSS/style.css" type="text/css" media="screen">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Araza Artesanías</title>
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"> 
    <link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen"> 
    <link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container clearfix">
    <!-- TITULO -->
		<div id="logo" class="grid_4">
			<object data="img/logo.svg" type="image/svg+xml" class="logo">
				<!--[if lte IE 8 ]-->
				<img src="img/logo.gif" alt="Araza Artesanías">
				<!--![endif]-->
			</object>
		</div>
        <div id="title" class="grid_8 omega">
        	<img src="img/title.png" width="100%" />
        </div>
<!-- MENNU -->
			<div id="nav" class="grid_8 omega">
            	<ul>
					<li class="index"><a href="index.html">Inicio</a></li>
                	<li class="donde"><a href="donde.html">¿Dónde?</a></li>
                	<li class="gallery"><a href="gallery.php">Galería</a></li>
                	<li class="contact"><a href="contact.html">Contacto</a></li>
                </ul>
		    </div>
<!-- CONTENIDO -->
		<div id="main">
			<div class="grid_12 omega" id="galeria">
    			<h1>Fotos</h1>
    
<?php
	//Get the contents of the album data page
	$rawAlbumData = file_get_contents('https://graph.facebook.com/'.$_GET['album_id'].'/photos');
	//Interpret data with JSON
	$photoData = json_decode($rawAlbumData);
	
	echo '<ul id="display-inline-block">';
	function timeSince($original) {
    // Array of time period
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
    );
    
	// Current time
    $today = time();   
    $since = $today - $original;
    
    // $j saves performing the count function each time around the loop
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        
        // finding the biggest chunk (if the chunk fits, break)
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }
    
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    
    if ($i + 1 < $j) {
        // now getting the second item
        $seconds2 = $chunks[$i + 1][0];
        $name2 = $chunks[$i + 1][1];
        
        // add second item if it's greater than 0
        if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
            $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        }
    }
    return $print;
}

	foreach ( $photoData->data as $data )
		{
			echo '<li><a href="'.$data->source.'" rel="lightbox" title="';
				if (property_exists($data, "comments")) {
					foreach ( $data->comments->data as $Cdata )
						{
							echo htmlentities('<li class="imgcomments">
											  <a href="http://www.facebook.com/people/@/'.$Cdata->from->id.'"	 target="_blank">								                                	          <img src="https://graph.facebook.com/'.$Cdata->from->id.'/picture" align=left border=0 />
											  </a>&nbsp;
											  <a href="http://www.facebook.com/people/@/'.$Cdata->from->id.'" target="_blank">
											  <b>'.$Cdata->from->name.'</a>: </b>'.$Cdata->message.'<br />
											  <div align="left" style="padding-bottom:10px;">
											  <small>&nbsp;Posted '.timeSince(strtotime($Cdata->created_time)).' ago</small></div>		                                    	     </li>');
						}
				}
				else {
					echo 'No hay comentarios';
					}
			echo '"><img class="shadow" src="'.$data->picture.'" width=70 border=0 /></a></li>';
			}

	    
	echo '</ul>';	

	//Get data about the photo album
	$rawCommentData = file_get_contents('https://graph.facebook.com/'.$_GET['album_id']);
	//Interpret comment data with JSON
	$commentData = json_decode($rawCommentData);
	
	echo '<div class="comments">';
	echo '<h2>Album Comments</h2>';
	
	if ( $commentData->comments->data ) {


		foreach ( $commentData->comments->data as $data )
		{ 
	 		echo '&nbsp;<a href="http://www.facebook.com/people/@/'.$data->from->id.'" target="_blank"><b>'.$data->from->name.'</a>: </b>'.$data->message.'<br/><div align="left" style="padding-bottom:10px;"><small>&nbsp;Posted '.timeSince(strtotime($data->created_time)).' ago</small></div></li>';		
			}
	} 
		else {
			echo 'There are no comments on this album';
		}
	echo '</div>'; 
	
	?>
			</div>
		    <div class="clear"></div>
		</div>
		<div class="grid_12" id="bottom">
    	<div class="grid_6">
		<h3>Seguinos en Facebook</h3>
			<iframe height="100%" width="100%" src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/pages/Araza-Artesanias/150463431636129?ref=ts&fref=ts"
					scrolling="no" 
                    frameborder="0"
                    style="border:none">
                </iframe>
        </div>
		<div class="grid_5">
        	<h3>Taller Araza Showroom</h3>
				<p>Local: 2682 48 50<br>Email us: <a href="#">araza.artesanias@gmail.com</a></p>
					<address>
						Avenida Ing. Luis Giannattasio, Manzana 31 Solar 15<br>Ciudad de la Costa, Canelones
					</address>

        </div>
		</div>

	</div>
</body>
</html>