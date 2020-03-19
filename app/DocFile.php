<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocFile extends Model
{
  protected $primaryKey = 'Doc_File_id';
  protected $fillable =['Doc_File_QR_id','Doc_File_initiator_id','Doc_File_title','Doc_File_office_id','Doc_File_department_id','Doc_File_subject','Doc_File_remark','Doc_File_start_date','Doc_File_task_id','Doc_File_end_date','Doc_File_priority','Doc_File_status','Doc_File_rack_id','Doc_File_bunch_id'];
}
