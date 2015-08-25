<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tarefa de Casa - <?php echo $title; ?></title>

    <!-- CSS -->

    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap -->
    <link href="<?php echo base_url() ?>css/customize.css" rel="stylesheet"><!-- Outros -->

    <!-- JavaScript -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php
/** @if - Exibir mensagens de alerta na página */
if((! empty($alert)) and (! empty($message))){
    echo '';
    // references http://getbootstrap.com/components/#alerts
    echo '<p class="alert msg_alert '. $alert .'" role="alert" onclick="closeAlertMsg()">'. @$message .'</p>';
}
?>
<!-- inicio -->
<div class="container">