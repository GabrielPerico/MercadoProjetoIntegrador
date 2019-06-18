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
        $this->load->model('promocao_model');
    }

    public function listar()
    {
        $data['promocoes'] = $this->promocao_model->getAll();
        $this->load->view('Header');
        $this->load->view('ListaPromocao', $data);
        $this->load->view('Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('dtInicio', 'dtInicio', 'required');
        $this->form_validation->set_rules('dtFim', 'dtFim', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header');
            $this->load->view('FormPromocao');
            $this->load->view('Footer');
        } else {

            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'dt_inicioDaPromocao' => $this->input->post('dtInicio'),
                'dt_fimDaPromocao' => $this->input->post('dtFim')
            );
            if ($this->promocao_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Promoção cadastrada com sucesso!!!');
                redirect('Promocao/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar promoção!!!');
                redirect('Promocao/Cadastrar');
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
                $data['promocao'] = $this->promocao_model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormPromocao', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'dt_inicioDaPromocao' => $this->input->post('dtInicio'),
                    'dt_fimDaPromocao' => $this->input->post('dtFim')
                );
                if ($this->promocao_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Promoção alterada com sucesso!!!');
                    redirect('Promocao/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Promoção...');
                    redirect('Promocao/Alterar/' . $id);
                }
            }
        } else {
            redirect('Promocao/Listar');
        }
    }

    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->promocao_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Promoção deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar promoção...');
            }
        }
        redirect('Promocao/Listar');
    }

    public function listarProdutos($id)
    {
        if ($id > 0) {

            $data['id'] = $id;
            $data['produtos'] = $this->promocao_model->getProdutosP($id);
            $this->load->view('Header');
            $this->load->view('ListaProdutosPromocao', $data);
            $this->load->view('Footer');
        }
    }
    public function cadastrarProduto($id)
    {
        if ($id > 0) {
            $this->form_validation->set_rules('produto[]', 'produto[]', 'required');
            $this->form_validation->set_rules('porcent[]', 'porcent[]', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['produtos'] = $this->promocao_model->getProdutos();
                $data['id'] = $id;
                $this->load->view('Header');
                $this->load->view('FormProdutosPromocao', $data);
                $this->load->view('Footer');
            } else {
                if (count($this->input->post("porcent[]")) > 0) {
                    foreach ($this->input->post('porcent[]') as $k => $v) {
                        $data[] = array(
                            'num_porcentagem' => $this->input->post("porcent[$k]"),
                            'ref_produtos' => $this->input->post("produto[$k]"),
                            'ref_promocao' => $id
                        );
                        $funciono = $this->promocao_model->insertProdutos($data[$k]);
                    }
                    if ($funciono) {
                        $this->session->set_flashdata('mensagem', 'Categoria cadastrado com sucesso!!!');
                        redirect('Promocao/ListarProdutos/' . $id);
                    } else {
                        $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Categoria!!!');
                        redirect('Promocao/CadastrarProduto/' . $id);
                    }
                }
            }
        }
    }
    public function deletarProduto($id, $idProduto)
    { {
            if ($id > 0 && $idProduto > 0) {

                if ($this->promocao_model->deleteProduto($id, $idProduto)) {
                    $this->session->set_flashdata('mensagem', 'Produto da promoção deletado com sucesso!!!');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao deletar produto da promoção...');
                }
            }
            redirect('Promocao/ListarProdutos/' . $id);
        }
    }
}
