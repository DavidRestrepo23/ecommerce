<?php

use Illuminate\Database\Seeder;
use App\Attribute;
use App\AttributeDetail;


class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute_color = Attribute::create(['name' => 'Color']);

            AttributeDetail::create([
                'name' => 'Rojo',
                'hexa' => '#E84C3D',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Gris',
                'hexa' => '#AAB2BD',
                'attribute_id' => $attribute_color->id
            ]);
            
            AttributeDetail::create([
                'name' => 'Gris pardo',
                'hexa' => '#CFC4A6',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Beige',
                'hexa' => '#F5F5DC',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Blanco',
                'hexa' => '#FFFFFF',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Negro',
                'hexa' => '#000000',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Camel',
                'hexa' => '#C19A6B',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Naranja',
                'hexa' => '#F39C11',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Azul',
                'hexa' => '#5897fb',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Verde',
                'hexa' => '#A0D468',
                'attribute_id' => $attribute_color->id
            ]);


            AttributeDetail::create([
                'name' => 'Amarillo',
                'hexa' => '#F1C40F',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Marrón',
                'hexa' => '#964B00',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Rosa',
                'hexa' => '#FCCACD',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Fucsia',
                'hexa' => '#FF11C2',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Morado',
                'hexa' => '#74003D',
                'attribute_id' => $attribute_color->id
            ]);

            AttributeDetail::create([
                'name' => 'Purpura',
                'hexa' => '#340087',
                'attribute_id' => $attribute_color->id
            ]);
            

            
            $attribute_size = Attribute::create(['name' => 'Tamaño']);
            
            AttributeDetail::create([
                'name' => 'XS',
                'attribute_id' => $attribute_size->id
            ]);
            AttributeDetail::create([
                'name' => 'S',
                'attribute_id' => $attribute_size->id
            ]);
            AttributeDetail::create([
                'name' => 'M',
                'attribute_id' => $attribute_size->id
            ]);
            AttributeDetail::create([
                'name' => 'L',
                'attribute_id' => $attribute_size->id
            ]);
            AttributeDetail::create([
                'name' => 'XL',
                'attribute_id' => $attribute_size->id
            ]);
            
            AttributeDetail::create([
                'name' => 'XXL',
                'attribute_id' => $attribute_size->id
            ]);

            AttributeDetail::create([
                'name' => 'TU',
                'attribute_id' => $attribute_size->id
            ]);

    }
}
