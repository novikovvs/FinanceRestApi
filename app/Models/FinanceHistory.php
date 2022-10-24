<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinanceHistory
 *
 * @property int $id
 * @property string $operation_datetime
 * @property float $amount
 * @property string|null $category
 * @property int|null $MSS
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereMSS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereOperationDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FinanceHistory extends Model
{
    use HasFactory;

    protected $fillable = ['operation_datetime', 'amount', 'category', 'MSS', 'description'];
}
