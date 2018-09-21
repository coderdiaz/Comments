<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Comment;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);
        $article = factory(Article::class)->create();
        $attributes = [
            'article_id' => $article->id,
            'message'
        ];

        $this->createComments($attributes);
    }

    private function createComments(array $attributes, $amount = 3, $depth = 3, $parent = null) {
        for ($i = 0; $i < $amount; $i++) {
            $comment = factory(Comment::class)->make($attributes);

            if ($parent === null) {
                $comment->save();
            } else {
                $parent->children()->save($comment);
            }

            if ($depth > 1) {
                $this->createComments($attributes, $amount, $depth - 1, $comment);
            }
        }
    }

}
