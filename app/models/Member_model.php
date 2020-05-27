<?php 

class Member_model {

    private $table = 'member';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMember() {
        $this->db->query('SELECT * FROM ' . $this->table);
        // var_dump($this->db);
        return $this->db->resultSet();
    }

    public function getMemberById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        // var_dump($this->db);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addMemberData($data) {
        $query = "INSERT INTO member
                    VALUES
                (NULL, :name, :no_member, :email, :region)";

        $this->db->query($query);

        $this->db->bind('name', $data['name']);
        $this->db->bind('no_member', $data['no_member']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('region', $data['region']);

        $this->db->execute();

        return $this->db->rowCount();
        // return 0;
    }

    public function deleteMemberData($id) {
        $query = "DELETE FROM member WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editMemberData($data) {
        $query = "UPDATE member SET
                    name = :name,
                    no_member = :no_member,
                    email = :email,
                    region = :region
                WHERE id = :id";

        $this->db->query($query);

        $this->db->bind('name', $data['name']);
        $this->db->bind('no_member', $data['no_member']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('region', $data['region']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
        // return 0;
    }

    public function searchDataMember() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM member WHERE name LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        
        return $this->db->resultSet();
    }
}