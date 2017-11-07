<?php

namespace App\Model;

use App\Helper\ParentModel as Model;

class Sertificate extends Model
{
    protected $table = 'sertificate';
    protected $fillable = ['type', 'termcondition'];
}
