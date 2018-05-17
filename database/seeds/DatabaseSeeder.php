<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sid',
            'email' => 'forge405@gmail.com',
            'role' => 'admin',
            'password' => bcrypt(env('SEED_PWD')),
        ]);

        // 10 categorie
        $categories = factory(Category::class, 10)->create();

        // 20 tags
        $tags = factory(Tag::class, 20)->create();

        // 9 utenti
        factory(User::class, 9)->create();
        $users = User::all();
        // x ogni utente 15 posts
        foreach ($users as $user) {
            $posts = factory(Post::class, 15)->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);

            foreach ($posts as $post) {
                $post->tags()->sync($tags->random(3)->pluck('id')->toArray());
            }
        }
    }
}
