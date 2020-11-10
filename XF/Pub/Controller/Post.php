<?php

namespace lulzapps\Rep\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Post extends XFCP_Post
{
	// public function actionPreview(ParameterBag $params)
	// {
    // }

    // protected function assertViewablePost($postId, array $extraWith = [])
	// {
    // }

	// public function actionIndex(ParameterBag $params)
	// {
    //     $post = $this->assertViewablePost($params->post_id);
    //     print('<pre>');
    //     print_r($post);
    //     print('</pre>');

	// 	return $this->redirectPermanently($this->plugin('XF:Thread')->getPostLink($post));
	// }

	// public function actionShow(ParameterBag $params)
	// {
    //     $post = $this->assertViewablePost($params->post_id);
    //     print('<pre>');
    //     print_r($post); 
    //     print('</pre>');

	// 	$viewParams = [
	// 		'post' => $post,
	// 		'thread' => $post->Thread,
	// 		'forum' => $post->Thread->Forum,
	// 		'canInlineMod' => $post->canUseInlineModeration()
	// 	];
	// 	return $this->view('XF:Post\Show', 'post', $viewParams);
    // }
    
    // public function actionEdit(ParameterBag $params)
    // {
    //     $reply = parent::actionEdit($params);
    //     echo print_r($reply);
    //     return $reply;
    // }

    public function actionHelloWorld()
    {
        return $this->message('Hello world!111');
    }

    public function actionReputation(ParameterBag $params) 
    {
        // // /** @var \XF\ControllerPlugin\Report $reportPlugin */
        // // $reputationPlugin = $this->plugin('XF:Report');
        
        $viewParams = 
        [
            'post_id' => $params->post_id,
        ];

        if ($this->request->isPost())
        {
            return $this->redirect("", \XF::phrase('thank_you_for_reporting_this_content'));
        //     return $this->view('lulzapps:RepView', 'lulzapps_reputation_submit_overlay2', $viewParams);
        }
        
        print('<pre>');
        print_r($params);
        print('</pre>');
        return $this->view('lulzapps:RepView', 'lulzapps_reputation_submit_overlay', $viewParams);
    }

    // public function actionReport(ParameterBag $params)
	// {
	// 	$profilePost = $this->assertViewableProfilePost($params->profile_post_id);
	// 	if (!$profilePost->canReport($error))
	// 	{
	// 		return $this->noPermission($error);
	// 	}

	// 	/** @var \XF\ControllerPlugin\Report $reportPlugin */
	// 	$reportPlugin = $this->plugin('XF:Report');
	// 	return $reportPlugin->actionReport(
	// 		'profile_post', $profilePost,
	// 		$this->buildLink('profile-posts/report', $profilePost),
	// 		$this->buildLink('profile-posts', $profilePost)
	// 	);
	// }
}