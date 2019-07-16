<?php 
    $imeStranice=$_SERVER['PHP_SELF'];
    $upit ="SELECT * FROM head WHERE ime=:ime";
    $stmt=$connection->prepare($upit);
    $stmt->bindParam(":ime",$imeStranice);
    try{
        $stmt->execute();
        $rezultat=$stmt->fetch();
    }catch(PDOExcetion $e){
        die($e->getMessage);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $rezultat->description?>">
    <meta name="description" content="<?= $rezultat->keywords?>">
    <meta name="author" content="Stefan Stankovic 97/16">
    <title><?= $rezultat->title?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
   <!-- <link rel="shortcut icon" href="images/ico/favicon.ico">-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="icon" href="images/logo.ico">
</head><!--/head-->

<body>