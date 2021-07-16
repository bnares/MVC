<?php

namespace App\Controllers;

use \Core\View;
use \App\Auth;

class ChangePassword extends \Core\Controller {
	
	public function newAction(){
		
		
		View::renderTemplate('ResetPassword/new.html');
	}
	
	
	public function requireEmail(){
		
		if(!isset($_SESSION['email'])){
			View::renderTemplate('Login/new.html', ['error'=>"Can't acces this page"]);
			
			exit;
		}
	}
	
	protected function before(){
		
		$this->requireEmail();   //sprawdzam czy uzytkownik moze wejsc na stone glowne zalogowanego uzytkownika np mainWindow.html. robie to w metodzie before ktora wykonuje sie przed wywolaniem kazdej metody z klasy ktorej uzycie jest przeznaczone tylko dla zalogowanych uzytkownikow
		
	}
	
	protected function after(){    //funkcja stworzona pod prezentacje formularza zmieniajacego haslo po jego wyswietleniu nastepuje usuniecie  zmiennej email aby nie mozna bylo ponownie do tej strony wejsc
		
		if(isset($_SESSION['email'])){
			
			Auth::logout();
		}
	}
	
	public function resetPassword(){
		
		var_dump($_POST);
		
	}
	
	
}