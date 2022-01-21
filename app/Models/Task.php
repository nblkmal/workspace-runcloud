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
        'due_date',
        'due_time',
        'status',
        'workspace_id',
        'user_id'
    ];

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = Carbon::parse($value);
    }

    public function setDueTimeAttribute($value)
    {
        $this->attributes['due_time'] = Carbon::parse($value);
    }

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
}
