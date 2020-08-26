<?php

    use yii\db\Migration;

    class m161129_161826_tb_works extends Migration
    {
        public function safeUp()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('{{%works}}',[
                'id'=>$this->primaryKey(),
                'work_name'=>$this->string()->notNull(),
                'work_description'=>$this->text(),
                'work_url'=>$this->string(),
                'work_tech'=>$this->string()->notNull(),
                'work_image'=>$this->string(),
                'showMain'=>$this->integer()
            ],$tableOptions);

            $this->createTable('{{%skills}}',[
                'id'=>$this->primaryKey(),
                'skill_name'=>$this->string(),
                'skill_percent'=>$this->integer()
            ],$tableOptions);

        }

        public function safeDown()
        {
            $this->dropTable('skills');
            $this->dropTable('works');
            echo "m161129_161826_tb_works cannot be reverted.\n";

            return false;
        }

        /*
        // Use safeUp/safeDown to run migration code within a transaction
        public function safeUp()
        {
        }
        public function safeDown()
        {
        }
        */
    }