<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(UserTableSeeder::class);
        //$this->call('UserTableSeeder');
        //Model::reguard();
        $this->call('PostTableSeeder');
    }


}

class PostTableSeeder extends Seeder
{
  public function run()
  {
    App\PlayTogether::truncate();

    factory(App\PlayTogether::class, 20)->create();
  }
}


