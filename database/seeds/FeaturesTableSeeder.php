<?php

use Illuminate\Database\Seeder;
use App\Feature;
use App\FeatureDetail;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $feature_composition = Feature::create(['name' => 'Composición']);

            FeatureDetail::create([
                'name' => 'Poliéster',
                'feature_id' => $feature_composition->id
            ]);

            FeatureDetail::create([
                'name' => 'Lana',
                'feature_id' => $feature_composition->id
            ]);

            FeatureDetail::create([
                'name' => 'Viscosa',
                'feature_id' => $feature_composition->id
            ]);

            FeatureDetail::create([
                'name' => 'Elastano',
                'feature_id' => $feature_composition->id
            ]);
            
            FeatureDetail::create([
                'name' => 'Algodón',
                'feature_id' => $feature_composition->id
            ]);
            
            FeatureDetail::create([
                'name' => 'Seda',
                'feature_id' => $feature_composition->id
            ]);
            

            $feature_style = Feature::create(['name' => 'Estilo']);
            
            FeatureDetail::create([
                'name' => 'Clásico',
                'feature_id' => $feature_style->id
            ]);
            FeatureDetail::create([
                'name' => 'Informal',
                'feature_id' => $feature_style->id
            ]);
            FeatureDetail::create([
                'name' => 'Militar',
                'feature_id' => $feature_style->id
            ]);
            FeatureDetail::create([
                'name' => 'Formal',
                'feature_id' => $feature_style->id
            ]);
            FeatureDetail::create([
                'name' => 'Básico',
                'feature_id' => $feature_style->id
            ]);
            FeatureDetail::create([
                'name' => 'Elegante',
                'feature_id' => $feature_style->id
            ]);



            $feature_property = Feature::create(['name' => 'Propiedades']);
            FeatureDetail::create([
                'name' => 'Manga corta',
                'feature_id' => $feature_property->id
            ]);
            FeatureDetail::create([
                'name' => 'Manga larga',
                'feature_id' => $feature_property->id
            ]);
            FeatureDetail::create([
                'name' => 'Buso',
                'feature_id' => $feature_property->id
            ]);
            FeatureDetail::create([
                'name' => 'Cami-buso',
                'feature_id' => $feature_property->id
            ]);
            FeatureDetail::create([
                'name' => 'Vestido colorido',
                'feature_id' => $feature_property->id
            ]);
            FeatureDetail::create([
                'name' => 'Vestido corto',
                'feature_id' => $feature_property->id
            ]);
            FeatureDetail::create([
                'name' => 'Vestido largo',
                'feature_id' => $feature_property->id
            ]);
            FeatureDetail::create([
                'name' => 'Vestido a media pierna',
                'feature_id' => $feature_property->id
            ]);


    }
}
