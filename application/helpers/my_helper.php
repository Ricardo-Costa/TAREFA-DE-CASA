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
    /**
     * @function - Construir estrutura da página a ser exibida e repassar variáveis na 'View'
     *
     * @param CI_Controller $ctrl
     * @param $page
     * @param bool|false $logged_in
     * @param array $data
     */
    function form_view(CI_Controller $ctrl, $page, $logged_in = false, $data = array())
    {
        // redirecionar usuário para páginas internas caso ele esteja logado
        if($logged_in and (in_array($page, getExternalPages())) and $page != 'about'){
            redirect(base_url('inicio'), 'location', 301);
        }

        // enviar mensagem de alerta para a página
        if(! isset($data['alert'])){
            $data['alert'] = null;
        }

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

if(! function_exists('removeAccents'))
{
    /**
     * @function removeAccents - Função para remover acentos de uma string
     * @param $string
     * @return mixed|string
     *
     * (Obs: A função original foi modificada para ser usada neste projeto.
     * A mesma foi desenvolvida por @autor Thiago Belem <contato@thiagobelem.net>
     * Link - http://blog.thiagobelem.net/removendo-acentos-de-uma-string-urls-amigaveis )
     */
    function removeAccents($string) {

        $string = strtolower($string);
        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), array(240, 248));
        $ascii['u'] = range(249, 252);
        // Código ASCII dos outros caracteres
        $ascii['b'] = array(223);
        $ascii['c'] = array(231);
        $ascii['d'] = array(208);
        $ascii['n'] = array(241);
        $ascii['y'] = array(253, 255);

        foreach ($ascii as $key=>$item) {
            $acentos = '';
            foreach ($item AS $codigo) $acentos .= chr($codigo);
            $troca[$key] = '/['.$acentos.']/i';
        }
        $string = preg_replace(array_values($troca), array_keys($troca), $string);

        return $string;
    }
}