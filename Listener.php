<?php

namespace lulzapps\Rep;

use XF\Mvc\Entity\Entity;

use XF\Entity\Phrase;
use XF\Mvc\Entity\Structure;


class Listener
{
    public static function postEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        // $structure->columns['lulzapps_foo'] = 
        //     [
        //         'type' => Entity::UINT, 
        //         'default' => 42
        //     ];
            
        $structure->relations['Reputation'] =
            [
                'entity' => 'lulzapps\Rep:Reputation',
                'type' => Entity::TO_MANY,
                'conditions' => 'post_id',
                'primary' => true
            ];
    }
}