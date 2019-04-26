<?php

namespace Spatie\SlashCommand;

use Illuminate\Http\Request as IlluminateRequest;

class RequestSignature
{
    const SLACK_REQUEST_VERSION = 'v0';

    public function create(IlluminateRequest $request): string
    {
        return self::SLACK_REQUEST_VERSION
            .'='
            .hash_hmac(
                'sha256',
                $this->createBaseString($request),
                config('laravel-slack-slash-command.signing_secret')
            );
    }

    

    

    
}
