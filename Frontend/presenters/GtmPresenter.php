<?php

namespace FrontendModule\GtmModule;

/**
 * Description of GtmPresenter.
 *
 * @author Josef Sukdol <josef.sukdol at gmail.com>
 */
class GtmPresenter extends \FrontendModule\BasePresenter
{
    protected function startup()
    {
        parent::startup();
    }

    protected function beforeRender()
    {
        parent::beforeRender();
    }

    public function actionDefault($id)
    {
    }

    public function renderDefault($id)
    {
        $this->template->id = $id;
    }

    public function getMainHeadScript($context, $fromPage)
    {
        $script = $context->settings->get('Main head script', 'gtmModule'.$fromPage->getId(), 'textarea')->getValue();


        return $script;
    }

    public function gtmHeadBox($context, $fromPage)
    {
        $template = $context->createTemplate();
        $template->setFile('../libs/webcms2/gtm-module/Frontend/templates/Gtm/boxes/headBox.latte'); // TODO: is this the right way to specify template path?       

        $template->mainHeadScript = $this->getMainHeadScript($context, $fromPage);
        
        return $template;
    }

    public function gtmBodyBox($context, $fromPage)
    {
        $template = $context->createTemplate();
        $template->setFile('../libs/webcms2/gtm-module/Frontend/templates/Gtm/boxes/bodyBox.latte');
        
        $template->mainBodyScript = $context->settings->get('Main body script', 'gtmModule'.$fromPage->getId(), 'textarea')->getValue();

        return $template;
    }
}
