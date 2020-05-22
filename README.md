# scaleway-s3-aws-sdk-example
Some example with scaleway s3 and aws-php-sdk

## Install
Get your API keys [here](https://www.scaleway.com/en/docs/generate-an-api-token/)

### Usage
```bash
$ docker build -t scaleways3 .
$ docker run scaleways3 --env AWS_ACCESS_KEY_ID=XXXXX -env AWS_SECRET_ACCESS_KEY=XXXX
```

### Test without docker

Be sure to have composer and php on your local environment and setted your s3 keys in env.

```bash
$ composer install
$ php src/index.php
```

## Ressources

More examples with aws-sdk-php [here](https://github.com/awsdocs/aws-doc-sdk-examples/)
 