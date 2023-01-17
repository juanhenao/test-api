<?php


namespace Tests\Api;

use Tests\Support\ApiTester;

class GreetEndpointCest extends AuthenticatedTest
{
    public function testGreetEndpoint(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->amBearerAuthenticated($this->token);
        $I->sendGet('/hello');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"message":"hello"}');

    }
}
