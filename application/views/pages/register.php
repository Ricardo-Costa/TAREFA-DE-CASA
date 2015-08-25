<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div id="painel_login" class="page panel-success">
            <div class="panel-heading">
                <h1>Tarefa de Casa<small> / Cadastro </small></h1>
            </div>
            <div class="panel-body">
                <form id="form_login" class="form-horizontal" action="<?php echo base_url('user/register'); ?>" method="post">
                    <div class="form-group">
                        <label for="nome" class="control-label col-sm-3">Nome</label>
                        <div class="col-sm-7">
                            <input id="nome" class="form-control" name="nome" type="text" maxlength="15" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sobrenome" class="control-label col-sm-3">Sobrenome</label>
                        <div class="col-sm-7">
                            <input id="sobrenome" class="form-control" name="sobrenome" type="text" maxlength="15" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-sm-3">E-mail</label>
                        <div class="col-sm-7">
                            <input id="email" class="form-control" name="email" type="email" maxlength="50" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="control-label col-sm-3">Senha</label>
                        <div class="col-sm-7">
                            <input id="password" type="password" class="form-control" maxlength="15" pattern=".{8,15}" title="8 a 15 caracteres" name="senha" placeholder="Senha" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="col-sm-3 control-label">Confirmar senha</label>
                        <div class="col-sm-7">
                            <input id="confirm_password" type="password" class="form-control" name="confirme_senha" pattern=".{8,15}" title="8 a 15 caracteres" maxlength="15" placeholder="Repita a senha" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-7">
                            <input type="submit" class="form-control btn-success" value="Cadastrar"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <?php echo anchor(base_url(), 'Realizar login.'); ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
