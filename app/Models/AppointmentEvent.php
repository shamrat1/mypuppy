<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentEvent extends Model
{
    use HasFactory;
    protected $table = 'appointment_events';
    protected $fillable = ['id','user_id','event_date','event_title','created_at','updated_at'];
}
