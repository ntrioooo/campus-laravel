<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Trio Nugroho",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae sapiente laborum eveniet recusandae at, ad odio distinctio est, doloremque maiores sequi ducimus, rem velit temporibus nesciunt sint eligendi ullam blanditiis necessitatibus in eius? Quibusdam dolore voluptate repudiandae ratione dolorum itaque! Illum sit et culpa, dicta doloremque sequi ipsam commodi unde tempora? Numquam voluptas sunt, debitis alias hic quo cum vel ipsum unde blanditiis magni totam a nihil placeat nostrum aliquid laborum! Eum illum aspernatur impedit, sunt distinctio fuga earum veniam soluta eius officia numquam voluptatem nostrum aperiam, similique ducimus a minus accusamus deleniti, nisi quae rerum vitae? Blanditiis, magni officia!"
        ],
        [
            "title" => "Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Nugroho Nugroho",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae sapiente laborum eveniet recusandae at, ad odio distinctio est, doloremque maiores sequi ducimus, rem velit temporibus nesciunt sint eligendi ullam blanditiis necessitatibus in eius? Quibusdam dolore voluptate repudiandae ratione dolorum itaque! Illum sit et culpa, dicta doloremque sequi ipsam commodi unde tempora? Numquam voluptas sunt, debitis alias hic quo cum vel ipsum unde blanditiis magni totam a nihil placeat nostrum aliquid laborum! Eum illum aspernatur impedit, sunt distinctio fuga earum veniam soluta eius officia numquam voluptatem nostrum aperiam, similique ducimus a minus accusamus deleniti, nisi quae rerum vitae? Blanditiis, magni officia! Quibusdam dolore voluptate repudiandae ratione dolorum itaque! Illum sit et culpa, dicta doloremque sequi ipsam commodi unde tempora? Numquam voluptas sunt, debitis alias hic quo cum vel ipsum unde blanditiis magni totam a nihil placeat nostrum aliquid laborum! Eum illum aspernatur impedit, sunt distinctio fuga earum veniam soluta eius officia numquam voluptatem nostrum aperiam, similique ducimus a minus accusamus deleniti, nisi quae rerum vitae? Blanditiis, magni officia!"
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
