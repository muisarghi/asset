<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mda extends CI_Controller
{

public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->model('mda_model');
	
	$this->load->helper('url');
	$this->load->helper('form','url');
    $this->load->helper('html');
	$this->load->library('form_validation');
	$this->load->library('session');
	$this->load->library('pagination');
	$this->load->library('mius');
 
	$this->load->helper('ckeditor');
 
	//Ckeditor's configuration
 
	$this->data['ckeditor'] = array(
	'id'     =>     'content',
	'path'    =>    'property/css/ckeditor',
	'config' => array( 'toolbar' => "Full", 'width' => "550px", 'height' => '100px',),
	'styles' => array( 'style 1' => array ( 'name' => 'Blue Title', 'element' => 'h2',
	'styles' => array( 'color' => 'Blue', 'font-weight' => 'bold') ),
	'style 2' => array ( 'name' => 'Red Title', 'element' => 'h2', 'styles' => array(
	'color'	=> 'Red', 'font-weight' => 'bold', 'text-decoration' => 'underline')))
    );
 
	$this->data['ckeditor_2'] = array( 'id' => 'content_2', 'path' => 'property/css/ckeditor', 'config' => array('width' => "550px", 'height' => '100px', 'toolbar' => array( array('Bold', 'Italic'), array('Underline', 'Strike', 'FontSize'), array('Smiley'),'/')), 'styles' => array( 'style 3' => array ( 'name' => 'Green Title', 'element' => 'h3', 'styles' => array( 'color' => 'Green', 'font-weight' => 'bold'))));
	
    /*public function index() 
		{            
		$this->load->view('ckeditor', $this->data);
 
        }
		*/
	}

