<?php

namespace lulzapps\Rep\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Post extends XFCP_Post
{
	public function actionPreview(ParameterBag $params)
	{
    }

    protected function assertViewablePost($postId, array $extraWith = [])
	{
    }

	public function actionIndex(ParameterBag $params)
	{
        $post = $this->assertViewablePost($params->post_id);
        print('<pre>');
        print_r($post);
        print('</pre>');

		return $this->redirectPermanently($this->plugin('XF:Thread')->getPostLink($post));
	}

	public function actionShow(ParameterBag $params)
	{
        $post = $this->assertViewablePost($params->post_id);
        print('<pre>');
        print_r($post); 
        print('</pre>');

		$viewParams = [
			'post' => $post,
			'thread' => $post->Thread,
			'forum' => $post->Thread->Forum,
			'canInlineMod' => $post->canUseInlineModeration()
		];
		return $this->view('XF:Post\Show', 'post', $viewParams);
    }
    
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

    public function actionReputation(ParameterBag $params) 
    {
        $viewParams = 
        [
            'post_id' => $params->post_id,
        ];
        
        return $this->view('lulzapps:RepView', 'lulzapps_reputation_submit_overlay', $viewParams);
    }
}