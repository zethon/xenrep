<?php

namespace lulzapps\Rep;

use XF\Mvc\Entity\Entity;

use XF\Entity\Phrase;
use XF\Mvc\Entity\Structure;


class Listener
{
    public static function postEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        // $structure->relations['Reputation'] = 
        //     [
        //         'entity' => 'lulzapps\Rep:Reputation',
        //         'type' => Entity::TO_MANY,
        //         'conditions' => [['post_id', '=', '$post_id']],
        //         'primary' => true
        //     ];

        // print('<pre>');
        // print_r($structure);
        // print('</pre>');
        // print('<hr/>');

        // print('<pre>');
        // print_r($em);
        // print('</pre>');
        // print('<hr/>');

        // $finder = \XF::finder('lulzapps\Rep:Reputation');
        // $reputations = $finder


        // $structure->columns['reputation_list'] = 
        //     [
        //         'type' => Entity::BOOL, 
        //         'default' => false
        //     ];

        // $structure->relations = 
        //     [
        //         'Reputation' => 
        //             [
        //                 'entity' => 'lulzapps\Rep:Reputation',
        //                 'type' => Entity::TO_MANY,
        //                 'conditions' => 
        //                     [
        //                         ['post_id', '=', '$post_id']
        //                     ],
        //                 'primary' => true
        //             ],
        //     ];


        $structure->columns["lulzapps_foo"] = 
            [
                'type' => Entity::UINT, 
                'default' => 42
            ];
            
        $structure->relations['Reputation'] =
            [
                'entity' => 'lulzapps\Rep:Reputation',
                'type' => Entity::TO_MANY,
                'conditions' => 'post_id',
                'primary' => true
            ];

        // print('<pre>');
        // print_r($structure);
        // print('</pre>');
    }
}