<?php
class Product_model extends CI_Model
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $mobile_number;
    protected $gender;
    public function another(string $first_name = null, string $last_name = null, string $email, string $password = null, int $mobile_number = null, string $gender = null)
    {
        $this->$first_name = $first_name;
        $this->$last_name = $last_name;
        $this->$email = $email;
        $this->$password = $password;
        $this->$mobile_number = $mobile_number;
        $this->$gender = $gender;
    }
    public function get_last_ten_entries()
    {
        $this->load->database();
        $query = $this->db->get('product', 10);
        return $query->result();
    }
    public function delete_product(int $id = NULL)
    {
        if ($id == NULL || $id < 0) {
            return false;
        }
        // Check if product available to delete

        // Add to trash

        // Delete from products
        $this->load->database();
        $this->load->dbutil();
        $sql = "DELETE FROM product  WHERE id = ?";
        return  $this->db->query($sql, $id);
    }

    public function add_product()
    {
        $this->load->database();
        $this->load->dbutil();
        return $this->db->insert('product', [
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description'),
            'img' => $_FILES['image']['name'],
        ]);
    }
    public function get_product(int $id = NULL)
    {
        // not null or negative
        $this->load->database();
        $this->load->dbutil();
        $sql = "SELECT * FROM product  WHERE id = ?";
        return  $this->db->query($sql, $id);
    }
    public function get_product_price(int $id=NULL){
        $query = self::get_product($id);
        $product = $query->result();
        return $product[0]->price;
    }
}
