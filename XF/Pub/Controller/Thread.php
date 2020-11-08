<?php

namespace lulzapps\Rep\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Thread extends XFCP_Thread
{
    public function actionIndex(ParameterBag $params)
	{
		$page = $params->page;
        $perPage = $this->options()->messagesPerPage;
        
        $postRepo = $this->getPostRepo();
        $thread = $this->assertViewableThread($params->thread_id, $this->getThreadViewExtraWith());
        $postList = $postRepo->findPostsForThreadView($thread)->onPage($page, $perPage);
        $posts = $postList->fetch();
        
        // foreach ($posts AS $p)
        // {
        //     print('<hr/>');
        //     print('<pre>');
        //     print_r($p);
        //     print('</pre>');
        //     print('<hr/>');
        //     break;
        // }

        // print('<pre>');
        // print_r($posts);
        // print('</pre>');

        $reply = parent::actionIndex($params);
        // print('<pre>');
        // print_r($params);
        // print('</pre>');

        // print('<pre>');
        // print_r($reply);
        // print('</pre>');

        return $reply;
	}
}
