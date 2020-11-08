## Running Application

You can just run `php artisan test` locally. That's all you have to do.

## Explanation

I've implemented a little stucture from the Clean Architecture to encapsulate the entities in this application. Entities are stored in `\App\Entities`, models are in `\App\Models`, repositories are in `App\Repositories`.
Repositories should be the layer that is communicating with the database. All database queries should be stored in the repository. Entity is the object that we are creating, Admin and Student.

To make it simple, I've only added `role` column in the `Users` table and that will be the differer between each entities.

## What This Is Not

1. This is not a complete application.
2. This is not for production.

## What This Is

1. This is an example of clean architecture implementation and just some encapsulation example for Laravel.
2. This is for sharing.

***I welcome any issues and PRs for improvements! Let's share our knowledge! :) :D***
