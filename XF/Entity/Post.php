<?php

namespace lulzapps\Rep\XF\Entity;

class Post extends XFCP_Post
{
	public function canRep()
	{
        $user = \XF::visitor();
        if ($user->user_id == 0) return false;
        if ($this->user_id == $user->user_id) return false;

        $finder = $this->finder('lulzapps\Rep:Reputation');
        $finder->where('post_id', $this->post_id);
        $finder->where('user_id', $user->user_id);
        $existing = $finder->fetchOne();
        if ($existing) return false;

        return true;
	}
}