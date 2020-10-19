<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;
    protected $with = ['user'];
    protected $appends = ['preview'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'details',
        'user_id',
        'project_id',
        'completed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getPreviewAttribute(){
        return Str::limit(strip_tags($this->details),25,'...');
    }
}
