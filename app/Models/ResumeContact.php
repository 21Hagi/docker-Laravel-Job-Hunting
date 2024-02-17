<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeContact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 連絡先情報を取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getContactDataByUserId($userId)
    {
        $contactData = self::where('user_id', $userId)->first();
        
        return $contactData;
    }

    /**
     * 連絡先情報を更新
     *
     * @param [type] $contactData
     * @param [type] $userId
     * @return void
     */
    public function updateOrCreateContactData($contactData, $userId)
    {
        self::updateOrCreate(
            ['user_id' => $userId], 
            $contactData
        );
    }
}
