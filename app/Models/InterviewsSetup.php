<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewsSetup extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 面接設定情報を取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getSetupByUserId($userId)
    {
        $setup = self::where('user_id', $userId)->first();

        return $setup;
    }

    /**
     * 面接設定の作成・更新を行う
     *
     * @param [type] $request
     * @param [type] $userId
     * @return void
     */
    public function updateOrCreateSetupByUserId($request, $userId)
    {
        $setupData = $request->interviewSetupAttributes();  

        self::updateOrCreate(
            ['user_id' => $userId], 
            $setupData
        );
    }
}
