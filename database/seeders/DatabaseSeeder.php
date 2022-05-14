<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Lecture;
use App\Models\Get;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // User::create([
        //     'name' => 'kelompok3',
        //     'username' => 'kelompok3',
        //     'email' => 'kelompok3@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'is_admin' => 1
        // ]);

        // User::factory(3)->create();

        Category::create([
            'name' => 'Semester 1',
            'slug' => 'semester-1'
        ]);

        Category::create([
            'name' => 'Semester 2',
            'slug' => 'semester-2'
        ]);
        
        Category::create([
            'name' => 'Semester 3',
            'slug' => 'semester-3'
        ]);
        Category::create([
            'name' => 'Semester 4',
            'slug' => 'semester-4'
        ]);

        Category::create([
            'name' => 'Semester 5',
            'slug' => 'semester-5'
        ]);
        
        Category::create([
            'name' => 'Semester 6',
            'slug' => 'semester-6'
        ]);
        Category::create([
            'name' => 'Semester 7 ',
            'slug' => 'semester-7'
        ]);

        Category::create([
            'name' => 'Semester 8',
            'slug' => 'semester-8'
        ]);

        // Post::factory(20)->create();

        // Lecture::factory(3)->create();

        // Get::factory(3)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum fugiat molestiae magni, repellendus maxime,',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum fugiat molestiae magni, repellendus maxime, enim eius, perspiciatis quia ipsa quos dolorum quae necessitatibus temporibus aliquid dignissimos eos asperiores cum. Optio molestias est, provident ea nemo quaerat, natus beatae ad vero magni ullam explicabo repellendus eius itaque velit! Debitis, est vel!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum fugiat molestiae magni, repellendus maxime,',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum fugiat molestiae magni, repellendus maxime, enim eius, perspiciatis quia ipsa quos dolorum quae necessitatibus temporibus aliquid dignissimos eos asperiores cum. Optio molestias est, provident ea nemo quaerat, natus beatae ad vero magni ullam explicabo repellendus eius itaque velit! Debitis, est vel!',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum fugiat molestiae magni, repellendus maxime,',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum fugiat molestiae magni, repellendus maxime, enim eius, perspiciatis quia ipsa quos dolorum quae necessitatibus temporibus aliquid dignissimos eos asperiores cum. Optio molestias est, provident ea nemo quaerat, natus beatae ad vero magni ullam explicabo repellendus eius itaque velit! Debitis, est vel!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}