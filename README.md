# Polly (Pollytots)

텍스트를 음성(MP3)으로 변환하고, AWS S3에 저장한 뒤 Twilio를 통해 전화로 재생하는 PHP 프로젝트입니다.

- **AWS Polly**: 텍스트 → 음성(MP3, 한국어 보이스 Seoyeon)
- **AWS S3**: 생성된 MP3 파일 저장 및 공개 URL 제공
- **Twilio**: SMS 발송 및 전화 걸기(음성 파일 재생)

## 요구 사항

- PHP 7.x 이상
- [Composer](https://getcomposer.org/)

## 설치

```bash
composer install
```

필요한 패키지 예시 (직접 설치 시):

- `aws/aws-sdk-php` — AWS Polly, S3 사용
- `twilio/sdk` — Twilio 음성/문자 사용

## 설정

`public/lib/config.php`에서 다음 상수를 설정합니다.

| 상수 | 설명 |
|------|------|
| `ACCESS_KEY_ID` | AWS 액세스 키 ID |
| `SECRET_KEY` | AWS 시크릿 액세스 키 |
| `TWILIO_SID` | Twilio Account SID |
| `TWILIO_TOKEN` | Twilio Auth Token |
| `TWILIO_NUMBER` | 발신용 Twilio 전화번호 |

**보안**: 실제 키/토큰은 버전 관리에 올리지 말고, 환경 변수나 `.env`로 관리하는 것을 권장합니다.

## 사용 방법

### CLI에서 음성 전화 걸기

텍스트를 인자로 넘기면 Polly로 음성 생성 → S3 업로드 → Twilio로 해당 URL 재생 전화를 겁니다.

```bash
php public/TEST.php "전달할 음성 메시지 내용"
```

예:

```bash
php public/TEST.php "주문이 접수되었습니다."
```

## 프로젝트 구조

```
polly/
├── composer.json
├── public/
│   ├── lib/
│   │   └── config.php    # AWS/Twilio 설정
│   └── TEST.php          # CLI: 텍스트 → Polly → S3 → Twilio 통화
├── service/
│   └── Helper/
│       ├── AWS/
│       │   ├── Polly.php # AWS Polly TTS 래퍼
│       │   └── S3.php    # AWS S3 업로드 래퍼
│       └── TWILIO/
│           └── Voice.php # Twilio SMS/통화 래퍼
└── vendor/               # Composer 의존성
```

## Helper 클래스 개요

- **`Helper\AWS\Polly`**: `setTextToPolly($sText)` — 텍스트를 MP3 바이너리로 반환
- **`Helper\AWS\S3`**: `putBucket($sFileName, $sFile, $sMimetype)` — 파일 업로드 후 결과(URL 등) 반환
- **`Helper\TWILIO\Voice`**:
  - `setMessage($sReceiver, $sSender, $sText)` — SMS 발송
  - `setCall($sReceiver, $sSender, $sS3files)` — 전화 걸기 및 S3 URL 음성 재생
