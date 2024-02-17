<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeJobHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 職歴情報を取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getJobHistoryDataByUserId($userId)
    {
        $jobHistoryData = self::where('user_id', $userId)->first();
        
        return $jobHistoryData;
    }

    /**
     * 職歴情報を更新
     *
     * @param [type] $jobHistoryData
     * @param [type] $userId
     * @return void
     */
    public function updateOrCreateJobHistoryData($jobHistoryData, $userId)
    {
        $transformedData = $this->transformJobHistoryData($jobHistoryData);

        self::updateOrCreate(
            ['user_id' => $userId], 
            $transformedData
        );
    }

    /**
     * 職歴情報をDB用に変換
     *
     * @param [type] $jobHistoryData
     * @return void
     */
    private function transformJobHistoryData($jobHistoryData) {
        $transformedData = [];
        foreach ($jobHistoryData as $key => $value) {
            $transformedData["{$key}_year"] = $value['year'] ?? null;
            $transformedData["{$key}_month"] = $value['month'] ?? null;
            $transformedData["{$key}_history"] = $value['history'] ?? null;
        }

        return $transformedData;
    }
}
