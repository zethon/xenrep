<?php

namespace lulzapps\Rep\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Post extends XFCP_Post
{
    public function actionEdit(ParameterBag $params)
    {
        $reply = parent::actionEdit($params);
        echo print_r($reply);
        return $reply;
    }

    public function actionHelloWorld()
    {
        return $this->message('Hello world!111');
    }

	// public function actionShow(ParameterBag $params)
	// {
	// 	$post = $this->assertViewablePost($params->post_id);

	// 	$viewParams = [
	// 		'post' => $post,
	// 		'thread' => $post->Thread,
	// 		'forum' => $post->Thread->Forum,
	// 		'canInlineMod' => $post->canUseInlineModeration()
	// 	];
	// 	return $this->view('XF:Post\Show2', 'post', $viewParams);
	// }

    public function actionReputation(ParameterBag $params) 
    {
        $viewParams = 
        [
            'post_id' => $params->post_id,
            // 'params' => print_r($params->params())
        ];
        return $this->view('lulzapps:RepView', 'lulzapps_reputation_submit_overlay', $viewParams);
    }
}