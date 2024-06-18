<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'status_pekerjaan';
    protected $primaryKey = 'id_status';
    protected $fillable = ['nama_status'];
}

