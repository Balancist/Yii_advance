<?php
/**
 * Created by PhpStorm.
 * User: h.abaei
 * Date: 6/7/2017
 * Time: 12:49 PM
 */

namespace common\components\rest;


use yii\base\Arrayable;
use yii\base\Model;
use yii\data\DataProviderInterface;

class Serializer extends \yii\rest\Serializer
{

    /**
     * Serializes the given data into a format that can be easily turned into other formats.
     * This method mainly converts the objects of recognized types into array representation.
     * It will not do conversion for unknown object types or non-object data.
     * The default implementation will handle [[Model]] and [[DataProviderInterface]].
     * You may override this method to support more object types.
     * @param mixed $data the data to be serialized.
     * @return mixed the converted data.
     */
    public function serialize($data)
    {
        if ($data instanceof Model && $data->hasErrors()) {
            return $this->serializeModelErrors($data);
        } elseif ($data instanceof Model && method_exists($data, 'hasNotices') &&
            $data->hasNotices() && $data->getCheckNotice()) {
            return $this->serializeModelNotices($data);
        } elseif ($data instanceof Arrayable) {
            return $this->serializeModel($data);
        } elseif ($data instanceof DataProviderInterface) {
            return $this->serializeDataProvider($data);
        } else {
            return $data;
        }
    }

    /**
     * Serializes the validation errors in a model.
     * @param Model $model
     * @return array the array representation of the errors
     */
    protected function serializeModelErrors($model)
    {
        $this->response->setStatusCode(422, 'Data Validation Failed.');
        $result = [];
        $errors = $model->getErrors();

        foreach ($errors as $name => $messages) {
            foreach ($messages AS $message) {
                if (is_array($message)) {
                    $result[] = [
                        'field' => $name,
                        'message' => $message[0],
                        'error_code' => $message[1],
                        'error_params' => $message[2],
                        'type' => 'error'
                    ];
                } else {
                    $result[] = [
                        'field' => $name,
                        'message' => $message,
                        'error_code' => null,
                        'error_params' => null,
                        'type' => 'error'
                    ];
                }
            }
        }
        return $result;
    }


    /**
     * Serializes the validation notices in a model.
     * @param Model $model
     * @return array the array representation of the notices
     */
    protected function serializeModelNotices($model)
    {
        $this->response->setStatusCode(422, 'Data Validation Failed.');
        $result = [];
        $notices = $model->getNotices();
        foreach ($notices as $name => $messages) {
            foreach ($messages AS $message) {
                if (is_array($message)) {
                    $result[] = [
                        'field' => $name,
                        'message' => $message[0],
                        'notice_code' => $message[1],
                        'notice_params' => $message[2],
                        'type' => 'notice'
                    ];
                } else {
                    $result[] = [
                        'field' => $name,
                        'message' => $message,
                        'notice_code' => null,
                        'notice_params' => null,
                        'type' => 'notice'
                    ];
                }
            }
        }

        return $result;
    }

}