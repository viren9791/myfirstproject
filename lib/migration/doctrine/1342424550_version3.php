<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version3 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('dummy_cart', 'created_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('dummy_cart', 'updated_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('dummy_cart', 'created_at');
        $this->removeColumn('dummy_cart', 'updated_at');
    }
}