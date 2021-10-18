<?php

use yii\db\Migration;

/**
 * Class m211018_093328_init_rbac
 */
class m211018_093328_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create a user';
        $auth->add($createUser);

        $auth->assign($createUser, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211018_093328_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211018_093328_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
