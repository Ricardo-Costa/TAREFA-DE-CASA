<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tarefa-de-Casa</title>

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

<!-- inicio -->
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div id="painel_login" class="page panel-success">
                <div class="panel-heading">
                    <h1>Tarefa de Casa<small></small></h1>
                </div>
                <div class="panel-body">
                    <form id="form_login" class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="login_email" class="control-label col-sm-3">E-mail</label>
                            <div class="col-sm-7">
                                <input id="login_email" class="form-control" name="email" type="text" maxlength="60" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login_senha" class="control-label col-sm-3">E-mail</label>
                            <div class="col-sm-7">
                                <input id="login_senha" class="form-control" name="senha" type="password" maxlength="20" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7">
                                <input type="submit" class="form-control btn-success" value="Login"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7">
                                <a href="#">Esqueceu sua senha?</a>
                            </div>
                        </div>
                    </form>
                    <br/>
                    <br/>
                    <div>
                        <em>Albert Einstein</em>
                        <blockquote>
                            <small>A mente que se abre a uma nova idéia jamais voltará ao seu tamanho original.</small>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!-- Outros -->
<script src="<?php echo base_url(); ?>js/customize.js"></script>
</body>
</html>