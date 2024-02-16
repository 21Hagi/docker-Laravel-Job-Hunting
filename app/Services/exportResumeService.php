<?php

namespace App\Services;

use setasign\Fpdi\Tcpdf\Fpdi;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use TCPDF_FONTS;
use Illuminate\Support\Facades\File;

class exportResumeService
{
    private $fpdi;
    private $request;
    private $jobHistoryCount;
    private $pdfFont;

    /**
     * コンストラクタ
     */
    public function __construct($request)
    {
        $this->fpdi = new Fpdi();
        $this->request = $request;
        $this->pdfFont = TCPDF_FONTS::addTTFfont('../resources/fonts/msmincho.ttf', 'TrueTypeUnicode');
        $this->initializePdf();
    }

    /**
     * テキスト代入前の準備
     *
     * @return void
     */
    private function initializePdf() {
        $this->fpdi->setSourceFile(public_path('assets/pdf_template/resume_template.pdf'));
        $this->fpdi->setMargins(0, 0, 0);
        $this->fpdi->setCellPadding(0);
        $this->fpdi->setAutoPageBreak(true, 0);
        $this->fpdi->setPrintHeader(false);
        $this->fpdi->setPrintFooter(false);
    }

    /**
     * 出力テキストを設定する
     *
     * @param [type] $size
     * @param [type] $x
     * @param [type] $y
     * @param [type] $text
     * @return void
     */
    private function setText($size, $x, $y, $text)
    {
        $this->fpdi->SetFont($this->pdfFont, '', $size);
        $this->fpdi->Text($x, $y, $text);
    }

    private function setMultiCell($size, $width, $height, $x, $y, $text)
    {
        $this->fpdi->SetFont($this->pdfFont, '', $size);
        $this->fpdi->MultiCell($width, $height, $text, 0, 'L', 0, 0, $x, $y);
    }

    /**
     * 出力画像を設定する
     *
     * @param [type] $image
     * @param [type] $x
     * @param [type] $y
     * @param [type] $size
     * @return void
     */
    private function setImage($image, $x, $y, $w = 0, $h = 0)
    {
        $this->fpdi->Image($image, $x, $y, $w, $h);
    }

    /**
     * テンプレートベースのページを追加する
     */
    private function addPageWithTemplate($pageNum)
    {
        $page = $this->fpdi->importPage($pageNum);
        $this->fpdi->AddPage();
        $this->fpdi->useTemplate($page);
    }

    /**
     * 1ページ目を描画
     *
     * @return void
     */
    private function setFirstPage() 
    {
        $this->addPageWithTemplate(1);
        $this->setCreateDate();
        $this->setFuriganaName();
        $this->setKanjiName();
        $this->setIdPhoto();
        $this->setBirthdayAndAge();
        $this->setGender();
        $this->setFuriganaAddress();
        $this->setPhoneNumber();
        $this->setZipCode();
        $this->setAddress();
        $this->setEmail();
        $this->setFirstPageHistory();
    }

    /**
     * 2ページ目を描画
     *
     * @return void
     */
    private function setSecondPage() 
    {
        $this->addPageWithTemplate(2);
        $this->setSecondPageHistory();
        $this->setLicense();
        $this->setReason();
        $this->setRequests();
    }

    /**
     * 作成日を描画
     *
     * @return void
     */
    private function setCreateDate() 
    {
        $fontSize = 11;
        $y = 31.9;
        
        $createDate = explode('-', $this->request->createDateForm['create_date']);
        $this->setText($fontSize, 90.7, $y, $createDate[0]);
        $this->setText($fontSize, 105.3, $y, $createDate[1]);
        $this->setText($fontSize, 115.7, $y, $createDate[2]);  
    }

    /**
     * 名前(ふりがな)を描画
     *
     * @return void
     */
    private function setFuriganaName() 
    {
        $fontSize = 11;
        $y = 41;
        
        $this->setText($fontSize, 50, $y, $this->request->profileForm['furigana_last_name']);
        $this->setText($fontSize, 77, $y, $this->request->profileForm['furigana_first_name']);
    }

    /**
     * 名前(漢字)を描画
     *
     * @return void
     */
    private function setKanjiName() 
    {
        $fontSize = 19;
        $y = 50.5;
        
        $this->setText($fontSize, 50, $y, $this->request->profileForm['kanji_last_name']);
        $this->setText($fontSize, 77, $y, $this->request->profileForm['kanji_first_name']);
    }

