<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeProfile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 基本情報を取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getProfileDataByUserId($userId)
    {
        $profileData = self::where('user_id', $userId)->first();
        
        return $profileData;
    }

    /**
     * 基本情報を更新
     *
     * @param [type] $profileData
     * @param [type] $userId
     * @return void
     */
    public function updateOrCreateProfileData($profileData, $userId)
    {
        self::updateOrCreate(
            ['user_id' => $userId], 
            $profileData
        );
    }
}
