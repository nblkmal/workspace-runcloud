<?php

namespace App\Models;

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
        'due_status',
        'workspace_id',
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }
}
