<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'instituition_id', 'user_id', 'instituiton_id'];

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function instituition() {
        return $this->belongsTo(Instituition::class);
    }

}
