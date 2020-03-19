<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiator extends Model
{
  protected $primaryKey = 'Initiator_id';
protected $fillable =['Initiator_mobile_number','Initiator_password','Initiator_email_id','Initiator_name','Initiator_gender','Initiator_address','Initiator_city','Initiator_pincode','Initiator_status'];
}
