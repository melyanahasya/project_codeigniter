<?php

class M_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
    }
    function get_data($table)
    {
        return $this->db->get($table);
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }


    public function index()
    {
        $this->load->view('login');
    }
    // public function register()
    // {
    //     $this->load->view('register');
    // }

    public function register_user($email, $username, $password)
    {
        $data = array(
            'email' => $email,
            'username' => $username,
            'password' => $password
        );

        // Simpan data ke dalam tabel pengguna (ganti 'users' sesuai dengan nama tabel Anda)
        $this->db->insert('admin', $data);
    }


    public function dashboard()
    {
        $this->load->view('dashboard');
    }

    public function get_all_siswa()
    {
        $query = $this->db->get('siswa');
        return $query->result();
    }

    public function tambah_siswa($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }


    public function get_all_guru()
    {
        $query = $this->db->get('guru');
        return $query->result();
    }

    public function tambah_guru($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }



    // 1. get id untuk Ubah
    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    // Ubah
    public function ubah_data($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    function delete_siswa($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }

    public function get_id_guru($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    // Ubah
    public function ubah_data_guru($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    function delete_guru($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }

}

?>