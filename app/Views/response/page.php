<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$code;?> - <?=$message;?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
	<style>
        *{
            transition: all 0.6s;
        }

        html {
            height: 100%;
        }

        body{
            font-family: 'Arvo', sans-serif;
            color: #888;
            margin: 0;
        }

        #main{
            display: table;
            width: 100%;
            height: 100vh;
            text-align: center;
        }

        .fof{
            display: table-cell;
            vertical-align: middle;
        }

        .fof h1{
            font-size: 30px;
            display: inline-block;
            padding-right: 12px;
            animation: type .5s alternate infinite;
        }

        .link_404{			 
            color: #fff!important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }

        @keyframes type{
            from{box-shadow: inset -3px 0px 0px #888;}
            to{box-shadow: inset -3px 0px 0px transparent;}
        }
	</style>
</head>
<body>
    <div id="main">
    	<div class="fof">
            <center>
                <img src="<?=base_url();?>/public/assets/image/<?=$image;?>" alt="">
            </center>
        	<h3><?=$message;?></h3>
            <p><?=$desc;?></p>
            <a type="button" class="link_404" onclick="window.history.back();">Back</a>
    	</div>
    </div> 
</body>
</html>
