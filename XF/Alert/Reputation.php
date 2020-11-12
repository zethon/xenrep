<?php

namespace lulzapps\Rep\XF\Alert;

use XF\Alert\AbstractHandler;
use XF\Mvc\Entity\Entity;

class Reputation extends AbstractHandler
{
    public function canViewContent(Entity $content, &$error = null)
    {
        return true;
    }
}