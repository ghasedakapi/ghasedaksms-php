<p align="center">  
  <a href="https://github.com/ghasedakapi/ghasedaksms-php">  
    <img src="https://raw.githubusercontent.com/ghasedakapi/ghasedak-php/master/g4php.png" alt="Logo" height="200" alt="ghasedak for php">  
  </a>  
  
  <h3 align="center">Ghasedak PHP SDK</h3>  
  
  <p align="center">  
    Easy-to-use SDK for implementing Ghasedak SMS API in your PHP projects.  
    <br />  
    <a href="https://ghasedak.me/php"><strong>Explore the docs »</strong></a>  
    <br />  
    <br />  
    <a href="https://ghasedak.me/developers">Web Service Documents</a>  
    ·  
    <a href="https://ghasedak.me/docs">REST API</a>  
    .  
    <a href="https://github.com/ghasedakapi/ghasedaksms-php/issues">Report Bug</a>  
    ·  
    <a href="https://github.com/ghasedakapi/ghasedaksms-php/issues">Request Feature</a>  
  </p>  
</p>  

<br>  
<p align="center">
	<a href="https://github.com/ghasedakapi/ghasedaksms-php/graphs/contributors"><img src="https://img.shields.io/github/contributors/ghasedakapi/ghasedaksms-php.svg" alt="contributors"></a>
	<a href="https://github.com/ghasedakapi/ghasedaksms-php/network/members"><img src="https://img.shields.io/github/forks/ghasedakapi/ghasedaksms-php.svg" alt="forks"></a>
	<a href="https://github.com/ghasedakapi/ghasedaksms-php/stargazers"><img src="https://img.shields.io/github/stars/ghasedakapi/ghasedaksms-php.svg" alt="stars"></a>
	<a href="https://github.com/ghasedakapi/ghasedaksms-php/issues"><img src="https://img.shields.io/github/issues/ghasedakapi/ghasedaksms-php.svg" alt="issues"></a>
	<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="license"></a>
</p>

<p align="center">  
    <a href="#table-of-contents">English Document</a>
</p>  

## Table of Contents  
  
* [Install](#install)
* [Usage](#usage)   
  * [Send Single](#send-single)
  * [Send Bulk](#send-bulk)
  * [Send Pair To Pair](#send-pair-to-pair)
  * [Send OTP](#send-otp)
  * [Send OTP With Params](#send-otp-with-params)
  * [Check SMS Status](#check-sms-status)
  * [Get Account Information](#get-account-information)
  * [Get Received SMSes](#get-received-smses)
  * [Get Received SMSes Pagination](#get-received-smses-pagination)
  * [Get OTP Template Parameters](#get-otp-template-parameters)
* [Licence](#license)


## Install  
  
The easiest way to install is by using [Composer](https://getcomposer.org/):  
  
```sh  
composer require ghasedaksms/php  
```

Composer is a dependency manager for PHP which allows you to declare the libraries your project depends on, and it will manage (install/update) them for you.  If you are not familiar with Composer, you can read its documentations and download it via [getcomposer.org](https://getcomposer.org/).

Alternatively you can download Ghasedak SDK from [here](https://github.com/ghasedakapi/ghasedaksms-php/archive/master.zip) and extract it in your project and follow the rest of the instructions below. Also there is an `Example` folder inside the package which you can use to understand the procedure.

## Usage  
    
To use the API, you need an API key. To get that you should have a [Ghasedak](https://ghasedak.me) account. Register and get your API key.  
  
Then require the file autoload.php to get all classes and dependencies loaded.  
```php  
require __DIR__ . '/vendor/autoload.php';
```

Create an instance from Ghasedak class with your API key:  
  
```php
$ghasedaksms = new GhasedaksmsApi('your_api_key');
```
Don't forget to change `your_api_key` with the key you have got from your Ghasedak account.

## Send Single

```php
$sendDate = new DateTimeImmutable('now');
$lineNumber = '3000****';
$receptor = '0912*******';
$message = 'test';
try {
    $response = $ghasedaksms->sendSingle(new SingleMessageDTO(
        sendDate: $sendDate,
        lineNumber: $lineNumber,
        receptor: $receptor,
        message: $message
    ));
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Send Bulk

```php
$sendDate = new DateTimeImmutable('now');
$lineNumber = '3000****';
$receptor = ['0912*******','0919*******'];
$message = 'test';
try {
    $response = $ghasedaksms->sendBulk(new BulkMessageDTO(
        sendDate: $sendDate,
        lineNumber: $lineNumber,
        receptors: $receptor,
        message: $message
    ));
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Send Pair To Pair

```php
$sendDate = new DateTimeImmutable('now');
$lineNumber = '3000****';
$receptor1 = '0912*******';
$receptor2 = '0912*******';
$message1 = 'test1';
$message2 = 'test2';
try {
    $response = $ghasedaksms->sendPairToPair(new PairToPairMessageDTO(
        [
            new SingleMessageDTO(
                sendDate: $sendDate,
                lineNumber: $lineNumber,
                receptor: $receptor1,
                message: $message1
            ),
            new SingleMessageDTO(
                sendDate: $sendDate,
                lineNumber: $lineNumber,
                receptor: $receptor2,
                message: $message2
            )
        ]
    ));
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Send OTP

```php
$sendDate = new DateTimeImmutable('now');
try {
    $response = $ghasedaksms->sendOtp(new OtpMessageDTO(
        sendDate: $sendDate,
        receptors: [
            new ReceptorDTO(
                mobile: '0912*******',
                clientReferenceId: '1'
            )
        ],
        templateName: 'newOtp',
        inputs: [
            new InputDTO(
                param: 'Code',
                value: 'value'
            ),
            new InputDTO(
                param: 'Name',
                value: 'value'
            )
        ]
    ));
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Send OTP With Params

```php
$sendDate = new DateTimeImmutable('now');
try {
    $response = $ghasedaksms->sendOtpWithParams(new OtpMessageWithParamsDTO(
        sendDate: $sendDate,
        receptors: [
            new ReceptorDTO(
                mobile: '0912*******',
                clientReferenceId: '1'
            )
        ],
        templateName: 'newOtp',
        param1: 'param1',
        param2: 'param2'
    ));
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Check SMS Status

```php
try {
    $response = $ghasedaksms->checkSmsStatus(new CheckSmsStatusDTO(
        ids: ['246*****'],
        type: 1
    ));
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Get Account Information

```php
try {
    $response = $ghasedaksms->getAccountInformation();
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Get Received SMSes
```php
try {
    $response = $ghasedaksms->getReceivedSMSes(
        new GetReceivedSMSesDTO(
            lineNumber: '3000****'
        )
    );
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Get Received SMSes Pagination
```php
$startDate = new DateTimeImmutable('now');
$endDate = $startDate->modify('+3 days');
try {
    $response = $ghasedaksms->getReceivedSMSesPaging(
        new GetReceivedSMSesPagingDTO(
            lineNumber: '3000****',
            startDate: $startDate,
            endDate: $endDate,
            pageIndex: 0,
            pageSize: 10
        )
    );
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```

## Get OTP Template Parameters
```php
try {
    $response = $ghasedaksms->getOtpTemplateParameters(
        new GetOtpTemplateParametersDTO(
            templateName: 'newOtp'
        )
    );
    var_dump($response);
} catch (Exceptions\GhasedakSMSException $e) {
    var_dump($e->getMessage());
}
```


## License  
Freely distributable under the terms of the MIT license.







