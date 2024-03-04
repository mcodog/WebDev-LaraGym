<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Equipment extends Model
{
    use HasFactory;

    public $table = 'equipments';

    public function getImage(){
        if($this->img_path){
            return url('storage/'. $this->img_path);
        }
        return URL::asset('equipments/default-equipments.png');
    }
}
