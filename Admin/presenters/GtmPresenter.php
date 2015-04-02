<?php

namespace AdminModule\GtmModule;

/**
 * Description of GtmPresenter.
 *
 * @author Josef Sukdol <josef.sukdol at gmail.com>
 */
class GtmPresenter extends BasePresenter
{
    //private $entry;

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

    public function renderDefault($idPage)
    {
        $this->reloadContent();

        $settingsPreview = $this->getSettingsForPreview();

        $this->template->settingsPreviewOrig = $settingsPreview['original'];
        $this->template->settingsPreviewRewrite = $settingsPreview['rewritten'];
        $this->template->idPage = $idPage;
    }

    public function getSettingsForPreview()
    {
        $mainHeadVars = array();
        $mainHeadVars['%device%'] = 'desktop';
        $mainHeadVars['%response%'] = '200';

        $mainBodyVars = array();
        $mainBodyVars['%container%'] = $this->settings->get('Container Number', 'gtmModule'.$this->actualPage->getId(), 'text')->getValue();        

        $mainHeadScript = $this->settings->get('Main head script', 'gtmModule'.$this->actualPage->getId(), 'textarea')->getValue();
        $mainBodyScript = $this->settings->get('Main body script', 'gtmModule'.$this->actualPage->getId(), 'textarea')->getValue();

        $settings = array();
        $settings['original']['Main head script'] = $mainHeadScript;
        $settings['original']['Main body script'] = $mainBodyScript;
        $settings['rewritten']['Main head script'] = $this->rewriteScriptVariables($mainHeadVars, $mainHeadScript);
        $settings['rewritten']['Main body script'] = $this->rewriteScriptVariables($mainBodyVars, $mainBodyScript);

        return $settings;
    }

    public static function rewriteScriptVariables ($vars = array(), $script)
    {
        if (array_count_values($vars) > 0){
            foreach ($vars as $key => $val) {
                for ($i = substr_count($script, $key); $i > 0; $i--) {
                    $script = \WebCMS\Helpers\SystemHelper::strlReplace($key, $val, $script);
                }
            }
        }

        return $script;
    }
}
