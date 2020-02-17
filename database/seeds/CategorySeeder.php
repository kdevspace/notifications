<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warning = new Category();
        $warning->name = 'Warnings';
        $warning->slug = 'warnings';
        $warning->save();

        $success = new Category();
        $success->name = 'Success';
        $success->slug = 'success';
        $success->save();

        $error = new Category();
        $error->name = 'Errors';
        $error->slug = 'errors';
        $error->save();
    }
}
