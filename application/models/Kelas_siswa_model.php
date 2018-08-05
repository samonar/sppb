<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_siswa_model extends CI_Model
{

    public $table = 'kelas_siswa';
    public $id = 'id_kelas_siswa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        //$this->load->model(array('Tagihan_siswa_kls_model','Siswa_model','Kelas_model','Pembayaran_model','Th_akademik_model','Jn_tagihan_model','Kelas_siswa_model','User_model'));
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_siswa()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('kelas','kelas_siswa.id_kelas= kelas.id_kelas');
        $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
        $this->db->join('th_akademik','kelas_siswa.id_th_akademik= th_akademik.id_th_akademik');
        $this->db->where('th_akademik.status', 1);
        return $this->db->get($this->table)->result();
    }

    function cari_siswa_kelas($data)
    {
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->where('kelas_siswa.id_kelas',$data);
      $this->db->where('th_akademik.status',1);
      return $this->db->get($this->table);
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
         $this->db->join('kelas','kelas_siswa.id_kelas= kelas.id_kelas');
        $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
        $this->db->join('th_akademik','kelas_siswa.id_th_akademik= th_akademik.id_th_akademik');
        $this->db->where('th_akademik.status', 1);
        return $this->db->get($this->table)->row();
    }

    function get_by_tingkat($id)
    {
        $this->db->where('kelas.tingkat', $id);
        // $this->db->where('tagihan_bulanan.bulan', $bln);
        $this->db->join('kelas','kelas_siswa.id_kelas= kelas.id_kelas');
        $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
        $this->db->join('th_akademik','kelas_siswa.id_th_akademik= th_akademik.id_th_akademik');
        // $this->db->join('tagihan_bulanan','tagihan_bulanan.id_th_akademik = th_akademik.id_th_akademik');
        $this->db->where('th_akademik.status', 1);
        return $this->db->get($this->table);
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kelas_siswa', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('id_kelas', $q);
	$this->db->or_like('id_th_akademik', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kelas_siswa', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('id_kelas', $q);
	$this->db->or_like('id_th_akademik', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data1,$data2,$nis)
    {
      $input = array(
        'id_kelas' => $data1,
        'id_th_akademik' => $data2,
        'nis' => $nis ,
      );
      //$this->db->set('nis')
      $this->db->insert($this->table, $input);
    }

    function insert_siswa($input)
    {
      $this->db->insert($this->table, $input);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Kelas_siswa_model.php */
/* Location: ./application/models/Kelas_siswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-06 05:39:44 */
/* http://harviacode.com */
