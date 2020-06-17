<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "labtech".
 *
 * @property int $id
 * @property string $test
 * @property string $test_result
 */
class Labtech extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'labtech';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test', 'test_result'], 'required'],
            [['test', 'test_result'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test' => 'Test',
            'test_result' => 'Test Result',
        ];
    }
}
