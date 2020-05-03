<?php 

class C_Service extends CI_Controller {
	public function index()
	{
		$data['terimaservis']= $this->m_service->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_service', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_aksi(){

		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'barang' => $this->input->post('barang'),
			'rusak' => $this->input->post('rusak'),
			'ket_masuk' => $this->input->post('ket_masuk'),
			'tgl_terima' => $this->input->post('tgl_terima'),
			'user' => $this->session->userdata('USER'),
		);
		$this->m_service->input_data($data,'t_terima');
		$this->session->set_flashdata('info', 'Simpan Data sukses');
		redirect('c_service');
	}

	public function terima_aksi(){
		$id=$this->input->post('id_masuk');
		$data = array(
			'id_masuk' => $this->input->post('id_masuk'),
			'tgl_keluar' => $this->input->post('tgl_keluar'),
			'ket_keluar' => $this->input->post('ket'),
			'total_biaya' => $this->input->post('total'),
		);
		$terima=array(
			'status' =>'1'
		);
		$where =$this->db->where('id_masuk',$id);
		$this->m_service->update_data($where,$terima,'t_terima');
		$this->m_service->input_data($data,'t_keluar');
		$this->session->set_flashdata('info', 'Simpan Data sukses');
		redirect('c_service');
	}

	public function hapus($id_masuk){
		$where = array('id_masuk' => $id_masuk);
		$this->m_service->hapus_data($where, 't_terima');
		redirect ('c_service');
	}

}