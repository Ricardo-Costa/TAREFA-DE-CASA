<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('my_helper'));
    }

    public function view($page = 'login')
    {
        form_view($this, $page);
    }

    public function inicio($page = 'login')
    {
        form_view($this, $page);
    }
}