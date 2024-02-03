<p align="center">
  <img src="https://zoefin.com/wp-content/uploads/2020/01/zoe_logo_primary.svg">
</p>

<h1>Backend Test Zoe</h1>

Backend to update the securities prices into database using a Job to synchronize the data gotten from ABC Provider. The project includes also an endpoint to update the securities prices for a particular Security Type.

<h2>Requirements</h2>
<ul>
  <li>Docker</li>
  <li>Docker Compose</li>
  <li>Composer</li>
</ul>

<h2>Stack</h2>
  <ul>
    <li>PHP 8</li>
    <li>Laravel 10</li>
    <li>PHP Unit</li>
    <li>MySQL</li>
  </ul>

<h2>Installation</h2>

### Clone the repository

```sh
git clone <repository_URL>
```

```sh
cd repository-name
```
  
### Set up the environment

Copy the .env.example file and rename it as .env. Modify the environment variables as needed.

```sh
cp .env.example .env
```
### Install the dependencies

```sh
composer install
```
### Initialize the docker

```sh
./vendor/bin/sail up
```
### Run migrations and seeds

```sh
./vendor/bin/sail artisan migrate --seed
```

### Test the API

The API can be tested using <a href="https://www.postman.com/">Postman</a> and doing a POST request to:

```sh
http://localhost/api/v1/securities/prices/1
```

### Unit tests

```sh
./vendor/bin/sail artisan test
```
