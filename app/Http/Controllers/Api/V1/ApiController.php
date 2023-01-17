<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Response;

;

class ApiController extends Controller
{
    /**
    * PHPUnit - Test
    * - wenn bekannt Test mit Codeception
    *
    *
    * Fleiﬂaufgaben
    *
    * - Authentifizeriung
    * - HTTP Basic Auth oder Token
     */

    public function hello(): array {
        return ["message" => "hello"];
    }

    public function howAreYou(): array {
        return ["message" => "I'm fine"];
    }

    public function whatTimeIsIt(): array {
        return ["message" => $this->formatTime(Carbon::now())];
    }

    public function getCurrentTimeInLondon(): array {
        $time = $this->formatTime(Carbon::now('Europe/London'));
        return ["message" => $time];
    }

    public function getCurrentTimeZone() {
        return ['message' => date_default_timezone_get()];
    }

    public function getTimeinSpecificTimeZone(Request $request): Response
    {

        $requestContent = json_decode($request->getContent(), true);

        if($requestContent === null || isset($requestContent["city"]) === false) {
            return response(["error" => "Bad request"], 400);
        }

        try {
            $time = $this->formatTime(Carbon::now($requestContent["city"]));
        } catch (\Exception $e) {
            return response([
                "error" => "Timezone could not be resolved"
            ], 400);
        }

        return response(["message" => $time]);
    }

    private function formatTime(Carbon $time): string {
        $timePlusOneHour = $time->addHour();

        $nextHour = $timePlusOneHour->hour%12;
        $nextHour = $nextHour === 0? 12: $nextHour;
        $meridiem = $timePlusOneHour->latinMeridiem;

        $missingMinutes = 60 - $time->minute;

        return "It's " . $missingMinutes . " to " . $nextHour . " " . $meridiem;
    }

}
