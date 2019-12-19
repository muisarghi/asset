<?php


class Kl_model extends CI_Model
{

function __construct()
	{
	// Call the Model constructor
	parent::__construct();
    }

function jns($id=NULL)
	{
	$kuerix="select * from jenis where idgol='$id' order by nmjenis ASC";
	$a1=$this->db->query($kuerix);
	return $a1;
	}

function myjns($id=NULL)
	{
	$kueriy="select * from jenis where idjenis='$id'";
	$a2=$this->db->query($kueriy);
	return $a2;
	}

function input($data, $table)
	{
	$this->db->insert($table,$data);
	}

function viewbarangjns($idnya)
	{
	$idcabbg=$this->session->userdata('ses_ketuser');
	$kuerix="select golongan.idgol, jenis.idjenis, jenis.nmjenis, barang.* from golongan, jenis, barang where golongan.idgol=jenis.idgol and jenis.idjenis=barang.idjenis and golongan.idgol='$idnya' and barang.idcabbg='$idcabbg' order by barang.idbarang DESC";
	$a1=$this->db->query($kuerix);
	return $a1;
	}

function viewbarangjnsb($idnya)
	{
	$idcabbg=$this->session->userdata('ses_ketuser');
	$kuerix="select jenis.idjenis, jenis.nmjenis, barang.* from jenis, barang where jenis.idjenis=barang.idjenis and jenis.idjenis='$idnya' and barang.idcabbg='$idcabbg' order by barang.idbarang DESC";
	$a1=$this->db->query($kuerix);
	return $a1;
	}

function viewbarangid($idnya=NULL)
	{
	//$idcabbg=$this->session->userdata('ses_ketuser');
	$kuerix="select jenis.idjenis, jenis.nmjenis, barang.* from jenis, barang where jenis.idjenis=barang.idjenis and barang.idbarang='$idnya'";
	$a2=$this->db->query($kuerix)->result_array();
	return $a2;
	}

function myuser($iduser)
	{
	$iduser=$this->session->userdata('iduser');
	//$idcabbg=$this->session->userdata('ses_ketuser');
	$myuse="select * from kl, user where kl.idkl=user.ketuser and user.iduser='$iduser'";
	//$userku=$this->db->query($myuse)->result_array();
	$userku=$this->db->query($myuse);
	return $userku;
	}


function cekpg($iduser=NULL)
	{
	
	////////// CREATE MORE QUERY COUNT 1 by 1
	///////////// VIEW/CONTROL DIRECT CALL MODEL
	//$dtgol=$this->mda_model->golinduk()->result();
	//	foreach($dtgol as $d)
	
	$iduser=$this->session->userdata('iduser');
	
	/*
	
	$myuse="select * from kl, user where kl.idkl=user.ketuser and user.iduser='$iduser'";
	//$userku=$this->db->query($myuse)->result_array();
	$userku=$this->db->query($myuse);
	
	foreach($userku as $usera)
	{
	$myidkl=$usera->idkl;
	$mycodeuker=$usera->codeuker;
	$mynamakl=$usera->namakl;
	}
	$codeuker=$mycodeuker;
	*/
	
	$now=date('Y-m-d');
	//$pgcek="select count(id_reli) ";
	
	/*$pgcek="SELECT
	x.ketuser,
	y.idkl, y.codeuker,
	a.tgl_reli, a.cek_reli, a.codeuker,
	d.tgl_doktk, d.cek_doktk, d.codeuker
	FROM
	user x left join kl y on x.ketuser=y.idkl 
	left join reli a on y.codeuker=a.codeuker 
	left join doktk d on y.codeuker=d.codeuker
	where x.iduser='$iduser' and a.tgl_reli like '%$now%' and d.tgl_doktk like '%$now%'";
	
	*/
	
	$pgcek="SELECT
	x.ketuser,
	y.idkl, y.codeuker,
	a.id_reli, a.tgl_reli, a.cek_reli, a.codeuker,
	b.id_saldo, b.tgl_saldo, b.cek_saldo, b.codeuker, b.jns_saldo,
	c.id_selisih, c.tgl_selisih, c.cek_selisih, c.codeuker, c.jns_selisih,
	d.id_doktk, d.tgl_doktk, d.cek_doktk, d.codeuker
	FROM
	user x left join kl y on x.ketuser=y.idkl		
	left join reli a on y.codeuker=a.codeuker		
	left join saldo b on y.codeuker=b.codeuker		
	left join selisih c on y.codeuker=c.codeuker	
	left join doktk d on y.codeuker=d.codeuker		
	where x.iduser='$iduser' and  a.tgl_reli like '%$now%' and b.tgl_saldo like '%$now%' and c.tgl_selisih like '%$now%' and d.tgl_doktk like '%$now%'";
	
	
	//$pgcek="select * from kl, user, doktk where kl.idkl=user.ketuser and doktk.codeuker='kl.codeuker' and tgl_doktk='$now' and user.iduser='$iduser'";
	
	//$pgcek="select * from user left join kl on user.ketuser=kl.idkl left join reli on kl.codeuker=reli.codeuker where user.iduser='$iduser' and reli.tgl_reli like '%$now%'";
	
	$pgceka=$this->db->query($pgcek);
	return $pgceka;
	
	}


function cekreli()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	//select 
	//cek_reli=
	$pgcek="select count(id_reli) as jmlreli from user left join kl on user.ketuser=kl.idkl left join reli on kl.codeuker=reli.codeuker where user.iduser='$iduser' and reli.tgl_reli like '%$now%'";
	
