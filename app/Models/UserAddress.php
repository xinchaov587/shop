<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    /**
     * 模型可写入字段
     *
     * @var array
     */
    protected $fillable = [
        'province',
        'city',
        'district',
        'address',
        'zip',
        'contact_name',
        'contact_phone',
        'last_used_at',
    ];

    /**
     * 表示 last_used_at 字段是一个时间日期类型，在之后的代码中 $address->last_used_at 返回的就是一个时间日期对象
     *
     * @var array
     */
    protected $dates = ['last_used_at'];

    /**
     * 一对多反向关联用户表
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 将数据库中的 省 市 区 详细地址 字段拼接成完整的地址 并将其返回 可以使用 $address->full_address 来获取完整的地址，而不用每次都去拼接。
     *
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}
