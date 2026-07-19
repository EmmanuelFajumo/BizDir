<?php

namespace Database\Seeders;

use App\Models\Lga;
use App\Models\State;
use Illuminate\Database\Seeder;

class LgaSeeder extends Seeder
{
    public function run(): void
    {
        // Abia
        $abia = State::where('code', 'AB')->first()->id;
        $this->createLgas($abia, [
            'Aba North', 'Aba South', 'Arochukwu', 'Bende', 'Ikwuano',
            'Isiala Ngwa North', 'Isiala Ngwa South', 'Isuikwuato', 'Lobi',
            'Ohafia', 'Osisioma Ngwa', 'Ugwuagbo', 'Ukwa East', 'Ukwa West',
            'Umuahia North', 'Umuahia South', 'Umu Nneochi',
        ]);

        // Adamawa
        $adamawa = State::where('code', 'AD')->first()->id;
        $this->createLgas($adamawa, [
            'Demsa', 'Fufore', 'Ganye', 'Girei', 'Gombi',
            'Guyuk', 'Hong', 'Jada', 'Lamurde', 'Madagali',
            'Maiha', 'Mayo Belwa', 'Michika', 'Mubi North', 'Mubi South',
            'Numan', 'Shelleng', 'Song', 'Toungo', 'Yola North', 'Yola South',
        ]);

        // Akwa Ibom
        $akwaibom = State::where('code', 'AK')->first()->id;
        $this->createLgas($akwaibom, [
            'Abak', 'Eastern Obolo', 'Eket', 'Esit Eket', 'Essien Udim',
            'Etim Ekpo', 'Etinan', 'Ibeno', 'Ibesikpo Asutan', 'Ibiono Ibom',
            'Ika', 'Ikono', 'Ikot Abasi', 'Ikot Ekpene', 'Ini',
            'Itu', 'Mbo', 'Mkpat Enin', 'Nsit Atai', 'Nsit Ibom',
            'Nsit Ubium', 'Obot Akara', 'Okobo', 'Onna', 'Oron',
            'Oruk Anam', 'Udung Uko', 'Ukanafun', 'Uruan', 'Urue-Offong/Oruko',
            'Uyo',
        ]);

        // Anambra
        $anambra = State::where('code', 'AN')->first()->id;
        $this->createLgas($anambra, [
            'Aguata', 'Awka North', 'Awka South', 'Anambra East', 'Anambra West',
            'Anaocha', 'Ayamelum', 'Dunukofia', 'Ekwusigo', 'Idemili North',
            'Idemili South', 'Ihiala', 'Njikoka', 'Nnewi North', 'Nnewi South',
            'Ogbaru', 'Onitsha North', 'Onitsha South', 'Orumba North', 'Orumba South',
            'Oyi',
        ]);

        // Bauchi
        $bauchi = State::where('code', 'BA')->first()->id;
        $this->createLgas($bauchi, [
            'Alkaleri', 'Bauchi', 'Bogoro', 'Damban', 'Darazo',
            'Dass', 'Gamawa', 'Ganjuwa', 'Giade', 'Itas/Gadau',
            'Jama\'are', 'Katagum', 'Kirfi', 'Misau', 'Ningi',
            'Shira', 'Tafawa Balewa', 'Toro', 'Warji', 'Zaki',
        ]);

        // Bayelsa
        $bayelsa = State::where('code', 'BY')->first()->id;
        $this->createLgas($bayelsa, [
            'Brass', 'Ekeremor', 'Kolokuma/Opokuma', 'Nembe', 'Ogbia',
            'Sagbama', 'Southern Ijaw', 'Yenagoa',
        ]);

        // Benue
        $benue = State::where('code', 'BE')->first()->id;
        $this->createLgas($benue, [
            'Ado', 'Agatu', 'Apa', 'Buruku', 'Gboko',
            'Guma', 'Gwer East', 'Gwer West', 'Katsina-Ala', 'Konshisha',
            'Kwande', 'Logo', 'Makurdi', 'Obi', 'Ogbadibo',
            'Ohimini', 'Oju', 'Okpokwu', 'Otukpo', 'Tarka',
            'Ukum', 'Ushongo', 'Vandeikya',
        ]);

        // Borno
        $borno = State::where('code', 'BO')->first()->id;
        $this->createLgas($borno, [
            'Abadam', 'Askira/Uba', 'Bama', 'Bayo', 'Biu',
            'Chibok', 'Damboa', 'Dikwa', 'Gubio', 'Guzamala',
            'Gwoza', 'Hawul', 'Jere', 'Kaga', 'Kala/Balge',
            'Konduga', 'Kukawa', 'Kwaya Kusar', 'Mafa', 'Magumeri',
            'Maiduguri', 'Marte', 'Mobbar', 'Monguno', 'Ngala',
            'Nganzai', 'Shani',
        ]);

        // Cross River
        $crossriver = State::where('code', 'CR')->first()->id;
        $this->createLgas($crossriver, [
            'Abi', 'Akamkpa', 'Akpabuyo', 'Bakassi', 'Bekwarra',
            'Biase', 'Boki', 'Calabar Municipal', 'Calabar South', 'Etung',
            'Ikom', 'Obanliku', 'Obubra', 'Obudu', 'Odukpani',
            'Ogoja', 'Yakurr', 'Yala',
        ]);

        // Delta
        $delta = State::where('code', 'DE')->first()->id;
        $this->createLgas($delta, [
            'Aniocha North', 'Aniocha South', 'Bomadi', 'Burutu', 'Ethiope East',
            'Ethiope West', 'Ika North East', 'Ika South', 'Isoko North', 'Isoko South',
            'Ndokwa East', 'Ndokwa West', 'Okpe', 'Oshimili North', 'Oshimili South',
            'Patani', 'Sapele', 'Udu', 'Ughelli North', 'Ughelli South',
            'Ukwuani', 'Uvwie', 'Warri North', 'Warri South', 'Warri South West',
        ]);

        // Ebonyi
        $ebonyi = State::where('code', 'EB')->first()->id;
        $this->createLgas($ebonyi, [
            'Abakaliki', 'Afikpo North', 'Afikpo South (Edda)', 'Ebonyi', 'Ezza North',
            'Ezza South', 'Ikwo', 'Ishielu', 'Ivo', 'Izzi',
            'Ohaozara', 'Ohaukwu', 'Onicha',
        ]);

        // Edo
        $edo = State::where('code', 'ED')->first()->id;
        $this->createLgas($edo, [
            'Akoko-Edo', 'Egor', 'Esan Central', 'Esan North-East', 'Esan South-East',
            'Esan West', 'Etsako Central', 'Etsako East', 'Etsako West', 'Igueben',
            'Ikpoba Okha', 'Oredo', 'Orhionmwon', 'Ovia North-East', 'Ovia South-West',
            'Owan East', 'Owan West', 'Uhunmwonde',
        ]);

        // Ekiti
        $ekiti = State::where('code', 'EK')->first()->id;
        $this->createLgas($ekiti, [
            'Ado Ekiti', 'Efon', 'Ekiti East', 'Ekiti South-West', 'Ekiti West',
            'Emure', 'Gbonyin', 'Ido Osi', 'Ijero', 'Ikere',
            'Ikole', 'Ilejemeje', 'Irepodun/Ifelodun', 'Ise/Orun', 'Moba',
            'Oye',
        ]);

        // Enugu
        $enugu = State::where('code', 'EN')->first()->id;
        $this->createLgas($enugu, [
            'Aninri', 'Awgu', 'Enugu East', 'Enugu North', 'Enugu South',
            'Ezeagu', 'Igbo Etiti', 'Igbo Eze North', 'Igbo Eze South', 'Isi Uzo',
            'Nkanu East', 'Nkanu West', 'Nsukka', 'Oji River', 'Udenu',
            'Udi', 'Uzo Uwani',
        ]);

        // FCT (Abuja)
        $fct = State::where('code', 'FC')->first()->id;
        $this->createLgas($fct, [
            'Abaji', 'Bwari', 'Gwagwalada', 'Kuje', 'Kwali',
            'Municipal Area Council',
        ]);

        // Gombe
        $gombe = State::where('code', 'GO')->first()->id;
        $this->createLgas($gombe, [
            'Akko', 'Balanga', 'Billiri', 'Dukku', 'Funakaye',
            'Gombe', 'Kaltungo', 'Kwami', 'Nafada', 'Shongom',
            'Yamaltu/Deba',
        ]);

        // Imo
        $imo = State::where('code', 'IM')->first()->id;
        $this->createLgas($imo, [
            'Aboh Mbaise', 'Ahiazu Mbaise', 'Ehime Mbano', 'Ezinihitte', 'Ideato North',
            'Ideato South', 'Ihitte/Uboma', 'Ikeduru', 'Isiala Mbano', 'Isu',
            'Mbaitoli', 'Ngor Okpala', 'Njaba', 'Nkwerre', 'Nwangele',
            'Obowo', 'Oguta', 'Ohaji/Egbema', 'Okigwe', 'Orlu',
            'Orsu', 'Oru East', 'Oru West', 'Owerri Municipal', 'Owerri North',
            'Owerri West', 'Unuimo',
        ]);

        // Jigawa
        $jigawa = State::where('code', 'JI')->first()->id;
        $this->createLgas($jigawa, [
            'Auyo', 'Babura', 'Biriniwa', 'Birnin Kudu', 'Buji',
            'Dutse', 'Gagarawa', 'Garki', 'Gumel', 'Guri',
            'Gwaram', 'Gwiwa', 'Hadejia', 'Jahun', 'Kafin Hausa',
            'Kaugama', 'Kazaure', 'Kiri Kasama', 'Kiyawa', 'Maigatari',
            'Malam Madori', 'Miga', 'Ringim', 'Roni', 'Sule Tankarkar',
            'Taura', 'Yankwashi',
        ]);

        // Kaduna
        $kaduna = State::where('code', 'KD')->first()->id;
        $this->createLgas($kaduna, [
            'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara',
            'Jaba', 'Jema\'a', 'Kachia', 'Kaduna North', 'Kaduna South',
            'Kagarko', 'Kajuru', 'Kaura', 'Kauru', 'Kubau',
            'Kudan', 'Lere', 'Makarfi', 'Sabon Gari', 'Sanga',
            'Soba', 'Zangon Kataf', 'Zaria',
        ]);

        // Kano
        $kano = State::where('code', 'KN')->first()->id;
        $this->createLgas($kano, [
            'Ajingi', 'Albasu', 'Bagwai', 'Bebeji', 'Bichi',
            'Bunkure', 'Dala', 'Dambatta', 'Dawakin Kudu', 'Dawakin Tofa',
            'Doguwa', 'Fagge', 'Gabasawa', 'Garko', 'Garun Mallam',
            'Gaya', 'Gezawa', 'Gwale', 'Gwarzo', 'Kabo',
            'Kano Municipal', 'Karaye', 'Kibiya', 'Kiru', 'Kumbotso',
            'Kunchi', 'Kura', 'Madobi', 'Makoda', 'Minjibir',
            'Nasarawa', 'Rano', 'Rimin Gado', 'Rogo', 'Shanono',
            'Sumaila', 'Takai', 'Tarauni', 'Tofa', 'Tsanyawa',
            'Tudun Wada', 'Ungogo', 'Warawa', 'Wudil',
        ]);

        // Katsina
        $katsina = State::where('code', 'KT')->first()->id;
        $this->createLgas($katsina, [
            'Bakori', 'Batagarawa', 'Batsari', 'Baure', 'Bindawa',
            'Charanchi', 'Dan Musa', 'Dandume', 'Danja', 'Daura',
            'Dutsi', 'Dutsin Ma', 'Faskari', 'Funtua', 'Ingawa',
            'Jibia', 'Kafur', 'Kaita', 'Kankara', 'Kankia',
            'Katsina', 'Kurfi', 'Kusada', 'Mai\'Adua', 'Malumfashi',
            'Mani', 'Mashi', 'Matazu', 'Musawa', 'Rimi',
            'Sabuwa', 'Safana', 'Sandamu', 'Zango',
        ]);

        // Kebbi
        $kebbi = State::where('code', 'KE')->first()->id;
        $this->createLgas($kebbi, [
            'Aleiro', 'Arewa Dandi', 'Argungu', 'Augie', 'Bagudo',
            'Birnin Kebbi', 'Bunza', 'Dandi', 'Fakai', 'Gwandu',
            'Jega', 'Kalgo', 'Koko/Besse', 'Maiyama', 'Ngaski',
            'Sakaba', 'Shanga', 'Suru', 'Danko-Wasagu', 'Yauri',
            'Zuru',
        ]);

        // Kogi
        $kogi = State::where('code', 'KO')->first()->id;
        $this->createLgas($kogi, [
            'Adavi', 'Ajaokuta', 'Ankpa', 'Bassa', 'Dekina',
            'Ibaji', 'Idah', 'Igalamela Odolu', 'Ijumu', 'Kabba/Bunu',
            'Kogi', 'Lokoja', 'Mopa Muro', 'Ofu', 'Ogori/Magongo',
            'Okehi', 'Okene', 'Olamaboro', 'Omala', 'Yagba East',
            'Yagba West',
        ]);

        // Kwara
        $kwara = State::where('code', 'KW')->first()->id;
        $this->createLgas($kwara, [
            'Asa', 'Baruten', 'Edu', 'Ekiti (Kwara)', 'Ifelodun',
            'Ilorin East', 'Ilorin South', 'Ilorin West', 'Irepodun', 'Isin',
            'Kaiama', 'Moro', 'Offa', 'Oke Ero', 'Oyun',
            'Pategi',
        ]);

        // Lagos
        $lagos = State::where('code', 'LA')->first()->id;
        $this->createLgas($lagos, [
            'Agege', 'Ajeromi-Ifelodun', 'Alimosho', 'Amuwo-Odofin', 'Apapa',
            'Badagry', 'Epe', 'Eti Osa', 'Ibeju-Lekki', 'Ifako-Ijaiye',
            'Ikeja', 'Ikorodu', 'Kosofe', 'Lagos Island', 'Lagos Mainland',
            'Mushin', 'Ojo', 'Oshodi-Isolo', 'Shomolu', 'Surulere',
        ]);

        // Nasarawa
        $nasarawa = State::where('code', 'NA')->first()->id;
        $this->createLgas($nasarawa, [
            'Akwanga', 'Awe', 'Doma', 'Karu', 'Keana',
            'Keffi', 'Kokona', 'Lafia', 'Nasarawa', 'Nasarawa Eggon',
            'Obi', 'Toto', 'Wamba',
        ]);

        // Niger
        $niger = State::where('code', 'NI')->first()->id;
        $this->createLgas($niger, [
            'Agaie', 'Agwara', 'Bida', 'Borgu', 'Bosso',
            'Chanchaga', 'Edati', 'Gbako', 'Gurara', 'Katcha',
            'Kontagora', 'Lapai', 'Lavun', 'Magama', 'Mariga',
            'Mashegu', 'Mokwa', 'Muya', 'Paikoro', 'Rafi',
            'Rijau', 'Shiroro', 'Suleja', 'Tafa', 'Wushishi',
        ]);

        // Ogun
        $ogun = State::where('code', 'OG')->first()->id;
        $this->createLgas($ogun, [
            'Abeokuta North', 'Abeokuta South', 'Ado-Odo/Ota', 'Egbado North', 'Egbado South',
            'Ewekoro', 'Ifo', 'Ijebu East', 'Ijebu North', 'Ijebu North East',
            'Ijebu Ode', 'Ikenne', 'Imeko Afon', 'Ipokia', 'Obafemi Owode',
            'Odeda', 'Odogbolu', 'Ogun Waterside', 'Remo North', 'Sagamu',
        ]);

        // Ondo
        $ondo = State::where('code', 'ON')->first()->id;
        $this->createLgas($ondo, [
            'Akoko North-East', 'Akoko North-West', 'Akoko South-East', 'Akoko South-West', 'Akure North',
            'Akure South', 'Ese Odo', 'Idanre', 'Ifedore', 'Ilaje',
            'Ile Oluji/Okeigbo', 'Irele', 'Odigbo', 'Okitipupa', 'Ondo East',
            'Ondo West', 'Ose', 'Owo',
        ]);

        // Osun
        $osun = State::where('code', 'OS')->first()->id;
        $this->createLgas($osun, [
            'Atakunmosa East', 'Atakunmosa West', 'Aiyedaade', 'Aiyedire', 'Boluwaduro',
            'Boripe', 'Ede North', 'Ede South', 'Egbedore', 'Ejigbo',
            'Ife Central', 'Ife East', 'Ife North', 'Ife South', 'Ifedayo',
            'Ifelodun', 'Ila', 'Ilesa East', 'Ilesa West', 'Irepodun',
            'Irewole', 'Isokan', 'Iwo', 'Obokun', 'Odo Otin',
            'Ola Oluwa', 'Olorunda', 'Oriade', 'Orolu', 'Osogbo',
        ]);

        // Oyo
        $oyo = State::where('code', 'OY')->first()->id;
        $this->createLgas($oyo, [
            'Afijio', 'Akinyele', 'Atiba', 'Atisbo', 'Egbeda',
            'Ibadan North', 'Ibadan North-East', 'Ibadan North-West', 'Ibadan South-East', 'Ibadan South-West',
            'Ibarapa Central', 'Ibarapa East', 'Ibarapa North', 'Ido', 'Irepo',
            'Iseyin', 'Itesiwaju', 'Iwajowa', 'Kajola', 'Lagelu',
            'Ogbomosho North', 'Ogbomosho South', 'Ogo Oluwa', 'Olorunsogo', 'Oluyole',
            'Ona Ara', 'Orelope', 'Ori Ire', 'Oyo East', 'Oyo West',
            'Saki East', 'Saki West', 'Surulere (Oyo)',
        ]);

        // Plateau
        $plateau = State::where('code', 'PL')->first()->id;
        $this->createLgas($plateau, [
            'Barkin Ladi', 'Bassa', 'Bokkos', 'Jos East', 'Jos North',
            'Jos South', 'Kanam', 'Kanke', 'Langtang North', 'Langtang South',
            'Mangu', 'Mikang', 'Pankshin', 'Qua\'an Pan', 'Riyom',
            'Shendam', 'Wase',
        ]);

        // Rivers
        $rivers = State::where('code', 'RI')->first()->id;
        $this->createLgas($rivers, [
            'Abua/Odual', 'Ahoada East', 'Ahoada West', 'Akuku Toru', 'Andoni',
            'Asari Toru', 'Bonny', 'Degema', 'Eleme', 'Emohua',
            'Etche', 'Gokana', 'Ikwerre', 'Khana', 'Obio/Akpor',
            'Ogba/Egbema/Ndoni', 'Ogu/Bolo', 'Okrika', 'Omuma', 'Opobo/Nkoro',
            'Oyigbo', 'Port Harcourt', 'Tai',
        ]);

        // Sokoto
        $sokoto = State::where('code', 'SO')->first()->id;
        $this->createLgas($sokoto, [
            'Binji', 'Bodinga', 'Dange Shuni', 'Gada', 'Goronyo',
            'Gudu', 'Gwadabawa', 'Illela', 'Isa', 'Kebbe',
            'Kware', 'Rabah', 'Sabon Birni', 'Shagari', 'Silame',
            'Sokoto North', 'Sokoto South', 'Tambuwal', 'Tangaza', 'Tureta',
            'Wamakko', 'Wurno', 'Yabo',
        ]);

        // Taraba
        $taraba = State::where('code', 'TA')->first()->id;
        $this->createLgas($taraba, [
            'Ardo Kola', 'Bali', 'Donga', 'Gashaka', 'Gassol',
            'Ibi', 'Jalingo', 'Karim Lamido', 'Kurmi', 'Lau',
            'Sardauna', 'Takum', 'Ussa', 'Wukari', 'Yorro',
            'Zing',
        ]);

        // Yobe
        $yobe = State::where('code', 'YO')->first()->id;
        $this->createLgas($yobe, [
            'Bade', 'Bursari', 'Damaturu', 'Fika', 'Fune',
            'Geidam', 'Gujba', 'Gulani', 'Jakusko', 'Karasuwa',
            'Machina', 'Nangere', 'Nguru', 'Potiskum', 'Tarmuwa',
            'Yunusari', 'Yusufari',
        ]);

        // Zamfara
        $zamfara = State::where('code', 'ZA')->first()->id;
        $this->createLgas($zamfara, [
            'Anka', 'Bakura', 'Birnin Magaji/Kiyaw', 'Bukkuyum', 'Bungudu',
            'Gummi', 'Gusau', 'Kaura Namoda', 'Maradun', 'Maru',
            'Shinkafi', 'Talata Mafara', 'Tsafe', 'Zurmi',
        ]);
    }

    private function createLgas($stateId, array $lgas): void
    {
        foreach ($lgas as $lga) {
            Lga::create([
                'state_id' => $stateId,
                'name' => $lga,
            ]);
        }
    }
}
