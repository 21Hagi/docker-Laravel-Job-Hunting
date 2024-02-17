<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeAddress extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 住所情報を取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getAddressDataByUserId($userId)
    {
        $addressData = self::where('user_id', $userId)->first();
        
        return $addressData;
    }

    /**
     * 住所情報を更新
     *
     * @param [type] $addressData
     * @param [type] $userId
     * @return void
     */
    public function updateOrCreateAddressData($addressData, $userId)
    {
        self::updateOrCreate(
            ['user_id' => $userId], 
            $addressData
        );
    }
}
