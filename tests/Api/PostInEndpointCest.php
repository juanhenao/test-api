<?php


namespace Tests\Api;

use Carbon\Carbon;
use Tests\Support\ApiTester;

class PostInEndpointCest extends AuthenticatedTest
{
    public function _before()
    {
        Carbon::setTestNow('10-01-1990 19:15 CET');
        parent::_before();

    }

    public function testPostInEndpoint(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->amBearerAuthenticated($this->token);
        $I->haveHttpHeader('content-type', 'application/json');
        $I->sendPost('/in', ['city' => 'America/Bogota']);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"message":"It\'s 45 to 2 pm"}');
    }
}
