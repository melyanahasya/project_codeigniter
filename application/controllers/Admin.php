<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    // untuk meload model & helper kalian
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');

        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url() . 'auth');
        }
    }

    public function dashboard()
    {
        $data['result'] = $this->m_model->get_data('siswa')->num_rows();
        $data['guru'] = $this->m_model->get_data('guru')->num_rows();
        $data['mapel'] = $this->m_model->get_data('mapel')->num_rows();
        $this->load->view('admin/dashboard', $data);
    }


    public function siswa()
    {
        $data['result'] = $this->m_model->get_all_siswa();
        $this->load->view('admin/siswa', $data);
    }

    public function tambah_siswa()
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }



    public function aksi_tambah_siswa()
    {
        $data = [
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'tanggal_lahir' => $this->input->post('tanggal'),
        ];
        $this->m_model->tambah_siswa('siswa', $data);
        redirect(base_url('admin/siswa'));
    }

    public function update_siswa($id)
    {
        $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $this->load->view('admin/update_siswa', $data);
    }

    public function aksi_ubah_siswa()
    {
        $data = array(
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'tanggal_lahir' => $this->input->post('tanggal'),
        );

        $eksekusi = $this->m_model->ubah_data
        ('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));
        if ($eksekusi) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('admin/siswa'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('admin/siswa/update_siswa/' . $this->input->post('id_siswa')));
        }
    }

    public function hapus_siswa($id)
    {
        $this->m_model->delete_siswa('siswa', 'id_siswa', $id);
        redirect(base_url('admin/siswa'));
    }


    public function guru()
    {
        $data['result'] = $this->m_model->get_all_guru();
        $this->load->view('admin/guru', $data);
    }

    public function tambah_guru()
    {
        $data['guru'] = $this->m_model->get_data('guru')->result();
        $this->load->view('admin/tambah_guru', $data);
    }

    public function aksi_tambah_guru()
    {
        $data = [
            'nama_guru' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'gender' => $this->input->post('gender'),

        ];
        $this->m_model->tambah_guru('guru', $data);
        redirect(base_url('admin/guru'));
    }
    public function update_guru($id)
    {
        $data['guru'] = $this->m_model->get_id_guru('guru', 'id_guru', $id)->result();
        $this->load->view('admin/update_guru', $data);
    }

    public function aksi_ubah_guru()
    {
        $data = array(
            'nama_guru' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'gender' => $this->input->post('gender'),
        );

        $eksekusi = $this->m_model->ubah_data
        ('guru', $data, array('id_guru' => $this->input->post('id_guru')));
        if ($eksekusi) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('admin/guru'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('admin/guru/' . $this->input->post('id_guru')));
        }
    }

    public function hapus_guru($id)
    {
        $this->m_model->delete_guru('guru', 'id_guru', $id);
        redirect(base_url('admin/guru'));
    }

}
?>