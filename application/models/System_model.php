<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_model extends CI_Model
{
    /**
     * @var array - Asegurar que os nomes de tabelas passados, são de tabelas existentes no DB
     */
    private $tables = array(
        'usuario', 'tarefa', 'disciplina', 'disciplina_inscrito'
    );

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * @method - Realizar busca de todos os dados da tabela
     *
     * @param $table - Recebe o nome da tabela
     * @return array
     */
    public function fetchAll($table)
    {
        if(in_array($table, $this->tables)){

            $query = $this->db->get($table);
            return $query->result_array();
        }
        return array();
    }

    /**
     * @method - Realizar busca específica na tabela
     *
     * @param $table - Recebe o nome da tabela
     * @param array() $array_where - ID da linha referida
     * @return array()
     */
    public function find($table = '', $array_where)
    {
        if((is_array($array_where)) and (in_array($table, $this->tables))){

            $query = $this->db->get_where($table, $array_where);
            return $query->result_array();
        }
        return array();
    }

    /**
     * @method - Salvar dados validados do formulário para a tabela
     *
     * @param $table String - Recebe o nome da tabela
     * @param $data - Array contendo campos da tabela e valores a serem armazenados
     * @return bool
     */
    public function save($table, $data)
    {
        if((is_array($data)) and (in_array($table, $this->tables)))
        {
            return ($this->db->insert($table, $data))? true : false ;
        }
        return false;
    }

    /**
     * @method - Registrar novo usuário e enviar email de confirmação de cadastro
     *
     * @param $ctrl CI_Controller - Recebe o controller
     * @param $table String - Recebe o nome da tabela
     * @param $data - Array contendo campos da tabela e valores a serem armazenados
     * @return bool
     */
    public function userRegister($ctrl, $table, $data)
    {
        $this->db->trans_begin();

        $this->save($table, $data);

        if (($this->db->trans_status() === FALSE) or (! $ctrl->_sendMailDefault($data))) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}