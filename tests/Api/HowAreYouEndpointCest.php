<?php


namespace Tests\Api;

use Tests\Support\ApiTester;

class HowAreYouEndpointCest extends AuthenticatedTest
{
    public function tryToTest(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->amBearerAuthenticated($this->token);
        $I->sendGet('/howareyou');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"message":"I\'m fine"}');
    }
}
