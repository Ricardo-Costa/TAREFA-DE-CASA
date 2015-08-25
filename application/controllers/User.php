<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('system_model', 'sys_mod');
        $this->load->helper(array('my_helper', 'form'));
        $this->load->library('form_validation');
    }

    /**
     * @method - Realizar cadastro de usuário
     */
    public function register()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('confirme_senha', 'Confirmação de Senha', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE){
            if($_SERVER['REQUEST_METHOD'] == "POST"){

                $data_alert = array(
                    'alert' => 'alert-danger',
                    'message' => validation_errors(' ', '<br/>')
                );
                form_view($this, 'register', FALSE, $data_alert);

            } else{
                form_view($this, 'register');
            }
        } else {
            $data_alert = array(
                'alert' => 'alert-success',
                'message' => 'Seu cadastro foi realizado com sucesso, '.
                    'verifique seu e-mail para ativar sua conta.'
            );
            form_view($this, 'register', FALSE, $data_alert);
        }
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