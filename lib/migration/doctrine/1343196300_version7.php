<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version7 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('content_translation', 'image', 'string', '20', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('content_translation', 'image');
    }
}