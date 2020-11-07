<?php

namespace Demo\Portal\Entity;

use XF\Mvc\Entity\Structure;

class Reputation extends \XF\Mvc\Entity\Entity
{
    public static function getStructure(Structure $structure)
    {
        $structure->table = 'lulzapps_reputation';
        $structure->shortName = 'lulzapps\Rep:Reputation';
        $structure->primaryKey = 'rep_id';
        $structure->columns = 
            [
                'rep_id' => ['type' => self::UINT, 'required' => true, 'autoIncrement' => true],
                'post_id' => ['type' => self::UINT, 'required' => true],
                'user_id' => ['type' => self::UINT, 'required' => true],
                'reputation' => ['type' => self::INT, 'required' => true],
                'comment' => ['type' => self::STR, 'required' => true, 'maxLength' => 255],
                'date' => ['type' => self::UINT, 'default' => time()]
            ];
        $structure->getters = [];
        $structure->relations = 
            [
                'Post' => 
                    [
                        'entity' => 'XF:Post',
                        'type' => self::TO_MANY,
                        'conditions' => 
                            [
                                ['post_id', '=', '$post_id']
                            ],
                        'primary' => true
                    ],
            ];
    
        return $structure;
    }
}