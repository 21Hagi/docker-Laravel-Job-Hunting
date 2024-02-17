<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeLicense extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 資格・免許情報を取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getLicenseDataByUserId($userId)
    {
        $licenseData = self::where('user_id', $userId)->first();
        
        return $licenseData;
    }

    /**
     * 資格・免許情報を更新
     *
     * @param [type] $licenseData
     * @param [type] $userId
     * @return void
     */
    public function updateOrCreateLicenseData($licenseData, $userId)
    {
        $transformedData = $this->transformLicenseData($licenseData);

        self::updateOrCreate(
            ['user_id' => $userId], 
            $transformedData
        );
    }

    /**
     * DB更新用に変換
     *
     * @param [type] $licenseData
     * @return void
     */
    private function transformLicenseData($licenseData) {
        $transformedData = [];
        foreach ($licenseData as $key => $value) {
            $transformedData["{$key}_year"] = $value['year'] ?? null;
            $transformedData["{$key}_month"] = $value['month'] ?? null;
            $transformedData["{$key}_license"] = $value['license'] ?? null;
        }

        return $transformedData;
    }
}
