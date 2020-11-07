<?php

namespace lulzapps\Rep;

use XF\Mvc\Entity\Entity;

class Listener
{
    public static function postEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
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


        // $structure->columns["lulzapps_foo"] = 42;
        // $structure->relations =
        //     [
        //         'Reputation' =>
        //             [
        //                 'entity' => 'lulzapps\Rep:Reputation',
        //                 'type' => self::TO_MANY,
        //                 'conditions' =>
        //                     [
        //                         ['post_id', '=', 0],
        //                     ]
        //             ]
        //     ];
    }
}