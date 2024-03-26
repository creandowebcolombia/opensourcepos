<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Carga los modelos y bibliotecas necesarios
        $this->load->model('product_model');
        $this->load->helper('url_helper');
    }

    public function create_product() {
        // Lógica para crear un nuevo producto
    }

    public function get_product($id) {
        // Lógica para obtener un producto por su ID
    }

    public function update_product($id) {
        // Lógica para actualizar un producto
    }

    public function delete_product($id) {
        // Lógica para eliminar un producto
    }
}
