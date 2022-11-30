<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->randomElement([
                'گلکسی نوت 20',
                'ایپد مینی',
                'ایفون 13 پرو',
                'مانیتور اودیسه سامسونگ',
                'لپ تاپ اچ پی',
                'لپ تاپ دل xps',
                'شارژر موبایل',
                'سیم شارژر',
                'موبایل سونی اکسپریا',
            ]),

            'description' => 'یک متن در باره توضیحات محصول که برای همه محصولات یکسان است.',
            'image' => 'https://via.placeholder.com/100',
            'price' => 5000,
            'stock' => fake()->randomDigitNotNull,

        ];
    }
}
