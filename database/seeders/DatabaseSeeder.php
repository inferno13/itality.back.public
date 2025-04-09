<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ////////
        // АДМИН
        ////////

        \App\Models\User::create([
            'name' => 'superadmin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('131313'),
            'remember_token' => Str::random(10),
            'phone' => '12345',
            'avatar' => 'avatar/ADOPW39403ds.jpg',
            'surname' => fake()->name(),
            'pathname' => fake()->name(),
            'gender' => 'male',
            'birthdate' => fake()->date('Y-m-d'),
            'mobile' => fake()->phoneNumber(),
            'pasport1' => 'pasport1/JSDFSL545634SDSSD.jpg',
            'pasport2' => 'pasport1/JSDFSsdf634SDSSD.jpg',

        ]);

        ////////////
        // НАСТРОЙКИ
        ////////////

        \App\Models\Setting::create([
            'title' => 'Ссылка на яндекс карты',
            'type' => 'text',
            'value' => 'https://yandex.ru/maps/213/moscow'
        ]);
        \App\Models\Setting::create([
            'title' => 'Номер карты для перевода',
            'type' => 'text',
            'value' => '5469380054250666'
        ]);
        \App\Models\Setting::create([
            'title' => 'Размер аванса по умолчанию',
            'type' => 'text',
            'value' => '50'
        ]);
        \App\Models\Setting::create( [
            'title' => 'Количество дней для оплаты остатка после',
            'type' => 'text',
            'value' => '10'
        ]);
        \App\Models\Setting::create([
            'title' => 'Для замера требовать адрес?',
            'type' => 'checkbox',
            'value' => true
        ]);
        \App\Models\Setting::create( [
            'title' => 'Для замера требовать фото с объекта?',
            'type' => 'checkbox',
            'value' => true
        ]);
        \App\Models\Setting::create( [
            'title' => "Процент от 0 до 25%",
            'type' => "text",
            'value' => "#FF3E1D"
        ]);

        \App\Models\Setting::create( [
            'title' => "Процент от 25% до 50%",
            'type' => "text",
            'value' => "#ffab00",
        ]);
        \App\Models\Setting::create( [
            'title' => "Процент от 50% до 100%",
            'type' => "text",
            'value' => "#696cff",
        ]);
        \App\Models\Setting::create( [
            'title' => "Процент более 100%",
            'type' => "text",
            'value' => "#71dd37",
        ]);

        ///////////////
        // НОМЕНКЛАТУРА
        ///////////////

        //\App\Models\Category::factory(5)->create();
        \App\Models\Category::create( ['pos' => 111, 'title' => 'КОНФИГУРАЦИЯ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 222, 'title' => 'СТЕКЛА', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 333, 'title' => 'МАТИРОВКА', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 444, 'title' => 'ВЫРЕЗЫ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 555, 'title' => 'ПЕТЛИ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 666, 'title' => 'РУЧКИ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 777, 'title' => 'СТАБИЛИЗАЦИЯ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 883, 'title' => 'КРЕПЕЖ СТЕКЛА К СТЕНЕ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 993, 'title' => 'ПОРОГИ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 994, 'title' => 'ВЫКРАС', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 995, 'title' => 'ШИРИНА', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 996, 'title' => 'ВЫСОТА', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 997, 'title' => 'СЕРВИС', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 998, 'title' => 'РАЗДВИЖНЫЕ ПЛИТКИ', 'color' => '#ebedf0']);
        \App\Models\Category::create( ['pos' => 999, 'title' => 'МАГНИТ', 'color' => '#ebedf0']);

        //\App\Models\Type::factory(5)->create();
        \App\Models\Tag::create( ['pos' => 111, 'title' => 'Без матирования', 'category_id' => 3, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 222, 'title' => 'Сплошное матирование', 'category_id' => 3, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 333, 'title' => 'Рисунок', 'category_id' => 3, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 444, 'title' => 'Обе', 'category_id' => 5, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 555, 'title' => 'Наружу', 'category_id' => 5, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 666, 'title' => 'Внутрь', 'category_id' => 5, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 777, 'title' => 'Прозрачное', 'category_id' => 2, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 888, 'title' => 'Бронза', 'category_id' => 2, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 999, 'title' => 'Графит', 'category_id' => 2, 'color' => '#ff0000']);
        \App\Models\Tag::create( ['pos' => 999, 'title' => 'Осветленное', 'category_id' => 2, 'color' => '#ff0000']);

        //\App\Models\Correction::factory(5)->create();
        \App\Models\Correction::create( ['pos' => random_int(111, 999), 'type' => 'СПИСАНИЕ', 'value' => '200']);
        \App\Models\Correction::create( ['pos' => random_int(111, 999), 'type' => 'ПОПОЛНЕНИЕ', 'value' => '300']);

        //\App\Models\Collection::factory(5)->create();
        \App\Models\Collection::create( ['pos' => random_int(111, 999), 'title' => 'KVADRO']);
        \App\Models\Collection::create( ['pos' => random_int(111, 999), 'title' => 'RADIUS']);
        \App\Models\Collection::create( ['pos' => random_int(111, 999), 'title' => 'UNIVERSAL']);

        //\App\Models\Supplier::factory(5)->create();
        \App\Models\Supplier::create( ['pos' => random_int(111, 999), 'title' => 'ПОСТАВЩИК 1']);
        \App\Models\Supplier::create( ['pos' => random_int(111, 999), 'title' => 'ПОСТАВЩИК 2']);
        \App\Models\Supplier::create( ['pos' => random_int(111, 999), 'title' => 'ПОСТАВЩИК 3']);

        //\App\Models\Product::factory(5)->create();
        \App\Models\Product::create( [
            
            'pos' => random_int(111, 999),
            'image' => '',
            'category_id' => 1,
            'title' => 'ПРОДУКЦИЯ 1',
            'color' => '#ebedf0',
            'cash' => 500,
            'remains' => 1000,
            'shipment' => 2000,
            'qr' => '12345',
            'fix' => 1,
            'collection_id' => 1,
            'supplier_id' => 1,
            'norma' => 3000,
            'video' => '',
            'unit' => '',
            'text' => 'Описание продукции',
            'period' => 4000,
            'active' => 1
        ]);
        \App\Models\Product::create( [
            
            'pos' => random_int(111, 999),
            'image' => '',
            'category_id' => 2,
            'title' => 'ПРОДУКЦИЯ 2',
            'color' => '#ebedf0',
            'cash' => 500,
            'remains' => 1000,
            'shipment' => 2000,
            'qr' => '12345',
            'fix' => 1,
            'collection_id' => 2,
            'supplier_id' => 2,
            'norma' => 3000,
            'video' => '',
            'unit' => '',
            'text' => 'Описание продукции',
            'period' => 4000,
            'active' => 1
        ]);
        \App\Models\Product::create( [
            
            'pos' => random_int(111, 999),
            'image' => '',
            'category_id' => 3,
            'title' => 'ПРОДУКЦИЯ 3',
            'color' => '#ebedf0',
            'cash' => 500,
            'remains' => 1000,
            'shipment' => 2000,
            'qr' => '12345',
            'fix' => 1,
            'collection_id' => 3,
            'supplier_id' => 3,
            'norma' => 3000,
            'video' => '',
            'unit' => '',
            'text' => 'Описание продукции',
            'period' => 4000,
            'active' => 1
        ]);

        //////////////////////
        // КНОПКИ КАЛЬКУЛЯТОРА
        //////////////////////

        //\App\Models\Grouping::factory(5)->create();
        \App\Models\Grouping::create( ['pos' => random_int(111, 999), 'title' => 'KVADRO']);
        \App\Models\Grouping::create( ['pos' => random_int(111, 999), 'title' => 'RADIUS']);
        \App\Models\Grouping::create( ['pos' => random_int(111, 999), 'title' => 'UNIVERSAL']);

        //\App\Models\ButtonCategory::factory(5)->create();
        \App\Models\ButtonCategory::create( ['pos' => 111, 'title' => 'КОНФИГУРАЦИЯ', 'color' => '#ebedf0', 'section' => 'ИЗДЕЛИЕ']);
        \App\Models\ButtonCategory::create( ['pos' => 222, 'title' => 'СТЕКЛА', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 333, 'title' => 'МАТИРОВКА', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 444, 'title' => 'ВЫРЕЗЫ', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 555, 'title' => 'ПЕТЛИ', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 666, 'title' => 'РУЧКИ', 'color' => '#ebedf0', 'section' => 'ИЗДЕЛИЕ']);
        \App\Models\ButtonCategory::create( ['pos' => 777, 'title' => 'СТАБИЛИЗАЦИЯ', 'color' => '#ebedf0', 'section' => 'ИЗДЕЛИЕ']);
        \App\Models\ButtonCategory::create( ['pos' => 883, 'title' => 'КРЕПЕЖ СТЕКЛА К СТЕНЕ', 'color' => '#ebedf0', 'section' => 'ИЗДЕЛИЕ']);
        \App\Models\ButtonCategory::create( ['pos' => 993, 'title' => 'ПОРОГИ', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 994, 'title' => 'ВЫКРАС', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 995, 'title' => 'ШИРИНА', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 996, 'title' => 'ВЫСОТА', 'color' => '#ebedf0', 'section' => 'ИЗДЕЛИЕ']);
        \App\Models\ButtonCategory::create( ['pos' => 997, 'title' => 'СЕРВИС', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 998, 'title' => 'РАЗДВИЖНЫЕ ПЛИТКИ', 'color' => '#ebedf0', 'section' => 'УСЛУГА']);
        \App\Models\ButtonCategory::create( ['pos' => 999, 'title' => 'МАГНИТ', 'color' => '#ebedf0', 'section' => 'ИЗДЕЛИЕ']);

        //\App\Models\Base::factory(10)->create();
        \App\Models\Base::create( [
            
            'active' => 1,
            'pos' => random_int(111, 999),
            'button_category_id' => 1,
            'grouping_id' => 1,
            'title' => 'КНОПКА 1',
            'image' => '',
            'property' => '',
            'structure' => '',
        ]);
        \App\Models\Base::create( [
            
            'active' => 1,
            'pos' => random_int(111, 999),
            'button_category_id' => 2,
            'grouping_id' => 2,
            'title' => 'КНОПКА 2',
            'image' => '',
            'property' => '',
            'structure' => '',
        ]);
        \App\Models\Base::create( [
            
            'active' => 1,
            'pos' => random_int(111, 999),
            'button_category_id' => 3,
            'grouping_id' => 3,
            'title' => 'КНОПКА 3',
            'image' => '',
            'property' => '',
            'structure' => '',
        ]);

        // НЕ РАСПРЕДЕЛЕНО

        \App\Models\Group::factory(5)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Order::factory(5)->create();
        \App\Models\Sklad::factory(5)->create();
        \App\Models\Config::factory(5)->create();
        \App\Models\ProductComposition::factory(5)->create();

        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Walk-in ограждения']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Двери для душа']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Душевые в нишу']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Ограждения гармошкой']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Угловые ограждения']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Трапециевидные']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Раздвижные ограждения']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Ограждение на ванну']);
        \App\Models\ConfigGrouping::create( ['pos' => random_int(111, 999), 'title' => 'Дополнительное стекло']);
    }
}
