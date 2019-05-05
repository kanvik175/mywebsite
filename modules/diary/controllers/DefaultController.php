<?php

namespace app\modules\diary\controllers;

use Yii;
use yii\web\Controller;
use app\modules\diary\models\Diary;
use app\modules\diary\models\NewRecordForm;

/**
 * Default controller for the `diary` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $diary = new Diary();
        $records = $diary->find()->all();
        $flash_message = Yii::$app->session->getFlash('new_record');
        return $this->render('index', [
            'flash_message' => $flash_message,
            'records' => $records
        ]);
    }

    public function actionCreate()
    {
        $model = new NewRecordForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $save = $model->save();
            $flash_message = $save ? ['message' => 'Запись успешно добавлена', 'error' => 0] :
                ['message' => 'Что-то пошло не так', 'error' => 1];
            Yii::$app->session->setFlash('new_record', $flash_message);
            return $this->redirect('index');
        }

        return $this->render('new_record',[
            'model' => $model
        ]);
    }
}
