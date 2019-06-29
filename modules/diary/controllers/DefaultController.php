<?php

namespace app\modules\diary\controllers;

use Yii;
use yii\web\Controller;
use app\modules\diary\models\DiaryRecord;
use app\modules\diary\models\DiaryRecordForm;
use yii\web\UploadedFile;

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
        $diary = new DiaryRecord();
        $records = $diary->find()->orderBy('date DESC')->all();
        $flash_message = Yii::$app->session->getFlash('message');
        return $this->render('index', [
            'flash_message' => $flash_message,
            'records' => $records
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $record = DiaryRecord::findOne($id);
        return $this->render('view', [
            'record' => $record
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DiaryRecordForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->image = UploadedFile::getInstance($model, 'image');
            $save = $model->save();
            $flash_message = $save ? ['message' => 'Запись успешно добавлена', 'error' => 0] :
                ['message' => 'Что-то пошло не так', 'error' => 1];
            Yii::$app->session->setFlash('message', $flash_message);
            return $this->redirect('index');
        }

        return $this->render('new_record',[
            'model' => $model
        ]);
    }

    public function actionEdit($id)
    {
        $model = DiaryRecord::findOne($id);
        $form_model = new DiaryRecordForm();

        $form_model->setProperties($model);

        if (Yii::$app->request->isPost) {
           $form_model->load(Yii::$app->request->post());
           $form_model->image = UploadedFile::getInstance($form_model, 'image');
           $save = $form_model->save($id);
           $flash_message = $save ? ['message' => 'Запись успешно изменена', 'error' => 0] :
               ['message' => 'Что-то пошло не так', 'error' => 1];
           Yii::$app->session->setFlash('message', $flash_message);
           return $this->redirect('index');
        }

        return $this->render('edit', [
            'model' => $form_model,
            'id' => $id
        ]);
    }

    public function actionDelete($id)
    {
       $model = diaryRecord::findOne($id);

       $success_delete = $model->delete();

       $flash_message = $success_delete ? ['message' => 'Запись успешно удалена', 'error' => 0] :
               ['message' => 'Что-то пошло не так', 'error' => 1];
       Yii::$app->session->setFlash('message', $flash_message);

       return $this->redirect('index');
    }
}
