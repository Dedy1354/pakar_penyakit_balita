<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_model {

	public function cek_pasien($data) {
			return $this->db->get_where('pasien', $data);
		}
}