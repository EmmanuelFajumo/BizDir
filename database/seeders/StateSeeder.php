<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            ['name' => 'Abia State', 'capital' => 'Umuahia', 'code' => 'AB'],
            ['name' => 'Adamawa State', 'capital' => 'Yola', 'code' => 'AD'],
            ['name' => 'Akwa Ibom State', 'capital' => 'Uyo', 'code' => 'AK'],
            ['name' => 'Anambra State', 'capital' => 'Awka', 'code' => 'AN'],
            ['name' => 'Bauchi State', 'capital' => 'Bauchi', 'code' => 'BA'],
            ['name' => 'Bayelsa State', 'capital' => 'Yenagoa', 'code' => 'BY'],
            ['name' => 'Benue State', 'capital' => 'Makurdi', 'code' => 'BE'],
            ['name' => 'Borno State', 'capital' => 'Maiduguri', 'code' => 'BO'],
            ['name' => 'Cross River State', 'capital' => 'Calabar', 'code' => 'CR'],
            ['name' => 'Delta State', 'capital' => 'Asaba', 'code' => 'DE'],
            ['name' => 'Ebonyi State', 'capital' => 'Abakaliki', 'code' => 'EB'],
            ['name' => 'Edo State', 'capital' => 'Benin City', 'code' => 'ED'],
            ['name' => 'Ekiti State', 'capital' => 'Ado Ekiti', 'code' => 'EK'],
            ['name' => 'Enugu State', 'capital' => 'Enugu', 'code' => 'EN'],
            ['name' => 'FCT (Abuja)', 'capital' => 'Abuja', 'code' => 'FC'],
            ['name' => 'Gombe State', 'capital' => 'Gombe', 'code' => 'GO'],
            ['name' => 'Imo State', 'capital' => 'Owerri', 'code' => 'IM'],
            ['name' => 'Jigawa State', 'capital' => 'Dutse', 'code' => 'JI'],
            ['name' => 'Kaduna State', 'capital' => 'Kaduna', 'code' => 'KD'],
            ['name' => 'Kano State', 'capital' => 'Kano', 'code' => 'KN'],
            ['name' => 'Katsina State', 'capital' => 'Katsina', 'code' => 'KT'],
            ['name' => 'Kebbi State', 'capital' => 'Birnin Kebbi', 'code' => 'KE'],
            ['name' => 'Kogi State', 'capital' => 'Lokoja', 'code' => 'KO'],
            ['name' => 'Kwara State', 'capital' => 'Ilorin', 'code' => 'KW'],
            ['name' => 'Lagos State', 'capital' => 'Ikeja', 'code' => 'LA'],
            ['name' => 'Nasarawa State', 'capital' => 'Lafia', 'code' => 'NA'],
            ['name' => 'Niger State', 'capital' => 'Minna', 'code' => 'NI'],
            ['name' => 'Ogun State', 'capital' => 'Abeokuta', 'code' => 'OG'],
            ['name' => 'Ondo State', 'capital' => 'Akure', 'code' => 'ON'],
            ['name' => 'Osun State', 'capital' => 'Osogbo', 'code' => 'OS'],
            ['name' => 'Oyo State', 'capital' => 'Ibadan', 'code' => 'OY'],
            ['name' => 'Plateau State', 'capital' => 'Jos', 'code' => 'PL'],
            ['name' => 'Rivers State', 'capital' => 'Port Harcourt', 'code' => 'RI'],
            ['name' => 'Sokoto State', 'capital' => 'Sokoto', 'code' => 'SO'],
            ['name' => 'Taraba State', 'capital' => 'Jalingo', 'code' => 'TA'],
            ['name' => 'Yobe State', 'capital' => 'Damaturu', 'code' => 'YO'],
            ['name' => 'Zamfara State', 'capital' => 'Gusau', 'code' => 'ZA'],
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
