<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <head>
        <base href="<?php echo base_url(); ?>" />
        <title><?php echo $title;?></title>
		<meta name="keywords" content="<?php echo $keywords;?>" />
		<meta name="description" content="<?php echo $description;?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<?php foreach($css as $c){?>
        <link rel="stylesheet" media="screen" type="text/css"  href="<?php echo $c;?>" />
		<?php }?>
        
        
        <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700" rel="stylesheet">	
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/progress.js"></script>
	<script type="text/javascript" src="../js/jquery.marquee.js"></script>
	<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../js/jquery.inview.js"></script>
	<script type="text/javascript" src="../js/checkBrowser.js"></script>
    <script type="text/javascript" src="../js/jquery.ba-bbq.min.js"></script>
	<script type="text/javascript" src="../js/common.js"></script>
    <script type="text/javascript" src="../js/jquery.magnific-popup.js"></script>

    <link rel="shortcut icon" href="../images/favicon.ico">

        
    </head>
    <body class="<?php echo $this->router->method;?>">
        
		<div class="page-wrap registration">
            
            