<?php

class model_token extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_token()
    {
        $query = "SELECT * FROM token";
        return $this->db->query($query)->num_rows();
    }

    public function fetchAllData($data, $tablename, $where)
    {
        $query = $this->db->select($data)
            ->from($tablename)
            ->where($where)
            ->get();
        return $query->result_array();
    }

    public function getToken($token)
    {
        $date = date('Y-m-d');
        $jam = date('H:i');
        $temp = $this->getaktif();
        if ($temp['mulai'] <= $jam && $temp['akhir'] >= $jam) {
            $query = "SELECT * FROM token WHERE nama_token = '$token' AND id_token = " . "'" . $temp['id_token'] . "'";
            return $this->db->query($query)->row_array();
        } else {
            $selesai = $temp['akhir'];
            $query = "UPDATE token SET status = 'nonaktif' WHERE tanggal = '$date' AND akhir = '$selesai'";
            $this->db->query($query);
        }
    }

    public function getAllAktif()
    {
        $date = date('Y-m-d');
        $time = date('H:i');
        $query = "SELECT * FROM token WHERE status = 'aktif' AND tanggal = '$date'";
        return $this->db->query($query)->result_array();
    }

    public function getaktif()
    {
        $date = date('Y-m-d');
        $time = date('H:i');
        $query = "SELECT * FROM token WHERE status = 'aktif' AND tanggal = '$date' AND mulai <= '$time' AND akhir >= '$time' ORDER BY mulai ASC";
        return $this->db->query($query)->row_array();
    }

    public function show_token()
    {
        $query = "SELECT * FROM token ORDER BY id_token DESC";
        return $this->db->query($query)->result_array();
    }

    public function gettokenid($kode)
    {
        $query = "SELECT * FROM token WHERE id_token = " . $kode . " ORDER BY id_token ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_token()
    {
        $this->db->select('id_token');
        $this->db->order_by('id_token', 'DESC');
        $this->db->limit(1);
        return $this->db->get('token')->row_array();
    }

    public function storetoken()
    {
        $data = [
            'nama_token' => $this->input->post('nama_token'),
            'tanggal' => $this->input->post('tanggal'),
            'mulai' => $this->input->post('mulai'),
            'akhir' => $this->input->post('akhir'),
            'status' => $this->input->post('status'),
        ];

        $this->db->insert('token', $data);
    }

    public function updatetoken($kode)
    {
        $data = [
            'nama_token' => $this->input->post('nama_token'),
            'tanggal' => $this->input->post('tanggal'),
            'mulai' => $this->input->post('mulai'),
            'akhir' => $this->input->post('akhir'),
            'status' => $this->input->post('status'),
        ];

        $this->db->where('id_token', $kode);
        $this->db->update('token', $data);
    }

    public function updateAutoToken($kode)
    {
        $data = [
            'status' => 'nonaktif',
        ];
        $this->db->where('id_token', $kode);
        $this->db->update('token', $data);
    }
}
