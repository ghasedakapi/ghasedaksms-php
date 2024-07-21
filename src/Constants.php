<?php

namespace Ghasedak;

final readonly class Constants
{
    const URL = 'https://Gateway.ghasedak.me/Rest/api/v1/WebService';

    const SEND_SINGLE = '/SendSingleSMS';

    const SEND_BULK = '/SendBulkSMS';

    const SEND_PAIR_TO_PAIR = '/SendPairToPairSMS';

    const SEND_OTP = '/SendOtpSMS';

    const SEND_OTP_WITH_PARAMS = '/SendOtpWithParams';

    const CHECK_SMS_STATUS = '/CheckSmsStatus';

    const GET_ACCOUNT_INFORMATION = '/GetAccountInformation';

    const GET_RECEIVED_SMSES = '/GetReceivedSmses';

    const GET_RECEIVED_SMSES_PAGING = '/GetReceivedSmsesPaging';

    const GET_OTP_TEMPLATE_PARAMETERS = '/GetOtpTemplateParameters';
}