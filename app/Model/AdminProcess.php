<?php

namespace App\Model;

use App\Helper\ParentModel as Model;

class AdminProcess extends Model
{
    protected $table = 'adminprocess';
    protected $fillable = ['admin_id', 'citizensubmission_id', 'comment', 'retrievaldate', 'status'];

    public function admin () {
        return parent::belongsTo('App\Model\Admin', 'admin_id', 'id');
    }

    public function citizensubmission() {
        return parent::belongsTo('App\Model\CitizenSubmission', 'citizensubmission_id', 'id');
    }
}
