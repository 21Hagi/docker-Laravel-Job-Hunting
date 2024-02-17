<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeEduHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 学歴情報を取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getEduHistoryDataByUserId($userId)
    {
        $eduHistoryData = self::where('user_id', $userId)->first();
        
        return $eduHistoryData;
    }

    /**
     * 学歴情報を更新
     *
     * @param [type] $eduHistoryData
     * @param [type] $userId
     * @return void
     */
    public function updateOrCreateEduHistoryData($eduHistoryData, $userId)
    {
        $transformedData = $this->transformEduHistoryData($eduHistoryData);

        self::updateOrCreate(
            ['user_id' => $userId], 
            $transformedData
        );
    }

    /**
     * 学歴情報をDB用に変換
     *
     * @param [type] $eduHistoryData
     * @return void
     */
    private function transformEduHistoryData($eduHistoryData) {
        $transformedData = [];
        foreach ($eduHistoryData as $key => $value) {
            $transformedData["{$key}_year"] = $value['year'] ?? null;
            $transformedData["{$key}_month"] = $value['month'] ?? null;
            $transformedData["{$key}_history"] = $value['history'] ?? null;
        }

        return $transformedData;
    }
}
