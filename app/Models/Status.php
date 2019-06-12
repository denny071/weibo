<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 微博
 *
 * Class Status
 * @package App\Models
 */
class Status extends Model
{
    //批量填充字段
    protected $fillable = ['content'];

    /**
     * 关联用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
