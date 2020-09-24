<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::create([
            'nidn'              => '0100',
            'nama'              => 'Garrett Winters',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Massachusetts',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '7151737437767932',
            'telepon'           => '03619639114',
            'hp'                => '087909814531',
            'email'             => 'mail@garrett.com',
            'web'               => 'garrett.com',
            'jabatan_id'        => 1,
            'prodi_id'          => 1,
            'sinta_id'          => 'TLkTgGA',
            'google_scholar_id' => 'GfOUuwbLCd'
        ]);

        Dosen::create([
            'nidn'              => '0101',
            'nama'              => 'Airi Satou',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Vermont',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '3367378686892419',
            'telepon'           => '03619220394',
            'hp'                => '087128692322',
            'email'             => 'mail@airi.com',
            'web'               => 'airi.com',
            'jabatan_id'        => 2,
            'prodi_id'          => 1,
            'sinta_id'          => 'Zk2PwZI',
            'google_scholar_id' => 'vtVpsGFSUr'
        ]);

        Dosen::create([
            'nidn'              => '0102',
            'nama'              => 'Ashton Cox',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Illinois',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '8692199793690493',
            'telepon'           => '03612681118',
            'hp'                => '082327374651',
            'email'             => 'mail@ashton.com',
            'web'               => 'ashton.com',
            'jabatan_id'        => 3,
            'prodi_id'          => 1,
            'sinta_id'          => 'UC6isMM',
            'google_scholar_id' => 'zOvihIqwkR'
        ]);

        Dosen::create([
            'nidn'              => '0103',
            'nama'              => 'Cedric Kelly',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Missouri',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '5356938930400747',
            'telepon'           => '03619983356',
            'hp'                => '083473542092',
            'email'             => 'mail@cedric.com',
            'web'               => 'cedric.com',
            'jabatan_id'        => 4,
            'prodi_id'          => 2,
            'sinta_id'          => 'Zsmi5lb',
            'google_scholar_id' => 'f8j2iIYFMf'
        ]);

        Dosen::create([
            'nidn'              => '0104',
            'nama'              => 'Tiger Nixon',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Nebraska',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '2782714649372027',
            'telepon'           => '03611198138',
            'hp'                => '081117529822',
            'email'             => 'mail@tiger.com',
            'web'               => 'tiger.com',
            'jabatan_id'        => 5,
            'prodi_id'          => 2,
            'sinta_id'          => 'FlXdWiG',
            'google_scholar_id' => 'Doy0vZ9SXy'
        ]);

        Dosen::create([
            'nidn'              => '0105',
            'nama'              => 'Bryan Guerrero',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Pennsylvania',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '1777253914931353',
            'telepon'           => '03619092845',
            'hp'                => '082326947109',
            'email'             => 'mail@bryan.com',
            'web'               => 'bryan.com',
            'jabatan_id'        => 6,
            'prodi_id'          => 2,
            'sinta_id'          => 'AIIA27V',
            'google_scholar_id' => 'KEzDyq1dtK'
        ]);

        Dosen::create([
            'nidn'              => '0106',
            'nama'              => 'Catherine Lake',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'South Carolina',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '2827318401312834',
            'telepon'           => '03614959321',
            'hp'                => '087135916803',
            'email'             => 'mail@catherine.com',
            'web'               => 'catherine.com',
            'jabatan_id'        => 6,
            'prodi_id'          => 2,
            'sinta_id'          => 'zXrWlQM',
            'google_scholar_id' => 'qmAaXdk9rX'
        ]);

        Dosen::create([
            'nidn'              => '0107',
            'nama'              => 'Aston Holland',
            'alamat'            => 'Denpasar, Bali',
            'tempat_lahir'      => 'Texas',
            'tanggal_lahir'     => '1980-01-01',
            'ktp'               => '5172592139524557',
            'telepon'           => '03613571347',
            'hp'                => '082744966159',
            'email'             => 'mail@aston.com',
            'web'               => 'aston.com',
            'jabatan_id'        => 6,
            'prodi_id'          => 2,
            'sinta_id'          => 'fS2kdqA',
            'google_scholar_id' => 'J3dasuXwJl'
        ]);
    }
}
