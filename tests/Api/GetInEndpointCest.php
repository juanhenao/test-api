<?php


namespace Tests\Api;

use Carbon\Carbon;
use Tests\Support\ApiTester;

class GetInEndpointCest extends AuthenticatedTest
{
    public function _before()
    {
        Carbon::setTestNow('10-01-1990 19:15 CET');
        parent::_before();
    }

    public function testTimeForLondon(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->amBearerAuthenticated($this->token);
        $I->sendGet('/in/london');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"message":"It\'s 45 to 7 pm"}');
    }

}
