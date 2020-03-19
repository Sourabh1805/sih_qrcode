<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefMessage extends Model
{
  protected $primaryKey = 'Def_Messages_id';
  protected $fillable =['Def_Messages_title','Def_Messages_text'];
}
