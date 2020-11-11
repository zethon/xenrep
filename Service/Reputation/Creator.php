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
    use \XF\Service\ValidateAndSavableTrait;

    protected $reputation;
    protected $post;

    protected $comment;
    protected $commentPreparer;

	public function __construct(\XF\App $app, $contentType, Entity $content)
	{
        parent::__construct($app);

        $postId = $content->getIdentifierValues();
		if (!$postId || count($postId) != 1)
		{
			throw new \InvalidArgumentException("Entity does not have an ID or does not have a simple key");
        }
        $postId = intval(reset($postId));
        
        $this->reputation = $this->em()->create('lulzapps\Rep:Reputation');
		if (!$this->reputation)
		{
			throw new \InvalidArgumentException("OH SNAP!");
        }

        $this->reputation->post_id = $postId;
        
        $user = \XF::visitor();
        $this->reputation->user_id = $user->user_id;

        $this->reputation->reputation = 10;
        $this->reputation->date = \XF::$time;
    }

    protected function _validate()
	{
        return [];
    }
    
    protected function _save()
	{
        $reputation = $this->reputation;

		$db = $this->db();
		$db->beginTransaction();
		$reputation->save(true, false);
		$db->commit();

		return $reputation;
	}
}