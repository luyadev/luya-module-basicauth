<?php

namespace luya\basicauth\models;

use yii\base\Model;
use luya\basicauth\Module;

/**
 * Basic Auth Form Model.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.1
 */
class BasicAuthForm extends Model
{
    /**
     * @var string The password from module config
     */
    public $password;

    /**
     * @var string The password input from user form.
     */
    public $input;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        parent::init();
        $this->on(self::EVENT_AFTER_VALIDATE, [$this, 'validatePassword']);
    }

    /**
     * {@inheritDoc}
     */
    public function attributeLabels()
    {
        return [
            'input' => Module::t('model_input_label'),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeHints()
    {
        return [
            'input' => Module::t('model_input_hint'),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            ['input', 'required'],
        ];
    }

    /**
     * Validate the input password against the module property password from configuration section.
     *
     * @return void
     */
    public function validatePassword()
    {
        if ($this->password !== $this->input) {
            return $this->addError('input', Module::t('model_input_wrong_password'));
        }
    }
}