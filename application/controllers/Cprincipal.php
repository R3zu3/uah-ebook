<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cprincipal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mprincipal');
	}

	public function index()
	{
		redirect('login');
	}

	public function login()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if ($this->session->userdata('adm')){
			redirect('dashboard');
		}

		$this->load->view('login');
	}

	public function login_adm()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if ($this->session->userdata('adm')){
			redirect('dashboard');
		}

		$this->load->view('login_adm');
	}

	public function biblioteca()
	{
		if (!$this->session->userdata('user')){
			redirect('login');
		}

		$userinfo = $this->Mprincipal->sp_consultar_info_user($this->session->userdata('user'));
		$cargolibro = 0;
		$registro = 0;

		if ($userinfo){
			foreach ($userinfo as $key){
				$cargolibro = $key->libro;
				$registro = $key->registro;
			}
		}

		if ($registro == 0) {
			redirect('datos_user');
		}

		if ($cargolibro == 0) {
			redirect('cargar_libro_user');
		}

		$data['materias'] = $this->Mprincipal->sp_consultar_full_tbl_materias();
		$data['semestres'] = $this->Mprincipal->sp_consultar_tbl_semestres();
		$data['username'] = $this->session->userdata('user');

		$this->load->view('biblioteca', $data);
	}

	public function cargar_libro_user()
	{
		if (!$this->session->userdata('user')){
			return false;
		}

		$userinfo = $this->Mprincipal->sp_consultar_info_user($this->session->userdata('user'));
		$cargolibro = 0;
		$registro = 0;

		if ($userinfo){
			foreach ($userinfo as $key){
				$cargolibro = $key->libro;
				$registro = $key->registro;
			}
		}

		if ($registro == 0) {
			redirect('datos_user');
		}

		$data['username'] = $this->session->userdata('user');
		$data['cargolibro'] = $cargolibro;

		$data['materias'] = $this->Mprincipal->sp_consultar_full_tbl_materias();
		$this->load->view('user_libro_carga', $data);
	}

	public function datos_user()
	{
		$userinfo = $this->Mprincipal->sp_consultar_info_user($this->session->userdata('user'));
		$registro = 0;

		if ($userinfo){
			foreach ($userinfo as $key){
				$registro = $key->registro;
			}
		}

		$data['registro'] = $registro;

		$data['username'] = $this->session->userdata('user');
		$this->load->view('datos_user', $data);
	}

	public function actualizar_pass()
	{
		$pass = $this->input->post('pass');
		$actpass = $this->Mprincipal->sp_actualizar_pass($pass,$this->session->userdata('user'));

		redirect('datos_user?msg="Su contraseña fue actualizada exitosamente!');
	}

	public function materias()
	{
		if (!$this->session->userdata('user')){
			return false;
		}

		$semestre = $this->input->post('semestre');

		$data['materias'] = $this->Mprincipal->sp_sonsultar_tbl_materias($semestre);

		$this->load->view('materias', $data);
	}

	public function libros_materias()
	{
		if (!$this->session->userdata('user')){
			return false;
		}

		$materia = $this->input->post('materia');

		$data['libros'] = $this->Mprincipal->sp_consultar_libros_materias($materia);

		$this->load->view('libros', $data);
	}

	public function libros_total()
	{
		if (!$this->session->userdata('user')){
			return false;
		}

		$data['libros'] = $this->Mprincipal->sp_consultar_libros_total();

		$this->load->view('libros', $data);
	}

	public function tdg_total()
	{
		if (!$this->session->userdata('user')){
			return false;
		}

		$data['tdg'] = $this->Mprincipal->sp_consultar_tdg_total();

		$this->load->view('tdg', $data);
	}

	public function libros_semestres()
	{
		if (!$this->session->userdata('user')){
			return false;
		}

		$semestre = $this->input->post('semestre');

		$data['libros'] = $this->Mprincipal->sp_consultar_libros_semestres($semestre);

		$this->load->view('libros', $data);
	}

	public function materias_full()
	{
		if (!$this->session->userdata('user')){
			return false;
		}

		$semestre = $this->input->post('semestre');

		$data['materias'] = $this->Mprincipal->sp_consultar_full_tbl_materias();

		$this->load->view('materias', $data);
	}

	public function iniciar_ses_user()
	{
		$name = $this->input->post('name');
		$pass = $this->input->post('pass');
		$username = '';

		$login = $this->Mprincipal->sp_iniciar_ses_user($name,$pass);

		if ($login){
			foreach ($login as $key){
				$username = $key->usuario;
			}
		}

		if ( ($username != null) || ($username != '') ){

			$sesdata = array(
				'user'	=> $username
			);

			//$this->session->sess_destroy('adm');
			$this->session->set_userdata($sesdata);

			echo 1;

		} else {
			echo 0;
		}
	}

	public function iniciar_ses_adm()
	{
		$name = $this->input->post('name');
		$pass = $this->input->post('pass');
		$username = '';

		$login = $this->Mprincipal->sp_iniciar_ses_adm($name,$pass);

		if ($login){
			foreach ($login as $key){
				$username = $key->admin;
			}
		}

		if ( ($username != null) || ($username != '') ){

			$sesdata = array(
				'adm'	=> $username
			);

			//$this->session->sess_destroy('user');
			$this->session->set_userdata($sesdata);

			echo 1;

		} else {
			echo 0;
		}
	}

	public function cerrar_ses_user()
	{
		$this->session->sess_destroy('user');
		redirect('login');
	}

	public function cerrar_ses_adm()
	{
		$this->session->sess_destroy('adm');
		redirect('login_adm');
	}

	public function subir_libro()
	{
		if (!$this->session->userdata('user') && !$this->session->userdata('adm')){
			return false;
		}

		$titulo			= strtoupper($this->input->post('titulo'));
		$autor 			= strtoupper($this->input->post('autor'));
		$editorial 		= strtoupper($this->input->post('editorial'));
		$publicacion 	= strtoupper($this->input->post('publicacion'));
		$materia 		= strtoupper($this->input->post('materia'));

		$user = $this->session->userdata('user');

		$archivo		= $_FILES['archivo'];
		$archivotipo	= $_FILES['archivo']['type'];
		$archivoname 	= $_FILES['archivo']['name'];

		if ($archivotipo == "application/pdf") {
			$folderPath = 'libros_dir';

			$tmp_titulo 	= str_replace(' ', '_', $titulo);
			$tmp_autor 		= str_replace(' ', '_', $autor);
			$tmp_editorial 	= str_replace(' ', '_', $editorial);

			$target = $folderPath.'/'.$publicacion.'-'.$tmp_titulo.'-'.$tmp_autor.'-'.$tmp_editorial.'.pdf';

			if (file_exists($target)) {

				if ($this->session->userdata('adm')){
					redirect('cargar_libro_adm?msg="'.$titulo.'" Ya existe, cargue otro libro');
				}

				redirect('cargar_libro_user?msg="'.$titulo.'" Ya existe, cargue otro libro');

				return false;
			}

			move_uploaded_file( $_FILES['archivo']['tmp_name'], $target);

			$this->Mprincipal->sp_procesar_libro($titulo,$autor,$editorial,$publicacion,$materia,$target,$user);

			if ($this->session->userdata('adm')){
				redirect('cargar_libro_adm?msg="'.$titulo.'" Fue cargado de manera exitosa');
			}

			redirect('cargar_libro_user?msg="'.$titulo.'" Fue cargado de manera exitosa');
		} else {

			if ($this->session->userdata('adm')){
				redirect('cargar_libro_adm?msg="'.$titulo.'" No pudo ser cargado <br> Asegurese de cargar un archivo pdf y de no cometer errores');
			}

			redirect('cargar_libro_user?msg="'.$titulo.'" No pudo ser cargado <br> Asegurese de cargar un archivo pdf y de no cometer errores');
		}
	}

	public function actualizar_libro()
	{
		if (!$this->session->userdata('user') && !$this->session->userdata('adm')){
			return false;
		}

		$titulo			= strtoupper($this->input->post('titulo'));
		$autor 			= strtoupper($this->input->post('autor'));
		$editorial 		= strtoupper($this->input->post('editorial'));
		$publicacion 	= strtoupper($this->input->post('publicacion'));
		$materia 		= strtoupper($this->input->post('materia'));
		$id 			= $this->input->post('id');

		$name = '';

		$data['libro'] = $this->Mprincipal->sp_consultar_libro($id);

		foreach ($data['libro'] as $key) {
			$name = $key->url;
		}

		$archivo		= $_FILES['archivo'];
		$archivotipo	= $_FILES['archivo']['type'];
		$archivoname 	= $_FILES['archivo']['name'];

		if ($archivotipo == "application/pdf") {
			$folderPath = 'libros_dir';

			$tmp_titulo 	= str_replace(' ', '_', $titulo);
			$tmp_autor 		= str_replace(' ', '_', $autor);
			$tmp_editorial 	= str_replace(' ', '_', $editorial);

			$target = $folderPath.'/'.$publicacion.'-'.$tmp_titulo.'-'.$tmp_autor.'-'.$tmp_editorial.'.pdf';

			if (file_exists($target)) {

				redirect('editar_libro?id='.$id.'&msg="'.$titulo.'" Ya existe, verifique los datos');

				return false;
			}

			unlink($name);

			move_uploaded_file( $_FILES['archivo']['tmp_name'], $target);

			$this->Mprincipal->sp_actualizar_libro($titulo,$autor,$editorial,$publicacion,$materia,$target,$id);

			redirect('editar_libro?id='.$id.'&msg="'.$titulo.'" Fue actualizado de manera exitosa');

		} else {
			redirect('editar_libro?id='.$id.'&msg="'.$titulo.'" No pudo ser actualizado <br> Asegurese de cargar un archivo pdf y de no cometer errores');
		}
	}

	public function actualizar_tdg()
	{
		if (!$this->session->userdata('user') && !$this->session->userdata('adm')){
			return false;
		}

		$titulo			= strtoupper($this->input->post('titulo'));
		$autor 			= strtoupper($this->input->post('autor'));
		$editorial 		= strtoupper($this->input->post('tutor'));
		$publicacion 	= strtoupper($this->input->post('publicacion'));
		$id 			= $this->input->post('id');

		$name = '';

		$data['tdg'] = $this->Mprincipal->sp_consultar_tdg($id);

		foreach ($data['tdg'] as $key) {
			$name = $key->url;
		}

		$archivo		= $_FILES['archivo'];
		$archivotipo	= $_FILES['archivo']['type'];
		$archivoname 	= $_FILES['archivo']['name'];

		if ($archivotipo == "application/pdf") {
			$folderPath = 'tdg_dir';

			$tmp_titulo 	= str_replace(' ', '_', $titulo);
			$tmp_autor 		= str_replace(' ', '_', $autor);
			$tmp_editorial 	= str_replace(' ', '_', $editorial);

			$target = $folderPath.'/'.$publicacion.'-'.$tmp_titulo.'-'.$tmp_autor.'-'.$tmp_editorial.'.pdf';

			if (file_exists($target)) {

				redirect('editar_tdg?id='.$id.'&msg="'.$titulo.'" Ya existe, verifique los datos');

				return false;
			}

			if (file_exists($name)) {
				unlink($name);
			}

			move_uploaded_file( $_FILES['archivo']['tmp_name'], $target);

			$this->Mprincipal->sp_actualizar_tdg($titulo,$autor,$editorial,$publicacion,$target,$id);

			redirect('editar_tdg?id='.$id.'&msg="'.$titulo.'" Fue actualizado de manera exitosa');

		} else {
			redirect('editar_tdg?id='.$id.'&msg="'.$titulo.'" No pudo ser actualizado <br> Asegurese de cargar un archivo pdf y de no cometer errores');
		}
	}

	public function subir_tdg()
	{
		if (!$this->session->userdata('user') && !$this->session->userdata('adm')){
			return false;
		}

		$titulo			= strtoupper($this->input->post('titulo'));
		$autor 			= strtoupper($this->input->post('autor'));
		$editorial 		= strtoupper($this->input->post('editorial')); ///tutor
		$publicacion 	= strtoupper($this->input->post('publicacion'));

		$user = $this->session->userdata('user');

		$archivo		= $_FILES['archivo'];
		$archivotipo	= $_FILES['archivo']['type'];
		$archivoname 	= $_FILES['archivo']['name'];

		if ($archivotipo == "application/pdf") {
			$folderPath = 'tdg_dir';

			$tmp_titulo 	= str_replace(' ', '_', $titulo);
			$tmp_autor 		= str_replace(' ', '_', $autor);
			$tmp_editorial 	= str_replace(' ', '_', $editorial);

			$target = $folderPath.'/'.$publicacion.'-'.$tmp_titulo.'-'.$tmp_autor.'-'.$tmp_editorial.'.pdf';

			if (file_exists($target)) {

				if ($this->session->userdata('adm')){
					redirect('cargar_tdg_adm?msg="'.$titulo.'" Ya existe, cargue otro tbg');
				}

				redirect('cargar_tdg_adm?msg="'.$titulo.'" Ya existe, cargue otro tbg');

				return false;
			}

			move_uploaded_file( $_FILES['archivo']['tmp_name'], $target);

			$this->Mprincipal->sp_procesar_tdg($titulo,$autor,$publicacion,$editorial,$target);

			if ($this->session->userdata('adm')){
				redirect('cargar_tdg_adm?msg="'.$titulo.'" Fue cargado de manera exitosa');
			}

			redirect('cargar_tdg_adm?msg="'.$titulo.'" Fue cargado de manera exitosa');
		} else {

			if ($this->session->userdata('adm')){
				redirect('cargar_tdg_adm?msg="'.$titulo.'" No pudo ser cargado <br> Asegurese de cargar un archivo pdf y de no cometer errores');
			}

			redirect('cargar_tdg_adm?msg="'.$titulo.'" No pudo ser cargado <br> Asegurese de cargar un archivo pdf y de no cometer errores');
		}
	}

	////////////////////////////////////////////////////

	public function dashboard()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if (!$this->session->userdata('adm')){
			redirect('login_adm');
		}

		$data['a'] = $this->Mprincipal->sp_consultar_num_libros();
		$data['b'] = $this->Mprincipal->sp_consultar_num_tdg();
		$data['c'] = $this->Mprincipal->sp_consultar_num_libros_pendientes();

		$this->load->view('dashboard', $data);
	}

	public function ver_libros()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if (!$this->session->userdata('adm')){
			redirect('login_adm');
		}

		$data['libros'] = $this->Mprincipal->sp_consultar_libros_total();

		$this->load->view('ver_libros_adm',$data);
	}

	public function ver_tdg()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if (!$this->session->userdata('adm')){
			redirect('login_adm');
		}

		$data['tdg'] = $this->Mprincipal->sp_consultar_tdg_total();

		$this->load->view('ver_tdg', $data);
	}

	public function cargar_libro_adm()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if (!$this->session->userdata('adm')){
			redirect('login_adm');
		}

		$data['materias'] = $this->Mprincipal->sp_consultar_full_tbl_materias();

		$this->load->view('cargar_libro',$data);
	}

	public function cargar_tdg_adm()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if (!$this->session->userdata('adm')){
			redirect('login_adm');
		}

		$this->load->view('cargar_tdg');
	}

	public function editar_libro()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if (!$this->session->userdata('adm')){
			redirect('login_adm');
		}

		$id= -1;

		if (isset($_GET["id"])) {
			$id = $_GET["id"];
		}

		$data['materias'] = $this->Mprincipal->sp_consultar_full_tbl_materias();

		$data['libro'] = $this->Mprincipal->sp_consultar_libro($id);

		$data['id'] = $id;

		if ($data['libro'] == null) {
			redirect('ver_libros');
		}

		$this->load->view('editar_libro',$data);
	}

	public function editar_tdg()
	{
		if ($this->session->userdata('user')){
			redirect('biblioteca');
		}

		if (!$this->session->userdata('adm')){
			redirect('login_adm');
		}

		$id= -1;

		if (isset($_GET["id"])) {
			$id = $_GET["id"];
		}

		$data['tdg'] = $this->Mprincipal->sp_consultar_tdg($id);

		$data['id'] = $id;

		if ($data['tdg'] == null) {
			redirect('ver_libros');
		}

		$this->load->view('editar_tdg', $data);
	}

	public function del_libro()
	{
		$id = $this->input->post('id');
		$name = '';

		$data['libro'] = $this->Mprincipal->sp_consultar_libro($id);

		foreach ($data['libro'] as $key) {
			$name = $key->url;
		}

		unlink($name);

		$this->Mprincipal->sp_eliminar_libro($id);

		echo '1';
	}

	public function del_tdg()
	{
		$id = $this->input->post('id');
		$name = '';

		$data['libro'] = $this->Mprincipal->sp_consultar_tdg($id);

		foreach ($data['libro'] as $key) {
			$name = $key->url;
		}

		unlink($name);

		$this->Mprincipal->sp_eliminar_tdg($id);

		echo '1';
	}

	public function aprobar_libro()
	{
		$id = $this->input->post('id');

		$this->Mprincipal->sp_aprobar_libro($id);

		echo '1';
	}

	public function rechazar_libro()
	{
		$id = $this->input->post('id');

		$this->Mprincipal->sp_rechazar_libro($id);

		echo '1';
	}

	public function ver()
	{
		$data['url'] = $_GET["r"];
		$data['title'] = $_GET["t"];
		$this->load->view('viewer',$data);
	}

	public function opentdg()
	{
		$str = $_GET["r"];
		$decode = base64_decode($str);

		$pieces = explode("/", $decode);

		$file = $pieces[0].'/'.$pieces[1];
		$filename = $pieces[1];
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="' . $filename . '"');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');
		@readfile($file);
	}
}
