<?php


namespace Tests\Api;

use Tests\Support\ApiTester;

class GetInTimezoneEndpointCest extends AuthenticatedTest
{

    public function tryToTest(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->amBearerAuthenticated($this->token);
        $I->sendGet('/in');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"message":"Europe\/Berlin');
    }
}
