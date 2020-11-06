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

    public function actionReputation(ParameterBag $params) 
    {
        $viewParams = 
        [
            'post_id' => $params->post_id,
        ];
        
        return $this->view('lulzapps:RepView', 'lulzapps_reputation_submit_overlay', $viewParams);
    }
}