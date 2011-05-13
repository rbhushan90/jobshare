<?php
class AppController extends Controller {
	var $components = array('Auth', 'Session');
	
	function beforeFilter(){
		//Seiten definieren für Gäste
		
		
		//Error Messages - kein Login - falsches Login
		$this->Auth->authError = "Sie müssen sich Einlogen um diese Seite zu sehen";
		$this->Auth->loginError = "Benutzername oder Passwort nicht korrekt";
		
		//Redirect für Login und Logout (logout muss noch bearbeitet werden -> auf startseite)
		$this->Auth->loginRedirect = array('controller' => 'mytasks', 'action' => 'index');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
		
		//Setzen der Status Variablen
		$this->set('admin', $this->_isAdmin());
		$this->set('logged_in', $this->_loggedIn());
		$this->set('users_username', $this->_usersUsername());
		$this->set('manager', $this->_isManager());
	}
	
	//Funktion: Gibt TRUE zurück wenn User mit Admin Berechtigung eingelogt ist
	function _isAdmin() {
		$admin = FALSE;
		if ($this->Auth->user('group_id') == '2'){
			$admin = TRUE;
		}
		return $admin;
	}
	
	//Funktion: Gibt TRUE zurück wenn User mit Manager Berechtigung eingelogt ist
	function _isManager(){
		$manager = FALSE;
		if ($this->Auth->user('group_id') == '1'){
			$manager = TRUE;
		}
		return $manager;
	}
	
	//Funktion: Gibt TRUE zurück wenn User eingelogt
	function _loggedIn(){
		$logged_in = FALSE;
		if ($this->Auth->user()){
			$logged_in = TRUE;
		}
		return $logged_in;
	}
	
	//Funktion: gibt Username zurück
	function _usersUsername(){
		$users_username = NULL;
		if ($this->Auth->user()){
			$users_username = $this->Auth->user('username');
		}
		return $users_username;
	}
	
}
?>
