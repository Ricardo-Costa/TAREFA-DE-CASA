<?php

if (! function_exists('getExternalPages'))
{
    /**
     * @function getExternalPages - Solicitar páginas que podem ser acessadas externamente,
     * sem  a necessidade de login
     *
     * @return array
     */
    function getExternalPages()
    {
        return array(
            'login', 'register', 'about'
        );
    }
}

if (! function_exists('form_view'))
{
    function form_view(CI_Controller $ctrl, $page, $logged_in = false)
    {
        // enviar mensagem de alerta para a página
        $data['alert'] = null;

        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
            // exibir erro 404 de página não encontrada
            show_404();
        }
        /* Verificar se usuário está logado - E se possui permissão de acesso a página solicitada */
        elseif(! $logged_in and (! in_array($page , getExternalPages()))) {
            // redirecionar para a página de login
            $page = 'login';
            // indicar tipo de alerta [ Os valores são referentes as classes do Bootstrap -
            // http://getbootstrap.com/components/#alerts ]
            $data['alert'] = 'alert-danger';
            // mensagem a ser passada
            $data['message'] = 'Você deve realizar o login para acessar esta página.';
        }

        $data['title'] = ucfirst($page); // Tornar a primeira letra maiúscula

        $ctrl->load->view('templates/header', $data);
        $ctrl->load->view('pages/'.$page, $data);
        $ctrl->load->view('templates/footer', $data);
    }
}