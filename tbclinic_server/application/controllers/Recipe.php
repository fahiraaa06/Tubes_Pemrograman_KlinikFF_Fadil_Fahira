<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Recipe extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Recipe_model');
    }
 
//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
public function rcp_get()
{
    $recipe_id = $this->get('recipe_id');
    $data = $this->Recipe_model->getDataRecipe($recipe_id);
    //jika variabel $data terdapat data didalamnya 
    if ($data) {
        $this->response(
            [
                'data' => $data,
                'status' => 'success',
                'response_code' => RestController::HTTP_OK
            ],
            RestController::HTTP_OK
        );
        //jika data tidak ada
    } else {
        $this->response(
            [
                'status' => false,
                'message' => 'Data Tidak Ada',
                'response_code' => RestController::HTTP_NOT_FOUND
            ],
            RestController::HTTP_OK
        );
    }
}

function rcp_post()
{
    $data = array(
        'recipe_qty' => $this->post('recipe_qty'),
        'recipe_total' => $this->post('recipe_total'),
        'medicine_id' => $this->post('medicine_id'),
        'medical_id' => $this->post('medical_id')
    );

    // $cek_data = $this->Recipe_model->getDataRecipe($this->post('recipe_id'));

    //Jika semua data wajib diisi
    if (
        $data['recipe_qty'] == NULL ||  $data['medicine_id'] == NULL || $data['medical_id'] == NULL  
    ) {

        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data duplikat
    } /*else if ($cek_data) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Duplikat',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data tersimpan
    }*/ elseif ($this->Recipe_model->insertRecipe($data) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Berhasil Ditambahkan',
            ],
            RestController::HTTP_CREATED
        );
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Gagal Menambahkan Data',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}
function rcp_put()
{
    $recipe_id = $this->put('recipe_id');
    $data = array(
        'recipe_id' => $this->put('recipe_id'),
        'recipe_qty' => $this->put('recipe_qty'),
        'recipe_total' => $this->put('recipe_total'),
        'medicine_id' => $this->put('medicine_id'),
        'medical_id' => $this->put('medical_id')
    );
    //Jika field recipe_id tidak diisi
    if ($recipe_id == NULL) {
        $this->response(
            [
                'status' => $recipe_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Recipe Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data berhasil berubah
    } elseif ($this->Recipe_model->updateRecipe($data, $recipe_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Recipe Dengan Id Recipe ' . $recipe_id . ' Berhasil Diubah',
            ],
            RestController::HTTP_CREATED
        );
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Gagal Mengubah Data',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}

function rcp_delete()
{
    $recipe_id = $this->delete('recipe_id');

    //Jika field recipe_id tidak diisi
    if ($recipe_id == NULL) {
        $this->response(
            [
                'status' => $recipe_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Recipe Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Kondisi ketika OK
    } elseif ($this->Recipe_model->deleteRecipe($recipe_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_OK,
                'message' => 'Data Recipe Dengan Id Recipe ' . $recipe_id . ' Berhasil Dihapus',
            ],
            RestController::HTTP_OK
        );
        //Kondisi gagal
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Recipe Dengan Recipe ' . $recipe_id . ' Tidak Ditemukan',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
} 
}  
?>
