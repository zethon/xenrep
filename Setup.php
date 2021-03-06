<?php

namespace lulzapps\Rep;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

use XF\Db\Schema\Alter;
use XF\Db\Schema\Create;

class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
    use StepRunnerUninstallTrait;
    
    public function installStep1()
    {
        $this->schemaManager()->createTable('lulzapps_reputation', 
            function(Create $table)
            {
                $table->addColumn('rep_id', 'int')->autoIncrement();
                $table->addColumn('post_id', 'int');
                $table->addColumn('user_id', 'int');
                $table->addColumn('reputation', 'int')->unsigned(false);
                $table->addColumn('comment', 'varchar', 255)->setDefault('');
                $table->addColumn('date', 'int');
                $table->addPrimaryKey('rep_id');
            });
    }
}