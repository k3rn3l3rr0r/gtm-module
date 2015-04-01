<?php

namespace AdminModule\GtmModule;

//use Nette;

    /**
     * Description of SettingsPresenter.
     *
     * @author Josef Sukdol <josef.sukdol at gmail.com>
     */
    class SettingsPresenter extends BasePresenter
    {
    private $element;

        protected function startup()
        {
            parent::startup();
        }

        protected function beforeRender()
        {
            parent::beforeRender();
        }

        public function actionDefault($idPage)
        {
        }

        public function createComponentSettingsGtm()
        {
            $settings = array();
            $settings[] = $this->settings->get('Container Number', 'gtmModule'.$this->actualPage->getId(), 'text');
            $settings[] = $this->settings->get('Main head script', 'gtmModule'.$this->actualPage->getId(), 'textarea');
            $settings[] = $this->settings->get('Main body script', 'gtmModule'.$this->actualPage->getId(), 'textarea');

            return $this->createSettingsForm($settings);
        }

        public function renderDefault($idPage)
        {
            $this->reloadContent();

            $this->template->config = $this->settings->getSection('gtmModule');
            $this->template->idPage = $idPage;
        }
    }
