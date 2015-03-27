<?php

namespace WebCMS\GtmModule;

/**
 * Description of Gtm
 *
 * @author Josef Sukdol <josef.sukdol at gmail.com>
 */
class Gtm extends \WebCMS\Module {
	
	protected $name = 'Gtm';
	
	protected $author = 'Josef Sukdol';
	
	protected $presenters = array(
		array(
			'name' => 'Gtm',
			'frontend' => true,
			'parameters' => false
			),
		array(
			'name' => 'Settings',
			'frontend' => false
			)
	);
	
	protected $params = array(
		
	);
	
	public function __construct(){
		$this->addBox('Gtm box', 'Gtm', 'gtmBox');
	}
	
}