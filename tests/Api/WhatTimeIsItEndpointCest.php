<?php


namespace Tests\Api;

use Carbon\Carbon;
use Tests\Support\ApiTester;

class WhatTimeIsItEndpointCest extends AuthenticatedTest
{
    public function _before()
    {
        Carbon::setTestNow('10-01-1990 19:15');
        parent::_before();
    }

    public function TestWhatTimeIsItEndpoint(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->amBearerAuthenticated($this->token);
        $I->sendGet('/whattimeisit');
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"message":"It\'s 45 to 8 pm"}');
    }
}
