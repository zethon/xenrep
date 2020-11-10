<?php

namespace lulzapps\Rep\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Post extends XFCP_Post
{
    public function actionHelloWorld()
    {
        return $this->message('Hello world!111');
    }

    public function actionReputation(ParameterBag $params) 
    {
        $post = $this->assertViewablePost($params->post_id);

        $confirmUrl = $this->buildLink('posts/reputation', $post);
        $returnUrl = $this->buildLink('posts', $post);

        if ($this->request->isPost())
        {
            return $this->redirect($returnUrl, \XF::phrase('thank_you_for_reporting_this_content'));
        }

        $viewParams = [
            'confirmUrl' => $confirmUrl,
            'content' => $post
        ];
        return $this->view('XF:Report\RepView', 'lulzapps_reputation_submit_overlay', $viewParams);
    }
}