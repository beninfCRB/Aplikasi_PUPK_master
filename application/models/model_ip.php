<?php
class Model_ip extends CI_Model
{
    public function show_ip()
    {
        $query = "SELECT * FROM ip ORDER BY nama_ip ASC";
        return $this->db->query($query)->result_array();
    }

    public function getipid($kode)
    {
        $query = "SELECT * FROM ip WHERE id_ip = " . $kode . " ORDER BY id_ip ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_ip()
    {
        $this->db->select('id_ip');
        $this->db->order_by('id_ip', 'DESC');
        $this->db->limit(1);
        return $this->db->get('ip')->row_array();
    }

    public function descLastIp()
    {
        $this->db->select('*');
        $this->db->order_by('id_ip', 'DESC');
        $this->db->limit(1);
        return $this->db->get('ip')->row_array();
    }

    public function storeip()
    {
        $ip = $this->input->post('nama_ip');

        $this->db->insert('ip', ['nama_ip' => $ip]);
    }

    public function updateip($kode)
    {
        $ip = $this->input->post('nama_ip');

        $this->db->where('id_ip', $kode);
        $this->db->update('ip', ['nama_ip' => $ip]);
    }
}
