<?php
/*
| Author : Ata amini
| Email  : ata.aminie@gmail.com
| Date   : 2019-11-19
| TIME   : 12:40 PM
*/

namespace backend\modules\v1\modules\thesis\components;





/**
 * Class CompletionOfYearProcessCheckStudyAndTermsValidator
 * @package whc\student\modules\v1\modules\student\modules\committee\components\validators
 */
class CompletionOfYearProcessCheckStudyAndTermsValidator extends \yii\validators\Validator
{
    /**
     * Is student in conditional status and max years is spend.
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        print_r( debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
       exit('ddd');
    }
}
