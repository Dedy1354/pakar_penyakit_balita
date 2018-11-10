<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_Model{
		
		public function data_admin(){
			$data = $this->db->query("select * from admin");
			return $data->result_array();
		}

		public function simpan($post){
		$USERNAME = $this->db->escape($post['USERNAME']);
		$PASSWORD = $this->db->escape($post['PASSWORD']);
		$LEVEL_USER = $this->db->escape($post['LEVEL_USER']);

		$sql = $this->db->query("INSERT INTO admin (USERNAME, PASSWORD, LEVEL_USER) VALUES ($USERNAME, $PASSWORD, $LEVEL_USER)");
		if($sql)
			return true;
		return false;
		}

		public function get_default($ID_ADMIN){
			$sql = $this->db->query("select * from admin where ID_ADMIN = ".intval($ID_ADMIN));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}

		public function update($post, $ID_ADMIN){
		
		$USERNAME = $this->db->escape($post['USERNAME']);
		$PASSWORD = $this->db->escape($post['PASSWORD']);
		$LEVEL_USER = $this->db->escape($post['LEVEL_USER']);

		$sql =  $this->db->query("UPDATE admin SET USERNAME=$USERNAME, PASSWORD=$PASSWORD, LEVEL_USER=$LEVEL_USER WHERE ID_ADMIN = ".intval($ID_ADMIN));
		return true;
		}

		public function hapus($ID_ADMIN){
			$sql = $this->db->query("DELETE FROM admin WHERE ID_ADMIN =" .intval($ID_ADMIN));
		}

		//---------------------------------pasien//
		public function data_pasien(){
			$query = $this->db->query(" SELECT * FROM pasien ");
			return $query->result_array();
		}

		public function simpan_pasien($post){
		$NAMA_PASIEN = $this->db->escape($post['NAMA_PASIEN']);
		$USERNAME = $this->db->escape($post['USERNAME']);
		$PASSWORD = $this->db->escape($post['PASSWORD']);
		$UMUR_PASIEN = $this->db->escape($post['UMUR_PASIEN']);
		$ALAMAT_PASIEN = $this->db->escape($post['ALAMAT_PASIEN']);
		$GENDER_PASIEN = $this->db->escape($post['GENDER_PASIEN']);
		$LEVEL_USER = $this->db->escape($post['LEVEL_USER']);


		$sql = $this->db->query("INSERT INTO pasien (NAMA_PASIEN,USERNAME,PASSWORD, UMUR_PASIEN, ALAMAT_PASIEN, GENDER_PASIEN, LEVEL_USER) VALUES ($NAMA_PASIEN,$USERNAME,$PASSWORD,$UMUR_PASIEN, $ALAMAT_PASIEN, $GENDER_PASIEN, $LEVEL_USER)");

		if($sql)
			return true;
		return false;
		}

		public function get_default_pasien($ID_PASIEN){
			$sql = $this->db->query("select * from pasien where ID_PASIEN = ".intval($ID_PASIEN));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}
		
		public function update_pasien($post, $ID_PASIEN){
		
		$NAMA_PASIEN = $this->db->escape($post['NAMA_PASIEN']);
		$USERNAME = $this->db->escape($post['USERNAME']);
		$PASSWORD = $this->db->escape($post['PASSWORD']);
		$UMUR_PASIEN = $this->db->escape($post['UMUR_PASIEN']);
		$ALAMAT_PASIEN = $this->db->escape($post['ALAMAT_PASIEN']);
		$GENDER_PASIEN = $this->db->escape($post['GENDER_PASIEN']);
		$LEVEL_USER = $this->db->escape($post['LEVEL_USER']);

		$sql =  $this->db->query("UPDATE pasien SET NAMA_PASIEN=$NAMA_PASIEN, USERNAME=$USERNAME, PASSWORD=$PASSWORD, UMUR_PASIEN=$UMUR_PASIEN, ALAMAT_PASIEN=$ALAMAT_PASIEN, GENDER_PASIEN=$GENDER_PASIEN, LEVEL_USER=$LEVEL_USER WHERE ID_PASIEN = ".intval($ID_PASIEN));
		return true;
		}

		public function hapus_pasien($ID_PASIEN){
			$sql = $this->db->query("DELETE FROM pasien WHERE ID_PASIEN =" .intval($ID_PASIEN));
		}
		//----------------------------------------------penyakit//
		public function data_penyakit(){
			// $data = $this->db->query(" SELECT * FROM vwpenyakit ORDER BY ID_PENYAKIT DESC ");
			$data = $this->db->query("SELECT NAMA_PENYAKIT FROM penyakit GROUP BY NAMA_PENYAKIT ORDER BY ID_PENYAKIT ASC");
			return $data->result_array();
		}

		public function data_penyakit_tmp($penyakit){
			$data = $this->db->query("SELECT * FROM vwpenyakit WHERE NAMA_PENYAKIT LIKE '%".$penyakit."' ");
			return $data->result_array();
		}

		public function simpan_penyakit($post){
		$NAMA_PENYAKIT = $this->db->escape($post['NAMA_PENYAKIT']);
		$ID_GEJALA = $this->db->escape($post['ID_GEJALA']);
		$sql = $this->db->query("INSERT INTO penyakit (NAMA_PENYAKIT,ID_GEJALA) VALUES ($NAMA_PENYAKIT,$ID_GEJALA)");
		if($sql)
			return true;
		return false;
		}
		public function get_default_penyakit($ID_PENYAKIT){
			$sql = $this->db->query("select * from penyakit where ID_PENYAKIT = ".intval($ID_PENYAKIT));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}
		
		public function update_penyakit($post, $ID_PENYAKIT){
		
		$NAMA_PENYAKIT = $this->db->escape($post['NAMA_PENYAKIT']);

		$sql =  $this->db->query("UPDATE penyakit SET NAMA_PENYAKIT=$NAMA_PENYAKIT WHERE ID_PENYAKIT = ".intval($ID_PENYAKIT));
		return true;
		}
		public function hapus_penyakit($ID_PENYAKIT){
			$sql = $this->db->query("DELETE FROM penyakit WHERE ID_PENYAKIT =" .intval($ID_PENYAKIT));
		}
		//---------------------------------------------------------gejala//
		public function data_gejala(){
			$data = $this->db->query(" SELECT * FROM gejala ORDER BY ID_GEJALA DESC");
			return $data->result_array();
		}
		public function ambil_penyakit(){
		return $this->db->get('penyakit')->result();
		}
		public function simpan_gejala($post){
		$NM_GEJALA = $this->db->escape($post['NM_GEJALA']);
		$BOBOT_GEJALA = $this->db->escape($post['BOBOT_GEJALA']);

		$sql = $this->db->query("INSERT INTO gejala (NM_GEJALA,BOBOT_GEJALA) VALUES ($NM_GEJALA,$BOBOT_GEJALA)");
		if($sql)
			return true;
		return false;
		}
		public function get_default_gejala($ID_GEJALA){
			$sql = $this->db->query("select * from gejala where ID_GEJALA = ".intval($ID_GEJALA));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}
		
		public function update_gejala($post, $ID_GEJALA){
			$ID_GEJALA = $ID_GEJALA;
		
		$NM_GEJALA = $this->db->escape($post['NM_GEJALA']);
		$BOBOT_GEJALA = $this->db->escape($post['BOBOT_GEJALA']);

		$sql =  $this->db->query("UPDATE gejala SET NM_GEJALA=$NM_GEJALA, BOBOT_GEJALA=$BOBOT_GEJALA WHERE ID_GEJALA = ".intval($ID_GEJALA));
		return true;
		}
		public function hapus_gejala($ID_GEJALA){
			$sql = $this->db->query("DELETE FROM gejala WHERE ID_GEJALA =" .intval($ID_GEJALA));
		}
		//-------------------------------------------------------diagnosa//
		public function data_diagnosa(){
			$data = $this->db->query(" SELECT * FROM diagnosa ");
			return $data->result_array();
		}
		public function ambil_gejala(){
		return $this->db->get('gejala')->result_array();
		}
		public function ambil_pasien(){
		return $this->db->get('pasien')->result();
		}
		public function simpan_diagnosa($post){
		$ID_DIAGNOSA = $this->db->escape($post['ID_DIAGNOSA']);
		$ID_GEJALA = $this->db->escape($post['ID_GEJALA']);
		$ID_PASIEN = $this->db->escape($post['ID_PASIEN']);
		$TGL_DIAGNOSA = $this->db->escape($post['TGL_DIAGNOSA']);

		$sql = $this->db->query("INSERT INTO diagnosa VALUES ($ID_DIAGNOSA, $ID_GEJALA, $ID_PASIEN, $TGL_DIAGNOSA)");
		if($sql)
			return true;
		return false;
		}
		public function get_default_diagnosa($ID_DIAGNOSA){
			$sql = $this->db->query("select * from diagnosa where ID_DIAGNOSA = ".intval($ID_DIAGNOSA));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}
		
		public function update_diagnosa($post, $ID_DIAGNOSA){
		$ID_GEJALA = $this->db->escape($post['ID_GEJALA']);
		$ID_PASIEN = $this->db->escape($post['ID_PASIEN']);
		$TGL_DIAGNOSA = $this->db->escape($post['TGL_DIAGNOSA']);
		$sql =  $this->db->query("UPDATE diagnosa SET ID_GEJALA=$ID_GEJALA, ID_PASIEN=$ID_PASIEN, TGL_DIAGNOSA=$TGL_DIAGNOSA WHERE ID_DIAGNOSA = ".intval($ID_DIAGNOSA));
		return true;
		}
		public function hapus_diagnosa($ID_DIAGNOSA){
			$sql = $this->db->query("DELETE FROM diagnosa WHERE ID_DIAGNOSA =" .intval($ID_DIAGNOSA));
		}
		//-------------------------------------------------------solusi//
		public function data_solusi(){
			$data = $this->db->query(" SELECT * FROM solusi ");
			return $data->result_array();
		}

		public function simpan_solusi($post){
		$ID_PENYAKIT = $this->db->escape($post['ID_PENYAKIT']);
		$NAMA_SOLUSI = $this->db->escape($post['NAMA_SOLUSI']);

		$sql = $this->db->query("INSERT INTO solusi (ID_PENYAKIT, NAMA_SOLUSI) VALUES ($ID_PENYAKIT, $NAMA_SOLUSI)");
		if($sql)
			return true;
		return false;
		}
		public function get_default_solusi($ID_SOLUSI){
			$sql = $this->db->query("select * from solusi where ID_SOLUSI = ".intval($ID_SOLUSI));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}
		
		public function update_solusi($post, $ID_SOLUSI){
		$NAMA_SOLUSI = $this->db->escape($post['NAMA_SOLUSI']);
		$sql =  $this->db->query("UPDATE solusi SET  NAMA_SOLUSI = $NAMA_SOLUSI WHERE ID_SOLUSI = ".intval($ID_SOLUSI));
		return true;
		}
		public function hapus_solusi($ID_SOLUSI){
			$sql = $this->db->query("DELETE FROM solusi WHERE ID_SOLUSI =" .intval($ID_SOLUSI));
		}

		public function input_data($data){

		$this->db->insert('pasien', $data);
		}
		public function get_by($where){
		$this->db->where('ID_PASIEN', $where);
		return $this->db->get('pasien')->row();
		}

		public function tampil_data_pasien($USERNAME){
			$this->db->where('USERNAME',$USERNAME);
		return $this->db->get('pasien')->result_array();
		}

		public function cekgejala($id){
			$sql = $this->db->where('ID_GEJALA', $id)
							->get('vwpenyakit');
			return $sql->result_array();
		}

		public function cekrowgejala($id){
			$sql = $this->db->where('ID_GEJALA', $id)
							->get('vwpenyakit');
			return $sql->num_rows();
		}

		public function count_gejala(){
			$sql = $this->db->group_by('ID_GEJALA')
							->order_by('ID_GEJALA', 'ASC')
							->get('vwpenyakit');
			return $sql->result_array();
		}

		public function gejala_list($id){
			$sql = $this->db->where('ID_GEJALA', $id)
							->get('gejala');
			return $sql->result_array();
		}
		public function save_diagnosa($implode, $penyakit){
			$date = date('Y-m-d');
			$username = $this->session->userdata('USERNAME');
			
			$sql =  $this->db->query("INSERT INTO diagnosa SET GEJALA = '".$implode."',TGL_DIAGNOSA = '".$date."', USERNAME = '".$username."', PENYAKIT = '".$penyakit."'  ");
			return true;
		}
		public function data_diagnosa_pasien($USERNAME){
			$this->db->where('USERNAME',$USERNAME);
			$this->db->order_by('ID_DIAGNOSA', 'DESC');
			return $this->db->get('diagnosa')->result_array();
		}


	}
 ?>