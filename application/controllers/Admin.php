<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != 1) {
            verifyAccess();
        }

        $this->load->model('Gejala_model');
        $this->load->model('Kondisi_model');
        $this->load->model('Pengetahuan_model');
        $this->load->model('Penyakit_model');
        $this->load->model('Hasil_model');
    }

    // ===================================================================================//
    // ------------------------------------ Index Start ----------------------------------//
    // ===================================================================================//

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['menu'] = "beranda";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['count_penyakit'] = $this->Penyakit_model->countPenyakit('all');
        $data['count_gejala'] = $this->Gejala_model->countGejala('all');
        $data['count_pengetahuan'] = $this->Pengetahuan_model->countPengetahuan('all');

        $data['hasil_penyakit'] = $this->Hasil_model->getHasil('chart_penyakit');
        $data['hasil_usia'] = $this->Hasil_model->getHasil('chart_usia');
        $data['hasil_jenis_kelamin'] = $this->Hasil_model->getHasil('chart_jenis_kelamin');


        $this->load->view('template/admin/admin_header', $data);
        $this->load->view('template/admin/admin_sidebar', $data);
        $this->load->view('template/admin/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/admin/admin_footer');
    }

    // ===================================================================================//
    // ------------------------------------- Index End -----------------------------------//
    // ===================================================================================//



    // ########################################################################################## //



    // ===================================================================================//
    // ---------------------------------- Penyakit Start ---------------------------------//
    // ===================================================================================//

    public function penyakit()
    {

        $data['title'] = "Penyakit";
        $data['menu'] = "penyakit";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('all');

        // validation forms                
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required|trim');
        $this->form_validation->set_rules('deskripsi_penyakit', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('saran_penyakit', 'Saran', 'required|trim');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/admin/admin_header', $data);
            $this->load->view('template/admin/admin_sidebar', $data);
            $this->load->view('template/admin/admin_topbar', $data);
            $this->load->view('admin/penyakit', $data);
            $this->load->view('template/admin/admin_footer');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $nama_penyakit = $this->input->post('nama_penyakit');
            $deskripsi_penyakit = $this->input->post('deskripsi_penyakit');
            $saran_penyakit = $this->input->post('saran_penyakit');

            if ($submitType == 'Tambah') { // * jika tambah data

                if ($_FILES['gambar_penyakit']['error'] != 4) {
                    $gambar_penyakit = $this->upload_image('gambar_penyakit', './assets/img/penyakit/');
                } else {
                    $gambar_penyakit = 'no-image.jpg';
                }

                // * data penyakit yang akan diinput
                $data_penyakit = array(
                    'nama_penyakit' => $nama_penyakit,
                    'deskripsi_penyakit' => $deskripsi_penyakit,
                    'saran_penyakit' => $saran_penyakit,
                    'gambar_penyakit' => $gambar_penyakit,
                );

                if ($this->Penyakit_model->insertPenyakit($data_penyakit)) { // * jika berhasil input penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan penyakit</div>');

                    redirect('admin/penyakit');
                } else { // ! jika gagal input penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan penyakit</div>');

                    redirect('admin/penyakit');
                }
            } else { // * jika edit data
                $id_penyakit = $this->input->post('id_penyakit');
                $penyakit = $this->Penyakit_model->getPenyakit('id_penyakit', $id_penyakit);

                if ($_FILES['gambar_penyakit']['error'] != 4) {
                    $gambar_penyakit = $this->upload_image('gambar_penyakit', './assets/img/penyakit/');
                } else {
                    $gambar_penyakit = $penyakit['gambar_penyakit'];
                }

                $data_update_penyakit = array(
                    'nama_penyakit' => $nama_penyakit,
                    'deskripsi_penyakit' => $deskripsi_penyakit,
                    'saran_penyakit' => $saran_penyakit,
                    'gambar_penyakit' => $gambar_penyakit,
                );

                if ($this->Penyakit_model->updatePenyakit('id_penyakit', $data_update_penyakit, $id_penyakit)) { // * jika berhasil update penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah penyakit</div>');

                    redirect('admin/penyakit');
                } else { // ! jika gagal update penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah penyakit</div>');

                    redirect('admin/penyakit');
                }
            }
        }
    }

    // * untuk edit penyakit
    public function editPenyakit($id_penyakit)
    {
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('id_penyakit', $id_penyakit);

        $this->load->view('admin/edit/edit_penyakit', $data);
    }

    // * untuk menghapus penyakit
    public function deletePenyakit($id_penyakit)
    {
        if ($this->Penyakit_model->deletePenyakit('id_penyakit', $id_penyakit)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus penyakit</div>');

            redirect('admin/penyakit');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus penyakit</div>');

            redirect('admin/penyakit');
        }
    }

    // ===================================================================================//
    // ---------------------------------- Penyakit End -----------------------------------//
    // ===================================================================================//



    // ########################################################################################## //



    // ===================================================================================//
    // ----------------------------------- Gejala Start ----------------------------------//
    // ===================================================================================//

    public function gejala()
    {
        $data['title'] = "Gejala";
        $data['menu'] = "gejala";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;

        // user data       
        $data['gejala'] = $this->Gejala_model->getGejala('all');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // validation forms                
        $this->form_validation->set_rules('nama_gejala', 'Gejala', 'required|trim');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/admin/admin_header', $data);
            $this->load->view('template/admin/admin_sidebar', $data);
            $this->load->view('template/admin/admin_topbar', $data);
            $this->load->view('admin/gejala', $data);
            $this->load->view('template/admin/admin_footer');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $nama_gejala = $this->input->post('nama_gejala');

            if ($submitType == 'Tambah') { // * jika tambah data

                // * data gejala yang akan diinput
                $data_gejala = array(
                    'nama_gejala' => $nama_gejala,
                );

                if ($this->Gejala_model->insertGejala($data_gejala)) { // * jika berhasil input gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan gejala</div>');

                    redirect('admin/gejala');
                } else { // ! jika gagal input gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan gejala</div>');

                    redirect('admin/gejala');
                }
            } else { // * jika edit data
                $id_gejala = $this->input->post('id_gejala');

                $data_update_gejala = array(
                    'nama_gejala' => $nama_gejala,
                );

                if ($this->Gejala_model->updateGejala('id_gejala', $data_update_gejala, $id_gejala)) { // * jika berhasil update gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah gejala</div>');

                    redirect('admin/gejala');
                } else { // ! jika gagal update gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah gejala</div>');

                    redirect('admin/gejala');
                }
            }
        }
    }

    // * untuk edit detail gejala
    public function editGejala($id_gejala)
    {
        $data['gejala'] = $this->Gejala_model->getGejala('id_gejala', $id_gejala);

        $this->load->view('admin/edit/edit_gejala', $data);
    }

    // * untuk menghapus gejala
    public function deleteGejala($id_gejala)
    {
        if ($this->Gejala_model->deleteGejala('id_gejala', $id_gejala)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus gejala</div>');

            redirect('admin/gejala');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus gejala</div>');

            redirect('admin/gejala');
        }
    }

    // ===================================================================================//
    // ------------------------------------ Gejala End -----------------------------------//
    // ===================================================================================//



    // ########################################################################################## //



    // ===================================================================================//
    // ----------------------------------- Kondisi Start ---------------------------------//
    // ===================================================================================//

    public function kondisi()
    {
        $data['title'] = "Kondisi";
        $data['menu'] = "kondisi";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;

        // user data
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kondisi'] = $this->Kondisi_model->getKondisi('all');

        // validation forms                
        $this->form_validation->set_rules('nama_kondisi', 'Nama Kondisi', 'required|trim');
        $this->form_validation->set_rules('cf_kondisi', 'CF KONDISI', 'required|trim|decimal');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/admin/admin_header', $data);
            $this->load->view('template/admin/admin_sidebar', $data);
            $this->load->view('template/admin/admin_topbar', $data);
            $this->load->view('admin/kondisi', $data);
            $this->load->view('template/admin/admin_footer');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $nama_kondisi = $this->input->post('nama_kondisi');
            $bobot = $this->input->post('cf_kondisi');

            if ($submitType == 'Tambah') { // * jika tambah data

                // * data kondisi yang akan diinput
                $data_kondisi = array(
                    // 'id_user' => $this->session->userdata('id_user'),
                    'nama_kondisi' => $nama_kondisi,
                    'cf_kondisi' => $bobot,
                );

                if ($this->Kondisi_model->insertKondisi($data_kondisi)) { // * jika berhasil input kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan kondisi</div>');

                    redirect('admin/kondisi');
                } else { // ! jika gagal input kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan kondisi</div>');

                    redirect('admin/kondisi');
                }
            } else { // * jika edit data
                $id_kondisi = $this->input->post('id_kondisi');

                $data_update_kondisi = array(
                    'nama_kondisi' => $nama_kondisi,
                    'cf_kondisi' => $bobot,
                );

                if ($this->Kondisi_model->updateKondisi('id_kondisi', $data_update_kondisi, $id_kondisi)) { // * jika berhasil update kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah kondisi</div>');

                    redirect('admin/kondisi');
                } else { // ! jika gagal update kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah kondisi</div>');

                    redirect('admin/kondisi');
                }
            }
        }
    }
    // * untuk menampilkan detail kondisi
    public function editKondisi($id_kondisi)
    {
        $data['kondisi'] = $this->Kondisi_model->getKondisi('id_kondisi', $id_kondisi);

        $this->load->view('admin/edit/edit_kondisi', $data);
    }

    // * untuk menghapus kondisi
    public function deleteKondisi($id_kondisi)
    {
        if ($this->Kondisi_model->deleteKondisi('id_kondisi', $id_kondisi)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus kondisi</div>');

            redirect('admin/kondisi');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus kondisi</div>');

            redirect('admin/kondisi');
        }
    }

    // ===================================================================================//
    // ----------------------------------- Kondisi End -----------------------------------//
    // ===================================================================================//



    // ########################################################################################## //



    // ===================================================================================//
    // -------------------------------- Pengetahuan Start --------------------------------//
    // ===================================================================================//

    public function pengetahuan()
    {
        $data['title'] = "Pengetahuan";
        $data['menu'] = "pengetahuan";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;

        // user data        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pengetahuan'] = $this->Pengetahuan_model->getPengetahuan('all');
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('all');
        $data['gejala'] = $this->Gejala_model->getGejala('all');

        // validation forms                
        $this->form_validation->set_rules('id_penyakit', 'Penyakit', 'required|trim');
        $this->form_validation->set_rules('id_gejala', 'Gejala', 'required|trim');
        $this->form_validation->set_rules('cf', 'CF', 'required|trim|decimal');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/admin/admin_header', $data);
            $this->load->view('template/admin/admin_sidebar', $data);
            $this->load->view('template/admin/admin_topbar', $data);
            $this->load->view('admin/pengetahuan', $data);
            $this->load->view('template/admin/admin_footer');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $id_penyakit = $this->input->post('id_penyakit');
            $id_gejala = $this->input->post('id_gejala');
            $mb = $this->input->post('cf');

            if ($submitType == 'Tambah') { // * jika tambah data

                // * data gejala yang akan diinput
                $data_pengetahuan = array(
                    'id_penyakit' => $id_penyakit,
                    'id_gejala' => $id_gejala,
                    'cf' => $mb,
                );

                if ($this->Pengetahuan_model->insertPengetahuan($data_pengetahuan)) { // * jika berhasil input pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan pengetahuan</div>');

                    redirect('admin/pengetahuan');
                } else { // ! jika gagal input pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan pengetahuan</div>');

                    redirect('admin/pengetahuan');
                }
            } else { // * jika edit data
                $id_basis_pengetahuan = $this->input->post('id_basis_pengetahuan');

                $data_update_pengetahuan = array(
                    'id_penyakit' => $id_penyakit,
                    'id_gejala' => $id_gejala,
                    'cf' => $mb,
                );

                if ($this->Pengetahuan_model->updatePengetahuan('id_basis_pengetahuan', $data_update_pengetahuan, $id_basis_pengetahuan)) { // * jika berhasil update pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah pengetahuan</div>');

                    redirect('admin/pengetahuan');
                } else { // ! jika gagal update pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah pengetahuan</div>');

                    redirect('admin/pengetahuan');
                }
            }
        }
    }
    // * untuk edit detail pengetahuan
    public function editPengetahuan($id_basis_pengetahuan)
    {
        $data['pengetahuan'] = $this->Pengetahuan_model->getPengetahuan('id_basis_pengetahuan', $id_basis_pengetahuan);
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('all');
        $data['gejala'] = $this->Gejala_model->getGejala('all');

        $this->load->view('admin/edit/edit_pengetahuan', $data);
    }

    // * untuk menghapus pengetahuan
    public function deletePengetahuan($id_basis_pengetahuan)
    {
        if ($this->Pengetahuan_model->deletePengetahuan('id_basis_pengetahuan', $id_basis_pengetahuan)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus pengetahuan</div>');

            redirect('admin/pengetahuan');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus pengetahuan</div>');

            redirect('admin/pengetahuan');
        }
    }

    // ===================================================================================//
    // --------------------------------- Pengetahuan End ---------------------------------//
    // ===================================================================================//



    // ########################################################################################## //



    // ===================================================================================//
    // ------------------------------ Hasil Diagnosa Start -------------------------------//
    // ===================================================================================//

    public function hasildiagnosa()
    {
        $data['title'] = "Hasil Diagnosa";
        $data['menu'] = "hasildiagnosa";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Hasil_model->getHasil('all');

        $this->load->view('template/admin/admin_header', $data);
        $this->load->view('template/admin/admin_sidebar', $data);
        $this->load->view('template/admin/admin_topbar', $data);
        $this->load->view('admin/hasil_diagnosa', $data);
        $this->load->view('template/admin/admin_footer');
    }
    // * untuk menghapus hasil
    public function deleteHasil($id_hasil)
    {
        if ($this->Hasil_model->deleteHasil('id_hasil', $id_hasil)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus hasil diagnosa</div>');

            redirect('admin/hasildiagnosa');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus hasil diagnosa</div>');

            redirect('admin/hasildiagnosa');
        }
    }

    // ===================================================================================//
    // ------------------------------ Hasil Diagnosa End ---------------------------------//
    // ===================================================================================//



    // ########################################################################################## //



    // ===================================================================================//
    // --------------------------------- Profile Start -----------------------------------//
    // ===================================================================================//

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['menu'] = "profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/admin/admin_header', $data);
        $this->load->view('template/admin/admin_sidebar', $data);
        $this->load->view('template/admin/admin_topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('template/admin/admin_footer');
    }


    // Edit Profile Start ==================================================================================
    public function editprofile()
    {
        $data['title'] = 'My Profile';
        $data['menu'] = "profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/admin/admin_header', $data);
        $this->load->view('template/admin/admin_sidebar', $data);
        $this->load->view('template/admin/admin_topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('template/admin/admin_footer');
    }

    // ===================================================================================//
    // --------------------------------- Profile End -------------------------------------//
    // ===================================================================================//



    // ########################################################################################## //



    // ===================================================================================//
    // ------------------------------ Upload Image Start ---------------------------------//
    // ===================================================================================//

    //  *fungsi untuk upload image
    private function upload_image($name, $address)
    {
        $this->load->library('upload');
        $config['upload_path'] = $address; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['max_size'] = 10000;

        $this->upload->initialize($config);

        if (!empty($_FILES[$name]['name'])) {

            if ($this->upload->do_upload($name)) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $address . $gbr['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['width'] = 800;
                $config['height'] = 600;
                $config['new_image'] = $address . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                return $gambar;
            } else {
                echo "gagal upload";
            }
        } else {
            return 'no-image.jpg';
        }
    }

    // ===================================================================================//
    // ------------------------------ Upload Image End -----------------------------------//
    // ===================================================================================//
}
