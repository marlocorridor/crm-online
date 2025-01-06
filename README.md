# CRM-ONLINE Practical Test

## Software Requirements:
1. Install [Docker Desktop](https://www.docker.com/products/docker-desktop/) app.
2. `bash` compatible Terminal application.
3. Has a `git` installed and accessible via your chosen Terminal app.
4. Latest web browser of your choice. We suugest Firefox. 

## Setup:
1. Clone repository. `git@github.com:marlocorridor/crm-online.git`
2. On terminal, enter the cloned repository's root directory.
3. Run ***`cp .env.example .env`*** command to set the Environment vars.
    * Alternatively you could rename *.env.example* file to *.env* file found on this repo's root directory.
4. Run docker command given below for [sail](https://laravel.com/docs/11.x/sail#installing-composer-dependencies-for-existing-projects) to install dependencies.
  ```bash
  docker run --rm \
      -u "$(id -u):$(id -g)" \
      -v "$(pwd):/var/www/html" \
      -w /var/www/html \
      laravelsail/php84-composer:latest \
      composer install --ignore-platform-reqs
  ```
5. Run ***`sail up -d`*** command to start the application.
6. Run ***`sail artisan migrate`*** command to initialize DB tables.
7. Run ***`sail artisan db:seed --class=AdminUserSeeder`*** command to create user account and login.
    * Login using the account email ***`corridor.marlo+admin@gmail.com`*** and ***`"password"`*** (without qoutes) as password.
    * Alternatively Register manually by [link](http://localhost/register) on [landing page](http://localhost/).
8. Run ***`sail artisan db:seed --class=CustomerSeeder`*** command to add customer data.
    * Alternatively add data manually by [link](http://localhost/customer/create) on [Customers](http://localhost/customer) page.

## Usage:
1. Visit url [localhost](http://localhost/) using your browser.
2. [Login](http://localhost/login) using the account email ***`corridor.marlo+admin@gmail.com`*** and ***`"password"`*** (without qoutes) as password.
    - Make sure you seeded the `AdminUserSeeder` on "Setup" section.
    - Alternatively you could use your registered admin user.
3. On Navigation menu, click the [Customer](http://localhost/customer) link.
4. On Customer List page, we have access on the following controls
    - Go to new Customer record form, via button [New Customer Data](http://localhost/customer/create)
    - Go to Customer record via [View](http://localhost/customer/1) link on the selected record.
    - Go to Customer record Edit form via [Edit](http://localhost/customer/1/edit) link on the selected record.
5. To Delete a record, go to the Customer record.
6. To restore the deleted record, click ["Show Trashed Customers"](http://localhost/customer?trashed=true) button on list page.