	$pgceka=$this->db->query($pgcek);
	return $pgceka;
	}

function cekrelia()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	//select 
	//cek_reli=
	$pgcek="select count(id_reli) as jmlreli from user left join kl on user.ketuser=kl.idkl left join reli on kl.codeuker=reli.codeuker where user.iduser='$iduser' and reli.tgl_reli like '%$now%' and reli.cek_reli='1'";
	
	$pgceka=$this->db->query($pgcek);
	return $pgceka;
	}

function cekdoktk()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	//select 
	//cek_reli=
	$pgcekb="select count(id_doktk) as jmldoktk from user left join kl on user.ketuser=kl.idkl left join doktk on kl.codeuker=doktk.codeuker where user.iduser='$iduser' and doktk.tgl_doktk like '%$now%'";
	
	$pgcekb=$this->db->query($pgcekb);
	return $pgcekb;
	}

function cekdoktk_()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	//select 
	//cek_reli=
	$pgcekb="select count(id_doktk) as jmldoktk from user left join kl on user.ketuser=kl.idkl left join doktk on kl.codeuker=doktk.codeuker where user.iduser='$iduser' and doktk.tgl_doktk like '%$now%' and doktk.cek_doktk='1'";
	
	$pgcekb=$this->db->query($pgcekb);
	return $pgcekb;
	}

function ceksaldoapp()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekc="select count(saldo.id_saldo) as jsalapp
	from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='app'";
	
	$pgcekc=$this->db->query($pgcekc);
	return $pgcekc;
	}

function ceksaldoapp_()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekc="select count(saldo.id_saldo) as jsalapp
	from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='app' and saldo.cek_saldo='1'";
	
	$pgcekc=$this->db->query($pgcekc);
	return $pgcekc;
	}

function ceksaldodsr()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekd="select count(saldo.id_saldo) as jsaldsr
	from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='dsr'";
	
	$pgcekd=$this->db->query($pgcekd);
	return $pgcekd;
	}

function ceksaldodsr_()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekd="select count(saldo.id_saldo) as jsaldsr
	from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='dsr' and saldo.cek_saldo='1'";
	
	$pgcekd=$this->db->query($pgcekd);
	return $pgcekd;
	}

function ceksaldobb()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgceke="select count(saldo.id_saldo) as jsalbb
	from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='bb'";
	
	$pgceke=$this->db->query($pgceke);
	return $pgceke;
	}

function ceksaldobb_()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgceke="select count(saldo.id_saldo) as jsalbb
	from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='bb' and saldo.cek_saldo='1'";
	
	$pgceke=$this->db->query($pgceke);
	return $pgceke;
	}

