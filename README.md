# Laravel ePay.bg API Wrapper

A Laravel package that wraps ePay.bg's API.

<h1>Installation</h1>

1. Download .zip file or install via composer
	<pre>
		$ composer require kondov/epaywrapper
	</pre>
2. Add the EpayWrapperServiceProvider to the providers array in app.php
	<pre>
		Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Kondov\EpayWrapper\EpayWrapperServiceProvider::class,

        /*
         * Application Service Providers...
         */
	</pre>
3. Add the facade to the aliases array in app.php
	<pre>
		'Epay'      => Kondov\EpayWrapper\Facades\Epay::class
	</pre>
4. Set up your merchant information in the config.php file in the package
	<pre>
		'MERCHANT_SECRET_KEY' => '',
	    'MERCHANT_IDENTIFIER' => '',
	    'SUBMIT_URL'          => 'https://devep2.datamax.bg/ep2/epay2_demo/',
	    'URL_OK'              => '',
	    'URL_CANCEL'          => '',
	    'PAGE'                => 'paylogin'
	</pre>