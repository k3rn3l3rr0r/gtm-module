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

    public function prepareMainHeadScript($context, $fromPage)
    {
        $responseCode = $context->getHttpResponse()->getCode();

        $vars = array();
        $vars['%device%'] = 'desktop';
        $vars['%response%'] = $responseCode;

        $rawScript = $context->settings->get('Main head script', 'gtmModule'.$fromPage->getId(), 'textarea')->getValue();
        
        $script = \AdminModule\GtmModule\GtmPresenter::rewriteScriptVariables($vars, $rawScript);

        if (empty($script)) {
            $script = '';
        }
        
        return $script;
    }

    public function prepareMainBodyScript($context, $fromPage)
    {
        $containerNr = $context->settings->get('Container Number', 'gtmModule'.$fromPage->getId(), 'textarea')->getValue();        

        $vars = array();
        $vars['%container%'] = $containerNr;

        $rawScript = $context->settings->get('Main body script', 'gtmModule'.$fromPage->getId(), 'textarea')->getValue();
        
        $script = \AdminModule\GtmModule\GtmPresenter::rewriteScriptVariables($vars, $rawScript);

        if (empty($script)) {
            $script = '';
        }
        
        return $script;
    }

    public function gtmHeadBox($context, $fromPage)
    {
        $template = $context->createTemplate();
        $template->setFile('../libs/webcms2/gtm-module/Frontend/templates/Gtm/boxes/headBox.latte'); // TODO: is this the right way to specify template path?       

        $template->mainHeadScript = $this->prepareMainHeadScript($context, $fromPage);
        
        return $template;
    }

    public function gtmBodyBox($context, $fromPage)
    {
        $template = $context->createTemplate();
        $template->setFile('../libs/webcms2/gtm-module/Frontend/templates/Gtm/boxes/bodyBox.latte');
        
        $template->mainBodyScript = $this->prepareMainBodyScript($context, $fromPage);

        return $template;
    }
}
