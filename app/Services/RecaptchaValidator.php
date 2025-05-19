<?php

namespace App\Services;

use Google\Cloud\RecaptchaEnterprise\V1\RecaptchaEnterpriseServiceClient;
use Google\Cloud\RecaptchaEnterprise\V1\Event;

class RecaptchaValidator
{
    public function assert(string $token, string $action): void
    {
        $client  = new RecaptchaEnterpriseServiceClient(['transport' => 'rest']);
        $project = $client->projectName(env('GOOGLE_CLOUD_PROJECT'));

        $event = (new Event())
            ->setSiteKey(env('RECAPTCHA_SITE_KEY'))
            ->setToken($token)
            ->setExpectedAction($action);

        $assessment = $client->createAssessment($project, $event);

        if (
            ! $assessment->getTokenProperties()->getValid() ||
            $assessment->getRiskAnalysis()->getScore() < env('RECAPTCHA_THRESHOLD', 0.5)
        ) {
            abort(403, 'Recaptcha failed.');
        }
    }
}
