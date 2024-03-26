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
        // Obtener los datos del producto enviados en la solicitud POST
        $data = $this->input->post();

        // Validar los datos (puedes agregar validaciones aquí)

        // Insertar el nuevo producto en la base de datos
        $result = $this->product_model->insert_product($data);

        // Verificar si la inserción fue exitosa
        if ($result) {
            // Si la inserción fue exitosa, devolver una respuesta de éxito
            $response = array('success' => true, 'message' => 'Product created successfully');
            $this->output->set_output(json_encode($response));
        } else {
            // Si ocurrió un error durante la inserción, devolver un mensaje de error
            $response = array('success' => false, 'message' => 'Failed to create product');
            $this->output->set_output(json_encode($response));
        }
    }

    public function get_product($id) {
        // Obtener el producto por su ID
        $product = $this->product_model->get_product_by_id($id);

        // Verificar si se encontró el producto
        if ($product) {
            // Si se encontró el producto, devolver los datos del producto
            $this->output->set_output(json_encode($product));
        } else {
            // Si no se encontró el producto, devolver un mensaje de error
            $response = array('success' => false, 'message' => 'Product not found');
            $this->output->set_output(json_encode($response));
        }
    }

    public function update_product($id) {
        // Obtener los datos del producto enviados en la solicitud POST
        $data = $this->input->post();

        // Validar los datos (puedes agregar validaciones aquí)

        // Actualizar el producto en la base de datos
        $result = $this->product_model->update_product($id, $data);

        // Verificar si la actualización fue exitosa
        if ($result) {
            // Si la actualización fue exitosa, devolver una respuesta de éxito
            $response = array('success' => true, 'message' => 'Product updated successfully');
            $this->output->set_output(json_encode($response));
        } else {
            // Si ocurrió un error durante la actualización, devolver un mensaje de error
            $response = array('success' => false, 'message' => 'Failed to update product');
            $this->output->set_output(json_encode($response));
        }
    }

    public function delete_product($id) {
        // Eliminar el producto de la base de datos
        $result = $this->product_model->delete_product($id);

        // Verificar si la eliminación fue exitosa
        if ($result) {
            // Si la eliminación fue exitosa, devolver una respuesta de éxito
            $response = array('success' => true, 'message' => 'Product deleted successfully');
            $this->output->set_output(json_encode($response));
        } else {
            // Si ocurrió un error durante la eliminación, devolver un mensaje de error
            $response = array('success' => false, 'message' => 'Failed to delete product');
            $this->output->set_output(json_encode($response));
        }
    }
}
