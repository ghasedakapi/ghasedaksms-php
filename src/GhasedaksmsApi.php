<?php

namespace Ghasedak;

use Ghasedak\DataTransferObjects\Response\ReceivedSmsPagingResponseDTO;
use Ghasedak\Exceptions\GhasedakSMSException;
use Ghasedak\Enums\RequestMethod;
use Ghasedak\DataTransferObjects\Request\BulkMessageDTO;
use Ghasedak\DataTransferObjects\Request\CheckSmsStatusDTO;
use Ghasedak\DataTransferObjects\Request\GetOtpTemplateParametersDTO;
use Ghasedak\DataTransferObjects\Request\GetReceivedSMSesDTO;
use Ghasedak\DataTransferObjects\Request\GetReceivedSMSesPagingDTO;
use Ghasedak\DataTransferObjects\Request\OtpMessageDTO;
use Ghasedak\DataTransferObjects\Request\OtpMessageWithParamsDTO;
use Ghasedak\DataTransferObjects\Request\PairToPairMessageDTO;
use Ghasedak\DataTransferObjects\Request\SingleMessageDTO;
use Ghasedak\DataTransferObjects\Response\AccountInformationResponseDTO;
use Ghasedak\DataTransferObjects\Response\BulkMessageResponseDTO;
use Ghasedak\DataTransferObjects\Response\CheckSmsStatusResponseDTO;
use Ghasedak\DataTransferObjects\Response\OtpMessageResponseDTO;
use Ghasedak\DataTransferObjects\Response\OtpTemplateResponseDTO;
use Ghasedak\DataTransferObjects\Response\PairToPairMessageResponseDTO;
use Ghasedak\DataTransferObjects\Response\ReceivedSmsResponseDTO;
use Ghasedak\DataTransferObjects\Response\SingleMessageResponseDTO;

class GhasedaksmsApi
{
    protected string $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    /**
     * @throws GhasedakSMSException
     */
    public function sendSingle(SingleMessageDTO $singleMessageDTO): SingleMessageResponseDTO
    {
        $response = $this->sendRequest(service: Constants::SEND_SINGLE, params: $singleMessageDTO->toArray());

        return SingleMessageResponseDTO::fromResponse($response['data']);
    }

    /**
     * @param array<string,mixed> $params
     * @throws GhasedakSMSException
     */
    private function sendRequest(string $service, array $params = [], RequestMethod $method = RequestMethod::POST): mixed
    {
        $curl = curl_init();

        $requestData = json_encode($params);
        curl_setopt($curl, CURLOPT_URL, Constants::URL . $service);
        if ($method === RequestMethod::GET) {
            $requestData = http_build_query($params);
            curl_setopt($curl, CURLOPT_URL, Constants::URL . $service . '?' . $requestData);
        }

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => $method->value,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS => $requestData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'ApiKey: ' . $this->apikey,
                'Agent: Php'
            ),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new GhasedakSMSException(curl_error($curl),curl_errno($curl));
        }

        $response = json_decode($response, true);

        if (!$response['isSuccess'] || $response['data'] === null) {
            throw new GhasedakSMSException($response['message'], $response['statusCode']);
        }

        return $response;
    }

    /**
     * @throws GhasedakSMSException
     */
    public function sendBulk(BulkMessageDTO $bulkMessageDTO): BulkMessageResponseDTO
    {
        $response = $this->sendRequest(Constants::SEND_BULK, $bulkMessageDTO->toArray());

        return BulkMessageResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */
    public function sendPairToPair(PairToPairMessageDTO $pairToPairMessageDTO): PairToPairMessageResponseDTO
    {
        $response = $this->sendRequest(Constants::SEND_PAIR_TO_PAIR, $pairToPairMessageDTO->toArray());

        return PairToPairMessageResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */
    public function sendOtp(OtpMessageDTO $otpMessageDTO): OtpMessageResponseDTO
    {
        $response = $this->sendRequest(Constants::SEND_OTP, $otpMessageDTO->toArray());

        return OtpMessageResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */
    public function sendOtpWithParams(OtpMessageWithParamsDTO $otpMessageWithParamsDTO): OtpMessageResponseDTO
    {
        $response = $this->sendRequest(Constants::SEND_OTP_WITH_PARAMS, $otpMessageWithParamsDTO->toArray());

        return OtpMessageResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */

    public function checkSmsStatus(CheckSmsStatusDTO $checkSmsStatusDTO): CheckSmsStatusResponseDTO
    {
        $response = $this->sendRequest(Constants::CHECK_SMS_STATUS, $checkSmsStatusDTO->toArray(), method: RequestMethod::GET);


        return CheckSmsStatusResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */
    public function getAccountInformation(): AccountInformationResponseDTO
    {
        $response = $this->sendRequest(Constants::GET_ACCOUNT_INFORMATION, method: RequestMethod::GET);

        return AccountInformationResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */
    public function getReceivedSMSes(GetReceivedSMSesDTO $getReceivedSMSesDTO): ReceivedSmsResponseDTO
    {
        $response = $this->sendRequest(Constants::GET_RECEIVED_SMSES, $getReceivedSMSesDTO->toArray(), RequestMethod::GET);

        return ReceivedSmsResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */
    public function getReceivedSMSesPaging(GetReceivedSMSesPagingDTO $getReceivedSMSesPagingDTO): ReceivedSmsPagingResponseDTO
    {
        $response = $this->sendRequest(Constants::GET_RECEIVED_SMSES_PAGING, $getReceivedSMSesPagingDTO->toArray(), RequestMethod::GET);

        return ReceivedSmsPagingResponseDTO::fromResponse($response['data']);
    }

    /**
     * @throws GhasedakSMSException
     */
    public function getOtpTemplateParameters(GetOtpTemplateParametersDTO $getOtpTemplateParametersDTO): OtpTemplateResponseDTO
    {
        $response = $this->sendRequest(Constants::GET_OTP_TEMPLATE_PARAMETERS, $getOtpTemplateParametersDTO->toArray(), RequestMethod::GET);

        return OtpTemplateResponseDTO::fromResponse($response['data']);
    }
}