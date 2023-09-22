<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'projects_id'];

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
