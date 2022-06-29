<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('test_method')) {
    function verifyAccess($public = false)
    {
        // * menampung sesi login role user
        $role_id = null;

        // * jika sudah ada session login maka simpan role login
        if (isset($_SESSION['role_id'])) {
            $role_id = $_SESSION['role_id'];
        }

        // * jika role 1 diarahkan ke admin
        if ($role_id == 1) {
            redirect('admin2');
        }

        // * jika role 2 diarahkan ke home
        if ($role_id == 2) {
            redirect('home');
        }

        // * jika role null/kosong/belum login
        if ($role_id == null || $role_id == '') {
            // jika ingin mengakses halaman admin/user maka dikembalikan ke laman utama
            if (!$public) {
                redirect('');
            }
        }
    }
}
