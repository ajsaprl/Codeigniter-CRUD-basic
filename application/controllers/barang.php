<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Barang extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('mbarang');
		$this->load->helper('form','url');
	}
	
	public function index(){
		$data['title'] = 'Crud CodeIgniter controller barang';
		$data['qbarang'] = $this->mbarang->get_allbarang();	//model semua barang
		$this->load->view('vbarang',$data);	//load view barang
	}
	
	public function form(){
		//ambil variable url
		$mau_ke			= $this->uri->segment(3);		//urutan url, 3(form). 4(edit). liat di vbarang
		$idu			= $this->uri->segment(4);		//urutan url, 3(form). 4(edit). liat di vbarang
		
		//ambil variable dari form
		$id						= addslashes($this->input->post('id'));
		$kode					= addslashes($this->input->post('kode'));
        $nama                   = addslashes($this->input->post('nama'));
        $jenis                  = addslashes($this->input->post('jenis'));
        $keterangan             = addslashes($this->input->post('uraian'));
        $satuan                 = addslashes($this->input->post('satuan'));
        $harga                  = addslashes($this->input->post('harga'));
        $stok                   = addslashes($this->input->post('stok'));
		
		//mengarahkan fungsi form sesuai dengan uri segmentnya
		if($mau_ke == "add"){
			$data['title'] = 'Tambah barang';
			$data['aksi'] = 'aksi_add';
			$this->load->view('vformbarang',$data);
		} else if($mau_ke == "edit"){			//url di vbarang untuk edit
			$data['qdata'] = $this->mbarang->get_barang_byid($idu);
			$data['title'] = 'Edit barang';
			$data['aksi'] = 'aksi_edit';
			$this->load->view('vformbarang',$data);
		} else if($mau_ke == "aksi_add"){	//jika tombol simpan diklik
			$data = array(
				'barcode' 	=> $kode,
				'nama_brg' => $nama,
				'harga_brg' => $harga,
                'keterangan'=> $keterangan,
                'satuan'    => $satuan,
                'jenis'     => $jenis,
                'stok_brg'  => $stok
			);
			$this->mbarang->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>"); //pesan yang tampil setalah berhasil di insert  
			redirect('barang');
		} else if($mau_ke == "aksi_edit"){	//jika tombol simpan diklik
          $data = array(
                'barcode'   => $kode,
                'nama_brg'  => $nama,
                'harga_brg' => $harga,
                'keterangan'=> $keterangan,
                'satuan'    => $satuan,
                'jenis'     => $jenis,
                'stok_brg'  => $stok
            );
			$this->db->set($data);
			$this->mbarang->get_update($id,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>"); //pesan yang tampil setelah berhasil di update
			redirect('barang');
		}
	}
	
	public function detail($id){
		$data['title'] = 'Detail Barang';
		$data['qbarang'] = $this->mbarang->get_barang_byid($id);  //query model barang sesuai id
		
		$this->load->view('vdetbarang',$data);	//method views detail barang
	}
	
	public function home(){
		$this->load->view('home');
	}
	public function hapus($gid){	//fungsi hapus sesuai id
		$this->mbarang->del_barang($gid);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Barang berhasil dihapus</div>");
        redirect('barang');
	}
}