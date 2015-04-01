<?php

namespace AdminModule\GtmModule;

/**
 * Description of BasePresenter.
 *
 * @author Josef Sukdol <josef.sukdol at gmail.com>
 */
class BasePresenter extends \AdminModule\BasePresenter
{
    protected $repository;

    protected function startup()
    {
        parent::startup();

        //$this->repository = $this->em->getRepository('WebCMS\FormModule\Entity\GtmSomething');
    }

    protected function beforeRender()
    {
        parent::beforeRender();
    }

    public function actionDefault($idPage)
    {
    }

    public function renderDefault($idPage)
    {
        $this->reloadContent();

        $this->template->idPage = $idPage;
    }
}