function cekselisih()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekf="select count(selisih.id_selisih) as jselmin
	from user left join kl on user.ketuser=kl.idkl left join selisih on kl.codeuker=selisih.codeuker where user.iduser='$iduser' and selisih.tgl_selisih like '%$now%' and selisih.jns_selisih='shortage'";
	
	$pgcekf=$this->db->query($pgcekf);
	return $pgcekf;
	}

function cekselisih_()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekf="select count(selisih.id_selisih) as jselmin
	from user left join kl on user.ketuser=kl.idkl left join selisih on kl.codeuker=selisih.codeuker where user.iduser='$iduser' and selisih.tgl_selisih like '%$now%' and selisih.jns_selisih='shortage' and selisih.cek_selisih='1'";
	
	$pgcekf=$this->db->query($pgcekf);
	return $pgcekf;
	}

function cekselisiha()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekg="select count(selisih.id_selisih) as jselplus
	from user left join kl on user.ketuser=kl.idkl left join selisih on kl.codeuker=selisih.codeuker where user.iduser='$iduser' and selisih.tgl_selisih like '%$now%' and selisih.jns_selisih='surplus'";
	
	$pgcekg=$this->db->query($pgcekg);
	return $pgcekg;
	}

function dreli()
	{	
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcek="select * from user left join kl on user.ketuser=kl.idkl left join reli on kl.codeuker=reli.codeuker where user.iduser='$iduser' and reli.tgl_reli like '%$now%' order by reli.id_reli DESC limit 1";
	
	$pgceka=$this->db->query($pgcek);
	return $pgceka;
	}

function dsaldsr()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekd="select * from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='dsr'";
	
	$pgcekd=$this->db->query($pgcekd);
	return $pgcekd;
	}

function dsalapp()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekda="select * from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='app'";
	
	$pgcekda=$this->db->query($pgcekda);
	return $pgcekda;
	}

function dsalbb()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekdb="select * from user left join kl on user.ketuser=kl.idkl left join saldo on kl.codeuker=saldo.codeuker where user.iduser='$iduser' and saldo.tgl_saldo like '%$now%' and saldo.jns_saldo='bb'";
	
	$pgcekdb=$this->db->query($pgcekdb);
	return $pgcekdb;
	}

function ddoktk()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	//select 
	//cek_reli=
	$pgcekb="select * from user left join kl on user.ketuser=kl.idkl left join doktk on kl.codeuker=doktk.codeuker where user.iduser='$iduser' and doktk.tgl_doktk like '%$now%'";
	
	$pgcekb=$this->db->query($pgcekb);
	return $pgcekb;
	}



function dselisih()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	//$pgcekf="select * from user left join kl on user.ketuser=kl.idkl left join selisih on kl.codeuker=selisih.codeuker left join selisihdata on selisih.id_selisih=selisihdata.id_selisih where user.iduser='$iduser' and selisih.tgl_selisih like '%$now%' and selisih.jns_selisih='shortage'";
	$pgcekf="select * from user left join kl on user.ketuser=kl.idkl left join selisih on kl.codeuker=selisih.codeuker left join selisihdata on selisih.id_selisih=selisihdata.id_selisih where user.iduser='$iduser' and selisih.tgl_selisih like '%$now%' and selisih.jns_selisih='shortage'";
	$pgcekf=$this->db->query($pgcekf);
	return $pgcekf;
	}

function dselisiha()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	//$pgcekf="select * from user left join kl on user.ketuser=kl.idkl left join selisih on kl.codeuker=selisih.codeuker left join selisihdata on selisih.id_selisih=selisihdata.id_selisih where user.iduser='$iduser' and selisih.tgl_selisih like '%$now%' and selisih.jns_selisih='shortage'";
	$pgcekf="select * from user left join kl on user.ketuser=kl.idkl left join selisih on kl.codeuker=selisih.codeuker left join selisihdata on selisih.id_selisih=selisihdata.id_selisih where user.iduser='$iduser' and selisih.tgl_selisih like '%$now%' and selisih.jns_selisih='surplus'";
	$pgcekf=$this->db->query($pgcekf);
	return $pgcekf;
	}


