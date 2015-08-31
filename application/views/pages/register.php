<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div id="painel_formulario" class="page panel-success">
            <div id="painel_cabecalho" class="panel-heading">
                <h1>Tarefa de Casa<small> / Cadastro </small></h1>
            </div>
            <div class="panel-body">
                <form id="form_register" class="form-horizontal" action="<?php echo base_url('user/register'); ?>" method="post">
                    <div class="form-group">
                        <label for="nome" class="control-label col-sm-3">Nome</label>
                        <div class="col-sm-7">
                            <input id="nome" class="form-control" name="nome" type="text" maxlength="15" placeholder="Nome" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-sm-3">E-mail</label>
                        <div class="col-sm-7">
                            <input id="email" class="form-control" name="email" type="email" maxlength="50" placeholder="E-mail" required />
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
                        <label for="confirm_password" class="col-sm-3 control-label">Código</label>
                        <div class="col-sm-7">
                            <img id="img_captcha" src="<?php echo base_url('captcha/'.@$filename); ?>" alt="Código captcha" title="Código captcha"/>
                            <img id="img_refresh" src="<?php echo base_url('images/refresh.png'); ?>" onclick="refreshCaptcha()" alt="Atualizar código" title="Atualizar código"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="col-sm-3 control-label">Código</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="codigo_captcha" maxlength="6" placeholder="Digite o Código aqui" required />
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
