<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imagem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ADMimagem_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function produto($id)
    {
        if ($id > 0) {

            $data['id'] = $id;
            $data['imagens'] = $this->ADMimagem_model->getImagemProduto($id);
            $this->load->view('Admin/Header');
            $this->load->view('Admin/ImagemProduto', $data);
            $this->load->view('Admin/Footer');
        } else {
            redirect('Admin/Produtos/Listar');
        }
    }
    public function deletar($id,$idP)
    {
        if ($id > 0 && $idP > 0) {
            $imagemP = $this->ADMimagem_model->getImagemP($idP);
            if ($this->ADMimagem_model->delete($id,$idP)) {
                unlink('uploads/produtos/'.$imagemP->img_imagem);     
                $this->session->set_flashdata('mensagem', 'Imagem do produto deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar imagem do Produto...');
            }
        }
        $this->produto($id);
    }

    public function cadastrar($id)
    {
        if ($id > 0) {
            if (!empty($_FILES['files']['name'])) {
                $filesCount = count($_FILES['files']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                    // File upload configuration
                    $config['upload_path']          = './uploads/produtos';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;
                    $config['encrypt_name']         = true;
                    $this->load->library('upload', $config);

                    // Upload file to server
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData[$i]['img_imagem'] = $fileData['file_name'];
                        $uploadData[$i]['ref_produto'] = $id;
                    }
                }

                if (!empty($uploadData)) {
                    // Insert files data into the database
                    $insert = $this->ADMimagem_model->insert($uploadData);

                    // Upload status message
                    $statusMsg = $insert ? 'Imagens registradas com sucesso.' : 'Erro ao cadastrar imagens, tente novamente';
                    $this->session->set_flashdata('mensagem', $statusMsg);
                    $this->produto($id);
                }
            } else {
                $this->load->view('Admin/Header');
                $this->load->view('Admin/FormImagemProduto');
                $this->load->view('Admin/Footer');
            }
        }
    }
}
