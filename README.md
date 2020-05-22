# scaleway-s3-aws-sdk-example
Some example with scaleway s3 and aws-php-sdk

## Install
Get your API keys [here](https://www.scaleway.com/en/docs/generate-an-api-token/)

### Usage
```bash
$ docker build -t scaleways3 .
$ docker run --env AWS_ACCESS_KEY_ID=XXXXX --env AWS_SECRET_ACCESS_KEY=XXXX scaleways3
```

### Test without docker

Be sure to have composer and php on your local environment and setted your s3 keys in env.

```bash
$ composer install
$ php src/index.php
```

## Ressources

More examples with aws-sdk-php [here](https://github.com/awsdocs/aws-doc-sdk-examples/)

## Contributors

Thanks goes to these wonderful people ([emoji key](https://github.com/kentcdodds/all-contributors#emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore -->
<table>
  <tr>
    <td align="center">
      <a href="https://www.kagxaef.ovh">
        <img src="https://avatars2.githubusercontent.com/u/22916835?v=4" width="100px;" alt="mrpandat"/>
        <br />
        <sub><b>mrpandat</b></sub>
      </a>
      <br />
    </td>
    <td align="center">
      <a href="">
        <img src="https://avatars2.githubusercontent.com/u/4287777?v=4" width="100px;" alt="ptondereau"/>
        <br />
        <sub><b>ptondereau</b></sub>
      </a>
      <br />
    </td>
  </tr>
</table>

<!-- ALL-CONTRIBUTORS-LIST:END -->
 
