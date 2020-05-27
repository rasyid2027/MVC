<?php 

class Member extends Controller {
    public function index() {
        $data['title'] = 'Member Data';
        $data['mbr'] = $this->model('Member_model')->getAllMember();
        $this->view('templates/header', $data);
        $this->view('member/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['title'] = 'Member Details';
        $data['mbr'] = $this->model('Member_model')->getMemberById($id);
        $this->view('templates/header', $data);
        $this->view('member/detail', $data);
        $this->view('templates/footer');
    }

    public function add(){
        if ( $this->model('Member_model')->addMemberData($_POST) > 0 ) {
            Flasher::setFlash('succesfully', 'added', 'success');
            header('Location: ' . BASEURL . '/member');
            exit;
        } else {
            Flasher::setFlash('failed to', 'added', 'danger');
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    public function delete($id){
        if ( $this->model('Member_model')->deleteMemberData($id) > 0 ) {
            Flasher::setFlash('succesfully', 'deleted', 'success');
            header('Location: ' . BASEURL . '/member');
            exit;
        } else {
            Flasher::setFlash('failed to', 'deleted', 'danger');
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    public function edit(){
        echo json_encode($this->model('Member_model')->getMemberById($_POST['id']));
    }

    public function editData(){
        if ( $this->model('Member_model')->editMemberData($_POST) > 0 ) {
            Flasher::setFlash('succesfully', 'edited', 'success');
            header('Location: ' . BASEURL . '/member');
            exit;
        } else {
            Flasher::setFlash('failed to', 'edited', 'danger');
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    public function search(){
        $data['title'] = 'Member Data';
        $data['mbr'] = $this->model('Member_model')->searchDataMember();
        $this->view('templates/header', $data);
        $this->view('member/index', $data);
        $this->view('templates/footer');
    }
}