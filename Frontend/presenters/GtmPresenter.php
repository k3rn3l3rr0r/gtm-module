<?php

namespace FrontendModule\GtmModule;

/**
 * Description of GtmPresenter
 *
 * @author Josef Sukdol <josef.sukdol at gmail.com>
 */
class GtmPresenter extends \FrontendModule\BasePresenter{
	
	//private $repository;
	
	//private $page;
	
	protected function startup() {
		parent::startup();
	
		//$this->repository = $this->em->getRepository('WebCMS\PageModule\Entity\Page');
	}

	protected function beforeRender() {
		parent::beforeRender();
		
	}
	
	public function actionDefault($id){
		
	}
	
	public function renderDefault($id){
		
		$this->template->id = $id;
	}

}

?>
