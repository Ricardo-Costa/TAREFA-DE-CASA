<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    /**
     * @method view - Definido como rota padrão das páginas internas e externas
     * @param string $page
     */
    public function view($page = 'login')
    {
        $this->load->helper(array('my_helper'));

        form_view($this, $page, $this->session->logged_in);
    }
}