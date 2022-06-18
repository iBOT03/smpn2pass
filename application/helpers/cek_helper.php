<?php 

function cek_session()
{
    $cek = get_instance();
    if(!$cek->session->userdata('email')){
        redirect('admin/Auth');
    }
}
