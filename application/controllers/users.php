<?php


class Users extends CI_Controller
{

    // public function show($user_id)
    // {

    //     // $this->load->model('user_model');
    //     $data['results']  = $this->user_model->get_users($user_id, 'suave');


    //     $this->load->view('user_view', $data);




        // foreach ($result as $object) {
        //     echo $object->username . "<br>";
        // }
    // }

    // public function insert()
    // {

    //     $username = "peater";
    //     $password = "secret";

    //     $this->user_model->create_users([

    //         'username' => $username,
    //         'password' => $password

    //     ]);
    // }

    // public function update()
    // {

    //     $id = 3;

    //     $username = "Willian";
    //     $password = "not so secret";

    //     $this->user_model->update_users([

    //         'username' => $username,
    //         'password' => $password

    //     ], $id);
    // }

    // public function delete()
    // {

    //     $id = 3;

    //     $this->user_model->delete_users($id);
    // }



    public function login()
{

    $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');

    $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');

    $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]');

    if ($this->form_validation->run() == FALSE){

        $data = array('main_view' => 'home_view');
        $this->load->view('layouts/main', $data);

    }else{

       $username = $this->input->post('username');
       $password = $this->input->post('password');

       $user_id = $this->user_model->login_user($username, $password);

       if($user_id){

        $user_data = array(

            'user_id' => $user_id,
            'username' => $username,
            'logged_in' => true

        );

        $this->session->set_userdata($user_data);
        
        $this->session->set_flashdata('login_success', 'You are now logged in');

        redirect('home/index');


       }else{
        
        $this->session->set_flashdata('login_failed', 'Sorry you are not logged in');

        redirect('home/index');


       }

    }
}
}
