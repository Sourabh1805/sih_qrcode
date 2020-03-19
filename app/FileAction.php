<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileAction extends Model
{
  protected $primaryKey = 'File_Action_id';

        protected $fillable =['File_Action_file_id','File_Action_desk_id','File_Action_emp_id','File_Action_remark','File_Action_Start_date','File_Action_end_date','File_Action_next_desk_id','File_Action_no_of_warning','File_Action_status'];
}
