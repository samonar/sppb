<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tagihan_bulanan_model extends CI_Model
{

    public $table = 'tagihan_bulanan';
    public $id = 'id_tagihan_bulanan';
    public $order = 'DESC';



    function __construct()
    {
        parent::__construct();
    }

    // searc data


    function search($tahun)
    {
    $this->db->order_by('kelas', 'acs');
    $this->db->order_by('jn_tagihan', 'acs');
    $this->db->order_by('bulan', 'acs');
    $this->db->select('tahun,bulan,nominal,semester,jn_tagihan.jn_tagihan,kelas');
    $this->db->join('th_akademik','tagihan_bulanan.id_th_akademik = th_akademik.id_th_akademik');
    $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
    // $this->db->join('kelas','tagihan_bulanan.kelas = kelas.id_kelas');
    $this->db->like('tagihan_bulanan.id_th_akademik',$tahun);
    //$this->db->group_by('tagihan_bulanan.jn_tagihan');
    return $this->db->get($this->table)->result();
    }


    // get all
    function get_all()
    {

        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_tagihan_bulanan', $q);
	$this->db->or_like('jn_tagihan', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('id_th_akademik', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tagihan_bulanan', $q);
	$this->db->or_like('jn_tagihan', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('id_th_akademik', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insert1($isi)
    {
      $data=array (
        
        'jn_tagihan' => '1',
        'kelas' => 'k1',
        'bulan' => '4',
        'nominal' => '141414',
        'id_th_akademik' => 'KA01',
      );
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

    //function cek tagihan bulanan sudah ada atau belum
    function cekinput($data)
  	{
      $this->db->select('*');
  		$this->db->where('id_th_akademik', $data['id_th_akademik']);
  		$this->db->where('jn_tagihan', $data['jn_tagihan']);
  		$this->db->where('kelas', $data['kelas']);
  		$this->db->where('bulan', $data['bulan']);
          return $this->db->get($this->table);

  	}

}

/* End of file Tagihan_bulanan_model.php */
/* Location: ./application/models/Tagihan_bulanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-11 08:40:53 */
/* http://harviacode.com */