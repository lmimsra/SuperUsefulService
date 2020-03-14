<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Thread
 *
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread query()
 * @mixin \Eloquent
 */
class Thread extends BaseModel
{
    /**
     * スレッドに紐づくpostを全権取得
     * TODO ページングできるようにしたいな
     * @return HasMany
     */
    public function getPostList(): HasMany
    {
        return $this->hasMany(Post::class, 'thread_id', 'id')
            ->orderBy('created_at');
    }
}
