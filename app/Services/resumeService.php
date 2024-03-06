<?php

namespace App\Services;

use App\Models\ResumeAddress;
use App\Models\ResumeContact;
use App\Models\ResumePhoto;
use App\Models\ResumeEduHistory;
use App\Models\ResumeJobHistory;
use App\Models\ResumeLicense;
use App\Models\ResumeProfile;

class resumeService
{
    public function __construct()
    {
        $this->resumeProfile = new ResumeProfile();
        $this->resumeAddress = new ResumeAddress();
        $this->resumeContact = new ResumeContact();
        $this->resumePhoto = new ResumePhoto();
        $this->resumeEduHistory = new ResumeEduHistory();
        $this->resumeJobHistory = new ResumeJobHistory();
        $this->resumeLicense = new ResumeLicense(); 
    }

    public function getResumeDataByUserId($userId)
    {
        return [
            'profileData' => $this->resumeProfile->getProfileDataByUserId($userId),
            'addressData' => $this->resumeAddress->getAddressDataByUserId($userId),
            'contactData' => $this->resumeContact->getContactDataByUserId($userId),
            'photoData' => $this->resumePhoto->getPhotoDataByUserId($userId),
            'eduHistoryData' => $this->resumeEduHistory->getEduHistoryDataByUserId($userId),
            'jobHistoryData' => $this->resumeJobHistory->getJobHistoryDataByUserId($userId),
            'licenseData' => $this->resumeLicense->getLicenseDataByUserId($userId),           
        ];
    }

    /**
     * 履歴書のデータを更新
     *
     * @param [type] $request
     * @return void
     */
    public function updateOrCreateResumeData($request, $userId)
    {
        $this->resumeProfile->updateOrCreateProfileData($request->profileForm, $userId);
        $this->resumeAddress->updateOrCreateAddressData($request->addressForm, $userId);
        $this->resumeContact->updateOrCreateContactData($request->contactForm, $userId);
        $this->resumePhoto->updateOrCreatePhotoData($request->photoForm, $userId);
        $this->resumeEduHistory->updateOrCreateEduHistoryData($request->eduHistoryForm, $userId);
        $this->resumeJobHistory->updateOrCreateJobHistoryData($request->jobHistoryForm, $userId);
        $this->resumeLicense->updateOrCreateLicenseData($request->licenseForm, $userId);
    }
}