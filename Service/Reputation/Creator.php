<?php

namespace lulzapps\Rep\Service\Reputation;

use XF\Entity\Forum;
use XF\Entity\Report;
use XF\Entity\ReportComment;
use XF\Entity\User;
use XF\Mvc\Entity\Entity;
use XF\Report\AbstractHandler;

class Creator extends \XF\Service\AbstractService
{
	public function __construct(\XF\App $app, $contentType, Entity $content)
	{
		parent::__construct($app);

		$this->user = \XF::visitor();

		// $this->createReport($contentType, $content);
		// $this->setupComment();
        // $this->setDefaults();
        
        print('<pre>');
        print_r($app);
        print('</pre>');
	}
}