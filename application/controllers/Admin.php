<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		 if ($this->session->userdata("LEVEL_USER")!= 'admin'){
		 	redirect("welcome");
		 }
	}

	public function index(){
		$this->load->view('main');
	}

	public static function tanggal_indo($tanggal, $cetak_hari = false)
	{
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}

	public function add(){
		
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan($_POST);
			redirect("Admin");
		}

		$this->load->view("admin/admin_add",$data);
	}

	public function edit($ID_ADMIN){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update($_POST, $ID_ADMIN);
			redirect('Admin');
		}
		$data['default'] = $this->Admin_model->get_default($ID_ADMIN);

		$this->load->view("admin/admin_add",$data);
	}
	public function delete($ID_ADMIN){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus($ID_ADMIN);
		redirect('Admin');
	}

	//-----------------------------------------------------Pasien//
	public function pasien(){
		$this->load->model('Admin_model');
		$data['list_pasien'] = $this->Admin_model->data_pasien();
		$this->load->view("pasien/pasien_view",$data);
	}
	public function add_pasien(){
		
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->simpan_pasien($_POST);
			redirect("Admin/pasien");
		}
		$this->load->view("pasien/pasien_add",$data);
	}
	public function edit_pasien($ID_PASIEN){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_pasien($_POST, $ID_PASIEN);
			redirect('Admin/pasien');
		}
		$data['default'] = $this->Admin_model->get_default_pasien($ID_PASIEN);

		$this->load->view("pasien/pasien_add",$data);
	}
	public function delete_pasien($ID_PASIEN){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_pasien($ID_PASIEN);
		redirect('Admin/pasien');
	}
	//-------------------------------------------------------Penyakit//
	public function row_penyakit(){
		$this->load->model('Admin_model');
		$penyakit= $this->Admin_model->data_penyakit();
		return $penyakit;
	}
	public function row_penyakit_tmp(){
		$this->load->model('Admin_model');
		$penyakit = $this->row_penyakit();
		$hasil = null;
		$no = 0;
		foreach ($penyakit as $row) {
			# code...
			$gejala = $this->Admin_model->data_penyakit_tmp($row['NAMA_PENYAKIT']);

			$no++;
			$hasil .= "<tr>";
			$hasil .= "<td>".$no."</td>";
			$hasil .= "<td>".$row['NAMA_PENYAKIT']."</td>";
			$hasil .= "<td>";
			$hasil .= "<ul>";
			
			foreach ($gejala as $dat){
				
				$hasil .= "<li>";
				$hasil .= "<div class='row' style='margin:0 0 5px 0; padding:0;'>";
				$hasil .= "<div class='col-md-8'>";
				$hasil .= $dat['NM_GEJALA'];
				$hasil .= "</div>";
				$hasil .= "<div class='col-md-4'>";
				$hasil .= "<a href='delete_penyakit/".$dat['ID_PENYAKIT']."' class='btn btn-sm btn-danger' style='padding: 1px;font-size:10px;'>
				Hapus</a>";
				$hasil .= "</div>";
				$hasil .= "</div>";
				$hasil .= "</li>";				
                    
			}

			$hasil .= "</ul>";
			$hasil .= "</td>";
			$hasil .= "</tr>";
		}
		return $hasil;
		
	}

	public function penyakit(){
		$this->load->model('Admin_model');
		$data['list_penyakit'] = $this->Admin_model->data_penyakit();
		$data['tmp_penyakit'] = $this->row_penyakit_tmp();
		$this->load->view("penyakit/penyakit_view",$data);
	}
	public function add_penyakit(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->simpan_penyakit($_POST);
			redirect("Admin/penyakit");
		}
		$data['tampil_gejala'] = $this->Admin_model->ambil_gejala();
		$this->load->view("penyakit/penyakit_add",$data);
	}
	public function edit_penyakit($ID_PENYAKIT){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_penyakit($_POST, $ID_PENYAKIT,$ID_GEJALA);
			redirect('Admin/penyakit');
		}
		$data['default'] = $this->Admin_model->get_default_penyakit($ID_PENYAKIT);

		$this->load->view("penyakit/penyakit_add",$data);
	}
	public function delete_penyakit($ID_PENYAKIT){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_penyakit($ID_PENYAKIT);
		redirect('Admin/penyakit');
	}
	//----------------------------------------------------gejala//
	public function gejala(){
		$this->load->model('Admin_model');
		$data['list_gejala'] = $this->Admin_model->data_gejala();
		$this->load->view("gejala/gejala_view",$data);
	}
	public function add_gejala(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->simpan_gejala($_POST);
			redirect("Admin/gejala");
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
		$this->load->view("gejala/gejala_add",$data);
	}
	public function edit_gejala($ID_GEJALA){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_gejala($_POST, $ID_GEJALA);
			redirect('Admin/gejala');
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
		$data['default'] = $this->Admin_model->get_default_gejala($ID_GEJALA);

		$this->load->view("gejala/gejala_add",$data);
	}
	public function delete_gejala($ID_GEJALA){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_gejala($ID_GEJALA);
		redirect('Admin/gejala');
	}
	//----------------------------------------------------diagnosa//
	public function diagnosa(){
		$this->load->model('Admin_model');
		$data['list_diagnosa'] = $this->Admin_model->data_diagnosa();
		$this->load->view("diagnosa/diagnosa_view",$data);
	}
	public function add_diagnosa(){
        $data['gejala'] = $this->Admin_model->count_gejala();
		$this->load->view("diagnosa/diagnosa_add",$data);
	}

		public function result()
	{
		$result = null;
		$gejala = array();

		$resrow = $this->input->post('resrow');
		$fgejala = null;

		$no = 0;

		for ($i=0; $i < $resrow; $i++) {
			$no++;
			$postgejala = 'gejala'.$no; 
			$fgejala = $this->input->post($postgejala);
			if ($fgejala != null) {
				$gejala[] = $fgejala;
			}
		}

		// echo json_encode($gejala);


		$tahap1 = array();

		//
		foreach ($gejala as $key => $value) {
			$tahap1[] = $this->fgejala($value);
			
		}
		// echo json_encode($tahap1);
		$rowgejala = count($tahap1);
		// $tahap2 = array();

		if ($rowgejala == 1) {		
			$result =  $this->res_1gejala($tahap1);

		}

		if ($rowgejala == 2) {
			$res = $this->res_2gejala($tahap1);
			$tahap2 = array_merge($tahap1, array($res));
			// echo "<br>".json_encode($tahap2);
			$res2 = $this->res_2_2gejala($tahap1);
			$tahap3 = array_merge($tahap2, array($res2));
			// echo "<br>".json_encode($tahap3);

			$res3 = $this->res_2_3gejala($tahap3);

			// echo "<br>".json_encode($res3);
			
			if (($res3[1] > $res3[3]))
			{
				if ($res3[0] == 'DB') {
					$result = $res3[0] = "Demam Berdarah";
				}else if($res3[0] == 'TF'){
					$result = $res3[0] = 'Tifus';
				}else{
					$result = $res3[0] = "Demam Berdarah Tifus";
				}
			}else if(($res3[3] > $res3[1]))
			{
				if ($res3[2] == 'DB') {
					$result = $res3[2] = "Demam Berdarah";
				}else if($res3[2] == 'TF'){
					$result = $res3[2] = 'Tifus';
				}else{
					$result = $res3[2] = "Demam Berdarah Tifus";
				}
			}


		}

		if ($rowgejala >= 3) {
			// echo json_encode($tahap1)."<br>";
			$res = $this->res_3gejala($tahap1);
			$result = 0;

			// echo $res;

			// echo json_encode($res);

			if (count($res) <= 6) {
				if (($res[1] > $res[3]))
				{
					if ($res[0] == 'DB') {
						$result = $res[0] = "Demam Berdarah";
					}else if($res[0] == 'TF'){
						$result = $res[0] = 'Tifus';
					}else{
						$result = $res[0] = "Demam Berdarah Tifus";
					}
				}else if(($res[3] > $res[1]))
				{
					if ($res[2] == 'DB') {
						$result = $res[2] = "Demam Berdarah";
					}else if($res[2] == 'TF'){
						$result = $res[2] = 'Tifus';
					}else{
						$result = $res[2] = "Demam Berdarah Tifus";
					}
				}
			}else
			{
				if (($res[1] > $res[3]) && ($res[1] > $res[5]))
				{
					if ($res[0] == 'DB') {
						$result = $res[0] = "Demam Berdarah";
					}else if($res[0] == 'TF'){
						$result = $res[0] = 'Tifus';
					}else{
						$result = $res[0] = "Demam Berdarah Tifus";
					}
				}else if(($res[3] > $res[1]) && ($res[3] > $res[5]))
				{
					if ($res[2] == 'DB') {
						$result = $res[2] = "Demam Berdarah";
					}else if($res[2] == 'TF'){
						$result = $res[2] = 'Tifus';
					}else{
						$result = $res[2] = "Demam Berdarah Tifus";
					}
				}else
				{
					if ($res[4] == 'DB') {
						$result = $res[4] = "Demam Berdarah";
					}else if($res[4] == 'TF'){
						$result = $res[4] = 'Tifus';
					}else{
						$result = $res[4] = "Demam Berdarah Tifus";
					}
				}
			}

		}
		if ($result != null ) {
			$result = $result;
		}else{
			$result = 'Penyakit Tidak Diketahui';
		}
		echo $result;
		// echo json_encode($tahap1);
		$gejalax = array();
		foreach ($gejala as $key1 => $value1) {
			$gejalax[] = $this->getgejala($value1);
			
		}
		

		$implode = implode(", ", $gejalax);
		// echo json_encode($implode);

		$this->Admin_model->save_diagnosa($implode, $result);
		$data['result'] = $result;
		$this->load->view('diagnosa/result', $data);

	}

	public function getgejala($gejala)
	{
		$tmp_gejala = $this->Admin_model->gejala_list($gejala);
		// $gejala2 = array(); 
		foreach ($tmp_gejala as $row) {
			$gejala2 = $row['NM_GEJALA'];
		}
		return $gejala2;

	}

	public function res_3gejala($tahap1)
	{
		
		$tmp_gejala = array();
		for ($i=0; $i < 2; $i++) { 
			$tmp_gejala []= array('penyakit'=>$tahap1[$i]['penyakit'],
						'm'=>$tahap1[$i]['m'],
						'teta'=>$tahap1[$i]['teta'],
						'm_teta'=>$tahap1[$i]['m_teta']);
		}
		$res3 = $this->tmp_2x2($tmp_gejala);

		// echo json_encode($res3);
		
		for ($i=2; $i < count($tahap1); $i++) { 
			$tmp_gejala2 []= array('penyakit'=>$tahap1[$i]['penyakit'],
						'm'=>$tahap1[$i]['m'],
						'teta'=>$tahap1[$i]['teta'],
						'm_teta'=>$tahap1[$i]['m_teta']);

			if (count($res3) == 4 ) {
				$res3_1 []= array('penyakit'=>$res3[0],
						'm'=>$res3[1],
						'teta'=>$res3[2],
						'm_teta'=>$res3[3]);
				$res3_2 = array_merge($tmp_gejala2, $res3_1);
				$res3 = $this->tmp_2x2($res3_2);
				// echo json_encode($res3);
			}else if(count($res3) == 6){
				$res3_1 []= array('penyakit1'=>$res3[0],
							'm1'=>$res3[1],
							'penyakit2'=>$res3[2],
							'm2'=>$res3[3],
							'teta'=>$res3[4],
							'm_teta'=>$res3[5]);
				$res3_2 = array_merge($res3_1, $tmp_gejala2);
				// echo json_encode($res3_1);
				$res3 = $this->tmp_3x3($res3_2);

			}else{
				$res3_1 []= array('penyakit1'=>$res3[0],
							'm1'=>$res3[1], 
							'penyakit2'=>$res3[2],
							'm2'=>$res3[3],
							'penyakit3'=>$res3[4],
							'm3'=>$res3[5],
							'teta'=>$res3[6],
							'm_teta'=>$res3[7]);
				$res3_2 = array_merge($res3_1, $tmp_gejala2);
				$res3 = $this->tmp_4x4($res3_2);
				// echo "<br><br>".json_encode($res3_2);
			}
			$tmp_gejala2 = null;
			$res3_1 = null;

		}
		// echo count($res3);
		// echo json_encode($res3);
		return $res3;	

		

			
		
		
	}

	public function tmp_4x4($tmp_gejala)
	{
		// echo json_encode($tmp_gejala);
		$res4 = $this->res_4_2gejala($tmp_gejala);
		// echo "<br>".json_encode($res4);

		$tahap5 = array_merge($tmp_gejala, array($res4));

		// echo "<br><br>".json_encode($tahap5);

		$res5 = $this->res_4_3gejala($tmp_gejala);

		// echo "<br><br>".json_encode($res5);

		$tahap6 = array_merge($tahap5, array($res5));
		
		// echo "<br><br>".json_encode($tahap6);

		$res6 = $this->res_4_4gejala($tahap6);

		// echo "<br><br>".json_encode($res6);

		return $res6;
	}

	public function tmp_3x3($tmp_gejala)
	{
		$res4 = $this->res_3_2gejala($tmp_gejala);

		$tahap5 = array_merge($tmp_gejala, array($res4));

		// echo "<br>".json_encode($tahap5);

		$res5 = $this->res_3_3gejala($tmp_gejala);

		$tahap6 = array_merge($tahap5, array($res5));

		// echo "<br>".json_encode($tahap6);

		$res6 = $this->res_3_4gejala($tahap6);

		return $res6;
	}

	public function tmp_2x2($tmp_gejala)
	{
		// echo json_encode($tahap1)."<br>";
		// echo json_encode($tmp_gejala)."<br>";
		$res = $this->res_2gejala($tmp_gejala);
		$tahap2 = array_merge($tmp_gejala, array($res));
		// echo "<br>".json_encode($tahap2);
		$res2 = $this->res_2_2gejala($tmp_gejala);
		$tahap3 = array_merge($tahap2, array($res2));
		// echo "<br>".json_encode($tahap3);

		$res3 = $this->res_2_3gejala($tahap3);

		return $res3;
	}

	public function res_4_4gejala($tahap6)
	{
		// echo json_encode($tahap6);
		$tmp_penyakit = null;
		$m31 = 0;
		$m32 = 0;
		$m33 = 0;
		$penyakit1 = null;
		$penyakit2 = null;
		$penyakit3 = null;

		$teta = $tahap6[count($tahap6)-1]['m4'];
		$deltaTeta = 1 - $teta;
		for ($i=2; $i < count($tahap6); $i++) { 
			if ($tahap6[$i]['penyakit1'] == 'TF') {
				$m31 += $tahap6[$i]['m1'];
				$penyakit1 = 'TF';
			}
			if ($tahap6[$i]['penyakit1'] == 'DB') {
				$m32 += $tahap6[$i]['m1'];
				$penyakit2 = 'DB';
			}
			if ($tahap6[$i]['penyakit1'] == 'DBTF') {
				$m33 += $tahap6[$i]['m1'];
				$penyakit3 = 'DBTF';
			}
			if ($tahap6[$i]['penyakit2'] == 'TF') {
				$m31 += $tahap6[$i]['m2'];
				$penyakit3 = 'TF';
			}
			if ($tahap6[$i]['penyakit2'] == 'DB') {
				$m32 += $tahap6[$i]['m2'];
				$penyakit2 = 'DB';
			}
			if ($tahap6[$i]['penyakit2'] == 'DBTF') {
				$m33 += $tahap6[$i]['m2'];
				$penyakit3 = 'DBTF';
			}
			if ($tahap6[$i]['penyakit3'] == 'TF') {
				$m31 += $tahap6[$i]['m3'];
				$penyakit1 = 'TF';
			}
			if ($tahap6[$i]['penyakit3'] == 'DB') {
				$m32 += $tahap6[$i]['m3'];
				$penyakit2 = 'DB';
			}
			if ($tahap6[$i]['penyakit3'] == 'DBTF') {
				$m33 += $tahap6[$i]['m3'];
				$penyakit3 = 'DBTF';
			}
		}
		$m31 = round($m31/$deltaTeta, 3);
		$m32 = round($m32/$deltaTeta, 3);
		$m33 = round($m33/$deltaTeta, 3);

		$tmp_gejala= array();

		if ($m31 != 0) {			
			$tmp_gejala[] = $penyakit1;
			$tmp_gejala[] = $m31;
		}
		if ($m32 != 0) {
			$tmp_gejala[] = $penyakit2;
			$tmp_gejala[] = $m32;
		}
		if ($m33 != 0) {			
			$tmp_gejala[] = $penyakit3;
			$tmp_gejala[] = $m33;
		}
		$tmp_gejala[] = 'teta';
		$tmp_gejala[] = round($teta / $deltaTeta, 3);
		

		return $tmp_gejala;
	}

	public function res_4_3gejala($tahap4)
	{
		$m_teta = $tahap4[1]['m_teta'];

		$m1 = $tahap4[0]['m1'] * $m_teta;
		$penyakit1 = $tahap4[0]['penyakit1'];
		$m2 = $tahap4[0]['m2'] * $m_teta;
		$penyakit2 = $tahap4[0]['penyakit2'];
		$m3 = $tahap4[0]['m3'] * $m_teta;
		$penyakit3 = $tahap4[0]['penyakit3'];
		$teta = $tahap4[0]['m_teta'] * $m_teta;

		$tmp_gejala= array('penyakit1'=>$penyakit1,
							'm1'=>$m1,
							'penyakit2'=>$penyakit2,
							'm2'=>$m2,
							'penyakit3'=>$penyakit3,
							'm3'=>$m3,
							'penyakit4'=>'teta',
							'm4'=>$teta);

		return $tmp_gejala;
	}

	public function res_4_2gejala($tahap4)
	{
		$penyakit_end = end($tahap4);
		$penyakit_end = $penyakit_end['penyakit'];

		$m5 = $tahap4[1]['m'];
		$penyakit1 = null;
		$penyakit2 = null;
		$penyakit3 = null;
		$m1 = 0;
		$m2 = 0;
		$m3 = 0;
		$m4 = 0;
		$m_teta = 0;
		

	
		if ($penyakit_end == 'DBTF') {			
			$m1 = $tahap4[0]['m1'] * $m5;
			$penyakit1 = $tahap4[0]['penyakit1'];
			$m2 = $tahap4[0]['m2'] * $m5;
			$penyakit2 = $tahap4[0]['penyakit2'];
			$m3 = $tahap4[0]['m3'] * $m5;
			$penyakit2 = $tahap4[0]['penyakit3'];		

		}else{
			if ($tahap4[0]['penyakit1'] == 'DBTF') {
					$penyakit1 = $penyakit_end;
					$m1 = $tahap4[0]['m1'] * $m5;
			}else{
				if ($tahap4[0]['penyakit1'] == $penyakit_end) {
					$penyakit1 = $penyakit_end;
					$m1 = $tahap4[0]['m1'] * $m5;
				}else{
					$penyakit1 = 'stroke';
					$m1 = 0;
				}	
			}

			if ($tahap4[0]['penyakit2'] == 'DBTF') {
					$penyakit2 = $penyakit_end;
					$m2 = $tahap4[0]['m2'] * $m5;
			}else{
				if ($tahap4[0]['penyakit2'] == $penyakit_end) {
					$penyakit2 = $penyakit_end;
					$m2 = $tahap4[0]['m2'] * $m5;
				}else{
					$penyakit2 = 'stroke';
					$m2 = 0;
				}	
			}

			if ($tahap4[0]['penyakit3'] == 'DBTF') {
					$penyakit3 = $penyakit_end;
					$m3 = $tahap4[0]['m3'] * $m5;
			}else{
				if ($tahap4[0]['penyakit3'] == $penyakit_end) {
					$penyakit3 = $penyakit_end;
					$m3 = $tahap4[0]['m3'] * $m5;
				}else{
					$penyakit3 = 'stroke';
					$m3 = 0;
				}	
			}
			
			
			$m_teta = $tahap4[0]['m_teta'] * $m5;
		}

		$tmp_gejala= array('penyakit1'=>$penyakit1,
							'm1'=>$m1,
							'penyakit2'=>$penyakit2,
							'm2'=>$m2,							
							'penyakit3'=>$penyakit3,
							'm3'=>$m3,
							'penyakit4'=>$penyakit_end,
							'm4'=>$m_teta);
		// echo json_encode($tmp_gejala);

		return $tmp_gejala;
	}

	public function res_3_4gejala($tahap6)
	{
		// echo json_encode($tahap6);
		$tmp_penyakit = null;
		$m31 = 0;
		$m32 = 0;
		$m33 = 0;
		$penyakit1 = null;
		$penyakit2 = null;
		$penyakit3 = null;

		$teta = $tahap6[count($tahap6)-1]['m3'];
		$deltaTeta = 1 - $teta;
		for ($i=2; $i < count($tahap6); $i++) { 
			if ($tahap6[$i]['penyakit1'] == 'TF') {
				$m31 += $tahap6[$i]['m1'];
				$penyakit1 = 'TF';
			}
			if ($tahap6[$i]['penyakit1'] == 'DB') {
				$m32 += $tahap6[$i]['m1'];
				$penyakit2 = 'DB';
			}
			if ($tahap6[$i]['penyakit1'] == 'DBTF') {
				$m33 += $tahap6[$i]['m1'];
				$penyakit3 = 'DBTF';
			}
			if ($tahap6[$i]['penyakit2'] == 'TF') {
				$m31 += $tahap6[$i]['m2'];
				$penyakit3 = 'TF';
			}
			if ($tahap6[$i]['penyakit2'] == 'DB') {
				$m32 += $tahap6[$i]['m2'];
				$penyakit2 = 'DB';
			}
			if ($tahap6[$i]['penyakit2'] == 'DBTF') {
				$m33 += $tahap6[$i]['m2'];
				$penyakit3 = 'DBTF';
			}
			if ($tahap6[$i]['penyakit3'] == 'TF') {
				$m31 += $tahap6[$i]['m3'];
				$penyakit1 = 'TF';
			}
			if ($tahap6[$i]['penyakit3'] == 'DB') {
				$m32 += $tahap6[$i]['m3'];
				$penyakit2 = 'DB';
			}
			if ($tahap6[$i]['penyakit3'] == 'DBTF') {
				$m33 += $tahap6[$i]['m3'];
				$penyakit3 = 'DBTF';
			}
		}
		$m31 = round($m31/$deltaTeta, 3);
		$m32 = round($m32/$deltaTeta, 3);
		$m33 = round($m33/$deltaTeta, 3);

		$tmp_gejala= array();

		if ($m31 != 0) {			
			$tmp_gejala[] = $penyakit1;
			$tmp_gejala[] = $m31;
		}
		if ($m32 != 0) {
			$tmp_gejala[] = $penyakit2;
			$tmp_gejala[] = $m32;
		}
		if ($m33 != 0) {			
			$tmp_gejala[] = $penyakit3;
			$tmp_gejala[] = $m33;
		}
		$tmp_gejala[] = 'teta';
		$tmp_gejala[] = round($teta / $deltaTeta, 3);
		

		return $tmp_gejala;
	}

	public function res_3_3gejala($tahap4)
	{
		$m_teta = $tahap4[1]['m_teta'];

		$m1 = $tahap4[0]['m1'] * $m_teta;
		$penyakit1 = $tahap4[0]['penyakit1'];
		$m2 = $tahap4[0]['m2'] * $m_teta;
		$penyakit2 = $tahap4[0]['penyakit2'];
		$teta = $tahap4[0]['m_teta'] * $m_teta;

		$tmp_gejala= array('penyakit1'=>$penyakit1,
							'm1'=>$m1,
							'penyakit2'=>$penyakit2,
							'm2'=>$m2,
							'penyakit3'=>'teta',
							'm3'=>$teta);

		return $tmp_gejala;
	}

	public function res_3_2gejala($tahap4)
	{
		$penyakit_end = end($tahap4);
		$penyakit_end = $penyakit_end['penyakit'];

		$m3 = $tahap4[1]['m'];
		$penyakit1 = null;
		$penyakit2 = null;
		$penyakit3 = null;
		$m1 = 0;
		$m2 = 0;
		$m3 = 0;
		$m4 = 0;
		$m_teta = 0;
	
		if ($penyakit_end == 'DBTF') {			
			$m1 = $tahap4[0]['m1'] * $m3;
			$penyakit1 = $tahap4[0]['penyakit1'];
			$m2 = $tahap4[0]['m2'] * $m3;
			$penyakit2 = $tahap4[0]['penyakit2'];		
		}else{
			if ($tahap4[0]['penyakit1'] == 'DBTF') {
					$penyakit1 = $penyakit_end;
					$m1 = $tahap4[0]['m1'] * $m3;
			}else{
				if ($tahap4[0]['penyakit1'] == $penyakit_end) {
					$penyakit1 = $penyakit_end;
					$m1 = $tahap4[0]['m1'] * $m3;
				}else{
					$penyakit1 = 'stroke';
					$m1 = 0;
				}	
			}

			if ($tahap4[0]['penyakit2'] == 'DBTF') {
					$penyakit2 = $penyakit_end;
					$m2 = $tahap4[0]['m2'] * $m3;
			}else{
				if ($tahap4[0]['penyakit2'] == $penyakit_end) {
					$penyakit2 = $penyakit_end;
					$m2 = $tahap4[0]['m2'] * $m3;
				}else{
					$penyakit2 = 'stroke';
					$m2 = 0;
				}	
			}
			
			
			$m_teta = $tahap4[0]['m_teta'] * $m3;
		}

		$tmp_gejala= array('penyakit1'=>$penyakit1,
							'm1'=>$m1,
							'penyakit2'=>$penyakit2,
							'm2'=>$m2,
							'penyakit3'=>$penyakit_end,
							'm3'=>$m_teta);
		// echo json_encode($tmp_gejala);

		return $tmp_gejala;

	}

	public function res_2_3gejala($tahap3)
	{
		$tmp_penyakit = null;
		$m31 = 0;
		$m32 = 0;
		$m33 = 0;
		$penyakit1 = null;
		$penyakit2 = null;
		$penyakit3 = null;

		$teta = $tahap3[count($tahap3)-1]['m_teta'];
		$deltaTeta = 1 - $teta;
		for ($i=2; $i < count($tahap3); $i++) { 
			if ($tahap3[$i]['penyakit'] == 'TF') {
				$m31 += $tahap3[$i]['m'];
				$penyakit1 = 'TF';
			}
			if ($tahap3[$i]['teta'] == 'TF') {
				$m31 += $tahap3[$i]['m_teta'];
			}
			if ($tahap3[$i]['penyakit'] == 'DB') {
				$m32 += $tahap3[$i]['m'];
				$penyakit2 = 'DB';
			}
			if ($tahap3[$i]['teta'] == 'DB') {
				$m32 += $tahap3[$i]['m_teta'];
			}
			if ($tahap3[$i]['penyakit'] == 'DBTF') {
				$m33 += $tahap3[$i]['m'];
				$penyakit3 = 'DBTF';
			}
			if ($tahap3[$i]['teta'] == 'DBTF') {
				$m33 += $tahap3[$i]['m_teta'];
			}
		}

		$m31 = round($m31/$deltaTeta, 3);
		$m32 = round($m32/$deltaTeta, 3);
		$m33 = round($m33/$deltaTeta, 3);

		$tmp_gejala= array();

		if ($m31 != 0) {			
			$tmp_gejala[] = $penyakit1;
			$tmp_gejala[] = $m31;
		}
		if ($m32 != 0) {
			$tmp_gejala[] = $penyakit2;
			$tmp_gejala[] = $m32;
		}
		if ($m33 != 0) {			
			$tmp_gejala[] = $penyakit3;
			$tmp_gejala[] = $m33;
		}
		$tmp_gejala[] = 'teta';
		$tmp_gejala[] = round($teta / $deltaTeta, 3);
		

		return $tmp_gejala;

		
	}

	public function res_2_2gejala($tahap1)
	{
		for ($i=0; $i < count($tahap1); $i++) { 
			if ($i < count($tahap1)-1) {
				$m2 = $tahap1[$i]['m'] * $tahap1[count($tahap1)-1]['m_teta'];
				$m2_teta = $tahap1[$i]['m_teta'] * $tahap1[count($tahap1)-1]['m_teta'];
				$penyakit = $tahap1[$i]['penyakit'];
				$teta = $tahap1[$i]['teta'];	
			}

		}
		$tmp_gejala= array('penyakit'=>$penyakit,
							'm'=>$m2,
							'teta'=>$teta,
							'm_teta'=>$m2_teta);

		return $tmp_gejala;
	}

	public function res_2gejala($tahap1)
	{
		$penyakit_end = end($tahap1);
		$penyakit_end = $penyakit_end['penyakit'];

		$m1 = 1;

		

		for ($i=0; $i < count($tahap1); $i++) { 	
			if ($penyakit_end == 'DBTF') {
				if ($tahap1[$i]['penyakit'] == $penyakit_end) {
					$m1_row = $tahap1[$i]['m'];
					$m1 = $m1 * $m1_row;
				}else{
					$m1_row = $tahap1[$i]['m'];
					$m1 = $m1 * $m1_row;
				}
				if ($i < count($tahap1)-1) {
					$penyakit = $tahap1[$i]['penyakit'];	
				}			
			}else{
				if ($tahap1[$i]['penyakit'] == 'DBTF') {
					if ((strpos($tahap1[$i]['penyakit'], $penyakit_end)) !== false) {
						$penyakit = $penyakit_end;
						$m1_row = $tahap1[$i]['m'];
						$m1 = $m1 * $m1_row;
					}else{
						$penyakit = 'stroke';
						$m1 = 0;
					}
				}else{
					if ($tahap1[$i]['penyakit'] == $penyakit_end) {
						$penyakit = $penyakit_end;
						$m1_row = $tahap1[$i]['m'];
						$m1 = $m1 * $m1_row;
					}else{
						$penyakit = 'stroke';
						$m1 = 0;
					}	
				}
			}
			if ($i < count($tahap1)-1) {
				$m1_teta = $tahap1[$i]['m_teta'] * $tahap1[count($tahap1)-1]['m'];	
			}
		}

		$tmp_gejala= array('penyakit'=>$penyakit,
							'm'=>$m1,
							'teta'=>$penyakit_end,
							'm_teta'=>$m1_teta);

		return $tmp_gejala;
	}

	public function res_1gejala($tahap1)
	{
		foreach ($tahap1 as $key => $value) {
			$penyakit =  $value['penyakit'];
			if ($penyakit == 'DB') {
				$penyakit = "Demam Berdarah";
			}else if($penyakit == 'TF'){
				$penyakit = 'Tifus';
			}else{
				$penyakit = "Demam Berdarah Tifus";
			}
		}
		return $penyakit;
	}

	public function fgejala($gejala)
	{
		if ($gejala != null) {
			$sql = $this->Admin_model->cekgejala($gejala);
			$sqlrow = $this->Admin_model->cekrowgejala($gejala);
			$tmp_penyakit = null;
			
			if ($sqlrow > 0) {				
				foreach ($sql as $row) {
					if ($row['NAMA_PENYAKIT'] == 'DBD') {
						$tmp_penyakit = $tmp_penyakit.'DB';
					}else{
						$tmp_penyakit = $tmp_penyakit.'TF';
					}
					$m_a = floatval($row['BOBOT_GEJALA']);
					$m_teta = 1 - $m_a;
					

				}
			}
			$tmp_gejala= array('penyakit'=>$tmp_penyakit,
							'm'=>$m_a,
							'teta'=>'teta',
							'm_teta'=>$m_teta); 
		}
		return $tmp_gejala;


	}

	public function edit_diagnosa($ID_DIAGNOSA){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_diagnosa($_POST, $ID_DIAGNOSA);
			redirect('Admin/diagnosa');
		}
		 $data['tampil_gejala'] = $this->Admin_model->ambil_gejala();
        $data['tampil_pasien'] = $this->Admin_model->ambil_pasien();
		$data['default'] = $this->Admin_model->get_default_diagnosa($ID_DIAGNOSA);

		$this->load->view("diagnosa/diagnosa_add",$data);
	}
	public function delete_diagnosa($ID_DIAGNOSA){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_diagnosa($ID_DIAGNOSA);
		redirect('Admin/diagnosa');
	}
	//----------------------------------------------------solusi//
	public function solusi(){
		$this->load->model('Admin_model');
		$data['list_solusi'] = $this->Admin_model->data_solusi();
		$this->load->view("solusi/solusi_view",$data);
	}
	public function add_solusi(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->simpan_solusi($_POST);
			redirect("Admin/solusi");
		}
		$data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
		$this->load->view("solusi/solusi_add",$data);
	}
	public function edit_solusi($ID_SOLUSI){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_solusi($_POST, $ID_SOLUSI);
			redirect('Admin/solusi');
		}
		$data['default'] = $this->Admin_model->get_default_solusi($ID_SOLUSI);

		$this->load->view("solusi/solusi_add",$data);
	}
	public function delete_solusi($ID_SOLUSI){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_solusi($ID_SOLUSI);
		redirect('Admin/solusi');
	}

	
	
}

 ?>