<?php


namespace App\Http\Traits;


trait LogActivityTrait
{

    /**
     * @param $model_you_make_action
     * @param $user_model
     * @param $desc
     *
     * You can record all logs activities
     *
     */
    public function add_log_activity($model_you_make_action,$user_model,$desc)
    {
        if($model_you_make_action == null){
            activity()
                ->causedBy($user_model)
                ->log($desc);
        }else{
            activity()
                ->performedOn($model_you_make_action)
                ->causedBy($user_model)
                ->log($desc);
        }

    }//end fun


}//end trait
