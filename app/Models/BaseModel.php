<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * 全てのModelの基底クラス
 *
 * @package App\Models
 * @property int id
 * @property Carbon created_at
 * @property Carbon updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    // insert, updateで勝手に値を入れない指定
    protected $guarded = ['id'];

    // 意図的にCarbonインスタンスに変更
    protected $dates =['created_at', 'updated_at'];
}
