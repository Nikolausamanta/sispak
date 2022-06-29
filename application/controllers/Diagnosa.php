<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gejala_model');
        $this->load->model('Kondisi_model');
        $this->load->model('Pengetahuan_model');
        $this->load->model('Penyakit_model');
    }

    // ===================================================================================//
    // -------------------------------- Diagnosa Start -----------------------------------//
    // ===================================================================================//

    public function diagnosa()
    {
        $data['title'] = "Diagnosa";
        $data['menu'] = "diagnosa";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;

        $data['gejala'] = array_reverse($this->Gejala_model->getGejala('all'));
        $data['kondisi'] = $this->Kondisi_model->getKondisi('all');

        $this->form_validation->set_rules('kondisi[]', 'Kondisi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/user/user_header', $data);
            $this->load->view('user/diagnosa');
            $this->load->view('template/user/user_footer');
        } else {
            // * perhitungan CF START
            // * inisiasi variabel yang akan diinput ke db
            $list_gejala = array();
            $list_penyakit = array();

            // * ambil pilihan pengguna
            $nama = $this->input->post('nama');
            $usia = $this->input->post('usia');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');

            $input_gejala_kondisi = $this->input->post('kondisi');

            foreach ($input_gejala_kondisi as $row) {
                // * jika pengguna memilih kondisi dan tidak 0
                if (strlen($row) > 1) {
                    // * memecah id gejala dan id kondisi yang dipilih pengguna misal 16_1 menjadi array [16,1]
                    $split_pilihan = explode('_', $row);

                    // * menyimpan gejala dan kondisi yang dipilih pengguna kedalam list_gejala
                    $list_gejala += array($split_pilihan[0] => $split_pilihan[1]);
                }
            }

            // ? ambil semua penyakit
            $semua_penyakit = $this->Penyakit_model->getPenyakit('all');

            // ? perulangan menghitung CF tiap penyakit
            foreach ($semua_penyakit as $penyakit) {

                // ? ambil semua basis pengetahuan dari penyakit saat ini berdasar id_penyakit
                $pengetahuan_terkait = $this->Pengetahuan_model->getPengetahuan('id_penyakit', $penyakit['id_penyakit']);

                // ? inisiasi variabel CF untuk perhitungan
                $cf = 0;
                $cf_lama = 0;
                // ! perulangan menghitung CF[H,E] 1, CF[H,E] 2, dst
                // ! urutan untuk penanda urutan CF[H,E]
                $urutancf = 1;

                // ? hitung dan cek tiap pengetahuan terkait
                foreach ($pengetahuan_terkait as $pengetahuan) {
                    // ? cek tiap gejala pada pengetahuan terkait                    

                    foreach ($input_gejala_kondisi as $gejala) {
                        $gejala = explode("_", $gejala);

                        // ? jika gejala pada pengetahuan sama dengan gejala yang diinput pengguna
                        if ($pengetahuan['id_gejala'] == $gejala[0]) {
                            // ? ambil kondisi terpilih untuk mengakses cf_kondisi
                            $kondisi_terpilih = $this->Kondisi_model->getKondisi('id_kondisi', $gejala[1]);

                            // ? perhitungan rumus CF gejala iterasi saat ini
                            $cf = $pengetahuan['cf'] * $kondisi_terpilih['cf_kondisi'];

                            // ? iterasi pertama maka CF 1 langsung menjadi CF OLD
                            if ($urutancf <= 1) {
                                $cf_lama = $cf;
                            } else { // ? selain iterasi pertama maka gunakan rumus perhitungan dengan cf lama sebelumnya (CF COMBINE)                                
                                $cf_lama = $cf_lama + ($cf * (1 - $cf_lama));
                            }

                            $urutancf++;
                        }
                    }
                }
                if ($cf_lama > 0) { // ! jika nilai tidak negatif maka tambahkan ke daftar diagnosa
                    //  ? tambahkan penyakit ke daftar list jika sesuai gejala dan perhitungan
                    $list_penyakit += array($penyakit['id_penyakit'] => number_format($cf_lama, 4));
                }
            }

            // * mengurutkan dari nilai tertinggi ke rendah
            arsort($list_penyakit);

            // * perhitungan CF END

            // ? tampilkan hasil perhitungan
            $data['title'] = "Diagnosa";
            $data['menu'] = "diagnosa";

            $data['hasil_penyakit'] = $this->Penyakit_model->getHasilPenyakit($list_penyakit);
            $data['hasil_gejala'] = $this->Gejala_model->getHasilGejala($list_gejala);
            $data['identitas'] = array(
                'nama' => $nama,
                'usia' => $usia,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
            );

            // ? input hasil perhitungan ke db
            if ($list_penyakit && $list_gejala) {
                $this->load->model('Hasil_model');

                $id_penyakit = null;
                $nilai = null;
                $no = 1;

                foreach ($list_penyakit as $key => $value) {
                    if ($no == 1) {
                        $id_penyakit = $key;
                        $nilai = $value;
                    }

                    $no++;
                }

                $hasil = array(
                    'id_penyakit' => $id_penyakit,
                    'hasil_penyakit' => json_encode($list_penyakit),
                    'hasil_gejala' => json_encode($list_gejala),
                    'hasil_nilai' => $nilai,
                    'nama' => $nama,
                    'usia' => $usia,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'hasil_created' => time()
                );

                $this->Hasil_model->insertHasil($hasil);
            } else {
                redirect('diagnosa/diagnosa_hasil_null');


                // $previous = "javascript:history.go(-1)";
                // echo "<script>$previous, alert('tidak ada gejala dipilih, tidak ada penyakit terdeteksi');</script>";
                // die;
            }

            $this->load->view('template/user/user_header', $data);
            $this->load->view('user/diagnosa_hasil');
            $this->load->view('template/user/user_footer');
        }
    }

    public function diagnosa_hasil_null()
    {
        $data['title'] = "Hasil Diagnosa";
        $data['menu'] = "diagnosa";

        $this->load->view('template/user/user_header', $data);
        $this->load->view('user/diagnosa_hasil_null');
        $this->load->view('template/user/user_footer');
    }
    // ===================================================================================//
    // ---------------------------------- Diagnosa End -----------------------------------//
    // ===================================================================================//




    // ########################################################################################## //



    // ===================================================================================//
    // ----------------------------------- Hasil Start -----------------------------------//
    // ===================================================================================//

    // public function hasil($id_hasil)
    // {
    //     $this->load->model('Hasil_model');

    //     $hasil = $this->Hasil_model->getHasil('id_hasil', $id_hasil);

    //     $list_penyakit = json_decode($hasil['hasil_penyakit']);
    //     $list_gejala = json_decode($hasil['hasil_gejala']);

    //     $data['hasil_penyakit'] = $this->Penyakit_model->getHasilPenyakit($list_penyakit);
    //     $data['hasil_gejala'] = $this->Gejala_model->getHasilGejala($list_gejala);
    //     $data['identitas'] = array(
    //         'nama' => $hasil['nama'],
    //         'usia' => $hasil['usia'],
    //         'jenis_kelamin' => $hasil['jenis_kelamin'],
    //         'alamat' => $hasil['alamat'],
    //     );

    //     $this->load->view('template/user/user_header', $data);
    //     $this->load->view('user/diagnosa_hasil_view');
    //     $this->load->view('template/user/user_footer');
    // }

    // ===================================================================================//
    // ------------------------------------- Hasil End -----------------------------------//
    // ===================================================================================//
}