function cekselisihreg()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfz="select count(selisihreg.id_selisihreg) as jselreg
	from user left join kl on user.ketuser=kl.idkl left join selisihreg on kl.codeuker=selisihreg.codeuker where user.iduser='$iduser' and selisihreg.tgl_selisihreg like '%$now%' ";
	
	$pgcekfz=$this->db->query($pgcekfz);
	return $pgcekfz;
	}

function dselisihreg()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfy="select *
	from user left join kl on user.ketuser=kl.idkl left join selisihreg on kl.codeuker=selisihreg.codeuker where user.iduser='$iduser' and selisihreg.tgl_selisihreg like '%$now%' ";
	
	$pgcekfy=$this->db->query($pgcekfy);
	return $pgcekfy;
	}

function cekpart()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfy="select count(part.id_part) as jpart
	from user left join kl on user.ketuser=kl.idkl left join part on kl.codeuker=part.codeuker where user.iduser='$iduser' and part.tgl_part like '%$now%' ";
	
	$pgcekfy=$this->db->query($pgcekfy);
	return $pgcekfy;
	}

function dpart()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfya="select *
	from user left join kl on user.ketuser=kl.idkl left join part on kl.codeuker=part.codeuker where user.iduser='$iduser' and part.tgl_part like '%$now%' ";
	
	$pgcekfya=$this->db->query($pgcekfya);
	return $pgcekfya;
	}


function ceklembur()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfx="select count(lembur.id_lembur) as jlembur
	from user left join kl on user.ketuser=kl.idkl left join lembur on kl.codeuker=lembur.codeuker where user.iduser='$iduser' and lembur.tgl_lembur like '%$now%' ";
	
	$pgcekfx=$this->db->query($pgcekfx);
	return $pgcekfx;
	}

function dlembur()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfx_="select * 
	from user left join kl on user.ketuser=kl.idkl left join lembur on kl.codeuker=lembur.codeuker where user.iduser='$iduser' and lembur.tgl_lembur like '%$now%' ";
	
	$pgcekfx_=$this->db->query($pgcekfx_);
	return $pgcekfx_;
	}

function cekkunci()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfu="select count(kunci.id_kunci) as jkunci
	from user left join kl on user.ketuser=kl.idkl left join kunci on kl.codeuker=kunci.codeuker where user.iduser='$iduser' and kunci.tgl_kunci like '%$now%' ";
	
	$pgcekfu=$this->db->query($pgcekfu);
	return $pgcekfu;
	}

function dkunci()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfu="select *
	from user left join kl on user.ketuser=kl.idkl left join kunci on kl.codeuker=kunci.codeuker where user.iduser='$iduser' and kunci.tgl_kunci like '%$now%' ";
	
	$pgcekfu=$this->db->query($pgcekfu);
	return $pgcekfu;
	}

function ceksaldokeg()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfs="select count(saldokeg.id_saldokeg) as jsaldokeg
	from user left join kl on user.ketuser=kl.idkl left join saldokeg on kl.codeuker=saldokeg.codeuker where user.iduser='$iduser' and saldokeg.tgl_saldokeg like '%$now%' ";
	
	$pgcekfs=$this->db->query($pgcekfs);
	return $pgcekfs;
	}


function dsaldokeg()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekft_="select *
	from user left join kl on user.ketuser=kl.idkl left join saldokeg on kl.codeuker=saldokeg.codeuker where user.iduser='$iduser' and saldokeg.tgl_saldokeg like '%$now%' ";
	
	$pgcekft_=$this->db->query($pgcekft_);
	return $pgcekft_;
	}


function cekreliday()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$pgcekfr="select count(reliday.id_reliday) as jreliday
	from user left join kl on user.ketuser=kl.idkl left join reliday on kl.codeuker=reliday.codeuker where user.iduser='$iduser' and reliday.tgl_reliday like '%$now%' ";
	
	$pgcekfr_=$this->db->query($pgcekfr);
	return $pgcekfr_;
	}