    /**
     * 証明写真を挿入
     *
     * @return void
     */
    private function setIdPhoto() 
    {
        $photo = $this->request->photoForm['photo'];
        $manager = new ImageManager(new Driver());

        if (!empty($photo)) {
            $photo = preg_replace('#^data:image/\w+;base64,#i', '', $photo);
            $photo = str_replace(' ', '+', $photo);
            $image_data = base64_decode($photo);

            $image = $manager->imagick()->read($image_data);
            $image->resize(420, 560);

            $idPhoto_path = 'idPhoto.jpg';
            $image->save($idPhoto_path);

            $this->setImage($idPhoto_path, 144.5, 29.5, 28.5, 38);

            unlink($idPhoto_path);
    
        }
    }

    /**
     * 誕生日と年齢を描画
     *
     * @return void
     */
    private function setBirthdayAndAge() 
    {
        $fontSize = 12;
        $y = 63.3;
        
        $this->setText($fontSize, 39.7, $y, $this->request->profileForm['birth_year']);
        $this->setText($fontSize, 59.3, $y, $this->request->profileForm['birth_month']);
        $this->setText($fontSize, 74.7, $y, $this->request->profileForm['birth_day']);
        $this->setText($fontSize, 95.3, $y, $this->request->profileForm['age']);
    }

    /**
     * 性別を描画
     *
     * @return void
     */
    private function setGender() 
    {
        $genderMapping = [
            '1' => '男',
            '2' => '女',
            '3' => '',
        ];
        $gender = $genderMapping[$this->request->profileForm['gender']] ?? '';

        $this->setText(12.5, 118, 63.5, $gender);
    }

    /**
     * 住所(ふりがな)を描画
     *
     * @return void
     */
    private function setFuriganaAddress() 
    {
        $fontSize = 9;
        $x = 37;
    
        // 住所ふりがな1
        $this->setText($fontSize, $x, 72.4, $this->request->addressForm['address1_furigana']);
               
        // 住所ふりがな2
        $this->setText($fontSize, $x, 98, $this->request->addressForm['address2_furigana']);
    }

    /**
     * 電話番号を描画
     *
     * @return void
     */
    private function setPhoneNumber() 
    {
        $fontSize = 11;
        $x = 162;

        // 電話番号1
        $phoneNumber = $this->request->contactForm['phone_number1'] . '-' . $this->request->contactForm['phone_number2'] . '-' . $this->request->contactForm['phone_number3'];
        if (!empty($this->request->contactForm['phone_number1'])) {
            $this->setText($fontSize, $x, 72, $phoneNumber);
        }

        // // 電話番号2
        $otherPhoneNumber = $this->request->contactForm['other_phone_number1'] . '-' . $this->request->contactForm['other_phone_number2'] . '-' . $this->request->contactForm['other_phone_number3'];
        if (!empty($this->request->contactForm['other_phone_number1'])) {
            $this->setText($fontSize, $x, 97.6, $otherPhoneNumber);
        }
    }

    /**
     * 郵便番号を描画
     *
     * @return void
     */
    private function setZipCode() 
    {
        $fontSize = 11;
        $x = 42.5;

        // 郵便番号1
        $zipCode = substr($this->request->addressForm['zip_code1'], 0, 3) . '-' . substr($this->request->addressForm['zip_code1'], 3);
        if (!empty($this->request->addressForm['zip_code1'])) {
            $this->setText($fontSize, $x, 79.2, $zipCode);
        } 

        // 郵便番号2
        $otherZipCode = substr($this->request->addressForm['zip_code2'], 0, 3) . '-' . substr($this->request->addressForm['zip_code2'], 3);
        if (!empty($this->request->addressForm['zip_code2'])) {
            $this->setText($fontSize, $x, 104.5, $otherZipCode);
        } 
    }

    /**
     * 住所を描画
     *
     * @return void
     */
    private function setAddress() 
    {
        $fontSize = 12.5;
        $x = 26;

        // 住所1
        $this->setText($fontSize, $x, 87, $this->request->addressForm['address1'] . str_repeat(' ', 2) . $this->request->addressForm['building_name1']);

        // 住所2
        $this->setText($fontSize, $x, 112.3, $this->request->addressForm['address2'] . str_repeat(' ', 2) . $this->request->addressForm['building_name2']);
    }

    /**
     * メールアドレスを描画
     *
     * @return void
     */
    private function setEmail() 
    {
        $fontSize = 11;
        $x = 155;

        // メールアドレス1
        $email = explode('@', $this->request->contactForm['email']);
        if (!empty($this->request->contactForm['email'])) { 
            $this->setText($fontSize, $x, 84, $email[0]); 
            $this->setText($fontSize, $x, 89, '@' . $email[1]);
        }

        // メールアドレス2
        $otherEmail = explode('@', $this->request->contactForm['other_email']);
        if (!empty($this->request->contactForm['other_email'])) {
            $this->setText($fontSize, $x, 109.3, $otherEmail[0]);
            $this->setText($fontSize, $x, 114.3, '@' . $otherEmail[1]); 
        }
    }

