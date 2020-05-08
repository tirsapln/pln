<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller {
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_realisasi');
        $this->load->helper(array('form','url'));
    }

    
	public function index()
	{
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Data Realisasi',
            'realisasi' => $this->m_realisasi->lists(),
            'isi'   => 'admin/realisasi/v_list',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function kategori()
	{
        $tanggal = $this->uri->segment(3);
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Data Realisasi',
            'realisasi' => $this->m_realisasi->kategori($tanggal),
            'isi'   => 'admin/realisasi/v_list',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function datatebang()
	{
        $data = array (
            'title' => 'PLN Tondano',
            'title2' => 'Data Realisasi',
            'realisasi' => $this->m_realisasi->tebang(),
            'isi'   => 'admin/realisasi/v_list',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function datapangkas()
	{
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Data Realisasi',
            'realisasi' => $this->m_realisasi->pangkas(),
            'isi'   => 'admin/realisasi/v_list',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function belumrealisasi()
	{
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Data Realisasi',
            'realisasi' => $this->m_realisasi->belum(),
            'isi'   => 'admin/realisasi/v_list',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function datapadam()
	{
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Data Realisasi',
            'realisasi' => $this->m_realisasi->padam(),
            'isi'   => 'admin/realisasi/v_list',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('penyulang', 'Penyulang', 'required');
    
        if($this->form_validation->run() == TRUE)
        {
            $config['upload_path'] = './foto_realisasi/'; 
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = 8000;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto'))
            {
                
                $data = array (
                    'title'         => 'PLN ULP Tondano',
                    'title2'        => 'Tambah Data Realisasi',
                    'error'         => $this->upload->display_errors(),
                    'isi'           => 'admin/realisasi/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE); 
            }
            else 
            {
                
                $data = array 
                (
                    'foto1'=> $this->upload->data(),
                );
                $foto_sebelum= $data['foto1']['file_name'];

                    if ($this->upload->do_upload('foto_sesudah'))
                    {
                        $data = array 
                        (
                        'foto2'=> $this->upload->data(),
                        );
                        
                        
                        $foto_sesudah= $data['foto2']['file_name'];
                        
                        $data = array (
                            'penyulang'             => $this->input->post('penyulang'),
                            'tanggal'               => $this->input->post('tanggal'),
                            'titik_koordinat'       => $this->input->post('titik_koordinat'),
                            'no_tiang'              => $this->input->post('no_tiang'),
                            'lokasi'                => $this->input->post('lokasi'),
                            'nama_pohon'            => $this->input->post('nama_pohon'),
                            'prioritas'             => $this->input->post('prioritas'),
                            'temuan'                => $this->input->post('temuan'),
                            'keterangan'            => $this->input->post('keterangan'),
                            'foto'                  => $foto_sebelum,
                            'foto_sesudah'          => $foto_sesudah
                            
                            );
    
                            $this->m_realisasi->add($data);
                            $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!');
                            redirect('realisasi');

                    }
                    $data = array (
                        'penyulang'             => $this->input->post('penyulang'),
                        'tanggal'               => $this->input->post('tanggal'),
                        'titik_koordinat'       => $this->input->post('titik_koordinat'),
                        'no_tiang'              => $this->input->post('no_tiang'),
                        'lokasi'                => $this->input->post('lokasi'),
                        'nama_pohon'            => $this->input->post('nama_pohon'),
                        'prioritas'             => $this->input->post('prioritas'),
                        'temuan'                => $this->input->post('temuan'),
                        'keterangan'            => $this->input->post('keterangan'),
                        'foto'                  => $foto_sebelum,
                        //'foto_sesudah'          => $foto_sesudah
                        
                        );

                        $this->m_realisasi->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!');
                        redirect('realisasi');
                }
                
            }
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Tambah Realisasi',
            'isi'   => 'admin/realisasi/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        
    }

        

public function edit($id_realisasi)
    {
        $this->form_validation->set_rules('penyulang', 'Penyulang', 'required');
        //$this->form_validation->set_rules('tanggal', 'Tanggal');
        /*$this->form_validation->set_rules('titik_koordinat', 'Titik Koordinat');
        $this->form_validation->set_rules('no_tiang', 'No Tiang');
        $this->form_validation->set_rules('prioritas', 'Prioritas');
        $this->form_validation->set_rules('temuan', 'Temuan');*/
        //$this->form_validation->set_rules('keterangan', 'Keterangan');

        
        if($this->form_validation->run() == TRUE)
        //if(TRUE)
        {
            $config['upload_path'] = './foto_realisasi/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = 8000;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            
            if(!$this->upload->do_upload('foto'))
            {
                $data = array (
                    'title' => 'PLN ULP Tondano',
                    'title2' => 'Edit Realisasi',
                    'realisasi' =>$this->m_realisasi->detail($id_realisasi),
                    'isi'   => 'admin/realisasi/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                
            } 
            else
            {
                
                $data = array 
                (
                    'foto1'=> $this->upload->data(),
                );
                $foto_sebelum= $data['foto1']['file_name'];

                    if ($this->upload->do_upload('foto_sesudah'))
                    {
                        $data = array 
                        (
                        'foto2'=> $this->upload->data(),
                        );
                        
                        
                        $foto_sesudah= $data['foto2']['file_name']; 

                        $data = array (
                            'id_realisasi'          =>$id_realisasi,
                            'penyulang'             => $this->input->post('penyulang'),
                            'tanggal'               => $this->input->post('tanggal'),
                            'titik_koordinat'       => $this->input->post('titik_koordinat'),
                            'no_tiang'              => $this->input->post('no_tiang'),
                            'lokasi'                => $this->input->post('lokasi'),
                            'nama_pohon'            => $this->input->post('nama_pohon'),
                            'prioritas'             => $this->input->post('prioritas'),
                            'temuan'                => $this->input->post('temuan'),
                            'keterangan'            => $this->input->post('keterangan'),
                            'foto'                  => $foto_sebelum,
                            'foto_sesudah'          => $foto_sesudah
                            
                        );
                    
                   
    
                        $this->m_realisasi->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!');
                        redirect('realisasi');

                    }
                    
                    $data = array (
                        'id_realisasi'          =>$id_realisasi,
                        'penyulang'             => $this->input->post('penyulang'),
                        'tanggal'               => $this->input->post('tanggal'),
                        'titik_koordinat'       => $this->input->post('titik_koordinat'),
                        'no_tiang'              => $this->input->post('no_tiang'),
                        'lokasi'                => $this->input->post('lokasi'),
                        'nama_pohon'            => $this->input->post('nama_pohon'),
                        'prioritas'             => $this->input->post('prioritas'),
                        'temuan'                => $this->input->post('temuan'),
                        'keterangan'            => $this->input->post('keterangan'),
                        'foto'                  => $foto_sebelum,
                        //'foto_sesudah'          => $foto_sesudah
                        
                    );
                
               

                $this->m_realisasi->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!');
                redirect('realisasi');
                    
            }
            
            if ($this->upload->do_upload('foto_sesudah'))
                {
                    $data = array 
                    (
                    'foto2'=> $this->upload->data(),
                    );
                    
                    
                    $foto_sesudah= $data['foto2']['file_name']; 

                    $data = array (
                        'id_realisasi'          =>$id_realisasi,
                        'penyulang'             => $this->input->post('penyulang'),
                        'tanggal'               => $this->input->post('tanggal'),
                        'titik_koordinat'       => $this->input->post('titik_koordinat'),
                        'no_tiang'              => $this->input->post('no_tiang'),
                        'lokasi'                => $this->input->post('lokasi'),
                        'nama_pohon'            => $this->input->post('nama_pohon'),
                        'prioritas'             => $this->input->post('prioritas'),
                        'temuan'                => $this->input->post('temuan'),
                        'keterangan'            => $this->input->post('keterangan'),
                        //'foto'                  => $foto_sebelum,
                        'foto_sesudah'          => $foto_sesudah
                        
                    );

                    $this->m_realisasi->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!');
                    redirect('realisasi');

                } 
                else
                {
                    //$foto_sesudah= $data['foto2']['file_name']; 

                    $data = array (
                        'id_realisasi'          =>$id_realisasi,
                        'penyulang'             => $this->input->post('penyulang'),
                        'tanggal'               => $this->input->post('tanggal'),
                        'titik_koordinat'       => $this->input->post('titik_koordinat'),
                        'no_tiang'              => $this->input->post('no_tiang'),
                        'lokasi'                => $this->input->post('lokasi'),
                        'nama_pohon'            => $this->input->post('nama_pohon'),
                        'prioritas'             => $this->input->post('prioritas'),
                        'temuan'                => $this->input->post('temuan'),
                        'keterangan'            => $this->input->post('keterangan'),
                        //'foto'                  => $foto_sebelum,
                        //'foto_sesudah'          => $foto_sesudah
                        
                    );

                    $this->m_realisasi->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!');
                    redirect('realisasi');
                }
            
            
                

        }

        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Edit Realisasi',
            'realisasi' =>$this->m_realisasi->detail($id_realisasi),
            'isi'   => 'admin/realisasi/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        

}
    
    

    public function delete($id_realisasi)
    {
        // menghapus foto lama
        $realisasi= $this->m_realisasi->detail($id_realisasi);
        if ($realisasi->foto != "" && $realisasi->foto_sesudah != ""  )
        {
            unlink('./foto_realisasi/'.$realisasi->foto);
            unlink('./foto_realisasi/'.$realisasi->foto_sesudah);
        }
        else if ($realisasi->foto != "" && $realisasi->foto_sesudah = ""  )
        {
            unlink('./foto_realisasi/'.$realisasi->foto);
            //unlink('./foto_realisasi/'.$realisasi->foto_sesudah);
        }
        else if ($realisasi->foto = "" && $realisasi->foto_sesudah != ""  )
        {
            //unlink('./foto_realisasi/'.$realisasi->foto);
            unlink('./foto_realisasi/'.$realisasi->foto_sesudah);
        }
        // end hapus foto

        $data = array ('id_realisasi' => $id_realisasi);
        $this->m_realisasi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!');
        redirect('admin');

         
    } 

    public function cetak()
	{
        $data['realisasi'] = $this->m_realisasi->tampil_data("tb_realisasi")->result();
        $this->load->view('admin/print_realisasi', $data);
    }

    public function pdf()
	{
        $this->load->library('pdf');
        $data['realisasi'] = $this->m_realisasi->tampil_data("tb_realisasi")->result();

        $this->load->view('admin/laporanpdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size, $orientation);
        
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_realisasi.pdf", array('Attachment' =>0));
    }

    

    public function pdfkategori()
	{
        $tanggal = $this->uri->segment(3);
        $this->load->library('pdf');
        $data['realisasi'] = $this->m_realisasi->kategori($tanggal);

        $this->load->view('admin/laporanpdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size, $orientation);
        
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_realisasi.pdf", array('Attachment' =>0));
    }

    public function pdfpadam()
	{
        $this->load->library('pdf');
        $data['realisasi'] = $this->m_realisasi->padam();

        $this->load->view('admin/laporanpdfpadam', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        //$options->set('isRemoteEnabled', TRUE);
        $this->pdf->set_paper($paper_size, $orientation);
        
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_realisasi_pangkas.pdf", array('Attachment' =>0));
    }

    public function pdftebang()
	{
        $this->load->library('pdf');
        $data['realisasi'] = $this->m_realisasi->tebang();

        $this->load->view('admin/laporanpdftebang', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size, $orientation);
        
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_realisasi_tebang.pdf", array('Attachment' =>0));
    }

    public function pdfpangkas()
	{
        $this->load->library('pdf');
        $data['realisasi'] = $this->m_realisasi->pangkas();

        $this->load->view('admin/laporanpdfpadam', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size, $orientation);
        
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_realisasi_perlu_padam.pdf", array('Attachment' =>0));
    }


    public function form()
    {   
               
        $data = array ();
        if(isset($_POST['preview']))
        {
            $upload = $this->m_realisasi->upload_file($this->filename);

            if($upload['result'] == "success")
            {
                include APPPATH.'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();

                //$loadexcel = $excelreader->load('excel'.$this->filename.'xlsx');
                $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true,true,true);
                $data['sheet'] = $sheet;
            }
            else
            {
                $data['upload_error'] = $upload['error'];
            }
        }

        $datar = array (
            'title2' => 'Import Work Order'
        );
        $this->load->view('admin/layout/v_head');
        $this->load->view('admin/layout/v_header');
        $this->load->view('admin/layout/v_nav', $datar);
        $this->load->view('admin/form', $data);
        $this->load->view('admin/layout/v_footer');
        

        
    }

    public function import()
    {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();

           
            $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true,true,true);
            $data= array();
            $numrow = 1;
            foreach($sheet as $row)
            {
                if($numrow > 1){
                    array_push($data, array(
                        'penyulang' =>$row['A'],
                        'tanggal' => $row['B'],
                        'titik_koordinat' => $row ['C'],
                        'no_tiang' => $row['D'],
                        'prioritas' => $row['E'],
                        'foto' => $row['F'],
                        'temuan' => $row['G'],
                        'foto_sesudah' => $row['H'],
                        'keterangan' => $row['I'],
                        'lokasi' => $row['J'],
                        'nama_pohon' => $row['K']
                    ));
                }
                $numrow++;
            }
            $this->m_realisasi->insert_multiple($data);
            redirect('realisasi');
             
    }

    public function downloadpdf()
    {
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Download PDF',
            'realisasi' => $this->m_realisasi->kategoripdf(),
            'isi'   => 'admin/v_download',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    
}