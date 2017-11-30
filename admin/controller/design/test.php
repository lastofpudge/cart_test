<?php
class ControllerDesignTest extends Controller {
	private $error = array();

	public function index() {
		// opencart els
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		// model
		$this->load->model('design/test');

		// strings
		$data['heading_title'] = 'Тестовый модуль';
		$this->document->setTitle('Тестовый модуль');

		// routes
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$data['add'] = $this->url->link('design/test/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('design/test/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		// breads
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => 'Тестовый модуль',
			'href' => $this->url->link('design/test', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		// $this->load->language('design/test');
		$this->response->setOutput($this->load->view('design/test', $data));

	}

	public function add() {
	    die('add');
	}

	public function delete() {
	    die('delete');
	}

}
