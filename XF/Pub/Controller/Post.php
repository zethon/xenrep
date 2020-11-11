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
            $message = $this->request->filter('comment', 'str');
            if (!$message)
            {
                throw $this->exception($this->error(\XF::phrase('please_enter_reason_for_reporting_this_message')));
            }

            $postId = $post->getIdentifierValues();
            if (!$postId || count($postId) != 1)
            {
                throw new \InvalidArgumentException("Entity does not have an ID or does not have a simple key");
            }
            $postId = intval(reset($postId));

            $reputation = $this->em()->create('lulzapps\Rep:Reputation');

            $form = $this->formAction();

            $input = $this->filter([
                'post_id' => 'uint',
                'user_id' => 'uint',
                'comment' => 'str'
            ]);

            $input['post_id'] = $postId;
            $input['reputation'] = 123;

            $user = \XF::visitor();
            $input['user_id'] = $user->user_id;    

            $form->basicEntitySave($reputation, $input)->run();

            // /** @var \XF\Service\Report\Creator $creator */
            // $creator = $this->service('lulzapps\Rep:Reputation\Creator', 'post', $post);
            // $creator->setMessage($message);
            // $creator->save();

            return $this->redirect($returnUrl, \XF::phrase('thank_you_for_reporting_this_content'));
        }

        $viewParams = [
            'confirmUrl' => $confirmUrl,
            'content' => $post
        ];
        return $this->view('XF:Report\RepView', 'lulzapps_reputation_submit_overlay', $viewParams);
    }
}