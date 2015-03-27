<?php

    namespace AdminModule\FormModule;

    use Nette;

    /**
     * Description of SettingsPresenter
	 *
     * @author Josef Sukdol <josef.sukdol at gmail.com>
     */
    class SettingsPresenter extends BasePresenter {

	private $element;

	protected function startup() {
	    parent::startup();
	}

	protected function beforeRender() {
	    
	    parent::beforeRender();

	}

	public function actionDefault($idPage) {
	    
	}

	public function createComponentSettingsForm() {

	    $settings = array();
	    $settings[] = $this->settings->get('Test', 'gtmModule' . $this->actualPage->getId(), 'text');

	    return $this->createSettingsForm($settings);
	}

	public function renderDefault($idPage) {
	    $this->reloadContent();

	    $this->template->config = $this->settings->getSection('gtmModule');
	    $this->template->idPage = $idPage;
	}

    }
    