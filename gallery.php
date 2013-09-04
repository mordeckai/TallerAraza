<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<!-- MENU -->
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
				<div class="grid_12" id="galeria">
				    <h1>Fotos</h1>
    <?php

		//Set the page name or ID
		$FBid = 'ArazaArtesanias';
		
		//Get the contents of a Facebook page
		$FBpage = file_get_contents('https://graph.facebook.com/'.$FBid.'/albums');
		
		//Interpret data with JSON
		$photoData = json_decode($FBpage);
		
		echo '<ul id="display-inline-block">';
		foreach ( $photoData->data as $data )
		
		{
			echo '<li><a href="getphotos.php?album_id='.$data->id.'"><img class="shadow" src="https://graph.facebook.com/'.$data->id.'/picture/" width=70 border=0 /></a>';
			echo '<br /><a href="getphotos.php?album_id='.$data->id.'">'.$data->name.'</a></li>';
			
		}
		echo '</ul>';
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