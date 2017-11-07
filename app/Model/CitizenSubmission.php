<?php

namespace App\Model;

use App\Helper\ParentModel as Model;

class CitizenSubmission extends Model
{
    protected $table = 'citizensubmission';
    protected $fillable = ['citizen_id', 'sertificate_id'];

    public function citizen () {
        return parent::belongsTo('App\Model\Citizen', 'citizen_id', 'id');
    }

    public function sertificate () {
        return parent::belongsTo('App\Model\Sertificate', 'sertificate_id', 'id');
    }

}
