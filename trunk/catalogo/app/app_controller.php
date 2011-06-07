<?php
/* SVN FILE: $Id: app_controller.php 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
	var $helpers = array('Html', 'Form', 'Ajax',  'Javascript');
        
        var $components = array('Auth','RequestHandler');
	
	//esta es una variable que sera mostrada en el layout
	// se crea mediante un elemento que le inserta un listado de urls
	// indicando claramente en que lugar del sitio estoy navegando
	// es una serie de links PEj:
	// institucion -> ofertas -> plan -> a�o
	// Sencillamente, es un menu de navegacion
	var $rutaUrl_for_layout = array();

        
        
        
        
        function beforeFilter(){
                
                //Configure AuthComponent
                //$this->Auth->allow('display','login','logout');
                //$this->Auth->allow('*');return true;
                $this->Auth->loginError ='Usuario o Contrase�a Incorrectos';
		$this->Auth->authError = 'Usted no tiene permisos para acceder a esta p�gina.';
                $this->Auth->authorize = 'controller';
                $this->Auth->logoutRedirect='/pages/home';
                $this->Auth->autoRedirect = false;
     
	}
        
        function isAuthorized(){
            // todos los usuarios registrados estan autorizados
            return true;
        }
        
        
}
?>