<?php

use yii\db\Migration;

/**
 * Class m211018_080917_initial
 */
class m211018_080917_initial extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('detail',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(),
            'price'=>$this->integer(),
            'count'=>$this->integer()
        ]);
        $this->createTable('user',[
            'id'=>$this->primaryKey(),
            'username'=>$this->string(),
            'password'=>$this->string()
        ]);
        $this->createTable('basket',[
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer(),
            'detail_id'=>$this->integer()
        ]);

        $this->addForeignKey(
            'fk-basket-user',
            'basket',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-basket-detail',
            'basket',
            'detail_id',
            'detail',
            'id',
            'CASCADE'
        );
        $this->insert('user',[
            'username'=>'admin',
            'password'=>'admin'
        ]);
        for($i=0; $i<50;$i++){
            $this->insert('detail',[
                'name'=>'name'.$i,
                'price'=>$i,
                'count'=>5
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-basket-user','basket');
        $this->dropForeignKey('fk-basket-detail','basket');
        $this->dropTable('detail');
        $this->dropTable('user');
        $this->dropTable('basket');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211018_080917_initial cannot be reverted.\n";

        return false;
    }
    */
}
