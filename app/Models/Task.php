<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'task_due',
        'task_complete',
        'status',
        'workspace_id',
        'user_id'
    ];

    protected $casts = [
        'task_due' => 'immutable_datetime',
        'task_complete' => 'immutable_datetime',
    ];

    public function scopeIncomplete($query)
    {
        return $query->where('status', false);
    }

    public function scopeComplete($query)
    {
        return $query->where('status', true);
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getNameAttribute()
    {
        return ucfirst($this->attributes['name']);
    }
}
