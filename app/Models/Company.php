<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    protected $table = 'companies';
    use HasFactory, SoftDeletes;

    protected $hidden = ['updated_at', 'deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
        'created_by_id',
        'updated_by_id'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }
}
