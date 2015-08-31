<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Tarefa de Casa - <?php echo @$title; ?></title>

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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- Outros -->
    <script src="<?php echo base_url(); ?>js/customize.js"></script>
</head>
<body>
<?php

/** Exibir menu principal de páginas internas */
if($this->session->logged_in) {
    include 'top_menu.php';
}
/** Exibir mensagens de alerta das páginas */
if((! empty($alert)) and (! empty($message))){

    // Mais references e informações em  -> http://getbootstrap.com/components/#alerts
    echo '<div class="container">';
    echo '<p class="alert msg_alert alert-dismissible fade in '. $alert .'" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">×</span></button>'. $message .'</p>';
    echo '</div>';
}

?>
<div id="cont_main" class="container"><!-- .container -->
    <div class="row"> <!-- .row 1 -->
<?php

/** Corpo da página - Exibir se usuário estiver  logado */
if($this->session->logged_in) {
?>
        <div class="well">
<?php

}

?>