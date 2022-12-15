<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

    public function cekLogin($data){

        // echo "qwekqwkel";
       

        // die();
       return $this->db->get('admin', $data)->num_rows();
        // var_dump($numrow);

        // die();
    }

    public function getDataStasiun()
    {
        return $this->db->get('stasiun');
        
    }

    public function tambah_stasiun($nama)
    {
        $data=array(
            'nama_stasiun' => $nama
        );

        var_dump($data);
        die();
        return $this->db->insert('stasiun', $data);
    }

    public function delete_station($id)
    {
        var_dump($id);
        // die();
        $this->db->where('id', $id);
        return $this->db->delete('stasiun');
    }

    public function getDataEditStasiun($id)
    {
        $data = array(
            'id' => $id
        );

        return $this->db->get('stasiun', $data);
    }

    public function editStasiun($nama)
    {
        $data = array(
            'nama_stasiun' => $nama
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('stasiun', $data);
    }

    public function tambah_jadwal($data){
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";

        // die();
        return $this->db->insert('jadwal', $data);
    }

    public function get_jadwal()
    {
        $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun AS TUJUAN');
        $this->db->from('jadwal');
        $this->db->join('stasiun AS Asal', 'jadwal.asal = Asal.id', 'left');
        $this->db->join('stasiun AS Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
        return $this->db->get();
    }

    public function getDataEditJadwal($id)
    {
        $data=array(
            'jadwal.id'=>$id
        );

        $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun AS TUJUAN');
        $this->db->from('jadwal');
        $this->db->where($data);
        $this->db->join('stasiun AS Asal', 'jadwal.asal = Asal.id', 'left');
        $this->db->join('stasiun AS Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
        return $this->db->get();

    }

    public function deleteJadwal($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('jadwal');
    }

    public function edit_jadwal($data)
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('jadwal', $data);
    }
}
