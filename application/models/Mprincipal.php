<?php
Class Mprincipal extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database('default');
	}

	public function sp_consultar_tbl_semestres(){
		$llamar="CALL sp_consultar_tbl_semestres();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_num_tdg(){
		$llamar="CALL sp_consultar_num_tdg();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_num_libros(){
		$llamar="CALL sp_consultar_num_libros();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_num_libros_pendientes(){
		$llamar="CALL sp_consultar_num_libros_pendientes();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_full_tbl_materias(){
		$llamar="CALL sp_consultar_full_tbl_materias();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_libros_total(){
		$llamar="CALL sp_consultar_libros_total();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_tdg_total(){
		$llamar="CALL sp_consultar_tdg_total();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_sonsultar_tbl_materias($semestre){

		$semestre = addslashes($semestre);

		$llamar="CALL sp_sonsultar_tbl_materias('".$semestre."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_libros_materias($materia){

		$materia = addslashes($materia);

		$llamar="CALL sp_consultar_libros_materias(".$materia.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_libro($id){

		$id = addslashes($id);

		$llamar="CALL sp_consultar_libro(".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_tdg($id){

		$id = addslashes($id);

		$llamar="CALL sp_consultar_tdg(".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_libros_semestres($semestre){

		$semestre = addslashes($semestre);

		$llamar="CALL sp_consultar_libros_semestres(".$semestre.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_iniciar_ses_user($user,$pass){

		$user = addslashes($user);
		$pass = addslashes($pass);

		$llamar="CALL sp_iniciar_ses_user('".$user."','".$pass."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_iniciar_ses_adm($user,$pass){

		$user = addslashes($user);
		$pass = addslashes($pass);

		$llamar="CALL sp_iniciar_ses_adm('".$user."','".$pass."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_info_user($user){

		$user = addslashes($user);

		$llamar="CALL sp_consultar_info_user('".$user."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_actualizar_pass($pass,$user){

		$pass = addslashes($pass);
		$user = addslashes($user);

		$llamar="CALL sp_actualizar_pass('".$pass."','".$user."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_eliminar_libro($id){

		$id = addslashes($id);

		$llamar="CALL sp_eliminar_libro(".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_eliminar_tdg($id){

		$id = addslashes($id);

		$llamar="CALL sp_eliminar_tdg(".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_aprobar_libro($id){

		$id = addslashes($id);

		$llamar="CALL sp_aprobar_libro(".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_rechazar_libro($id){

		$id = addslashes($id);

		$llamar="CALL sp_rechazar_libro(".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_procesar_libro($titulo,$autor,$editorial,$publicacion,$materia,$target,$user){

		$titulo = addslashes($titulo);
		$autor = addslashes($autor);
		$editorial = addslashes($editorial);
		$publicacion = addslashes($publicacion);
		$materia = addslashes($materia);
		$target = addslashes($target);
		$user = addslashes($user);

		$llamar="CALL sp_procesar_libro('".$titulo."','".$autor."','".$editorial."','".$publicacion."',".$materia.",'".$target."','".$user."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_actualizar_libro($titulo,$autor,$editorial,$publicacion,$materia,$target,$id){

		$titulo = addslashes($titulo);
		$autor = addslashes($autor);
		$editorial = addslashes($editorial);
		$publicacion = addslashes($publicacion);
		$materia = addslashes($materia);
		$target = addslashes($target);
		$id = addslashes($id);

		$llamar="CALL sp_actualizar_libro('".$titulo."','".$autor."','".$editorial."','".$publicacion."',".$materia.",'".$target."',".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_actualizar_tdg($titulo,$autor,$editorial,$publicacion,$target,$id){

		$titulo = addslashes($titulo);
		$autor = addslashes($autor);
		$editorial = addslashes($editorial);
		$publicacion = addslashes($publicacion);
		$target = addslashes($target);
		$id = addslashes($id);

		$llamar="CALL sp_actualizar_tdg('".$titulo."','".$autor."','".$editorial."','".$publicacion."','".$target."',".$id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_procesar_tdg($titulo,$autor,$publicacion,$editorial,$target){

		$titulo = addslashes($titulo);
		$autor = addslashes($autor);
		$publicacion = addslashes($publicacion);
		$editorial = addslashes($editorial);
		$target = addslashes($target);

		$llamar="CALL sp_procesar_tdg('".$titulo."','".$autor."','".$publicacion."','".$editorial."','".$target."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}
}
?>	