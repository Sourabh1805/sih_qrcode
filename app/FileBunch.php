<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileBunch extends Model
{
  protected $primaryKey = 'File_Bunch_id';
  protected $fillable =['File_Bunch_office_id','File_Bunch_department_id','File_Bunch_title','File_Bunch_year'];
}
