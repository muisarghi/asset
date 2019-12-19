<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class kl extends CI_Controller
{

//

public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->model('mda_model');
	$this->load->model('kl_model');
	
	$this->load->helper('url');
	$this->load->helper('form', 'url');
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
	if($this->session->userdata('akses')=='kl')
		{
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/menu');
		$this->load->view('laykl/body');
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}


function monpagi()
	{
	
	/*
	$this->load->view('layout/head');
	$this->load->view('home');
	$this->load->view('guest_view');
	$this->load->view('layout/foot');


	$pgcek="SELECT
	a.tgl_reli, a.cek_reli, a.codeuker,
	b.tgl_saldo, b.cek_saldo, b.codeuker, b.jns_saldo,
	c.tgl_selisih, c.cek_selisih, c.codeuker, c.jns_selisih,
	d.tgl_doktk, d.cek_doktk, d.codeuker
	FROM
	reli a 
	left join saldo b on a.codeuker=b.codeuker
	left join selisih c on a.codeuker=c.codeuker
	left join doktk d on a.codeuker=d.codeuker
	where a.codeuker='$codeuker' and a.tgl_reli='$now' and b.tgl_saldo='$now' and c.tgl_selisih='$now' and d.tgl_doktk='$now' 
	
	";
	*/
	if($this->session->userdata('akses')=='kl')
		{
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		$cekpg['mycek']=$this->kl_model->cekpg()->result();
		$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/menu',$cekpg);
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/monpagi');
		//$this->load->view('laykl/pga');
		//$this->load->view('laykl/pgb');
		//$this->load->view('laykl/pgc');
		//$this->load->view('laykl/pgd');
		//$this->load->view('laykl/pge');
		//$this->load->view('laykl/pgf');
		//$this->load->view('laykl/pgg');
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}



function pgai()
	{
	$reli99=$this->input->post('reli99');
	$ketreli=$this->input->post('ketreli');
	$tglreli=date('Y-m-d h:i:s');
	$codeuker=$this->input->post('codeuker');
	$add=$this->input->post('add');
	
	$data=array(
	'id_reli'=>'',
	'tgl_reli'=>$tglreli,
	'codeuker'=>$codeuker,
	'reli99'=>$reli99,
	'ket_reli'=>$ketreli,
	'cek_reli'=>'1'
	);
	
	$this->kl_model->input($data,'reli');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data  Reliability Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}

function pgaiup()
	{
	$id_reli=$this->input->post('id_reli');
	$reli99=$this->input->post('reli99');
	$ketreli=$this->input->post('ketreli');
	//$tglreli=date('Y-m-d h:i:s');
	//$codeuker=$this->input->post('codeuker');
	$add=$this->input->post('add');
	
	$data=array(
	'reli99'=>$reli99,
	'ket_reli'=>$ketreli
	);
	$where=array('id_reli'=>$id_reli);
	$this->mda_model->update($where,$data,'reli');
	
	//$this->kl_model->input($data,'reli');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data  Reliability Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}




function pggi()
	{
	//
	$add=$this->input->post('add');
	$tka=$this->input->post('tka');
	$tkb=$this->input->post('tkb');
	$tkc=$this->input->post('tkc');
	$totaltk=$tka+$tkb+$tkc;
	$kettk=$this->input->post('kettk');
	$tgldoktk=date('Y-m-d');
	$codeuker=$this->input->post('codeuker');
	
	$data=array(
	'id_doktk'=>'',
	'codeuker'=>$codeuker,
	'tgl_doktk'=>$tgldoktk,
	'tka'=>$tka,
	'tkb'=>$tkb,
	'tkc'=>$tkc,
	'totaltk'=>$totaltk,
	'kettk'=>$kettk,
	'cek_doktk'=>'1'
	);
	
	$this->kl_model->input($data,'doktk');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data  Dokumen Tambahan Kas Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}

function pggiup()
	{
	$id_doktk=$this->input->post('id_doktk');
	$add=$this->input->post('add');
	$tka=$this->input->post('tka');
	$tkb=$this->input->post('tkb');
	$tkc=$this->input->post('tkc');
	$totaltk=$tka+$tkb+$tkc;
	$kettk=$this->input->post('kettk');
	
	$data=array(
	'tka'=>$tka,
	'tkb'=>$tkb,
	'tkc'=>$tkc,
	'totaltk'=>$totaltk,
	'kettk'=>$kettk
	
	);
	$where=array('id_doktk'=>$id_doktk);
	$this->mda_model->update($where,$data,'doktk');
	
	//$this->kl_model->input($data,'doktk');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data  Dokumen Tambahan Kas Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}





function saldoi()
	{
	$add=$this->input->post('add');
	$codeuker=$this->input->post('codeuker');
	$tgl_saldo=date('Y-m-d h:i:s');
	$jns_saldo=$this->input->post('jns_saldo');
	$saldoax=$this->input->post('saldoa');
	$saldoa=str_replace('.','',$saldoax);
	$saldobx=$this->input->post('saldob');
	$saldob=str_replace('.','',$saldobx);
	$saldocx=$this->input->post('saldoc');
	$saldoc=str_replace('.','',$saldocx);
	$saldotot=$saldoa+$saldob+$saldoc;
	$data=array(
	'id_saldo'=>'',
	'codeuker'=>$codeuker,
	'tgl_saldo'=>$tgl_saldo,
	'jns_saldo'=>$jns_saldo,
	'saldoa'=>$saldoa,
	'saldob'=>$saldob,
	'saldoc'=>$saldoc,
	'saldotot'=>$saldotot,
	'cek_saldo'=>'1'
	);
	
	$this->kl_model->input($data,'saldo');
	//redirect("".base_url()."guest/masterkl");
	if($jns_saldo=='dsr')
		{$myjns='DSR';}
	elseif($jns_saldo=='app')
		{$myjns='Aplikasi';}
	elseif($jns_saldo=='bb')
		{$myjns='BB';}
	else
		{$myjns='';}
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data  Saldo '.$myjns.' Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}

function saldoiup()
	{
	$id_saldo=$this->input->post('id_saldo');
	$add=$this->input->post('add');
	$jns_saldo=$this->input->post('jns_saldo');
	$saldoax=$this->input->post('saldoa');
	$saldoa=str_replace('.','',$saldoax);
	$saldobx=$this->input->post('saldob');
	$saldob=str_replace('.','',$saldobx);
	$saldocx=$this->input->post('saldoc');
	$saldoc=str_replace('.','',$saldocx);
	$saldotot=$saldoa+$saldob+$saldoc;
	$data=array(
	'saldoa'=>$saldoa,
	'saldob'=>$saldob,
	'saldoc'=>$saldoc,
	'saldotot'=>$saldotot
	);
	$where=array('id_saldo'=>$id_saldo);
	$this->mda_model->update($where,$data,'saldo');
	//$this->kl_model->input($data,'saldo');
	//redirect("".base_url()."guest/masterkl");
	if($jns_saldo=='dsr')
		{$myjns='DSR';}
	elseif($jns_saldo=='app')
		{$myjns='Aplikasi';}
	elseif($jns_saldo=='bb')
		{$myjns='BB';}
	else
		{$myjns='';}
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data  Saldo '.$myjns.' Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}




function selisihi()
	{
	$add=$this->input->post('add');
	$codeuker=$this->input->post('codeuker');
	$tgl_selisih=date('Y-m-d h:i:s');
	$jns_selisih=$this->input->post('jns_selisih');
	$selisih=$this->input->post('selisih');
	$indikasi=$this->input->post('indikasi');
	$klarifikasi=$this->input->post('klarifikasi');
	$leader=$this->input->post('leader');
	//$denoma=$this->input->post('denoma');
	//$denomb=$this->input->post('denomb');
	//$denomc=$this->input->post('denomc');

	// denomnamafield
	// pake if nama indikasi
	// indikasi pake inisial. inmina, inplusa. -> mina-minz. plusa-plusz
	$data=array(
	'id_selisih'=>'',
	'codeuker'=>$codeuker,
	'tgl_selisih'=>$tgl_selisih,
	'jns_selisih'=>$jns_selisih,
	'selisih'=>$selisih,
	'klarifikasi'=>$klarifikasi,
	'leader'=>$leader,
	'cek_selisih'=>'1'
	);
	
	$this->kl_model->input($data,'selisih');
	//redirect("".base_url()."guest/masterkl");
	
	$idno=$this->db->insert_id();
	//indikasi, denoma,denomb,denomc
	$jind=count($indikasi);
	if($jind > 0)
		{

		if($jns_selisih=='shortage')
			{
			$myjns="Shortage";
			for($i=0;$i<$jind;$i++)
				{

				if($indikasi[$i]=='inmina')
					{
					$indicate='Indikasi Fraud';	
					$selisiha=$this->input->post('minaa');
					$selisihb=$this->input->post('minab');
					$selisihc=$this->input->post('minac');
					}
				elseif($indikasi[$i]=='inminb')
					{
					$indicate='Indikasi Vandal';	
					$selisiha=$this->input->post('minba');
					$selisihb=$this->input->post('minbb');
					$selisihc=$this->input->post('minbc');
					}
				elseif($indikasi[$i]=='inminc')
					{
					$indicate='Kerusakan Mesin';
					$selisiha=$this->input->post('minca');
					$selisihb=$this->input->post('mincb');
					$selisihc=$this->input->post('mincc');
					}
				elseif($indikasi[$i]=='inmind')
					{
					$indicate='Salah Denom';
					$selisiha=$this->input->post('minda');
					$selisihb=$this->input->post('mindb');
					$selisihc=$this->input->post('mindc');
					}
				elseif($indikasi[$i]=='inmine')
					{
					$indicate='Tidak Diketahui';
					$selisiha=$this->input->post('minea');
					$selisihb=$this->input->post('mineb');
					$selisihc=$this->input->post('minec');
					}
				else
					{
					$indicate='-';	
					$selisiha=0;
					$selisihb=0;
					$selisihc=0;
					}
				$doto=array(
				'id_selisihdata'=>'',
				'id_selisih'=>$idno,
				'ket_selisihdata'=>$indicate,
				'selisiha'=>$selisiha,
				'selisihb'=>$selisihb,
				'selisihc'=>$selisihc
				);
				$this->kl_model->input($doto,'selisihdata');
				
				
				}
			}

		else
			{
			$myjns="Surplus";
			for($i=0;$i<$jind;$i++)
				{

				if($indikasi[$i]=='inplusa')
					{
					$indicate='Surplus Kaset';	
					$selisiha=$this->input->post('plusaa');
					$selisihb=$this->input->post('plusab');
					$selisihc=$this->input->post('plusac');
					}
				elseif($indikasi[$i]=='inplusb')
					{
					$indicate='Surplus Pengembalian Nasabah';	
					$selisiha=$this->input->post('plusba');
					$selisihb=$this->input->post('plusbb');
					$selisihc=$this->input->post('plusbc');
					}
				elseif($indikasi[$i]=='inplusc')
					{
					$indicate='Surplus Setoran Return';	
					$selisiha=$this->input->post('plusca');
					$selisihb=$this->input->post('pluscb');
					$selisihc=$this->input->post('pluscc');
					}
				elseif($indikasi[$i]=='inplusd')
					{
					$indicate='Surplus Salah Denom';
					$selisiha=$this->input->post('plusda');
					$selisihb=$this->input->post('plusdb');
					$selisihc=$this->input->post('plusdc');
					}
				elseif($indikasi[$i]=='inpluse')
					{
					$indicate='Tidak Diketahui';
					$selisiha=$this->input->post('plusea');
					$selisihb=$this->input->post('pluseb');
					$selisihc=$this->input->post('plusec');
					}
				else
					{
					$indicate='-';	
					$selisiha=0;
					$selisihb=0;
					$selisihc=0;
					}
				$doto=array(
				'id_selisihdata'=>'',
				'id_selisih'=>$idno,
				'ket_selisihdata'=>$indicate,
				'selisiha'=>$selisiha,
				'selisihb'=>$selisihb,
				'selisihc'=>$selisihc
				);
				$this->kl_model->input($doto,'selisihdata');
				}
			}

		}
	else
		{}
	
	
	if($jns_selisih=='shortage')
		{$myjns='Shortage';}
	elseif($jns_selisih=='surplus')
		{$myjns='Surplus';}
	else
		{$myjns='';}
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data   '.$myjns.' Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	//$this->session->set_flashdata('add',$add);

	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}


function selisihiup()
	{
	$id_selisih=$this->input->post('id_selisih');
	$add=$this->input->post('add');
	$codeuker=$this->input->post('codeuker');
	$tgl_selisih=date('Y-m-d h:i:s');
	$jns_selisih=$this->input->post('jns_selisih');
	$selisih=$this->input->post('selisih');
	$indikasi=$this->input->post('indikasi');
	$klarifikasi=$this->input->post('klarifikasi');
	$leader=$this->input->post('leader');
	
	$data=array(
	'jns_selisih'=>$jns_selisih,
	'selisih'=>$selisih,
	'klarifikasi'=>$klarifikasi,
	'leader'=>$leader
	);
	
	$where=array('id_selisih'=>$id_selisih);
	$this->mda_model->update($where,$data,'selisih');
	$datah=array(
		'id_selisih' => $id_selisih);
	$this->mda_model->hapus($where,$datah,'selisihdata');

	$idno=$id_selisih;
	//indikasi, denoma,denomb,denomc
	$jind=count($indikasi);
	if($jind > 0)
		{
		
		if($jns_selisih=='shortage')
			{
			$myjns="Shortage";
			for($i=0;$i<$jind;$i++)
				{
				if($indikasi[$i]=='inmina')
					{
					$indicate='Indikasi Fraud';	
					$selisiha=$this->input->post('minaa');
					$selisihb=$this->input->post('minab');
					$selisihc=$this->input->post('minac');
					}
				elseif($indikasi[$i]=='inminb')
					{
					$indicate='Indikasi Vandal';
					$selisiha=$this->input->post('minba');
					$selisihb=$this->input->post('minbb');
					$selisihc=$this->input->post('minbc');
					}
				elseif($indikasi[$i]=='inminc')
					{
					$indicate='Kerusakan Mesin';
					$selisiha=$this->input->post('minca');
					$selisihb=$this->input->post('mincb');
					$selisihc=$this->input->post('mincc');
					}
				elseif($indikasi[$i]=='inmind')
					{
					$indicate='Salah Denom';
					$selisiha=$this->input->post('minda');
					$selisihb=$this->input->post('mindb');
					$selisihc=$this->input->post('mindc');
					}
				elseif($indikasi[$i]=='inmine')
					{
					$indicate='Tidak Diketahui';
					$selisiha=$this->input->post('minea');
					$selisihb=$this->input->post('mineb');
					$selisihc=$this->input->post('minec');
					}
				else
					{
					$indicate='-';	
					$selisiha=0;
					$selisihb=0;
					$selisihc=0;
					}
				$doto=array(
				'id_selisihdata'=>'',
				'id_selisih'=>$idno,
				'ket_selisihdata'=>$indicate,
				'selisiha'=>$selisiha,
				'selisihb'=>$selisihb,
				'selisihc'=>$selisihc
				);
				$this->kl_model->input($doto,'selisihdata');
				
				
				}
			}

		else
			{
			$myjns="Surplus";
			for($i=0;$i<$jind;$i++)
				{
				if($indikasi[$i]=='inplusa')
					{
					$indicate='Surplus Kaset';	
					$selisiha=$this->input->post('plusaa');
					$selisihb=$this->input->post('plusab');
					$selisihc=$this->input->post('plusac');
					}
				elseif($indikasi[$i]=='inplusb')
					{
					$indicate='Surplus Pengembalian Nasabah';	
					$selisiha=$this->input->post('plusba');
					$selisihb=$this->input->post('plusbb');
					$selisihc=$this->input->post('plusbc');
					}
				elseif($indikasi[$i]=='inplusc')
					{
					$indicate='Surplus Setoran Return';	
					$selisiha=$this->input->post('plusca');
					$selisihb=$this->input->post('pluscb');
					$selisihc=$this->input->post('pluscc');
					}
				elseif($indikasi[$i]=='inplusd')
					{
					$indicate='Surplus Salah Denom';
					$selisiha=$this->input->post('plusda');
					$selisihb=$this->input->post('plusdb');
					$selisihc=$this->input->post('plusdc');
					}
				elseif($indikasi[$i]=='inpluse')
					{
					$indicate='Tidak Diketahui';
					$selisiha=$this->input->post('plusea');
					$selisihb=$this->input->post('pluseb');
					$selisihc=$this->input->post('plusec');
					}
				else
					{
					$indicate='-';	
					$selisiha=0;
					$selisihb=0;
					$selisihc=0;
					}
				$doto=array(
				'id_selisihdata'=>'',
				'id_selisih'=>$idno,
				'ket_selisihdata'=>$indicate,
				'selisiha'=>$selisiha,
				'selisihb'=>$selisihb,
				'selisihc'=>$selisihc
				);
				$this->kl_model->input($doto,'selisihdata');
				}
			}

		}
	else
		{}
	
	
	if($jns_selisih=='shortage')
		{$myjns='Shortage';}
	elseif($jns_selisih=='surplus')
		{$myjns='Surplus';}
	else
		{$myjns='';}
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data   '.$myjns.' Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	//$this->session->set_flashdata('add',$add);
	
	redirect(base_url().'index.php/kl/monpagi', 'refresh');
	}


//$insert_id = $this->db->insert_id();

function monsiang()
	{
	
	/*
	$this->load->view('layout/head');
	$this->load->view('home');
	$this->load->view('guest_view');
	$this->load->view('layout/foot');


	$pgcek="SELECT
	a.tgl_reli, a.cek_reli, a.codeuker,
	b.tgl_saldo, b.cek_saldo, b.codeuker, b.jns_saldo,
	c.tgl_selisih, c.cek_selisih, c.codeuker, c.jns_selisih,
	d.tgl_doktk, d.cek_doktk, d.codeuker
	FROM
	reli a 
	left join saldo b on a.codeuker=b.codeuker
	left join selisih c on a.codeuker=c.codeuker
	left join doktk d on a.codeuker=d.codeuker
	where a.codeuker='$codeuker' and a.tgl_reli='$now' and b.tgl_saldo='$now' and c.tgl_selisih='$now' and d.tgl_doktk='$now' 
	
	";
	*/
	if($this->session->userdata('akses')=='kl')
		{
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		$cekpg['mycek']=$this->kl_model->cekpg()->result();
		$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/menu',$cekpg);
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/monsiang');
		//$this->load->view('laykl/monsiang');
		//$this->load->view('');


		//$this->load->view('laykl/pga');
		//$this->load->view('laykl/pgb');
		//$this->load->view('laykl/pgc');
		//$this->load->view('laykl/pgd');
		//$this->load->view('laykl/pge');
		//$this->load->view('laykl/pgf');
		//$this->load->view('laykl/pgg');
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}

function selregi()
	{
	$tgl_selisihreg=date('Y-m-d');
	$codeuker=$this->input->post('codeuker');
	$aatm=$this->input->post('aatm');
	$batm=$this->input->post('batm');
	$catm=$this->input->post('catm');
	$atk=$this->input->post('atk');
	$btk=$this->input->post('btk');
	$ctk=$this->input->post('ctk');
	
	
	$add=$this->input->post('add');

	$data=array(
	'id_selisihreg'=>'',
	'tgl_selisihreg'=>$tgl_selisihreg,
	'codeuker'=>$codeuker,
	'aatm'=>$aatm,
	'batm'=>$batm,
	'catm'=>$catm,
	'atk'=>$atk,
	'btk'=>$btk,
	'ctk'=>$ctk,
	'cek_selisihreg'=>'1'
	);
	
	$this->kl_model->input($data,'selisihreg');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Register Shortage-Surplus Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}

function selregiup()
	{
	$id_selisihreg=$this->input->post('id_selisihreg');
	$tgl_selisihreg=date('Y-m-d');
	$codeuker=$this->input->post('codeuker');
	$aatm=$this->input->post('aatm');
	$batm=$this->input->post('batm');
	$catm=$this->input->post('catm');
	$atk=$this->input->post('atk');
	$btk=$this->input->post('btk');
	$ctk=$this->input->post('ctk');
	
	$add=$this->input->post('add');
	
	$data=array(
	'aatm'=>$aatm,
	'batm'=>$batm,
	'catm'=>$catm,
	'atk'=>$atk,
	'btk'=>$btk,
	'ctk'=>$ctk,
	);
	$where=array('id_selisihreg'=>$id_selisihreg);
	$this->mda_model->update($where,$data,'selisihreg');
	//$this->kl_model->input($data,'selisihreg');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Register Shortage-Surplus Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}

function parti()
	{
	$tgl_part=date('Y-m-d');
	$codeuker=$this->input->post('codeuker');
	$keluar_part=$this->input->post('keluar_part');
	$guna_part=$this->input->post('guna_part');
	$jml_slm=$this->input->post('jml_slm');
	$slm_parta=$this->input->post('slm_parta');
	$slm_partb=$this->input->post('slm_partb');
	$lap_teknisi=$this->input->post('lap_teknisi');
	$jml_lapteknisia=$this->input->post('jml_lapteknisia');
	$jml_lapteknisib=$this->input->post('jml_lapteknisib');
	
	$add=$this->input->post('add');
	
	$data=array(
	'id_part'=>'',
	'tgl_part'=>$tgl_part,
	'codeuker'=>$codeuker,
	'keluar_part'=>$keluar_part,
	'guna_part'=>$guna_part,
	'jml_slm'=>$jml_slm,
	'slm_parta'=>$slm_parta,
	'slm_partb'=>$slm_partb,
	'lap_teknisi'=>$lap_teknisi,
	'jml_lapteknisia'=>$jml_lapteknisia,
	'jml_lapteknisib'=>$jml_lapteknisib,
	'cek_part'=>'1'
	);
	
	$this->kl_model->input($data,'part');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Laporan Sparepart & Teknisi Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}

function partiup()
	{
	$tgl_part=date('Y-m-d');
	$id_part=$this->input->post('id_part');
	$codeuker=$this->input->post('codeuker');
	$keluar_part=$this->input->post('keluar_part');
	$guna_part=$this->input->post('guna_part');
	$jml_slm=$this->input->post('jml_slm');
	$slm_parta=$this->input->post('slm_parta');
	$slm_partb=$this->input->post('slm_partb');
	$lap_teknisi=$this->input->post('lap_teknisi');
	$jml_lapteknisia=$this->input->post('jml_lapteknisia');
	$jml_lapteknisib=$this->input->post('jml_lapteknisib');
	
	$add=$this->input->post('add');
	
	$data=array(
	'keluar_part'=>$keluar_part,
	'guna_part'=>$guna_part,
	'jml_slm'=>$jml_slm,
	'slm_parta'=>$slm_parta,
	'slm_partb'=>$slm_partb,
	'lap_teknisi'=>$lap_teknisi,
	'jml_lapteknisia'=>$jml_lapteknisia,
	'jml_lapteknisib'=>$jml_lapteknisib
	);
	$where=array('id_part'=>$id_part);
	$this->mda_model->update($where,$data,'part');
	//$this->kl_model->input($data,'part');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Laporan Sparepart & Teknisi Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}

function lemburi()
	{
	//if(isset($_POST['tid']))
	$tgl_lembur=date('Y-m-d');
	$codeuker=$this->input->post('codeuker');
	$lemburax=$this->input->post('lembura');
	$lemburbx=$this->input->post('lemburb');
	$lemburcx=$this->input->post('lemburc');

	if(isset($lemburax))
		{$lembura=1;}
	else
		{$lembura=0;}
	
	if(isset($lemburbx))
		{$lemburb=1;}
	else
		{$lemburb=0;}
	
	if(isset($lemburcx))
		{$lemburc=1;}
	else
		{$lemburc=0;}

	$add=$this->input->post('add');
	
	$data=array(
	'id_lembur'=>'',
	'tgl_lembur'=>$tgl_lembur,
	'codeuker'=>$codeuker,
	'lembura'=>$lembura,
	'lemburb'=>$lemburb,
	'lemburc'=>$lemburc,
	'cek_lembur'=>'1'
	);
	
	$this->kl_model->input($data,'lembur');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Laporan Lembur Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}


function lemburiup()
	{
	//if(isset($_POST['tid']))
	$id_lembur=$this->input->post('id_lembur');
	$lemburax=$this->input->post('lembura');
	$lemburbx=$this->input->post('lemburb');
	$lemburcx=$this->input->post('lemburc');

	if(isset($lemburax))
		{$lembura=1;}
	else
		{$lembura=0;}
	
	if(isset($lemburbx))
		{$lemburb=1;}
	else
		{$lemburb=0;}
	
	if(isset($lemburcx))
		{$lemburc=1;}
	else
		{$lemburc=0;}

	$add=$this->input->post('add');
	
	$data=array(
	'lembura'=>$lembura,
	'lemburb'=>$lemburb,
	'lemburc'=>$lemburc
	);
	
	$where=array('id_lembur'=>$id_lembur);
	$this->mda_model->update($where,$data,'lembur');

	//$this->kl_model->input($data,'lembur');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Laporan Lembur Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}


function kuncii()
	{
	$tgl_kunci=date('Y-m-d');
	$codeuker=$this->input->post('codeuker');
	$leader_kunci=$this->input->post('leader_kunci');
	$rpl_kunci=$this->input->post('rpl_kunci');
	$flm_kunci=$this->input->post('flm_kunci');
	$cad_kunci=$this->input->post('cad_kunci');
	
	$add=$this->input->post('add');

	$data=array(
	'id_kunci'=>'',
	'codeuker'=>$codeuker,
	'tgl_kunci'=>$tgl_kunci,
	'leader_kunci'=>$leader_kunci,
	'rpl_kunci'=>$rpl_kunci,
	'flm_kunci'=>$flm_kunci,
	'cad_kunci'=>$cad_kunci,
	'cek_kunci'=>'1'
	);
	
	$this->kl_model->input($data,'kunci');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Kunci Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}

function kunciiup()
	{
	$id_kunci=$this->input->post('id_kunci');
	$leader_kunci=$this->input->post('leader_kunci');
	$rpl_kunci=$this->input->post('rpl_kunci');
	$flm_kunci=$this->input->post('flm_kunci');
	$cad_kunci=$this->input->post('cad_kunci');
	
	$add=$this->input->post('add');
	
	$data=array(
	'leader_kunci'=>$leader_kunci,
	'rpl_kunci'=>$rpl_kunci,
	'flm_kunci'=>$flm_kunci,
	'cad_kunci'=>$cad_kunci
	);
	
	$where=array('id_kunci'=>$id_kunci);
	$this->mda_model->update($where,$data,'kunci');

	//$this->kl_model->input($data,'kunci');
	//redirect("".base_url()."guest/masterkl");
	
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Kunci Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}

function saldokegi()
	{
	$codeuker=$this->input->post('codeuker');
	$tgl_saldokeg=date('Y-m-d');
	$kas_kegx=$this->input->post('kas_keg');
	$kas_keg=str_replace('.','',$kas_kegx);
	$kas_erpx=$this->input->post('kas_erp');
	$kas_erp=str_replace('.','',$kas_erpx);
	$giro_rekx=$this->input->post('giro_rek');
	$giro_rek=str_replace('.','',$giro_rekx);
	$giro_erpx=$this->input->post('giro_erp');
	$giro_erp=str_replace('.','',$giro_erpx);
	$persekotx=$this->input->post('persekot');
	$persekot=str_replace('.','',$persekotx);
	//$persekot=str_replace('.','',$persekot);
	$add=$this->input->post('add');
	
	$data=array(
	'id_saldokeg'=>'',
	'codeuker'=>$codeuker,
	'tgl_saldokeg'=>$tgl_saldokeg,
	'kas_keg'=>$kas_keg,
	'kas_erp'=>$kas_erp,
	'giro_rek'=>$giro_rek,
	'giro_erp'=>$giro_erp,
	'persekot'=>$persekot,
	'cek_saldokeg'=>'1'
	);
	
	$this->kl_model->input($data,'saldokeg');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Saldo Kas Operasional Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}

function saldokegiup()
	{
	$id_saldokeg=$this->input->post('id_saldokeg');
	$kas_kegx=$this->input->post('kas_keg');
	$kas_keg=str_replace('.','',$kas_kegx);
	$kas_erpx=$this->input->post('kas_erp');
	$kas_erp=str_replace('.','',$kas_erpx);
	$giro_rekx=$this->input->post('giro_rek');
	$giro_rek=str_replace('.','',$giro_rekx);
	$giro_erpx=$this->input->post('giro_erp');
	$giro_erp=str_replace('.','',$giro_erpx);
	$persekotx=$this->input->post('persekot');
	$persekot=str_replace('.','',$persekotx);
	
	$add=$this->input->post('add');
	//$add=$this->input->post('add');
	//$add=$this->input->post();
	$data=array(
	'kas_keg'=>$kas_keg,
	'kas_erp'=>$kas_erp,
	'giro_rek'=>$giro_rek,
	'giro_erp'=>$giro_erp,
	'persekot'=>$persekot
	);
	
	$where=array('id_saldokeg'=>$id_saldokeg);
	$this->mda_model->update($where,$data,'saldokeg');
	//$this->kl_model->input($data,'saldokeg');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Saldo Kas Operasional Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/monsiang', 'refresh');
	}


function perjam()
	{
	if($this->session->userdata('akses')=='kl')
		{
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		$cekpg['mycek']=$this->kl_model->cekpg()->result();
		$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/menu',$cekpg);
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/perjam');
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}


function perjami()
	{
	$tgl_reliday=date('Y-m-d');
	$codeuker=$this->input->post('codeuker');
	$capt0=$this->input->post('capt0');
	$ket0=$this->input->post('ket0');
	$capt3=$this->input->post('capt3');
	$ket3=$this->input->post('ket3');
	$capt6=$this->input->post('capt6');
	$ket6=$this->input->post('ket6');
	$capt9=$this->input->post('capt9');
	$ket9=$this->input->post('ket9');
	$capt12=$this->input->post('capt12');
	$ket12=$this->input->post('ket12');
	$capt15=$this->input->post('capt15');
	$ket15=$this->input->post('ket15');
	$capt18=$this->input->post('capt18');
	$ket18=$this->input->post('ket18');
	$capt21=$this->input->post('capt21');
	$ket21=$this->input->post('ket21');
	$add=$this->input->post('add');
	
	$data=array(
	'id_reliday'=>'',
	'tgl_reliday'=>$tgl_reliday,
	'codeuker'=>$codeuker,
	'capt0'=>$capt0, 'ket0'=>$ket0,
	'capt3'=>$capt3, 'ket3'=>$ket3,
	'capt6'=>$capt6, 'ket6'=>$ket6,
	'capt9'=>$capt9, 'ket9'=>$ket9,
	'capt12'=>$capt12, 'ket12'=>$ket12,
	'capt15'=>$capt15, 'ket15'=>$ket15,
	'capt18'=>$capt18, 'ket18'=>$ket18,
	'capt21'=>$capt21, 'ket21'=>$ket21,
	'cek_reliday'=>'1'
	);
	
	$this->kl_model->input($data,'reliday');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Realibility Per 3 Jam Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/perjam', 'refresh');
	}


function perjamiup()
	{
	$id_reliday=$this->input->post('id_reliday');
	$capt0=$this->input->post('capt0');
	$ket0=$this->input->post('ket0');
	$capt3=$this->input->post('capt3');
	$ket3=$this->input->post('ket3');
	$capt6=$this->input->post('capt6');
	$ket6=$this->input->post('ket6');
	$capt9=$this->input->post('capt9');
	$ket9=$this->input->post('ket9');
	$capt12=$this->input->post('capt12');
	$ket12=$this->input->post('ket12');
	$capt15=$this->input->post('capt15');
	$ket15=$this->input->post('ket15');
	$capt18=$this->input->post('capt18');
	$ket18=$this->input->post('ket18');
	$capt21=$this->input->post('capt21');
	$ket21=$this->input->post('ket21');
	$add=$this->input->post('add');
	
	$data=array(
	'capt0'=>$capt0, 'ket0'=>$ket0,
	'capt3'=>$capt3, 'ket3'=>$ket3,
	'capt6'=>$capt6, 'ket6'=>$ket6,
	'capt9'=>$capt9, 'ket9'=>$ket9,
	'capt12'=>$capt12, 'ket12'=>$ket12,
	'capt15'=>$capt15, 'ket15'=>$ket15,
	'capt18'=>$capt18, 'ket18'=>$ket18,
	'capt21'=>$capt21, 'ket21'=>$ket21,
	);
	
	$where=array('id_reliday'=>$id_reliday);
	$this->mda_model->update($where,$data,'reliday');

	//$this->kl_model->input($data,'reliday');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Realibility Per 3 Jam Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/perjam', 'refresh');
	}


function mga()
	{
	if($this->session->userdata('akses')=='kl')
		{
		$periode_utlea=$this->input->post('periode_utle');
		if(isset($periode_utlea))
			{
			$periode_utle=$periode_utlea;
			}
		else
			{
			$i=date('d');
			if($i==29 or $i==30 or $i==31)
				{$per=4;}
			else
				{$per=ceil($i/7);}
			$de=date('n-Y');
			$periode_utle="$per-$de";
			}
		$lolo['periode_utle']=$periode_utle;
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		//$cekpg['mycek']=$this->kl_model->cekpg()->result();
		//dutle disini, periode_utle
		//$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/menu');
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/mga',$lolo);
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}

function mgai()
	{
	$utlekr_=$this->input->post('utlekr');
	$utletr_=$this->input->post('utletr');
	
	if(isset($utlekr_))
		{
		$utlekr=1;
		$utlekra=$this->input->post('utlekra');
		$utlekrb=$this->input->post('utlekrb');
		$utlekrc=$this->input->post('utlekrc');
		}
	else
		{
		$utlekr=0;
		$utlekra=0;
		$utlekrb=0;
		$utlekrc=0;
		}

	if(isset($utletr_))
		{
		$utletr=1;
		$utletra=$this->input->post('utletra');
		$utletrb=$this->input->post('utletrb');
		$utletrc=$this->input->post('utletrc');
		}
	else
		{
		$utletr=0;
		$utletra=0;
		$utletrb=0;
		$utletrc=0;
		}
	
	$codeuker=$this->input->post('codeuker');
	$tgl_utle=date('Y-m-d');
	$per=$this->input->post('per');
	$perbl=$this->input->post('perbl');
	$perth=$this->input->post('perth');
	$periode_utle="$per-$perbl-$perth";
	$utlea=$this->input->post('utlea');
	$utleb=$this->input->post('utleb');
	$utlec=$this->input->post('utlec');
	
	$add=$this->input->post('add');
	//
	$data=array(
	'id_utle'=>'',
	'codeuker'=>$codeuker,
	'tgl_utle'=>$tgl_utle,
	'periode_utle'=>$periode_utle,
	'utlea'=>$utlea, 'utleb'=>$utleb,
	'utlec'=>$utlec, 
	'utlekr'=>$utlekr,
	'utlekra'=>$utlekra, 'utlekrb'=>$utlekrb,
	'utlekrc'=>$utlekrc, 
	'utletr'=>$utletr,
	'utletra'=>$utletra, 'utletrb'=>$utletrb,
	'utletrc'=>$utletrc, 
	'cek_utle'=>'1'
	);
	//
	$this->kl_model->input($data,'utle');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Mingguan UTLE Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mga', 'refresh');
	}


function mgaiup()
	{

	$utlekr_=$this->input->post('utlekr');
	$utletr_=$this->input->post('utletr');
	
	if(isset($utlekr_))
		{
		$utlekr=1;
		$utlekra=$this->input->post('utlekra');
		$utlekrb=$this->input->post('utlekrb');
		$utlekrc=$this->input->post('utlekrc');
		}
	else
		{
		$utlekr=0;
		$utlekra=0;
		$utlekrb=0;
		$utlekrc=0;
		}

	if(isset($utletr_))
		{
		$utletr=1;
		$utletra=$this->input->post('utletra');
		$utletrb=$this->input->post('utletrb');
		$utletrc=$this->input->post('utletrc');
		}
	else
		{
		$utletr=0;
		$utletra=0;
		$utletrb=0;
		$utletrc=0;
		}
	
	$id_utle=$this->input->post('id_utle');
	$codeuker=$this->input->post('codeuker');
	$tgl_utle=date('Y-m-d');
	$per=$this->input->post('per');
	$perbl=$this->input->post('perbl');
	$perth=$this->input->post('perth');
	$periode_utle="$per-$perbl-$perth";
	$utlea=$this->input->post('utlea');
	$utleb=$this->input->post('utleb');
	$utlec=$this->input->post('utlec');
	
	$add=$this->input->post('add');
	
	$data=array(
	'periode_utle'=>$periode_utle,
	'utlea'=>$utlea, 'utleb'=>$utleb,
	'utlec'=>$utlec, 
	'utlekr'=>$utlekr,
	'utlekra'=>$utlekra, 'utlekrb'=>$utlekrb,
	'utlekrc'=>$utlekrc, 
	'utletr'=>$utletr,
	'utletra'=>$utletra, 'utletrb'=>$utletrb,
	'utletrc'=>$utletrc
	);
	
	$where=array('id_utle'=>$id_utle);
	$this->mda_model->update($where,$data,'utle');
	
	//
	//$this->kl_model->input($data,'utle');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Mingguan UTLE Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mga', 'refresh');
	}


function mgb()
	{
	if($this->session->userdata('akses')=='kl')
		{
		$periode_gpsa=$this->input->post('periode_gps');
		if(isset($periode_gpsa))
			{
			$periode_gps=$periode_gpsa;
			}
		else
			{
			$i=date('d');
			if($i==29 or $i==30 or $i==31)
				{$per=4;}
			else
				{$per=ceil($i/7);}
			$de=date('n-Y');
			$periode_gps="$per-$de";
			}
		$lolo['periode_gps']=$periode_gps;
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		//$cekpg['mycek']=$this->kl_model->cekpg()->result();
		//dutle disini, periode_utle
		//$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/header',$dtuser);
		//$this->load->view('laykl/menu',$cekpg);
		$this->load->view('laykl/menu');
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/mgb',$lolo);
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}


function mgbi()
	{
	$gps_rsk_=$this->input->post('gps_rsk');
	$app_aktif_=$this->input->post('app_aktif');
	$user_blokir_=$this->input->post('user_blokir');
	$blok_kkl_=$this->input->post('blok_kkl');
	$blok_wakl_=$this->input->post('blok_wakl');
	$blok_spv_=$this->input->post('blok_spv');


	if(isset($gps_rsk_)){$gps_rsk=1;}else{$gps_rsk=0;}
	if(isset($app_aktif)){$app_aktif=1;}else{$app_aktif=0;}
	
	if(isset($user_blokir_))
		{
		$user_blokir=1;
		if(isset($blok_kkl_)){$blok_kkl=1;}else{$blok_kkl=0;}
		if(isset($blok_wakl_)){$blok_wakl=1;}else{$blok_wakl=0;}
		if(isset($blok_spv_)){$blok_spv=1;}else{$blok_spv=0;}
		}
	else
		{
		$user_blokir=0;
		$blok_kkl=0;
		$blok_wakl=0;
		$blok_spv=0;
		}
	
	$codeuker=$this->input->post('codeuker');
	$tgl_gps=date('Y-m-d');
	$per=$this->input->post('per');
	$perbl=$this->input->post('perbl');
	$perth=$this->input->post('perth');
	$periode_gps="$per-$perbl-$perth";
	$kendaraan=$this->input->post('kendaraan');
	$gps=$this->input->post('gps');
	$nogps=$this->input->post('nogps');
	
	$add=$this->input->post('add');
	//
	$data=array(
	'id_gps'=>'',
	'codeuker'=>$codeuker,
	'tgl_gps'=>$tgl_gps,
	'periode_gps'=>$periode_gps,
	'kendaraan'=>$kendaraan, 
	'gps'=>$gps, 
	'nogps'=>$nogps,
	'gps_rsk'=>$gps_rsk, 
	'app_aktif'=>$app_aktif,
	'user_blokir'=>$user_blokir,
	'blok_kkl'=>$blok_kkl,
	'blok_wakl'=>$blok_wakl, 
	'blok_spv'=>$blok_spv, 
	'cek_gps'=>'1'
	);
	//
	$this->kl_model->input($data,'gps');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Mingguan GPS Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mgb', 'refresh');
	}

function mgbiup()
	{
	$id_gps=$this->input->post('id_gps');
	$gps_rsk_=$this->input->post('gps_rsk');
	$app_aktif_=$this->input->post('app_aktif');
	$user_blokir_=$this->input->post('user_blokir');
	$blok_kkl_=$this->input->post('blok_kkl');
	$blok_wakl_=$this->input->post('blok_wakl');
	$blok_spv_=$this->input->post('blok_spv');
	
	if(isset($gps_rsk_)){$gps_rsk=1;}else{$gps_rsk=0;}
	if(isset($app_aktif_)){$app_aktif=1;}else{$app_aktif=0;}
	
	if(isset($user_blokir_))
		{
		$user_blokir=1;
		if(isset($blok_kkl_)){$blok_kkl=1;}else{$blok_kkl=0;}
		if(isset($blok_wakl_)){$blok_wakl=1;}else{$blok_wakl=0;}
		if(isset($blok_spv_)){$blok_spv=1;}else{$blok_spv=0;}
		}
	else
		{
		$user_blokir=0;
		$blok_kkl=0;
		$blok_wakl=0;
		$blok_spv=0;
		}
	
	$kendaraan=$this->input->post('kendaraan');
	$gps=$this->input->post('gps');
	$nogps=$this->input->post('nogps');
	
	$add=$this->input->post('add');
	//
	$data=array(
	'kendaraan'=>$kendaraan, 
	'gps'=>$gps, 
	'nogps'=>$nogps,
	'gps_rsk'=>$gps_rsk, 
	'app_aktif'=>$app_aktif,
	'user_blokir'=>$user_blokir,
	'blok_kkl'=>$blok_kkl,
	'blok_wakl'=>$blok_wakl, 
	'blok_spv'=>$blok_spv, 
	);
	//
	//$this->kl_model->input($data,'gps');
	$where=array('id_gps'=>$id_gps);
	$this->mda_model->update($where,$data,'gps');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Mingguan GPS Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mgb', 'refresh');
	}


function mgc()
	{
	if($this->session->userdata('akses')=='kl')
		{
		$periode_cctva=$this->input->post('periode_cctv');
		if(isset($periode_cctva))
			{
			$periode_cctv=$periode_cctva;
			}
		else
			{
			$i=date('d');
			if($i==29 or $i==30 or $i==31)
				{$per=4;}
			else
				{$per=ceil($i/7);}
			$de=date('n-Y');
			$periode_cctv="$per-$de";
			}
		$lolo['periode_cctv']=$periode_cctv;
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		//$cekpg['mycek']=$this->kl_model->cekpg()->result();
		//dutle disini, periode_utle
		//$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/header',$dtuser);
		//$this->load->view('laykl/menu',$cekpg);
		$this->load->view('laykl/menu');
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/mgc',$lolo);
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}

function mgci()
	{
	
	$codeuker=$this->input->post('codeuker');
	$tgl_cctv=date('Y-m-d');
	$per=$this->input->post('per');
	$perbl=$this->input->post('perbl');
	$perth=$this->input->post('perth');
	$periode_cctv="$per-$perbl-$perth";
	$jml_cctv=$this->input->post('jml_cctv');
	$cctva=$this->input->post('cctva');
	$cctvb=$this->input->post('cctvb');
	$dvra=$this->input->post('dvra');
	$dvrb=$this->input->post('dvrb');
	$adaptora=$this->input->post('adaptora');
	$adaptorb=$this->input->post('adaptorb');
	
	$add=$this->input->post('add');
	//
	$data=array(
	'id_cctv'=>'',
	'codeuker'=>$codeuker,
	'tgl_cctv'=>$tgl_cctv,
	'periode_cctv'=>$periode_cctv,
	'jml_cctv'=>$jml_cctv, 
	'cctva'=>$cctva, 
	'cctvb'=>$cctvb,
	'dvra'=>$dvra, 
	'dvrb'=>$dvrb,
	'adaptora'=>$adaptora,
	'adaptorb'=>$adaptorb,
	'cek_cctv'=>'1'
	);
	//
	$this->kl_model->input($data,'cctv');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Mingguan CCTV Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mgc', 'refresh');
	}

function mgciup()
	{
	$id_cctv=$this->input->post('id_cctv');
	$jml_cctv=$this->input->post('jml_cctv');
	$cctva=$this->input->post('cctva');
	$cctvb=$this->input->post('cctvb');
	$dvra=$this->input->post('dvra');
	$dvrb=$this->input->post('dvrb');
	$adaptora=$this->input->post('adaptora');
	$adaptorb=$this->input->post('adaptorb');
	
	$add=$this->input->post('add');
	//
	$data=array(
	'jml_cctv'=>$jml_cctv, 
	'cctva'=>$cctva, 
	'cctvb'=>$cctvb,
	'dvra'=>$dvra, 
	'dvrb'=>$dvrb,
	'adaptora'=>$adaptora,
	'adaptorb'=>$adaptorb,
	);
	
	$where=array('id_cctv'=>$id_cctv);
	$this->mda_model->update($where,$data,'cctv');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Mingguan CCTV Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mgc', 'refresh');
	}


function mgd()
	{
	if($this->session->userdata('akses')=='kl')
		{
		$periode_dana=$this->input->post('periode_dana');
		if(isset($periode_dana))
			{
			$periode_dana=$periode_dana;
			}
		else
			{
			$i=date('d');
			if($i==29 or $i==30 or $i==31)
				{$per=4;}
			else
				{$per=ceil($i/7);}
			$de=date('n-Y');
			$periode_dana="$per-$de";
			}
		$lolo['periode_dana']=$periode_dana; 
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		//$cekpg['mycek']=$this->kl_model->cekpg()->result();
		//dutle disini, periode_utle
		//$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/header',$dtuser);
		//$this->load->view('laykl/menu',$cekpg);
		$this->load->view('laykl/menu');
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/mgd',$lolo);
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}


function mgdi()
	{
	
	$codeuker=$this->input->post('codeuker');
	$tgl_dana=date('Y-m-d h:i:s');
	$per=$this->input->post('per');
	$perbl=$this->input->post('perbl');
	$perth=$this->input->post('perth');
	$periode_dana="$per-$perbl-$perth";
	$tgl_drop=$this->input->post('tgl_drop');
	$jml_dana=$this->input->post('jml_dana');
	
	$add=$this->input->post('add');
	//
	$data=array(
	'id_dana'=>'',
	'codeuker'=>$codeuker,
	'tgl_dana'=>$tgl_dana,
	'periode_dana'=>$periode_dana,
	'tgl_drop'=>$tgl_drop, 
	'jml_dana'=>$jml_dana
	);
	//
	$this->kl_model->input($data,'dana');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Mingguan Dana Operasional Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mgd', 'refresh');
	}

function hpsdana()
		{
		$id_dana=$this->input->post('id_dana');
		$data=array(
		'id_dana' => $id_dana);
		$where=array('id_dana'=>$id_dana);
		$this->mda_model->hapus($where,$data,'dana');
		
		$this->session->set_flashdata('msg', '
		<div class="alert  alert-danger alert-dismissible fade show" role="alert">
		<span class="badge badge-pill badge-danger">Sukses</span> Data Dana Operasional Telah Dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
			');
		redirect(base_url().'index.php/kl/mgd', 'refresh');

		}

function mge()
	{
	if($this->session->userdata('akses')=='kl')
		{
		$periode_sanggah=$this->input->post('periode_sanggah');
		if(isset($periode_sanggah))
			{
			$periode_sanggah=$periode_sanggah;
			}
		else
			{
			$i=date('d');
			if($i==29 or $i==30 or $i==31)
				{$per=4;}
			else
				{$per=ceil($i/7);}
			$de=date('n-Y');
			$periode_sanggah="$per-$de";
			}
		$lolo['periode_sanggah']=$periode_sanggah;
		$idno=$this->session->userdata('iduser');
		$dtuser['iduser']=$this->kl_model->myuser($idno)->result();
		//$cekpg['mycek']=$this->kl_model->cekpg()->result();
		//dutle disini, periode_utle
		//$this->load->view('laykl/header',$dtuser);
		$this->load->view('laykl/header',$dtuser);
		//$this->load->view('laykl/menu',$cekpg);
		$this->load->view('laykl/menu');
		$this->load->view('laykl/pgcek');
		$this->load->view('laykl/mge',$lolo);
		$this->load->view('laykl/footer');
		}
	else
		{
		redirect(base_url().'index.php/login/index?alert=GAGAL', 'refresh');
		}
	}

function mgei()
	{
	$codeuker=$this->input->post('codeuker');
	$tgl_sanggah=date('Y-m-d');
	$per=$this->input->post('per');
	$perbl=$this->input->post('perbl');
	$perth=$this->input->post('perth');
	$periode_sanggah="$per-$perbl-$perth";
	$periodea=$this->input->post('periodea');
	$periodeb=$this->input->post('periodeb');
	$status_sanggah=$this->input->post('status_sanggah');
	$approve=$this->input->post('approve');
	
	$add=$this->input->post('add');
	//
	$data=array(
	'id_sanggah'=>'',
	'codeuker'=>$codeuker,
	'tgl_sanggah'=>$tgl_sanggah,
	'periode_sanggah'=>$periode_sanggah,
	'periodea'=>$periodea,
	'periodeb'=>$periodeb,
	'status_sanggah'=>$status_sanggah,
	'approve'=>$approve
	);
	//
	$this->kl_model->input($data,'sanggah');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Mingguan Sanggahan Telah Disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mge', 'refresh');
	}

function mgeiup()
	{
	$id_sanggah=$this->input->post('id_sanggah');
	$periodea=$this->input->post('periodea');
	$periodeb=$this->input->post('periodeb');
	$status_sanggah=$this->input->post('status_sanggah');
	$approve=$this->input->post('approve');
	
	$add=$this->input->post('add');
	//$add=$this->input->post('add');
	$data=array(
	'periodea'=>$periodea,
	'periodeb'=>$periodeb,
	'status_sanggah'=>$status_sanggah,
	'approve'=>$approve
	);
	
	$where=array('id_sanggah'=>$id_sanggah);
	$this->mda_model->update($where,$data,'sanggah');
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-warning alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-warning">Sukses</span> Data Mingguan Sanggahan Telah Diganti.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	$this->session->set_flashdata('add',$add);
	redirect(base_url().'index.php/kl/mge', 'refresh');
	}




function barang()
	{
	$dtgol['gol']=$this->mda_model->golongan()->result();
	$this->load->view('laykl/header',$dtgol);
	$this->load->view('laykl/menu');
	$this->load->view('laykl/barang');
	$this->load->view('laykl/footer');
	}

function baranga()
	{
	$idgol=$this->input->get('idgol');
	redirect(base_url().'index.php/kl/barangs/'.$idgol.'', 'refresh');
	}

function barangs($id)
	{
	//$idgol=$this->input->get('idgol');
	$idgol=$id;
	$dtgol['gol']=$this->mda_model->viewgolinduk($idgol)->result();
	$dtgolb['golb']=$this->mda_model->golongan()->result();
	$dtbarang['brg']=$this->kl_model->viewbarangjns($idgol)->result();
	$this->load->view('laykl/header',$dtgol);
	$this->load->view('laykl/menu',$dtgolb);
	$this->load->view('laykl/barangs',$dtbarang);
	$this->load->view('laykl/footer');
	}

function barangj($id)
	{
	$idjns=$id;
	$dtjnsa['mjns']=$this->kl_model->myjns($idjns)->result();
	$dtgolb['golb']=$this->mda_model->golongan()->result();
	$dtbarang['brg']=$this->kl_model->viewbarangjnsb($idjns)->result();
	$this->load->view('laykl/header',$dtjnsa);
	$this->load->view('laykl/menu',$dtgolb);
	$this->load->view('laykl/barangj',$dtbarang);
	$this->load->view('laykl/footer');
	}
	
function tmbbrg()
	{
	$namabarang=$this->input->post('namabarang');
	$idjenis=$this->input->post('idjenis');
	$idcabbg=$this->input->post('idcabbg');
	$noinv=$this->input->post('noinv');
	$pengguna=$this->input->post('pengguna');
	$tglbelia=$this->input->post('tglbeli');
	$hargabelib=$this->input->post('hargabeli');
	$pengguna=$this->input->post('pengguna');
	$tglbeli=date('Y-m-d', strtotime($tglbelia));
	$hargabeli=str_replace('.','',$hargabelib);
	
	$data=array(
	'idcabbg'=>$idcabbg,
	'idjenis'=>$idjenis,
	'noinv'=>$noinv,
	'namabarang'=>$namabarang,
	'pengguna'=>$pengguna,
	'tglbeli'=>$tglbeli,
	'hargabeli'=>$hargabeli
	);
	
	$this->kl_model->input($data,'barang');
	//redirect("".base_url()."guest/masterkl");
	$this->session->set_flashdata('msg', '
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Sukses</span> Data Barang <i>'.$namabarang.'</i> Telah Ditambahkan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	</div>
	');
	redirect(base_url().'index.php/kl/barang', 'refresh');
	
	}

function detailbarangj($rowid)
	{
	
	$id=$this->input->post('rowid');
	$result=$this->kl_model->viewbarangid($id);
	$data['idbarang'] = $result[0]['idbarang'];
	$data['idcabbg'] = $result[0]['idcabbg'];
	$data['idjenis'] = $result[0]['idjenis'];
	$data['noinv'] = $result[0]['noinv'];
	$data['namabarang'] = $result[0]['namabarang'];
	$data['pengguna'] = $result[0]['pengguna'];
	$data['tglbeli'] = $result[0]['tglbeli'];
	$data['hargabeli'] = $result[0]['hargabeli'];
	$this->load->view('laykl/detailbarangj',$data);
	
	
	}



function logout()
	{
	$this->session->sess_destroy();
	//redirect(base_url('login'));
	redirect(base_url().'index.php/login', 'refresh');
	}
}


?>