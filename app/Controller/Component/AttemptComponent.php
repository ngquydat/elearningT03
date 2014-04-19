<?php 
/**
 * Attempt Component Class
 * 
 * Based on http://bakery.cakephp.org/articles/aep_/2006/11/04/brute-force-protection
 * 
 * @author Thomas Heymann
 * @version	0.1
 * @license	http://www.opensource.org/licenses/mit-license.php The MIT License
 * @package app
 * @subpackage app.controllers.components
 **/
class AttemptComponent extends Object {

	var $components = array(
		'RequestHandler'
		);

	// Called before the Controller::beforeFilter().
	function initialize(&$controller, $options=array()) {
	}

	// Called after the Controller::beforeFilter() and before the controller action
	function startup(&$controller) {
		$this->controller =& $controller;
		$this->Attempt = ClassRegistry::init('Attempt');
		// debug($this->Attempt);die();
	}

   function beforeRender(&$controller) {
    }

    //called after Controller::render()
    function shutdown(&$controller) {
    }

    //called before Controller::redirect()
    function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
    }

	public function count($username,$action) {
		return $this->Attempt->count( $username, $action);
	}

	public function limit($username,$action, $limit = 5) {
		return $this->Attempt->limit($username, $action, $limit);
	}

	public function fail($username,$action, $duration = '+10 minutes') {
		return $this->Attempt->fail( $username, $action, $duration);
	}

	public function reset($username,$action) {
		return $this->Attempt->reset( $username, $action);
	}

	public function cleanup() {
		return $this->Attempt->cleanup();
	}
}
?>