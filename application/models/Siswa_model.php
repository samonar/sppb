<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    public $table = 'siswa';
    public $id = 'nis';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function all_siswa($nis)
    {
      $this->db->order_by($this->id, $this->order);
      $this->db->like('nis',$nis);
      return $this->db->get($this->table)->result();
    }

    function cek_siswa($data)
    {
      $this->db->order_by($this->id, $this->order);
      $this->db->where('nis',$data['nis']);
      return $this->db->get($this->table);
    }

    function get_all1($idkls)
    {
        //$this->db->order_by($this->id, $this->order);
        $this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
        $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
        $this->db->join('th_akademik','kelas_siswa.id_th_akademik=th_akademik.id_th_akademik');
        $this->db->where('kelas_siswa.id_kelas',$idkls);
        $this->db->where('status',1);
        return $this->db->get($this->table)->result();
    }

    // get all th aktif
    function get_all($idkls)
    {
        //$this->db->order_by($this->id, $this->order);
        $this->db->join('kelas_siswa','siswa.nis=kelas_siswa.nis');
        $this->db->join('th_akademik','kelas_siswa.id_th_akademik=th_akademik.id_th_akademik');
        $this->db->where('id_kelas',$idkls);
        $this->db->where('status',1);
        return $this->db->get($this->table)->result();
    }

    function biodata_siswa($nis)
    {
      $this->db->select('*');
      $this->db->from('kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('saldo','siswa.id_saldo = saldo.id_saldo');
      $this->db->where('siswa.nis',$nis);
      $this->db->where('th_akademik.status',1);
      return $this->db->get()->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('nis', $q);
	$this->db->or_like('nama_siswa', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('no_hp_wali', $q);
	$this->db->or_like('th_masuk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nis', $q);
	$this->db->or_like('nama_siswa', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('no_hp_wali', $q);
	$this->db->or_like('th_masuk', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-06 05:39:44 */
/* http://harviacode.com */