<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index()
	{
		$this->is_logged_in();
		
		if( $this->require_min_level(6) )
		{
            $data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['messagesList'] = $this->requests->get_requests(NULL, 10);
			$data['count_courses'] = $this->courses->count_courses();
			$data['count_graduates'] = $this->graduates->count_graduates();
			$data['count_objects'] = $this->objects->count_objects() ;
			$data['count_messages'] = $this->requests->count_requests();
			$data['count_programs'] = $this->programs->count_programs();
			$data['count_resources'] = $this->resource->count_resources();
			$data['count_tutorials'] = $this->tutorial->count_tutorials();
			$data['count_tools'] = $this->tools->count_tools();
			$data['count_users'] = $this->users->count_users();
			$data['title'] = 'Dashboard';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/dashboard', $data);
			$this->load->view('backoffice/templates/footer', $data);
        }
	}

	public function getCourses($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->courses->count_courses() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;

			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['courses'] = $this->courses->get_courses($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Cursos';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/courses', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editCourse($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$data['course'] = $this->courses->get_course_id($id);

			if (empty($data['course'])) {
				header('Location:'.base_url('backoffice/cursos'));
			} else {

				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar curso';

				$this->load->view('backoffice/templates/header', $data);

				$this->form_validation->set_rules('name', 'Título del curso', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'Link del curso', 'required', array('required' => '* El %s es requerido.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_course', $data);
				} else {
					$info = array(
						'courseName' => $this->input->post('name', TRUE),
						'courseNameUrl' => $this->input->post('url', TRUE),
						'isCourseActive' => $this->input->post('is_active', TRUE)
					);

					$this->db->where('_id', $id);
					$this->db->update('courses', $info);

					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['course'] = $this->courses->get_course_id($id);

					$this->load->view('backoffice/edit_course', $data);
				}

				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getCourse($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$data['course'] = $this->courses->get_course_id($id);

			if (empty($data['course'])) {
				header('Location:'.base_url('backoffice/cursos'));
			} else {

				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Curso';

				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/course', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function newCourse()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Nuevo curso';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('name', 'Título del curso', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link del curso', 'required', array('required' => '* El %s es requerido.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_course', $data);
			} else {
				$data = array(
					'courseName' => $this->input->post('name', TRUE),
					'courseNameUrl' => $this->input->post('url', TRUE),
					'isCourseActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('courses', $data);
	
				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_course', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getGraduates($id = NULL)
	{
		
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->graduates->count_graduates() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['graduates'] = $this->graduates->get_graduates($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Diplomados';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/graduates', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editGraduate($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['graduate'] = $this->graduates->get_graduate_id($id);
	
			if (empty($data['graduate'])) {
				header('Location:'.base_url('backoffice/diplomados'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar diplomado';
	
				$this->load->view('backoffice/templates/header', $data);
	
				$this->form_validation->set_rules('name', 'Título del diplomado', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'Link del diplomado', 'required', array('required' => '* El %s es requerido.'));
	
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_graduate', $data);
				} else {
					$info = array(
						'graduateName' => $this->input->post('name', TRUE),
						'graduateNameUrl' => $this->input->post('url', TRUE),
						'isGraduateActive' => $this->input->post('is_active', TRUE)
					);
	
					$this->db->where('_id', $id);
					$this->db->update('graduates', $info);
	
					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['graduate'] = $this->graduates->get_graduate_id($id);

					$this->load->view('backoffice/edit_graduate', $data);
				}
	
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getGraduate($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['graduate'] = $this->graduates->get_graduate_id($id);
	
			if (empty($data['graduate'])) {
				header('Location:'.base_url('backoffice/diplomados'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Diplomado';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/graduate', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function newGraduate($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Nuevo diplomado';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('name', 'Título del diplomado', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link del diplomado', 'required', array('required' => '* El %s es requerido.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_graduate', $data);
			} else {
				$data = array(
					'graduateName' => $this->input->post('name', TRUE),
					'graduateNameUrl' => $this->input->post('url', TRUE),
					'isGraduateActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('graduates', $data);
	
				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_graduate', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getObjects($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->objects->count_objects() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;

			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['objects'] = $this->objects->get_objects($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Objetos';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/objects', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editObject($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['object'] = $this->objects->get_object_id($id);
	
			if (empty($data['object'])) {
				header('Location:'.base_url('backoffice/objetos'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['taxonomies'] = $this->taxonomyelearning->get_taxonomy_objects();
				$data['title'] = 'Editar objeto';
	
				$this->load->view('backoffice/templates/header', $data);
	
				$this->form_validation->set_rules('title', 'Título del objeto', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('link', 'Link del objeto', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('taxonomy', 'Taxonomía', 'required', array('required' => '* La %s es requerida.'));
	
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_object', $data);
				} else {
					$info = array(
						'objectObject' => $this->input->post('object', TRUE),
						'objectArea' => $this->input->post('area', TRUE),
						'objectKnowlessTopic' => $this->input->post('knowless_topic', TRUE),
						'objectHosting' => $this->input->post('hosting', TRUE),
						'objectTitle' => $this->input->post('title', TRUE),
						'objectDescription' => $this->input->post('description', TRUE),
						'objectLanguage' => $this->input->post('language', TRUE),
						'objectKeyWords' => $this->input->post('key_words', TRUE),
						'objectLink' => $this->input->post('link', TRUE),
						'objectYoutube' => $this->input->post('youtube', TRUE),
						'objectFormat' => $this->input->post('format', TRUE),
						'objectSize' => $this->input->post('size', TRUE),
						'objectRequirement' => $this->input->post('requirement', TRUE),
						'objectInstructions' => $this->input->post('instructions', TRUE),
						'objectVersion' => $this->input->post('version', TRUE),
						'objectContributors' => $this->input->post('contributors', TRUE),
						'objectEntities' => $this->input->post('entities', TRUE),
						'objectCreatedAt' => $this->input->post('created_at', TRUE),
						'objectTopic' => $this->input->post('topic', TRUE),
						'objectInteractivity' => $this->input->post('interactivity', TRUE),
						'objectCost' => $this->input->post('cost', TRUE),
						'objectRights' => $this->input->post('rights', TRUE),
						'objectUse' => $this->input->post('use', TRUE),
						'objectClasification' => $this->input->post('clasification', TRUE),
						'objectTaxonomy' => $this->input->post('taxonomy', TRUE),
						'isObjectActive' => $this->input->post('is_active')
					);
	
					$this->db->where('_id', $id);
					$this->db->update('objects', $info);
	
					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['object'] = $this->objects->get_object_id($id);

					$this->load->view('backoffice/edit_object', $data);
				}
	
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getObject($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['object'] = $this->objects->get_object_id($id);
	
			if (empty($data['object'])) {
				header('Location:'.base_url('backoffice/objetos'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['taxonomy'] = $this->objects->get_taxonomy_object_id($data['object']->objectTaxonomy);
				$data['title'] = 'Objeto';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/object', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function newObject($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['taxonomies'] = $this->taxonomyelearning->get_taxonomy_objects();
			$data['title'] = 'Nuevo objeto';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('title', 'Título del objeto', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('link', 'Link del objeto', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('taxonomy', 'Taxonomía', 'required', array('required' => '* La %s es requerida.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_object', $data);
			} else {

				$data = array(
					'objectObject' => $this->input->post('object', TRUE),
					'objectArea' => $this->input->post('area', TRUE),
					'objectKnowlessTopic' => $this->input->post('knowless_topic', TRUE),
					'objectHosting' => $this->input->post('hosting', TRUE),
					'objectTitle' => $this->input->post('title', TRUE),
					'objectDescription' => $this->input->post('description', TRUE),
					'objectLanguage' => $this->input->post('language', TRUE),
					'objectKeyWords' => $this->input->post('key_words', TRUE),
					'objectLink' => $this->input->post('link', TRUE),
					'objectYoutube' => $this->input->post('youtube', TRUE),
					'objectFormat' => $this->input->post('format', TRUE),
					'objectSize' => $this->input->post('size', TRUE),
					'objectRequirement' => $this->input->post('requirement', TRUE),
					'objectInstructions' => $this->input->post('instructions', TRUE),
					'objectVersion' => $this->input->post('version', TRUE) || '1.0',
					'objectContributors' => $this->input->post('contributors', TRUE),
					'objectEntities' => $this->input->post('entities', TRUE),
					'objectCreatedAt' => $this->input->post('created_at', TRUE),
					'objectTopic' => $this->input->post('topic', TRUE),
					'objectInteractivity' => $this->input->post('interactivity', TRUE),
					'objectCost' => $this->input->post('cost', TRUE),
					'objectRights' => $this->input->post('rights', TRUE),
					'objectUse' => $this->input->post('use', TRUE),
					'objectClasification' => $this->input->post('clasification', TRUE),
					'objectTaxonomy' => $this->input->post('taxonomy', TRUE),
					'isObjectActive' => $this->input->post('is_active')
				);
				$query = $this->db->insert('objects', $data);
	
				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_object', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function zip_upload()
	{
		if( $this->require_min_level(6) )
		{
			$config['upload_path']          = 'storage';
			$config['allowed_types']        = 'zip';
			$config['max_size']             = 60000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
	
			$this->load->library('upload', $config);
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Subir objeto';
	
			$this->load->view('backoffice/templates/header', $data);
	
			if ( ! $this->upload->do_upload('zipfile'))
			{
				$error = array('error' => $this->upload->display_errors());
	
				$this->load->view('backoffice/upload_object_file', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>El archico ha sido subido.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
	
				$this->load->view('backoffice/upload_object_file', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function img_upload()
	{
		if( $this->require_min_level(6) )
		{
			$config['upload_path']          = 'assets/img/thumbnails';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 600;
			$config['max_width']            = 800;
			$config['max_height']           = 600;
	
			$this->load->library('upload', $config);
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Subir imagen de objeto';
	
			$this->load->view('backoffice/templates/header', $data);
	
			if ( ! $this->upload->do_upload('imgfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>El archico ha sido subido.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
	
				$this->load->view('backoffice/upload_object_image', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
	
				$this->load->view('backoffice/upload_object_image', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getProfile()
	{
		if( $this->require_group('job') )
		{
			$data['user'] = $this->users->get_user_id($this->auth_user_id);
	
			if (empty($data['user'])) {
				header('Location:'.base_url('backoffice/usuarios'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Perfil';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/profile', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getPrograms($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->programs->count_programs() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['programs'] = $this->programs->get_programs($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Programas';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/programs', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editProgram($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['program'] = $this->programs->get_program_id($id);
	
			if (empty($data['program'])) {
				header('Location:'.base_url('backoffice/programas'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar programa';
	
				$this->load->view('backoffice/templates/header', $data);
	
				$this->form_validation->set_rules('name', 'Título del programa', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'Link del programa', 'required', array('required' => '* El %s es requerido.'));
		
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_program', $data);
				} else {
					$info = array(
						'programName' => $this->input->post('name', TRUE),
						'programNameUrl' => $this->input->post('url', TRUE),
						'isProgramActive' => $this->input->post('is_active', TRUE)
					);
	
					$this->db->where('_id', $id);
					$this->db->update('programs', $info);
		
					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['program'] = $this->programs->get_program_id($id);

					$this->load->view('backoffice/edit_program', $data);
				}
	
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getProgram($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['program'] = $this->programs->get_program_id($id);
	
			if (empty($data['program'])) {
				show_404();
			}
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Programa';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/program', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function newProgram($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Nuevo programa';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('name', 'Título del programa', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link del programa', 'required', array('required' => '* El %s es requerido.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_program', $data);
			} else {
				$data = array(
					'programName' => $this->input->post('name', TRUE),
					'programNameUrl' => $this->input->post('url', TRUE),
					'isProgramActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('programs', $data);
	
				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_program', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getRequests($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->requests->count_requests() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['requests'] = $this->requests->get_requests($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Solicitudes';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/requests', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editRequest($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Editar solicitud';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/edit_request', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getRequest($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['request'] = $this->requests->get_request_id($id);
			
			if (empty($data['request'])) {
				header('Location:'.base_url('backoffice/solicitudes'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Solicitud';
				
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/request', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getResources($id = NULL)
	{
		// if( $this->require_min_level(6) )
		// {
			$totalPag = ceil($this->resource->count_resources() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['resources'] = $this->resource->get_resources($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Recursos';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/resources', $data);
			$this->load->view('backoffice/templates/footer', $data);
		// }
	}

	public function editResource($id = FALSE)
	{
		// if( $this->require_min_level(6) )
		// {
			$data['resource'] = $this->resource->get_resource_id($id);
	
			if (empty($data['resource'])) {
				header('Location:'.base_url('backoffice/solicitudes'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['taxonomies'] = $this->taxonomyresource->get_taxonomy_resources();
				$data['title'] = 'Editar recurso';
	
				$this->load->view('backoffice/templates/header', $data);
	
				$this->form_validation->set_rules('code', 'Código', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('link', 'Link de la imagen', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('taxonomy', 'Taxonomía', 'required', array('required' => '* La %s es requerida.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_resource', $data);
				} else {
					$info = array(
						'resourceArea' => $this->input->post('area', TRUE),
						'resourceKnowlessTopic' => $this->input->post('knowless_topic', TRUE),
						'resourceLink' => $this->input->post('link', TRUE),
						'resourceKeyWords' => $this->input->post('keywords', TRUE),
						'resourceFormat' => $this->input->post('format', TRUE),
						'resourceEntities' => $this->input->post('entities', TRUE),
						'resourceCreatedAt' => $this->input->post('created_at', TRUE),
						'resourceCost' => $this->input->post('cost', TRUE),
						'resourceRights' => $this->input->post('rights', TRUE),
						'resourceTaxonomy' => $this->input->post('taxonomy', TRUE),
						'resourceCode' => $this->input->post('code', TRUE),
						'isResourceActive' => $this->input->post('is_active')
					);
	
					$this->db->where('resourceCode', $id);
					$this->db->update('resources', $info);
	
					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['resource'] = $this->resource->get_resource_id($id);

					$this->load->view('backoffice/edit_resource', $data);
				}
	
				$this->load->view('backoffice/templates/footer', $data);
			}
		// }
	}

	public function getResource($id = FALSE)
	{
		// if( $this->require_min_level(6) )
		// {
			$data['resource'] = $this->resource->get_resource_id($id);
	
			if (empty($data['resource'])) {
				header('Location:'.base_url('backoffice/recursos'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['taxonomy'] = $this->resource->get_taxonomy_resource_id($data['resource']->resourceTaxonomy);
				$data['title'] = 'Recurso';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/resource', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		// }
	}

	public function newResource($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['taxonomies'] = $this->taxonomyresource->get_taxonomy_resources();
			$data['title'] = 'Nuevo recurso';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('code', 'Código', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('link', 'Link de la imagen', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('taxonomy', 'Taxonomía', 'required', array('required' => '* La %s es requerida.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_resource', $data);
			} else {
				$data = array(
					'resourceArea' => $this->input->post('area', TRUE),
					'resourceKnowlessTopic' => $this->input->post('knowless_topic', TRUE),
					'resourceLink' => $this->input->post('link', TRUE),
					'resourceKeyWords' => $this->input->post('keywords', TRUE),
					'resourceFormat' => $this->input->post('format', TRUE),
					'resourceEntities' => $this->input->post('entities', TRUE),
					'resourceCreatedAt' => $this->input->post('created_at', TRUE),
					'resourceCost' => $this->input->post('cost', TRUE),
					'resourceRights' => $this->input->post('rights', TRUE),
					'resourceTaxonomy' => $this->input->post('taxonomy', TRUE),
					'resourceCode' => $this->input->post('code', TRUE),
					'resourceViews' => 0,
					'resourceCodeAccess' => 0,
					'isResourceActive' => $this->input->post('is_active')
				);
				$query = $this->db->insert('resources', $data);

				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_resource', $data);
			}

			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function resource_upload()
	{
		if( $this->require_min_level(6) )
		{
			if (isset($_POST['taxonomy'])) {
				$this->form_validation->set_rules('taxonomy', 'Taxonomía', 'required', array('required' => '* La %s es requerida.'));
				$taxonomy = '/' . $_POST['taxonomy'];
				print($taxonomy);
			} else {
				$taxonomy = '';
			}
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['taxonomies'] = $this->taxonomyresource->get_taxonomy_resources();
			$data['title'] = 'Subir imagen de objeto';
	
			$config['upload_path']          = 'assets/img/recursos'. $taxonomy;
			$config['allowed_types']        = 'gif|jpg|png|eps';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 1024;
	
			$this->load->library('upload', $config);
	
			$this->load->view('backoffice/templates/header', $data);
	
			if ( ! $this->upload->do_upload('imgfile'))
			{
				$error = array('error' => $this->upload->display_errors());
	
				$this->load->view('backoffice/upload_resource_image', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>El archico ha sido subido.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
	
				$this->load->view('backoffice/upload_resource_image', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editRole($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$data['role'] = $this->roles->get_role_id($id);
	
			if (empty($data['role'])) {
				header('Location:'.base_url('backoffice/roles'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['roles'] = $this->roles->get_roles_admin();
				$data['title'] = 'Editar rol';
	
				$this->load->view('backoffice/templates/header', $data);
	
				$this->form_validation->set_rules('name', 'Título del rol', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'Link del rol', 'required', array('required' => '* El %s es requerido.'));
		
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_role', $data);
				} else {
					$info = array(
						'roleName' => $this->input->post('name', TRUE),
						'roleNameUrl' => $this->input->post('url', TRUE),
						'roleOrder' => $this->input->post('role_order', TRUE),
						'isRoleActive' => $this->input->post('is_active', TRUE)
					);
	
					$this->db->where('_id', $id);
					$this->db->update('roles', $info);
	
					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['role'] = $this->roles->get_role_id($id);

						$this->load->view('backoffice/edit_role', $data);
				}
	
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getRoles($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->roles->count_roles_admin() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['roles'] = $this->roles->get_roles_admin($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Roles';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/roles', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getRole($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$data['role'] = $this->roles->get_role_id($id);
	
			if (empty($data['role'])) {
				header('Location:'.base_url('backoffice/roles'));
			} else {
					
				$data['title'] = 'Role';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/role', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function newRole($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['roles'] = $this->roles->get_roles_admin();
			$data['title'] = 'Nuevo rol';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('name', 'Título del rol', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link del rol', 'required', array('required' => '* El %s es requerido.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_role', $data);
			} else {
				$data = array(
					'roleName' => $this->input->post('name', TRUE),
					'roleNameUrl' => $this->input->post('url', TRUE),
					'roleOrder' => $this->input->post('role_order', TRUE),
					'isRoleActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('roles', $data);
	
				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_role', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function role_upload($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$config['upload_path']          = 'assets/img';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 600;
			$config['max_width']            = 800;
			$config['max_height']           = 600;
	
			$this->load->library('upload', $config);
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Subir imagen de role';
	
			$this->load->view('backoffice/templates/header', $data);
	
			if ( ! $this->upload->do_upload('imgfile'))
			{
				$error = array('error' => $this->upload->display_errors());
	
				$this->load->view('backoffice/upload_role_image', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
	
				$this->load->view('backoffice/upload_role_image', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getTools($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->tools->count_tools() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['tools'] = $this->tools->get_tools($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Herramientas';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/tools', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editTool($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['tool'] = $this->tools->get_tool_id($id);

			if (empty($data['tool'])) {
				header('Location:'.base_url('backoffice/herramientas'));
			} else {

				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['roles'] = $this->roles->get_roles();
				$data['title'] = 'Editar herramienta';

				$this->load->view('backoffice/templates/header', $data);

				$this->form_validation->set_rules('name', 'Título de la herramienta', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'Link de la herramienta', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('role', 'A quién va dirigido', 'required', array('required' => '* El campo %s es requerido.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_tool', $data);
				} else {
					$info = array(
						'toolName' => $this->input->post('name', TRUE),
						'toolNameUrl' => $this->input->post('url', TRUE),
						'toolDescription' => $this->input->post('description', TRUE),
						'toolImageUrl' => $this->input->post('urlImg', TRUE),
						'toolRole' => $this->input->post('role', TRUE),
						'isToolActive' => $this->input->post('is_active', TRUE)
					);

					$this->db->where('_id', $id);
					$this->db->update('tools', $info);

					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['tool'] = $this->tools->get_tool_id($id);

					$this->load->view('backoffice/edit_tool', $data);
				}

				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getTool($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['tool'] = $this->tools->get_tool_id($id);
	
			if (empty($data['tool'])) {
				header('Location:'.base_url('backoffice/herramientas'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['role'] = $this->roles->get_role_id($data['tool']->toolRole);
				$data['title'] = 'Herramienta';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/tool', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function newTool($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['roles'] = $this->roles->get_roles();
			$data['title'] = 'Nueva herramienta';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('name', 'Título de la herramienta', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link de la herramienta', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('role', 'A quién va dirigido', 'required', array('required' => '* El campo %s es requerido.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_tool', $data);
			} else {
				$data = array(
					'toolName' => $this->input->post('name', TRUE),
					'toolNameUrl' => $this->input->post('url', TRUE),
					'toolDescription' => $this->input->post('description', TRUE),
					'toolImageUrl' => $this->input->post('urlImg', TRUE),
					'toolRole' => $this->input->post('role', TRUE),
					'isToolActive' => $this->input->post('is_active') || 0
				);
				$query = $this->db->insert('tools', $data);
	
				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_tool', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getTutorials($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->tutorial->count_tutorials() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['tutorials'] = $this->tutorial->get_tutorials($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Tutoriales';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/tutorials', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editTutorial($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['tutorial'] = $this->tutorial->get_tutorial_id($id);
	
			if (empty($data['tutorial'])) {
				header('Location:'.base_url('backoffice/tutoriales'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['roles'] = $this->roles->get_roles();
				$data['title'] = 'Editar tutorial';
	
				$this->load->view('backoffice/templates/header', $data);
	
				$this->form_validation->set_rules('name', 'Título de tutorial', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('slug', 'Slug de tutorial', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'Link de tutorial', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('role', 'A quién va dirigido', 'required', array('required' => '* El campo %s es requerido.'));
		
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_tutorial', $data);
				} else {
					$info = array(
						'tutorialTitle' => $this->input->post('name', TRUE),
						'tutorialSlug' => $this->input->post('slug', TRUE),
						'tutorialLink' => $this->input->post('url', TRUE),
						'tutorialRole' => $this->input->post('role', TRUE),
						'tutorialImage' => $this->input->post('urlImg', TRUE),
						'isTutorialActive' => $this->input->post('is_active'),
						'isTutorialLock' => $this->input->post('is_lock')
					);
	
					$this->db->where('_id', $id);
					$this->db->update('tutorials', $info);
	
					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['tutorial'] = $this->tutorial->get_tutorial_id($id);

					$this->load->view('backoffice/edit_tutorial', $data);
				}
	
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getTutorial($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['tutorial'] = $this->tutorial->get_tutorial_id($id);
	
			if (empty($data['tutorial'])) {
				header('Location:'.base_url('backoffice/tutoriales'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['role'] = $this->roles->get_role_id($data['tutorial']->tutorialRole);
				$data['title'] = 'Tutorial';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/tutorial', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function newTutorial()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['roles'] = $this->roles->get_roles();
			$data['title'] = 'Nuevo tutorial';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->form_validation->set_rules('name', 'Título de tutorial', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('slug', 'Slug de tutorial', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link de tutorial', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('role', 'A quién va dirigido', 'required', array('required' => '* El campo %s es requerido.'));
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_tutorial', $data);
			} else {
				$data = array(
					'tutorialTitle' => $this->input->post('name', TRUE),
					'tutorialSlug' => $this->input->post('slug', TRUE),
					'tutorialLink' => $this->input->post('url', TRUE),
					'tutorialRole' => $this->input->post('role', TRUE),
					'tutorialImage' => $this->input->post('urlImg', TRUE),
					'tutorialCreatedAt' => date('Y-m-d H:i:s'),
					'isTutorialActive' => $this->input->post('is_active'),
					'isTutorialLock' => 0
				);
				$query = $this->db->insert('tutorials', $data);
	
				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_tutorial', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function getUsers($id = NULL)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->users->count_users() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
	
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['users'] = $this->users->get_users($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Usuarios';
	
			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/users', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function editUser($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['user'] = $this->users->get_user_id($id);
	
			if (empty($data['user'])) {
				header('Location:'.base_url('backoffice/usuarios'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar usuario';
	
				$this->load->view('backoffice/templates/header', $data);
	
				$this->form_validation->set_rules('username', 'Usuario', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('email', 'Correo electrónico', 'required', array('required' => '* El %s es requerido.'));
		
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/edit_user', $data);
				} else {
					$info = array(
						'username' => $this->input->post('username', TRUE),
						'email' => $this->input->post('email', TRUE),
						'auth_level' => $this->input->post('auth_level', TRUE),
						'banned' => $this->input->post('banned', TRUE),
						'modified_at' => date('Y-m-d H:i:s')
					);
	
					$this->db->where('user_id', $id);
					$this->db->update('users', $info);
	
					$data['user'] = $this->users->get_user_id($id);
					$this->load->view('backoffice/edit_user', $data);
				}
	
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function getUser($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['user'] = $this->users->get_user_id($id);
	
			if (empty($data['user'])) {
				header('Location:'.base_url('backoffice/usuarios'));
			} else {
	
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Usuario';
	
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/user', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function newUser()
	{
		// if( $this->require_role('admin') )
		// {
			$user_data = [
				'username'   => $this->input->post('username', TRUE),
				'passwd'     => $this->input->post('passwd', TRUE),
				'email'      => $this->input->post('email', TRUE),
				'auth_level' => $this->input->post('auth_level', TRUE)
			];

			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Nuevo usuario';
	
			$this->load->view('backoffice/templates/header', $data);
	
			$this->load->helper('auth');
			$this->load->model('examples/examples_model');
			$this->load->model('examples/validation_callables');
			$this->load->library('form_validation');

			$this->form_validation->set_data( $user_data );

			$validation_rules = [
				[
					'field' => 'username',
					'label' => 'username',
					'rules' => 'max_length[30]|is_unique[' . db_table('user_table') . '.username]',
					'errors' => [
						'is_unique' => 'Nombre de usuario ya está en uso.'
					]
				],
				[
					'field' => 'passwd',
					'label' => 'passwd',
					'rules' => [
						'trim',
						'required',
						[ 
							'_check_password_strength', 
							[ $this->validation_callables, '_check_password_strength' ] 
						]
					],
					'errors' => [
						'required' => 'El campo de password es obligatorio.'
					]
				],
				[
					'field'  => 'email',
					'label'  => 'email',
					'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
					'errors' => [
						'is_unique' => 'Dirección de correo electrónico ya está en uso.'
					]
				],
				[
					'field' => 'auth_level',
					'label' => 'auth_level',
					'rules' => 'required|integer|in_list[1,6,9]'
				]
			];

			$this->form_validation->set_rules( $validation_rules );
	
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/new_user', $data);
			} else {
				$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
				$user_data['user_id']    = $this->examples_model->get_unused_id();
				$user_data['created_at'] = date('Y-m-d H:i:s');

				if( empty( $user_data['username'] ) )
				{
					$user_data['username'] = NULL;
				}

				$this->db->set($user_data)->insert(db_table('user_table'));

				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Usuario(a) ' . $user_data['username'] . ' ha sido creado.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

				$this->load->view('backoffice/new_user', $data);
			}
	
			$this->load->view('backoffice/templates/footer', $data);
		// }
	}

	/* SETTINGS */

	public function settings()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Configuración';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/settings', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingMenus($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->menu->count_menus_admin() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
			
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['menus'] = $this->menu->get_menus_admin($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Menús';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/settingMenus', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingMenu($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['menu'] = $this->menu->get_menu($id);
		
			if (empty($data['menu'])) {
				header('Location:'.base_url('backoffice/configuracion/menus'));
			} else {
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Menú';

				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/settingMenu', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingEditMenu($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['menu'] = $this->menu->get_menu($id);
		
			if (empty($data['menu'])) {
				header('Location:'.base_url('backoffice/configuracion/menus'));
			} else {
				$data['roles'] = $this->roles->get_roles_admin();
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar menú';

				$this->load->view('backoffice/templates/header', $data);

				$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'url', 'required', array('required' => '* La %s es requerida.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/settingEditMenu', $data);
				} else {
					$info = array(
						'menuName' => $this->input->post('name', TRUE),
						'menuNameUrl' => $this->input->post('url', TRUE),
						'menuRole' => $this->input->post('role', TRUE),
						'menuOrder' => $this->input->post('order', TRUE),
						'isMenuActive' => $this->input->post('is_active', TRUE)
					);

					$this->db->where('_id', $id);
					$this->db->update('menus', $info);

					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['menu'] = $this->menu->get_menu($id);

						$this->load->view('backoffice/settingEditMenu', $data);
				}

				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingNewMenu()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['roles'] = $this->roles->get_roles_admin();
			$data['title'] = 'Menú nuevo';

			$this->load->view('backoffice/templates/header', $data);

			$this->form_validation->set_rules('name', 'Título del rol', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link del rol', 'required', array('required' => '* El %s es requerido.'));

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/settingNewMenu', $data);
			} else {
				$data = array(
					'menuName' => $this->input->post('name', TRUE),
					'menuNameUrl' => $this->input->post('url', TRUE),
					'menuRole' => $this->input->post('role', TRUE),
					'menuOrder' => $this->input->post('order', TRUE),
					'isMenuActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('menus', $data);

				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

					$this->load->view('backoffice/settingNewMenu', $data);
			}

			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingNewObject()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Configuración';

			$this->load->view('backoffice/templates/header', $data);

			$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('slug', 'Slug', 'required', array('required' => '* El %s es requerido.'));

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/settingNewObject', $data);
			} else {
				$data = array(
					'objectTaxonomyName' => $this->input->post('name', TRUE),
					'objectTaxonomySlug' => $this->input->post('slug', TRUE),
					'isObjectTaxonomyActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('objecttaxonomies', $data);

				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

					$this->load->view('backoffice/settingNewObject', $data);
			}

			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingObjects($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->taxonomyelearning->count_taxonomy_objects_admin() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
			
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['objecttaxonomies'] = $this->taxonomyelearning->get_taxonomy_objects_admin($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Categorías de los objetos';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/settingObjects', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingObject($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['objecttaxonomies'] = $this->taxonomyelearning->get_taxonomy($id);

			if (empty($data['objecttaxonomies'])) {
				header('Location:'.base_url('backoffice/configuracion/objetos'));
			} else {
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Categoría de objeto';

				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/settingObject', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingEditObject($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['objecttaxonomies'] = $this->taxonomyelearning->get_taxonomy($id);

			if (empty($data['objecttaxonomies'])) {
				header('Location:'.base_url('backoffice/configuracion/objetos'));
			} else {
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar categoría de objeto';

				$this->load->view('backoffice/templates/header', $data);

				$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('slug', 'Slug', 'required', array('required' => '* El %s es requerido.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/settingEditObject', $data);
				} else {
					$info = array(
						'objectTaxonomyName' => $this->input->post('name', TRUE),
						'objectTaxonomySlug' => $this->input->post('slug', TRUE),
						'isObjectTaxonomyActive' => $this->input->post('is_active', TRUE)
					);

					$this->db->where('objectTaxonomySlug', $id);
					$this->db->update('objecttaxonomies', $info);

					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['objecttaxonomies'] = $this->taxonomyelearning->get_taxonomy($id);

						header('Location:'.base_url('backoffice/configuracion/objetos'));
				}

				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingResources($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->taxonomyresource->count_taxonomy_resources_admin() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
			
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['resourcetaxonomies'] = $this->taxonomyresource->get_taxonomy_resources_admin($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Categorías de los recursos';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/settingResources', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingResource($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['resourcetaxonomy'] = $this->taxonomyresource->get_taxonomy($id);
		
			if (empty($data['resourcetaxonomy'])) {
				header('Location:'.base_url('backoffice/configuracion/recursos'));
			} else {
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Categoría de los recursos';

				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/settingResource', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingEditResource($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['resourcetaxonomy'] = $this->taxonomyresource->get_taxonomy($id);
		
			if (empty($data['resourcetaxonomy'])) {
				header('Location:'.base_url('backoffice/configuracion/recursos'));
			} else {
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar categoría de los recursos';

				$this->load->view('backoffice/templates/header', $data);

				$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('slug', 'Slug', 'required', array('required' => '* El %s es requerido.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/settingEditResource', $data);
				} else {
					$info = array(
						'resourceTaxonomyName' => $this->input->post('name', TRUE),
						'resourceTaxonomySlug' => $this->input->post('slug', TRUE),
						'isResourceTaxonomyActive' => $this->input->post('is_active', TRUE)
					);

					$this->db->where('resourceTaxonomySlug', $id);
					$this->db->update('resourcetaxonomies', $info);

					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['resourcetaxonomy'] = $this->taxonomyresource->get_taxonomy($id);

						header('Location:'.base_url('backoffice/configuracion/recursos'));
				}

				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingNewResource()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Editar categoría de los recursos';

			$this->load->view('backoffice/templates/header', $data);

			$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('slug', 'Slug', 'required', array('required' => '* El %s es requerido.'));

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/settingNewResource', $data);
			} else {
				$data = array(
					'resourceTaxonomyName' => $this->input->post('name', TRUE),
					'resourceTaxonomySlug' => $this->input->post('slug', TRUE),
					'isResourceTaxonomyActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('resourcetaxonomies', $data);

				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

					$this->load->view('backoffice/settingNewResource', $data);
			}
		}
	}

	public function settingNewRole()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['roles'] = $this->roles->get_roles_admin();
			$data['title'] = 'Nuevo role';

			$this->load->view('backoffice/templates/header', $data);

			$this->form_validation->set_rules('name', 'Título del rol', 'required', array('required' => '* El %s es requerido.'));
			$this->form_validation->set_rules('url', 'Link del rol', 'required', array('required' => '* El %s es requerido.'));

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('backoffice/settingNewRole', $data);
			} else {
				$data = array(
					'roleName' => $this->input->post('name', TRUE),
					'roleNameUrl' => $this->input->post('url', TRUE),
					'roleOrder' => $this->input->post('role_order', TRUE),
					'isRoleActive' => $this->input->post('is_active', TRUE)
				);
				$query = $this->db->insert('roles', $data);

				if( $this->db->affected_rows() == 1 )
					$data['created'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido creados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';

					$this->load->view('backoffice/settingNewRole', $data);
			}

			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingRoles($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$totalPag = ceil($this->roles->count_roles() / 12);
			$pag = $id >= $totalPag ? $totalPag : $id;
			
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['roles'] = $this->roles->get_roles_admin($pag);
			$data['currentpage'] = $pag;
			$data['lastpage'] = $totalPag;
			$data['title'] = 'Roles';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/settingRoles', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}

	public function settingRole($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['role'] = $this->roles->get_role($id);
		
			if (empty($data['role'])) {
				header('Location:'.base_url('backoffice/configuracion/roles'));
			} else {
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Role';
		
				$this->load->view('backoffice/templates/header', $data);
				$this->load->view('backoffice/settingRole', $data);
				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingEditRole($id = FALSE)
	{
		if( $this->require_min_level(6) )
		{
			$data['role'] = $this->roles->get_role($id);
		
			if (empty($data['role'])) {
				header('Location:'.base_url('backoffice/configuracion/roles'));
			} else {
				$data['messages'] = $this->requests->get_requests(NULL, 5);
				$data['count_messages'] = $this->requests->count_requests();
				$data['title'] = 'Editar role';

				$this->load->view('backoffice/templates/header', $data);

				$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => '* El %s es requerido.'));
				$this->form_validation->set_rules('url', 'url', 'required', array('required' => '* La %s es requerida.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('backoffice/settingEditRole', $data);
				} else {
					$info = array(
						'roleName' => $this->input->post('name', TRUE),
						'roleNameUrl' => $this->input->post('url', TRUE),
						'roleImage' => $this->input->post('image', TRUE),
						'roleOrder' => $this->input->post('order', TRUE),
						'isRoleActive' => $this->input->post('is_active', TRUE)
					);

					$this->db->where('roleNameUrl', $id);
					$this->db->update('roles', $info);

					if( $this->db->affected_rows() == 1 )
						$data['updated'] = '<div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert"><h3>Felicitaciones!</h3>' . '<p>Los datos han sido actualizados.</p><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button></div>';
						$data['role'] = $this->roles->get_role($id);

						$this->load->view('backoffice/settingEditRole', $data);
				}

				$this->load->view('backoffice/templates/footer', $data);
			}
		}
	}

	public function settingDeleteRole()
	{
		if( $this->require_min_level(6) )
		{
		}
	}

	public function settingUsers()
	{
		if( $this->require_min_level(6) )
		{
			$data['messages'] = $this->requests->get_requests(NULL, 5);
			$data['count_messages'] = $this->requests->count_requests();
			$data['title'] = 'Configuración';

			$this->load->view('backoffice/templates/header', $data);
			$this->load->view('backoffice/settingUsers', $data);
			$this->load->view('backoffice/templates/footer', $data);
		}
	}
}