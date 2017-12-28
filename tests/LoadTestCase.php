<?php
/**
 *
 *
 * @author Carsten Brandt <mail@cebe.cc>
 */
namespace yiiunit\extensions\cfdi;

use Yii;
use yii\helpers\FileHelper;
use yii\web\AssetManager;
use yii\web\View;

use ktaris\cfdi\Receptor;

class LoadTestCase extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->mockWebApplication();
    }

    public function testReceptor()
    {
        $model = new Receptor;
    }
}
