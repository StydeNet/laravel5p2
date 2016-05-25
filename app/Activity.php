<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public static function record($action, Model $model = null)
    {
        if ($model instanceof Activity || auth()->guest()) {
            return null;
        }

        $activity = new Activity();
        $activity->action = $action;

        if ($model) {
            $activity->model_class = get_class($model);
            $activity->model_id = $model->id;
        }

        auth()->user()->activities()->save($activity);
    }
}
