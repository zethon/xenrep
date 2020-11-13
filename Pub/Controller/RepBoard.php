<?php

namespace lulzapps\Rep\Pub\Controller;

class RepBoard extends \XF\Pub\Controller\AbstractController
{
    public function actionIndex()
    {
        $viewParams = [];
        return $this->view('lulzapps\Rep:BoardView', 'lulzapps_reputation_board_view', $viewParams);
    }

    public function actionRepreceived()
    {
        return $this->message("OH HIT THERE!");
    }
}