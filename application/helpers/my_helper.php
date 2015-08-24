<?php

if (! function_exists('form_view'))
{
    function form_view(CI_Controller $ctrl, $page)
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // exibir erro 404 de página não encontrada
            show_404();
        }

        $data['title'] = ucfirst($page); // Tornar a primeira letra maiúscula

        $ctrl->load->view('templates/header', $data);
        $ctrl->load->view('pages/'.$page, $data);
        $ctrl->load->view('templates/footer', $data);
    }
}