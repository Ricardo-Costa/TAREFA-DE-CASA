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
            /** @var  $table_name - Definir tabela que será utilizada neste método */
            $table_name = 'usuario';
            // Armazenar nome passado por POST
            $name_in_post = @$_POST['nome'];
            // Tratrar nomes com acentos para validação do "Form_validate"
            @$_POST['nome'] = removeAccents(utf8_decode($name_in_post));

            $this->form_validation->set_rules('nome', 'Nome', 'required|alpha_numeric_spaces|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('senha', 'Senha', 'required|alpha_numeric|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('confirme_senha', 'Confirmação de Senha', 'required|matches[senha]|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('email', 'e-mail', 'required|valid_email|is_unique['.$table_name.'.email]|min_length[7]|max_length[45]');
            $this->form_validation->set_message(
                'is_unique', 'O e-mail '. ((! empty($_POST['email']))? '" <b>'.@$_POST['email'].'</b> "' : "")
                .' já está cadastrado no sistema, tente outro! :)'
            );

            if ($this->form_validation->run() == FALSE){
                /** Tratar nova captcha */
                $data['filename'] = $this->_generateCaptcha()['filename'];

                $data['alert'] = 'alert-danger';
                $data['message'] = validation_errors(' ', '<br/>');
                form_view($this, 'register', $this->session->logged_in, $data);

            }
            /* Comparar código salvo na sessão com o valor digitado no fomulário */
            elseif ($this->session->captcha_value == strtoupper(@$_POST['codigo_captcha']))
            {
                // Armazena dados recebidos do formulário de cadastro
                $data_register['nome'] = trim($name_in_post); /* Recupera nome inicial passado por POST */
                $data_register['email'] = trim($_POST['email']);
                $data_register['senha'] = md5($_POST['senha']);

                if($this->sys_mod->save($table_name, $data_register)) {
                    /** Tratar nova captcha */
                    $data['filename'] = $this->_generateCaptcha()['filename'];

                    $data['alert'] = 'alert-success';
                    $data['message'] = 'Seu cadastro foi realizado com sucesso, verifique seu e-mail para ativar sua conta.';
                    form_view($this, 'register', $this->session->logged_in, $data);
                    unset($table_name, $name_in_post, $data, $data_register, $_POST);

                } else {
                    /** Tratar nova captcha */
                    $data['filename'] = $this->_generateCaptcha()['filename'];

                    $data['alert'] = 'alert-danger';
                    $data['message'] = ':( Desculpe! Ocorreu um erro inesperado durante seu cadastro. Por favor, tente novamente.';
                    form_view($this, 'register', $this->session->logged_in, $data);
                }
            }
            else {
                /** Tratar nova captcha */
                $data['filename'] = $this->_generateCaptcha()['filename'];

                $data['alert'] = 'alert-warning';
                $data['message'] = ':| O código de verificação digitado não corresponde ao da imagem. Por favor, tente novamente.';
                form_view($this, 'register', $this->session->logged_in, $data);
            }
            unset($table_name, $name_in_post, $data, $data_register, $_POST);

        } else {
            /** Tratar nova captcha */
            $data['filename'] = $this->_generateCaptcha()['filename'];

            form_view($this, 'register', $this->session->logged_in, $data);
            unset($data, $_POST);
        }
    }

    /**
     * @method _generateCaptcha - Gerar novo código captcha
     * @return string
     */
    private function _generateCaptcha()
    {
        $this->session->unset_userdata('captcha_value');

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
            // 'img_id'        => 'img_captcha',
            // 'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'pool'          => '@ABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(214, 233, 198),
                'border' => array(255, 255, 255),
                'text' => array(60, 118, 61),
                // 'grid' => array(60, 118, 61) <-  TODO - Caso queira aumentar a dificuldade
                'grid' => array(255, 255, 255)
            )
        );

        $cap = create_captcha($vals);
        unset($vals);
        // salvar valor da captcha atual na sessão
        $this->session->set_userdata('captcha_value', $cap['word']);

        return $cap;
    }

    public function getNewCaptcha()
    {
        if(! empty($_POST['captcha']))
        {
            $cap = $this->_generateCaptcha();
            $data['filename'] = $cap['filename'];

            $this->output->set_content_type('application/json')->set_output(json_encode($data));

            unset($cap, $data);
        }
    }

    /**
     * @method - Realizar login
     */
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $user_data = array('email' => trim(@$_POST['email']), 'senha' => md5(@$_POST['senha']));

            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|min_length[7]|max_length[45]');
            $this->form_validation->set_rules('senha', 'Senha', 'required|alpha_numeric|min_length[8]|max_length[15]');

            if ($this->form_validation->run() == FALSE){
                $data['alert'] = 'alert-danger';
                $data['message'] = validation_errors(' ', '<br/>');
                form_view($this, 'login', $this->session->logged_in, $data);
                unset($data, $_POST);

            } elseif ($this->_userValidate($user_data)) {
                // buscar dados
                $data = $this->sys_mod->find('usuario', $user_data);
                // Passar dados para a session
                $this->session->set_userdata(array(
                    'username'  => $data[0]['nome'],
                    'email'     => $data[0]['email'],
                    'logged_in' => TRUE
                ));
                // Redireciona para a página inicial do sistema
                redirect(base_url('inicio'), 'location', 301);

            } else {
                $data['alert'] = 'alert-warning';
                $data['message'] = '<b>E-mail</b> ou <b>Senha</b> digitados estão incorretos. Tente novamente.';
                form_view($this, 'login', $this->session->logged_in, $data);
                unset($user_data, $data, $_POST);
            }
        }
    }

    /**
     * @method _userValidate - Verifica se os dados do login do usuário são válidos
     * @param $user_data
     * @return bool
     */
    private function _userValidate($user_data)
    {
        $data = $this->sys_mod->find('usuario', $user_data);
        if ($data != array()){
            return true;
        }
        unset($data);
        return false;
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
        form_view($this, 'profile', $this->session->logged_in);
    }
}