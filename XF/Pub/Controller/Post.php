<?php

namespace lulzapps\Rep\XF\Entity;

class Post extends XFCP_Post
{
    public function actionReputation(ParameterBag $params) 
    {
        echo ("HI THERE");
        echo print_r($params, true);
    }
}