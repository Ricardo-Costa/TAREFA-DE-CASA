<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('system_model', 'sys_mod');
        $this->load->helper(array('my_helper', 'form', 'captcha', 'cookie'));
        $this->load->library('form_validation');
    }

    /**
     * @method - Realizar cadastro de usuário
     */
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $table_name = 'usuario';

            $this->form_validation->set_rules('nome', 'Nome', 'required|alpha_numeric_spaces|trim|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('senha', 'Senha', 'required|alpha_numeric|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('confirme_senha', 'Confirmação de Senha', 'required|matches[senha]|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('email', 'e-mail', 'required|valid_email|is_unique['.$table_name.'.email]');
            $this->form_validation->set_message(
                'is_unique', 'O e-mail '. ((! empty($_POST['email']))? '" <b>'.@$_POST['email'].'</b> "' : "")
                .' já está cadastrado no sistema, tente outro! :)'
            );

            if ($this->form_validation->run() == FALSE){

                /** inicio - tratar nova captcha */
                $this->session->unset_userdata('captcha_value');
                $cap = $this->generateCaptcha();
                $data['filename'] = $cap['filename'];
                // salvar valor da captcha atual na sessão
                $this->session->set_userdata('captcha_value', $cap['word']);
                /** fim - tratar nova captcha */

                $data['alert'] = 'alert-danger';
                $data['message'] = validation_errors(' ', '<br/>');
                form_view($this, 'register', FALSE, $data);

            }
            /* Comparar código salvo na sessão com o valor digitado no fomulário */
            elseif (strtolower($this->session->captcha_value) === strtolower(@$_POST['codigo_captcha'])) {
                // Armazena dados recebidos do formulário de cadastro
                $data_register = $_POST;
                // Remover campos que não serão inseridos na tabela
                unset($data_register['confirme_senha'], $data_register['codigo_captcha']);

                if($this->sys_mod->save($table_name, $data_register)) {
                    $data['alert'] = 'alert-success';
                    $data['message'] = 'Seu cadastro foi realizado com sucesso, verifique seu e-mail para ativar sua conta.';
                    form_view($this, 'register', FALSE, $data);

                } else {
                    /** inicio - tratar nova captcha */
                    $this->session->unset_userdata('captcha_value');
                    $cap = $this->generateCaptcha();
                    $data['filename'] = $cap['filename'];
                    // salvar valor da captcha atual na sessão
                    $this->session->set_userdata('captcha_value', $cap['word']);
                    /** fim - tratar nova captcha */

                    $data['alert'] = 'alert-danger';
                    $data['message'] = ':( Desculpe! Ocorreu um erro inesperado durante seu cadastro. Por favor, tente novamente.';
                    form_view($this, 'register', FALSE, $data);
                }
            } else {
                /** inicio - tratar nova captcha */
                $this->session->unset_userdata('captcha_value');
                $cap = $this->generateCaptcha();
                $data['filename'] = $cap['filename'];
                // salvar valor da captcha atual na sessão
                $this->session->set_userdata('captcha_value', $cap['word']);
                /** fim - tratar nova captcha */

                $data['alert'] = 'alert-warning';
                $data['message'] = ':| O código de verificação digitado não corresponde ao da imagem. Por favor, tente novamente.';
                form_view($this, 'register', FALSE, $data);
            }
            unset($table_name, $vals, $cap, $data, $data_register, $_POST);

        } else {
            /** inicio - tratar nova captcha */
            $this->session->unset_userdata('captcha_value');
            $cap = $this->generateCaptcha();
            $data['filename'] = $cap['filename'];
            // salvar valor da captcha atual na sessão
            $this->session->set_userdata('captcha_value', $cap['word']);
            /** fim - tratar nova captcha */

            form_view($this, 'register', FALSE, $data);
            unset($vals, $cap, $data);
        }
    }

    /**
     * @method generateCaptcha - Gerar novo código captcha
     * @return string
     */
    private function generateCaptcha()
    {
        $vals = array(
            //'word'          => 'Random word',
            'img_path'      => './captcha/',
            'img_url'       => base_url().'captcha/',
            'font_path'     => './fonts/GoodDog.otf',
            'img_width'     => '160',
            'img_height'    => 34,
            'expiration'    => 7200,
            'word_length'   => 6,
            'font_size'     => 20,
            'img_id'        => 'img_captcha',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(214, 233, 198),
                'border' => array(255, 255, 255),
                'text' => array(60, 118, 61),
                // 'grid' => array(60, 118, 61) <-  TODO - Caso queira aumentar a dificuldade
                'grid' => array(255, 255, 255)
            )
        );

        return create_captcha($vals);
    }

    public function getNewCaptcha()
    {
        if(! empty($_POST['captcha']))
        {
            $this->session->unset_userdata('captcha_value');

            $cap = $this->generateCaptcha();
            $data['filename'] = $cap['filename'];

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));

            $this->session->set_userdata('captcha_value', $cap['word']);

            unset($cap, $data);
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