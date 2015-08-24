<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('my_helper'));

    }

    /**
     * @method - Realizar cadastro de usuário
     */
    public function register()
    {
        // TODO - se for o primeiro usuário a ser cadastrar, o mesmo deverá ser setado como administrador
    }

    /**
     * @method - Realizar login
     */
    public function login()
    {
        // TODO - Construir o código de validação aqui

        $data = array(
            'username'  => 'johndoe',
            'email'     => 'johndoe@some-site.com',
            'logged_in' => TRUE
        );

        if(is_array($data) and (isset($data['username'], $data['email'], $data['logged_in']))){

            // iniciar sessão do usuário
            // $this->session->set_userdata($data);
            unset($data);
            redirect(base_url('inicio'), 'location', 301);
        }
        else {
            echo 'Teste';
            // TODO - redirecionar para página de 'login'
        }
    }

    /**
     * @method - Realizar logout
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'location', 301);
    }

    /**
     * @method - Consultar perfil
     */
    public function profile()
    {
        form_view($this, 'profile');
    }
}