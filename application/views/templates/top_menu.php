<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav id="custom-bootstrap-menu" class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo anchor(base_url(), SYS_TITLE, array('class' => 'navbar-brand'))?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><?php echo anchor(base_url('inicio'), 'Início'); ?></li>
                <li>
                    <?php
                    switch($this->session->type) {
                        case USER_ADMIN: // TODO - Realizar configurações / Administrador
                            break;

                        case USER_TEACHER: // TODO - Criar ou Editar (Dropdown) novas atividades / Professor
                            break;

                        case USER_STUDENT: // TODO - Atividades pendentes do aluno (Dropdown)
                            // echo anchor('user/activities', 'Suas Atividades');
                            ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Suas Atividades <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Pendentes</a></li>
                            <li><a href="#">Em andamento</a></li>
                            <li><a href="#">Concluidas</a></li>
                        </ul>
                    </li>
                            <?php
                            break;
                        default :
                            echo '<a href="#">Link</a>';
                    }
                    ?>
                </li>
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                        switch ($this->session->type) {
                            case USER_ADMIN: echo '<span class="glyphicon glyphicon-star"></span>'; break;
                            case USER_STUDENT: echo '<span class="glyphicon glyphicon-user"></span>'; break;
                            case USER_TEACHER: echo '<span class="glyphicon glyphicon-edit"></span>'; break;
                        }
                        ?> <?php echo $this->session->username; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('user/profile'); ?>">Perfil</a></li>
                        <li><a href="<?php echo base_url('user/notification'); ?>">Notificações</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url('user/logout'); ?>">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>