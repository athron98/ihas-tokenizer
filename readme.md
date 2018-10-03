
# iHAS Tokenizer

Token generator for iHAS RESTFull API

Installation Instruction :
 - Install using composer :

        $ composer require athron98/ihas-tokenizer
**Example Usage :**

	<?php

	use Athron98\iHAS\Tokenizer;

	echo Tokenizer(['your-user-name','your-uuid']);


 - Get a Token ::


		echo $token->getToken();

	or

		echo $token->getToken(['your-user-name','your-uuid']);

> Output :
>
>
>
> `67maaVvF0qpZpodAyiXbfNLRusAC2i0MBdtIB5my/zA=`

 - Get Example Header :


		echo $token->getHeader();
	or

		echo $token->getHeader(['your-user-name','your-uuid']);


> Output :
>
>     X-iHAS-AUTH-MODE: TOKEN
>     X-iHAS-AUTH-TOKEN: 67maaVvF0qpZpodAyiXbfNLRusAC2i0MBdtIB5my/zA=
>     X-iHAS-AUTH-USER: your-user-name
