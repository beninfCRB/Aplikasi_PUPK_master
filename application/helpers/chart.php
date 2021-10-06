<?php

function chart_hadir()
{
    $query = $this->db->query("SELECT tgl from hasil GROUP BY tgl");
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}
