<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Manufacturer extends Model
{
    use HasFactory;

    public $table = 'manufacturers';

    public function getImage(){
        if($this->img_path){
            return url('storage/'. $this->img_path);
        }
        return URL::asset('manufacturer/default-manufacturer.png');
    }
}
