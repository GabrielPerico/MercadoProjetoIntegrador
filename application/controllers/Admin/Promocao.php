<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promocao extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ADMpromocao_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function listar()
    {
        $data['promocoes'] = $this->ADMpromocao_model->getAll();
        $this->load->view('Admin/Header');
        $this->load->view('Admin/ListaPromocao', $data);
        $this->load->view('Admin/Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('dtInicio', 'dtInicio', 'required');
        $this->form_validation->set_rules('dtFim', 'dtFim', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/Header');
            $this->load->view('Admin/FormPromocao');
            $this->load->view('Admin/Footer');
        } else {

            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'dt_inicioDaPromocao' => $this->input->post('dtInicio'),
                'dt_fimDaPromocao' => $this->input->post('dtFim')
            );
            if ($this->ADMpromocao_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Promoção cadastrada com sucesso!!!');
                redirect('Admin/Promocao/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar promoção!!!');
                redirect('Admin/Promocao/Cadastrar');
            }
        }
    }

    public function alterar($id)
    {
        if ($id > 0) {
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('dtInicio', 'dtInicio', 'required');
            $this->form_validation->set_rules('dtFim', 'dtFim', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['promocao'] = $this->ADMpromocao_model->getOne($id);
                $this->load->view('Admin/Header');
                $this->load->view('Admin/FormPromocao', $data);
                $this->load->view('Admin/Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'dt_inicioDaPromocao' => $this->input->post('dtInicio'),
                    'dt_fimDaPromocao' => $this->input->post('dtFim')
                );
                if ($this->ADMpromocao_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Promoção alterada com sucesso!!!');
                    redirect('Admin/Promocao/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Promoção...');
                    redirect('Admin/Promocao/Alterar/' . $id);
                }
            }
        } else {
            redirect('Admin/Promocao/Listar');
        }
    }

    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->ADMpromocao_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Promoção deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar promoção...');
            }
        }
        redirect('Admin/Promocao/Listar');
    }

    public function listarProdutos($id)
    {
        if ($id > 0) {

            $data['id'] = $id;
            $data['produtos'] = $this->ADMpromocao_model->getProdutosP($id);
            $this->load->view('Admin/Header');
            $this->load->view('Admin/ListaProdutosPromocao', $data);
            $this->load->view('Admin/Footer');
        }
    }
    public function cadastrarProduto($id)
    {
        if ($id > 0) {
            $this->form_validation->set_rules('produto[]', 'produto[]', 'required');
            $this->form_validation->set_rules('porcent[]', 'porcent[]', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['produtos'] = $this->ADMpromocao_model->getProdutos();
                $data['id'] = $id;
                $this->load->view('Admin/Header');
                $this->load->view('Admin/FormProdutosPromocao', $data);
                $this->load->view('Admin/Footer');
            } else {
                if (count($this->input->post("porcent[]")) > 0) {
                    foreach ($this->input->post('porcent[]') as $k => $v) {
                        $data[] = array(
                            'num_porcentagem' => $this->input->post("porcent[$k]"),
                            'ref_produto' => $this->input->post("produto[$k]"),
                            'ref_promocao' => $id
                        );
                        $funciono = $this->ADMpromocao_model->insertProdutos($data[$k]);
                    }
                    if ($funciono) {
                        $this->session->set_flashdata('mensagem', 'Categoria cadastrado com sucesso!!!');
                        redirect('Admin/Promocao/ListarProdutos/' . $id);
                    } else {
                        $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Categoria!!!');
                        redirect('Admin/Promocao/CadastrarProduto/' . $id);
                    }
                }
            }
        }
    }
    public function deletarProduto($id, $idProduto)
    { {
            if ($id > 0 && $idProduto > 0) {

                if ($this->ADMpromocao_model->deleteProduto($id, $idProduto)) {
                    $this->session->set_flashdata('mensagem', 'Produto da promoção deletado com sucesso!!!');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao deletar produto da promoção...');
                }
            }
            redirect('Admin/Promocao/ListarProdutos/' . $id);
        }
    }
}
