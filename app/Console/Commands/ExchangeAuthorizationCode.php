<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExchangeAuthorizationCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth:exchange_code {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extracts the authorization code and gets the access tokens';

    /**
     * Execute the console command.
     *
     * @todo post to token endpoint and dump the access token
     * @example samaya://com.samaya?code=test&state=great => ['code' => 'test', 'state' => 'great']
     */
    public function handle()
    {
	$auth_code = [];
	$url = $this->argument('url');
	$query = parse_url($url);
	if(!$query) {
	    $this->error('malformed url: ' . $url);
	    return;
	}
	parse_str($query['query'], $auth_code);
	dump($auth_code);
    }
}