function dreliday()
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$apgcekfr="select *
	from user left join kl on user.ketuser=kl.idkl left join reliday on kl.codeuker=reliday.codeuker where user.iduser='$iduser' and reliday.tgl_reliday like '%$now%' ";
	
	$apgcekfr_=$this->db->query($apgcekfr);
	return $apgcekfr_;
	}


function cekutle($periode_utle=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfqq_="select count(utle.id_utle) as jutle
	from user left join kl on user.ketuser=kl.idkl left join utle on kl.codeuker=utle.codeuker where user.iduser='$iduser' and utle.periode_utle like '%$periode_utle%' ";
	
	$ipgcekfqq=$this->db->query($ipgcekfqq_);
	return $ipgcekfqq;
	}

function dutle($periode_utle=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfqa="select *
	from user left join kl on user.ketuser=kl.idkl left join utle on kl.codeuker=utle.codeuker where user.iduser='$iduser' and utle.periode_utle like '%$periode_utle%' ";
	
	$ipgcekfqa_=$this->db->query($ipgcekfqa);
	return $ipgcekfqa_;
	}


function cekgps($periode_gps=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfaa_="select count(gps.id_gps) as jgps
	from user left join kl on user.ketuser=kl.idkl left join gps on kl.codeuker=gps.codeuker where user.iduser='$iduser' and gps.periode_gps like '%$periode_gps%' ";
	
	$ipgcekfaa=$this->db->query($ipgcekfaa_);
	return $ipgcekfaa;
	}

function dgps($periode_gps=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfab="select *
	from user left join kl on user.ketuser=kl.idkl left join gps on kl.codeuker=gps.codeuker where user.iduser='$iduser' and gps.periode_gps like '%$periode_gps%' ";
	
	$ipgcekfab_=$this->db->query($ipgcekfab);
	return $ipgcekfab_;
	}


function cekcctv($periode_cctv=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfba_="select count(cctv.id_cctv) as jcctv
	from user left join kl on user.ketuser=kl.idkl left join cctv on kl.codeuker=cctv.codeuker where user.iduser='$iduser' and cctv.periode_cctv like '%$periode_cctv%' ";
	
	$ipgcekfba=$this->db->query($ipgcekfba_);
	return $ipgcekfba;
	}

function dcctv($periode_cctv=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfbbb="select *
	from user left join kl on user.ketuser=kl.idkl left join cctv on kl.codeuker=cctv.codeuker where user.iduser='$iduser' and cctv.periode_cctv like '%$periode_cctv%' ";
	
	$ipgcekfbbb_=$this->db->query($ipgcekfbbb);
	return $ipgcekfbbb_;
	}

function ddana($periode_dana=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfbbc="select *
	from user left join kl on user.ketuser=kl.idkl left join dana on kl.codeuker=dana.codeuker where user.iduser='$iduser' and dana.periode_dana like '%$periode_dana%' order by dana.tgl_drop ASC";
	
	$ipgcekfbbc_=$this->db->query($ipgcekfbbc);
	return $ipgcekfbbc_;
	}


function ceksanggah($periode_sanggah=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfae_="select count(sanggah.id_sanggah) as jsanggah
	from user left join kl on user.ketuser=kl.idkl left join sanggah on kl.codeuker=sanggah.codeuker where user.iduser='$iduser' and sanggah.periode_sanggah like '%$periode_sanggah%' ";
	
	$ipgcekfae=$this->db->query($ipgcekfae_);
	return $ipgcekfae;
	}

function dsanggah($periode_sanggah=NULL)
	{
	$iduser=$this->session->userdata('iduser');
	$now=date('Y-m-d');
	$ipgcekfaf_="select *
	from user left join kl on user.ketuser=kl.idkl left join sanggah on kl.codeuker=sanggah.codeuker where user.iduser='$iduser' and sanggah.periode_sanggah like '%$periode_sanggah%' ";
	
	$ipgcekfaf=$this->db->query($ipgcekfaf_);
	return $ipgcekfaf;
	}



}





?>