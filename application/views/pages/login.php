<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
                            <label for="login_senha" class="control-label col-sm-3">Senha</label>
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
