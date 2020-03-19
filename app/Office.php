<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
  protected $primaryKey = 'Office_id';
  protected $fillable =['Office_name','Office_country','Office_state','Office_district','Office_city','Office_initial','Office_status'];
}
