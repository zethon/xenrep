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

            $user = \XF::visitor();

            $finder = $this->finder('lulzapps\Rep:Reputation');
            $finder->where('post_id', $postId);
            $finder->where('user_id', $user->user_id);
            $existing = $finder->fetchOne();
            if ($existing)
            {
                throw $this->exception($this->error('You already commented on this post'));
            }

            $finder = $this->finder("XF:Post");
            $finder->where('post_id', $postId);
            $post = $finder->fetchOne();
            if ($post->user_id == $user->user_id)
            {
                throw $this->exception($this->error('You cannot comment on your own post'));
            }

            $input = $this->filter([
                'post_id' => 'uint',
                'user_id' => 'uint',
                'comment' => 'str'
            ]);

            $input['post_id'] = $postId;
            $input['user_id'] = $user->user_id;
            $input['reputation'] = 123;

            $reputation = $this->em()->create('lulzapps\Rep:Reputation');

            $form = $this->formAction();
            $form->basicEntitySave($reputation, $input)->run();

            return $this->redirect($returnUrl, "Your feedback has been saved");
        }

        $viewParams = [
            'confirmUrl' => $confirmUrl,
            'content' => $post
        ];
        return $this->view('XF:Report\RepView', 'lulzapps_reputation_submit_overlay', $viewParams);
    }
}