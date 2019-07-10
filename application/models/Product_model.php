<?php
class Product_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_products(){
        $query = $this->db->get('product');
        return $query->result();
    }
    public function get_last_ten_entries()
    {
        $query = $this->db->get('product', 10);
        return $query->result();
    }
    public function delete_product(int $id = NULL)
    {
        if ($id == NULL || $id < 0) {
            return false;
        }
        # TODO: Check if available to download
        # TODO: Add to trash
        $this->load->dbutil();
        $sql = "DELETE FROM product  WHERE id = ?";
        return  $this->db->query($sql, $id);
    }

    public function add_product()
    {
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
        if($id < 0){
            return false;
        }
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