    /**
     * 1ページ目の学歴・職歴を描画
     *
     * @return void
     */
    private function setFirstPageHistory()
    {
        $fontSize = 11.5;
        $yearX = 24;
        $monthX = 40.6;
        $historyX = 50;
        $y = 142.7;
        $lineCount = 1;

        // 1行目
        $this->setText($fontSize, 110, 134.3, '学 歴');

        if (!empty($this->request->eduHistoryForm['edu_history1']['history'])) {
            // 2行目以降(学歴)
            foreach ($this->request->eduHistoryForm as $eduHistory) {
                if (empty($eduHistory['history'])) break;

                $this->setText($fontSize, $yearX, $y, $eduHistory['year']);
                $this->setText($fontSize, $monthX, $y, $eduHistory['month']);
                $this->setText($fontSize, $historyX, $y, $eduHistory['history']);
                $lineCount++;
                $y += 8.5;
            }
        }

        if (!empty($this->request->jobHistoryForm['job_history1']['history'])) {
            // 空白行、職歴行挿入
            $this->setText($fontSize, 110, $y, '');
            $y += 8.5;
            $this->setText($fontSize, 110, $y, '職 歴');
            $y += 8.5;
            $lineCount += 2;

            // 職歴
            $this->jobHistoryCount = 0;
            foreach ($this->request->jobHistoryForm as $jobHistory) {
                if (empty($jobHistory['history']) || $lineCount == 16) break;

                $this->setText($fontSize, $yearX, $y, $jobHistory['year']);
                $this->setText($fontSize, $monthX, $y, $jobHistory['month']);
                $this->setText($fontSize, $historyX, $y, $jobHistory['history']);
                $lineCount++;
                $y += 8.5;
                $this->jobHistoryCount++;
            }
        }

        if ($lineCount < 16) {
            $this->setText(11, 180, $y, '以上');
        }
    }

    /**
     * 2ページ目の職歴を描画
     *
     * @return void
     */
    private function setSecondPageHistory()
    {
        $fontSize = 11.5;
        $yearX = 27;
        $monthX = 43.5;
        $historyX = 53;
        $y = 38;

        $jobHistorySecondPage = array_slice($this->request->jobHistoryForm, $this->jobHistoryCount);

        if (empty(reset($jobHistorySecondPage)['history'])) return false;

        foreach ($jobHistorySecondPage as $jobHistory) {
            if (empty($jobHistory['history'])) break;

            $this->setText($fontSize, $yearX, $y, $jobHistory['year']);
            $this->setText($fontSize, $monthX, $y, $jobHistory['month']);
            $this->setText($fontSize, $historyX, $y, $jobHistory['history']);
            $y += 8.5;
        }

        $this->setText(11, 180, $y, '以上');
    }

    /**
     * 資格・免許を描画
     *
     * @return void
     */
    private function setLicense()
    {
        $fontSize = 12;
        $yearX = 27;
        $monthX = 43.5;
        $historyX = 53;
        $y = 131.5;

        foreach ($this->request->licenseForm as $license) {
            $this->setText($fontSize, $yearX, $y, $license['year']);
            $this->setText($fontSize, $monthX, $y, $license['month']);
            $this->setText($fontSize, $historyX, $y, $license['license']);
            $y += 8.5;
        }
    }

    private function setReason()
    {
        $fontSize = 11.2;
        $width = 167;
        $height = 0;
        $x = 24.3;
        $y = 178.3;

        $reason = "\xE3\x80\x80" . $this->request->reasonForm['reason'];
        $this->setMultiCell($fontSize, $width, $height, $x, $y, $reason);
    }

    private function setRequests()
    {
        $fontSize = 11.2;
        $width = 167;
        $height = 0;
        $x = 24.3;
        $y = 230;

        $reason = "\xE3\x80\x80" . $this->request->requestsForm['requests'];
        $this->setMultiCell($fontSize, $width, $height, $x, $y, $reason);
    }

    /**
     * pdfを出力
     *
     * @return void
     */
    public function exportResume() 
    {
        $this->setFirstPage();
        $this->setSecondPage();

        $fileName = auth()->id() . '_resume.pdf';

        $directoryPath = storage_path('app/private');
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0775, true);
        }

        $path = storage_path('app/private/' . $fileName);
        $this->fpdi->output($path, 'F');
    
        return $fileName;
    }
}