public function index ()
	{
	/*
	$this->load->view('layout/head');
	$this->load->view('home');
	$this->load->view('guest_view');
	$this->load->view('layout/foot');
	*/
	if($this->session->userdata('akses')=='administrator')
		{
		$this->load->view('layadm/header');
		$this->load->view('layadm/menu');
		$this->load->view('layadm/body');
		$this->load->view('layadm/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}

function masterkl()
	{
	$this->load->view('layadm/header');
	
	$this->load->view('layadm/menu');
	//$data=$this->guest_model->masterkl();
	//$this->load->view('view',$data);
	$data['kl']=$this->mda_model->masterkl()->result();
	$this->load->view('layadm/masterkl', $data);
	$this->load->view('layadm/footer');
	}

function editkl()
		{
		$idkl=$this->input->post('idkl');
		$namakl=$this->input->post('namakl');
		$codebranch=$this->input->post('codebranch');
		$codeuker=$this->input->post('codeuker');
		$data=array(
		'idkl' => $idkl,	
		'namakl' => $namakl,
		'codebranch' => $codebranch,
		'codeuker' => $codeuker,
		);
		$where=array('idkl'=>$idkl);
		$this->mda_model->update($where,$data,'kl');

		$this->session->set_flashdata('msg', '
		<div class="alert  alert-warning alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-warning">Sukses</span> Data <i>'.$namakl.'</i> Telah Diganti.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/mda/masterkl', 'refresh');

		}
 
function detailkl($rowid)
	{
	$id=$this->input->post('rowid');
	$result=$this->mda_model->getidkl($id);
	$data['idkl'] = $result[0]['idkl'];
	$data['namakl'] = $result[0]['namakl'];
	$data['codebranch'] = $result[0]['codebranch'];
	$data['codeuker'] = $result[0]['codeuker'];
	$this->load->view('layadm/detailkl',$data);
	}


function hpskl()
		{
		$idkl=$this->input->post('idkl');
		$namakl=$this->input->post('namakl');
		$data=array(
		'idkl' => $idkl);
		$where=array('idkl'=>$idkl);
		$this->mda_model->hapus($where,$data,'kl');
		
		$this->session->set_flashdata('msg', '
		<div class="alert  alert-danger alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-danger">Sukses</span> Data Kantor Layanan <i>'.$namakl.'</i> Telah Dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/mda/masterkl', 'refresh');

		}

function inputkl()
	{
	$namakl=$this->input->post('namakl');
	$codebranch=$this->input->post('codebranch');
	$codeuker=$this->input->post('codeuker');
	$data=array(
	'namakl'=>$namakl,
	'codebranch'=>$codebranch,
	'codeuker'=>$codeuker
	);
	$this->mda_model->inputkl($data,$table);
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data KL Baru '.$nmcabbg.' Telah Masuk.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	redirect(base_url().'index.php/mda/masterkl', 'refresh');
	}

function userkl()
	{
	$data['kl']=$this->mda_model->masterkl_()->result();
	$dtuser['user']=$this->mda_model->viewuserkl()->result();
	$this->load->view('layadm/header');
	$this->load->view('layadm/menu',$dtuser);
	$this->load->view('layadm/userkl',$data);
	$this->load->view('layadm/footer');
	}

function inputuserkl()
	{
	$namauser=$this->input->post('namauser');
	$jabatan=$this->input->post('jabatan');
	$idkl=$this->input->post('idkl');
	if($idkl=='Dir')
		{$akses='direksi'; $ketuser='direksi';}
	elseif($idkl=='Div')
		{$akses='administrator'; $ketuser='0';}
	else
		{$akses='kl'; $ketuser=$idkl;}
	$username=$this->input->post('username');
	$password=$this->input->post('password');
	$pass=md5($password);
	$data=array(
	'namauser'=>$namauser,
	'username'=>$username,
	'password'=>$pass,
	'akses'=>$akses,
	'ketuser'=>$ketuser,
	'jabatan'=>$jabatan
	);
	$this->mda_model->inputuserkl($data,$table);
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Baru <i>'.$namauser.'</i> Telah Masuk.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	redirect(base_url().'index.php/mda/userkl', 'refresh');
	}


function detailuserkl($rowid)
	{
	$id=$this->input->post('rowid');
	$result=$this->mda_model->userklid($id);
	$data['iduser'] = $result[0]['iduser'];
	$data['namauser'] = $result[0]['namauser'];
	$data['username'] = $result[0]['username'];
	$data['akses'] = $result[0]['akses'];
	$data['ketuser'] = $result[0]['ketuser'];
	$data['jabatan'] = $result[0]['jabatan'];
	$this->load->view('layadm/detailuser',$data);
	}

function edituserkl()
		{
		//$iduser=$this->input->post('iduser');
		$iduser=$_POST['iduser'];
		$namauser=$this->input->post('namauser');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$jabatan=$this->input->post('jabatan');
		$pass=md5($password);
		$akses=$this->input->post('akses');
		if($akses=='Dir')
			{$aksesb='direksi'; $ketuser='direksi';}
		elseif($akses=='Div')
			{$aksesb='administrator'; $ketuser='0';}
		else
			{$aksesb='kl'; $ketuser=$akses;}
		//echo"$iduser, $namauser, $username, $password, $aksesb, $ketuser";
		
		$data=array(
		'iduser' => $iduser,	
		'namauser' => $namauser,
		'username' => $username,
		'password' => $pass,
		'akses' => $aksesb,
		'ketuser' => $ketuser,
		'jabatan' => $jabatan,
		);
		$where=array('iduser'=>$iduser);
		$this->mda_model->update($where,$data,'user');

		$this->session->set_flashdata('msg', '
		<div class="alert  alert-warning alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-warning">Sukses</span> Data User <i>'.$namauser.'</i> Telah Diganti.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/mda/userkl', 'refresh');
		
		}

function hpsuser()
		{
		$iduser=$this->input->post('iduser');
		$namauser=$this->input->post('namauser');
		$data=array(
		'iduser' => $iduser);
		$where=array('iduser'=>$iduser);
		$this->mda_model->hapus($where,$data,'user');
		
		$this->session->set_flashdata('msg', '
		<div class="alert  alert-danger alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-danger">Sukses</span> Data User <i>'.$namauser.'</i> Telah Dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/mda/userkl', 'refresh');

		}



function mastergol()
	{
	$golin['golsub']=$this->mda_model->golinduk()->result();
	$this->load->view('layadm/header');
	$this->load->view('layadm/menu',$golin);
	$dtgol['gol']=$this->mda_model->viewgol()->result();
	$this->load->view('layadm/mastergol',$dtgol);
	$this->load->view('layadm/footer');
	}

function detailgol($rowid)
	{
	$id=$this->input->post('rowid');
	$result=$this->mda_model->golid($id);
	$data['idgol'] = $result[0]['idgol'];
	$data['namagol'] = $result[0]['namagol'];
	$data['kodegol'] = $result[0]['kodegol'];
	$data['subgol'] = $result[0]['subgol'];
	$data['ketgol'] = $result[0]['ketgol'];
	
	$this->load->view('layadm/detailgol',$data);
	}



function inputgol()
	{
	$namagol=$this->input->post('namagol');
	$kodegol=$this->input->post('kodegol');
	$subgol=$this->input->post('subgol');
	$ketgol=$this->input->post('ketgol');
	$data=array(
	'namagol'=>$namagol,
	'kodegol'=>$kodegol,
	'subgol'=>$subgol,
	'ketgol'=>$ketgol
	);
	$this->mda_model->inputgol($data,$table);
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Golongan <i>'.$namagol.'</i> Telah Ditambahkan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	redirect(base_url().'index.php/mda/mastergol', 'refresh');
	}

function editgol_()
		{
		$idgol=$this->input->post('idgol');
		$namagol=$this->input->post('namagol');
		$kodegol=$this->input->post('kodegol');
		$subgol=$this->input->post('subgol');
		$ketgol=$this->input->post('ketgol');
		$data=array(
		'idgol' => $idgol,	
		'namagol' => $namagol,
		'kodegol' => $kodegol,
		'subgol' => $subgol,
		'ketgol' => $ketgol
		);
		$where=array('idgol'=>$idgol);
		$this->mda_model->update($where,$data,'golongan');

		$this->session->set_flashdata('msg', '
		<div class="alert  alert-warning alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-warning">Sukses</span> Data Golongan <i>'.$namagol.'</i> Telah Diganti.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/mda/mastergol', 'refresh');

		}

function hpsgol()
		{
		$idgol=$this->input->post('idgol');
		$namagol=$this->input->post('namagol');
		$data=array(
		'idgol' => $idgol);
		$where=array('idgol'=>$idgol);
		$this->mda_model->hapus($where,$data,'golongan');

		$this->session->set_flashdata('msg', '
		<div class="alert  alert-danger alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-danger">Sukses</span> Data Golongan <i>'.$namagol.'</i> Telah Dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/mda/mastergol', 'refresh');

		}



function masterjenis()
	{
	$dtgol['gol']=$this->mda_model->golongan()->result();
	$dtjns['jns']=$this->mda_model->viewjns()->result();
	$this->load->view('layadm/header',$dtgol);
	$this->load->view('layadm/menu');
	$this->load->view('layadm/masterjenis',$dtjns);
	$this->load->view('layadm/footer');
	}

function inputjns()
	{
	$nmjenis=$this->input->post('nmjenis');
	$idgol=$this->input->post('idgol');
	$kodejenis=$this->input->post('kodejenis');
	$thnsusut=$this->input->post('thnsusut');
	$persensusut=$this->input->post('persensusut');
	$ketjenis=$this->input->post('ketjenis');
	$data=array(
	'idgol'=>$idgol,
	'nmjenis'=>$nmjenis,
	'kodejenis'=>$kodejenis,
	'ketjenis'=>$ketjenis,
	'thnsusut'=>$thnsusut,
	'persensusut'=>$persensusut
	);
	$this->mda_model->inputjns($data,$table);
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Jenis Barang Baru Telah Ditambahkan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	redirect(base_url().'index.php/mda/masterjenis', 'refresh');
	}

function logout()
	{
	$this->session->sess_destroy();
	//redirect(base_url('login'));
	redirect(base_url().'index.php/login', 'refresh');
	}


function detail($rowid)
	{
	$id=$this->input->post('rowid');
	$result=$this->mda_model->jnsid($id);
	$data['idjenis'] = $result[0]['idjenis'];
	$data['idgol'] = $result[0]['idgol'];
	$data['nmjenis'] = $result[0]['nmjenis'];
	$data['kodejenis'] = $result[0]['kodejenis'];
	$data['ketjenis'] = $result[0]['ketjenis'];
	$data['thnsusut'] = $result[0]['thnsusut'];
	$data['persensusut'] = $result[0]['persensusut'];
	$this->load->view('layadm/detailjns',$data);
	}


function editjns()
	{
	$idjenis=$this->input->post('idjenis');
	$nmjenis=$this->input->post('nmjenis');
	$idgol=$this->input->post('idgol');
	$kodejenis=$this->input->post('kodejenis');
	$ketjenis=$this->input->post('ketjenis');
	$thnsusut=$this->input->post('thnsusut');
	$persensusut=$this->input->post('persensusut');
	$data=array(
		'idjenis' => $idjenis,	
		'idgol' => $idgol,	
		'nmjenis' => $nmjenis,
		'kodejenis' => $kodejenis,
		'ketjenis' => $ketjenis,
		'thnsusut' => $thnsusut,
		'persensusut' => $persensusut
		);
	$where=array('idjenis'=>$idjenis);
	$this->mda_model->update($where,$data,'jenis');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
	<span class="badge badge-pill badge-warning">Sukses</span> Data Jenis Barang '.$nmjenis.' Telah Diganti.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	');
	redirect(base_url().'index.php/mda/masterjenis', 'refresh');
	}

function hpsjns()
		{
		$idjenis=$this->input->post('idjenis');
		$nmjenis=$this->input->post('nmjenis');
		$data=array(
		'idjenis' => $idjenis);
		$where=array('idjenis'=>$idjenis);
		$this->mda_model->hapus($where,$data,'jenis');

		$this->session->set_flashdata('msg', '
		<div class="alert  alert-danger alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-danger">Sukses</span> Data Jenis Barang <i>'.$nmjenis.'</i> Telah Dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/mda/masterjenis', 'refresh');

		}


function mastersusut()
	{
	$dtgol['gol']=$this->mda_model->golongan()->result();
	$dtjns['jns']=$this->mda_model->viewjns()->result();
	$this->load->view('layadm/header',$dtgol);
	$this->load->view('layadm/menu');
	$this->load->view('layadm/mastersusut',$dtjns);
	$this->load->view('layadm/footer');
	}


///////////////////082216713611
////////////////
///////////////
//////////////////

function lib()
	{
	$this->load->view('layout/head');
	//$data['doto']=$this->guest_model->viewcoba();
	//$this->load->view('libra', $data);
	$data=$this->mius->view();
	$this->load->view('libra', $data);
	$this->load->view('layout/foot');
	}

function libdet($id)
	{
	$this->load->view('layout/head');
	//$data['doto']=$this->guest_model->viewcoba();
	//$this->load->view('libra', $data);
	$result=$this->mius->viewdet($id);
	$data['id'] = $result[0]['id'];
	$data['nama'] = $result[0]['nama'];
	$data['alamat'] = $result[0]['alamat'];
	$this->load->view('libdet', $data);
	$this->load->view('layout/foot');
	}


function menu()
	{
	$this->load->view('menu');
	}

function profile()
	{
	$this->load->view('layout/head');
	$this->load->view('profile');
	$this->load->view('layout/foot');
	}

function content()
	{
	$this->load->view('layout/head');
	//$this->load->view('ckeditor', $this->data);
	$this->load->view('content', $this->data);
	$this->load->view('layout/foot');
	}

function form()
	{
	$this->load->view('layout/head');
	$this->load->view('form');
	$this->load->view('layout/foot');
	}

function insert_guest()
	{
	if ($_POST)
		{
	$idfile=mysql_result(mysql_query("select MAX(id) from coba"),0);
	$idna=$idfile+1;
	$config['file_name']= $idfile.'.jpg';
	$config['upload_path']='./myfile';
	$config['allowed_types']='gif|jpg|png|doc';
	$config['max_size']='3000';
	$config['max_width']='1024';
	$config['max_height']='768';
	$this->load->library('upload', $config);
	//$this->upload->initialize($config);
	//$this->upload->uploadb();
	if( ! $this->upload->do_upload('file'))
		{
		$error=array('error' => $this->upload->display_errors());
		//redirect (base_url().'index.php/guest/upload', $error);
		}
	else
		{
	$data=array('upload_data' => $this->upload->data());
	///redirect (base_url().'index.php/guest/upload', 'refresh');
		}

		$this->guest_model->insert_guest($_POST);
		redirect(base_url().'index.php/Guest/view', 'refresh');
		}
	else
		{
		show_error("restrict access");
		}
	}
//152703216800

function view()
	{
	$this->load->library('table');
	$this->load->view('layout/head');
	$this->load->library('pagination');
	$data=$this->guest_model->viewGuest();
	$this->load->view('view',$data);
	//$this->load->view('paging', $data);
	$this->load->view('layout/foot');
	}

function viewgu()
	{
	$this->load->library('table');
	$tmpl = array ('table_open' => '<table class="head" border="1" cellpadding="2" cellspacing="0">');
	$this->table->set_template($tmpl);
	$data = $this->guest_model->viewGuest();
	$this->table->clear();
	echo heading('View Guest Book',3); // h3
	echo br(2);
	$this->table->set_heading('ID', 'Name', 'Alamat', 'Detail', 'Delete');
	foreach ($data as $item)
        {
        $this->table->add_row($item['id'], $item['name'], $item['alamat'],anchor('mahasiswa/edit/'.$item['id'],'detail'),anchor('mahasiswa/delete/'.$item['id'],'delete'));
        }
	echo $this->table->generate();
	echo br(2);
	echo anchor(base_url(), 'Back');
	}


function edit($id)
	{
	$this->load->view('layout/head');
	$result = $this->guest_model->getGuest($id);
	$data['id'] = $result[0]['id'];
	$data['name'] = $result[0]['name'];
	$data['alamat'] = $result[0]['alamat'];
	$data['idk'] = $result[0]['id'];
	$this->load->view('update', $data);
	$this->load->view('layout/foot');
	}


function update_guest()
	{
	 if ($_POST)
        {
		$this->load->helper('url');
		$this->guest_model->updateGuest($_POST);
		redirect(base_url().'index.php/Guest/view', 'refresh');
        }
      else
        {
        show_error("restrict access");
        }
	}

function delete($id)
	{
	$this->guest_model->delete_guest($id);
    redirect(base_url(), 'refresh');
	}

function login()
	{
	$this->load->view('layout/head');
	$this->load->view('login');
	$this->load->view('layout/foot');
	}

function loginarea()
	{
	$this->load->view('layout/head');
	$this->load->view('loginarea');
	$this->load->view('layout/foot');
	}


function pro_login()
	{

	$this->load->helper('url');

	$username=$this->input->post('user');
	$password=$this->input->post('pass');

	if($this->guest_model->prologin($username, $password))
		{
		$this->load->library('session');
		$this->session->set_userdata('username', $username);
		redirect(base_url().'index.php/Guest/loginarea', 'refresh');
		}
	else
		{echo"Gagal";}

	}

function upload()
	{
	$this->load->view('layout/head');
	$this->load->view('upload');
	$this->load->view('layout/foot');
	}

function uploadb()
	{
	$config['upload_path']='./myfile';
	$config['allowed_types']='gif|jpg|png|doc';
	$config['max_size']='3000';
	$config['max_width']='1024';
	$config['max_height']='768';
	$this->load->library('upload', $config);
	//$this->upload->initialize($config);
	//$this->upload->uploadb();
	if( ! $this->upload->do_upload('file'))
		{
		$error=array('error' => $this->upload->display_errors());
		redirect (base_url().'index.php/guest/upload', $error);
		}
	else
		{
	$data=array('upload_data' => $this->upload->data());
	redirect (base_url().'index.php/guest/upload', 'refresh');
		}
	}


function percobaan()
	{
	$this->load->library('table');
	$this->load->view('layout/head');
	$this->load->view('coba', $data);
	$this->load->view('layout/foot');
	}


function monpagi()
	{
	if($this->session->userdata('akses')=='administrator')
		{
		//$idno=$this->session->userdata('iduser');
		//$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		//$cekpg['mycek']=$this->kl_model->cekpg()->result();
		$this->load->view('layadm/header');
		$this->load->view('layadm/menu');
		$this->load->view('layadm/monpagi');
		$this->load->view('layadm/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}






}


?>
