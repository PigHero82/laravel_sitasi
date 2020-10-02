<?php

namespace Database\Seeders;

use App\Models\RumpunIlmu;
use Illuminate\Database\Seeder;

class RumpunIlmuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RumpunIlmu::create([
            'kode'      => '100',
            'rumpun'    => 'MATEMATIKA DAN ILMU PENGETAHUAN ALAM (MIPA)'
        ]);
        
        RumpunIlmu::create([
            'kode'      => '110',
            'rumpun'    => 'ILMU IPA',
            'sub'       => '100'
        ]);

        RumpunIlmu::create([
            'kode'      => '111',
            'rumpun'    => 'Fisika',
            'sub'       => '110'
        ]);

        RumpunIlmu::create([
            'kode'      => '112',
            'rumpun'    => 'Kimia',
            'sub'       => '110'
        ]);

        RumpunIlmu::create([
            'kode'      => '113',
            'rumpun'    => 'Biologi (dan Bioteknologi Umum)',
            'sub'       => '110'
        ]);

        RumpunIlmu::create([
            'kode'      => '114',
            'rumpun'    => 'Bidang Ipa Lain Yang Belum Tercantum',
            'sub'       => '110'
        ]);

        RumpunIlmu::create([
            'kode'      => '120',
            'rumpun'    => 'MATEMATIKA',
            'sub'       => '100'
        ]);

        RumpunIlmu::create([
            'kode'      => '121',
            'rumpun'    => 'Matematika',
            'sub'       => '120'
        ]);

        RumpunIlmu::create([
            'kode'      => '122',
            'rumpun'    => 'Statistik',
            'sub'       => '120'
        ]);

        RumpunIlmu::create([
            'kode'      => '123',
            'rumpun'    => 'Ilmu Komputer',
            'sub'       => '120'
        ]);

        RumpunIlmu::create([
            'kode'      => '124',
            'rumpun'    => 'Bidang Matematika Lain yang Belum Tercantum',
            'sub'       => '120'
        ]);

        RumpunIlmu::create([
            'kode'      => '130',
            'rumpun'    => 'KEBUMIAN DAN ANGKASA',
            'sub'       => '100'
        ]);

        RumpunIlmu::create([
            'kode'      => '131',
            'rumpun'    => 'Astronomi',
            'sub'       => '130'
        ]);

        RumpunIlmu::create([
            'kode'      => '132',
            'rumpun'    => 'Geografi',
            'sub'       => '130'
        ]);

        RumpunIlmu::create([
            'kode'      => '133',
            'rumpun'    => 'Geologi',
            'sub'       => '130'
        ]);

        RumpunIlmu::create([
            'kode'      => '134',
            'rumpun'    => 'Geofisika',
            'sub'       => '130'
        ]);

        RumpunIlmu::create([
            'kode'      => '135',
            'rumpun'    => 'Meteorologi',
            'sub'       => '130'
        ]);

        RumpunIlmu::create([
            'kode'      => '136',
            'rumpun'    => 'Bidang Geofisika Lain yang Belum Tercantum',
            'sub'       => '130'
        ]);

        RumpunIlmu::create([
            'kode'      => '140',
            'rumpun'    => 'ILMU TANAMAN'
        ]);

        RumpunIlmu::create([
            'kode'      => '150',
            'rumpun'    => 'ILMU PERTANIAN DAN PERKEBUNAN',
            'sub'       => '140'
        ]);

        RumpunIlmu::create([
            'kode'      => '151',
            'rumpun'    => 'Ilmu Tanah',
            'sub'       => '150'
        ]);

        RumpunIlmu::create([
            'kode'      => '152',
            'rumpun'    => 'Hortikultura',
            'sub'       => '150'
        ]);

        RumpunIlmu::create([
            'kode'      => '153',
            'rumpun'    => 'Ilmu Hama dan Penyakit Tanaman',
            'sub'       => '150'
        ]);

        RumpunIlmu::create([
            'kode'      => '154',
            'rumpun'    => 'Budidaya Pertanian dan Perkebunan',
            'sub'       => '150'
        ]);

        RumpunIlmu::create([
            'kode'      => '155',
            'rumpun'    => 'Perkebunan',
            'sub'       => '150'
        ]);

        RumpunIlmu::create([
            'kode'      => '156',
            'rumpun'    => 'Pemuliaan Tanaman',
            'sub'       => '150'
        ]);

        RumpunIlmu::create([
            'kode'      => '157',
            'rumpun'    => 'Bidang Pertanian & Perkebunan Lain yang Belum Tercantum',
            'sub'       => '150'
        ]);

        RumpunIlmu::create([
            'kode'      => '160',
            'rumpun'    => 'TEKNOLOGI DALAM ILMU TANAMAN',
            'sub'       => '140'
        ]);

        RumpunIlmu::create([
            'kode'      => '161',
            'rumpun'    => 'Teknologi Industri Pertanian (dan Agroteknologi)',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '162',
            'rumpun'    => 'Teknologi Hasil Pertanian',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '163',
            'rumpun'    => 'Teknologi Pertanian',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '164',
            'rumpun'    => 'Mekanisasi Pertanian',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '165',
            'rumpun'    => 'Teknologi Pangan dan Gizi',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '166',
            'rumpun'    => 'Teknologi Pasca Panen',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '167',
            'rumpun'    => 'Teknologi Perkebunan',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '168',
            'rumpun'    => 'Bioteknologi Pertanian dan Perkebunan',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '169',
            'rumpun'    => 'Ilmu Pangan',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '171',
            'rumpun'    => 'Bidang Teknologi Dalam Ilmu Tanaman yang Belum Tercantum',
            'sub'       => '160'
        ]);

        RumpunIlmu::create([
            'kode'      => '180',
            'rumpun'    => 'ILMU SOSIOLOGI PERTANIAN',
            'sub'       => '140'
        ]);

        RumpunIlmu::create([
            'kode'      => '181',
            'rumpun'    => 'Sosial Ekonomi Pertanian',
            'sub'       => '180'
        ]);

        RumpunIlmu::create([
            'kode'      => '182',
            'rumpun'    => 'Gizi Masyarakat dan Sumber Daya Keluarga',
            'sub'       => '180'
        ]);

        RumpunIlmu::create([
            'kode'      => '183',
            'rumpun'    => 'Ekonomi Pertanian',
            'sub'       => '180'
        ]);

        RumpunIlmu::create([
            'kode'      => '184',
            'rumpun'    => 'Sosiologi Pedesaan',
            'sub'       => '180'
        ]);

        RumpunIlmu::create([
            'kode'      => '185',
            'rumpun'    => 'Agribisnis',
            'sub'       => '180'
        ]);

        RumpunIlmu::create([
            'kode'      => '186',
            'rumpun'    => 'Penyuluh Pertanian',
            'sub'       => '180'
        ]);

        RumpunIlmu::create([
            'kode'      => '187',
            'rumpun'    => 'Bidang Sosiologi Pertanian Lain Yang Belum Tercantum',
            'sub'       => '180'
        ]);

        RumpunIlmu::create([
            'kode'      => '190',
            'rumpun'    => 'ILMU KEHUTANAN',
            'sub'       => '140'
        ]);

        RumpunIlmu::create([
            'kode'      => '191',
            'rumpun'    => 'Budidaya Kehutanan',
            'sub'       => '190'
        ]);

        RumpunIlmu::create([
            'kode'      => '192',
            'rumpun'    => 'Konservasi Sumberdaya Hutan',
            'sub'       => '190'
        ]);

        RumpunIlmu::create([
            'kode'      => '193',
            'rumpun'    => 'Manajemen Hutan',
            'sub'       => '190'
        ]);

        RumpunIlmu::create([
            'kode'      => '194',
            'rumpun'    => 'Teknologi Hasil Hutan',
            'sub'       => '190'
        ]);

        RumpunIlmu::create([
            'kode'      => '195',
            'rumpun'    => 'Bidang Kehutanan Lain Yang Belum Tercantum',
            'sub'       => '190'
        ]);

        RumpunIlmu::create([
            'kode'      => '200',
            'rumpun'    => 'ILMU HEWANI'
        ]);

        RumpunIlmu::create([
            'kode'      => '210',
            'rumpun'    => 'ILMU PETERNAKAN',
            'sub'       => '200'
        ]);

        RumpunIlmu::create([
            'kode'      => '211',
            'rumpun'    => 'Ilmu Peternakan',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '212',
            'rumpun'    => 'Sosial Ekonomi Perternakan',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '213',
            'rumpun'    => 'Nutrisi dan Makanan Ternak',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '214',
            'rumpun'    => 'Teknologi Hasil Ternak',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '215',
            'rumpun'    => 'Pembangunan Peternakan',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '216',
            'rumpun'    => 'Produksi Ternak',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '217',
            'rumpun'    => 'Budidaya Ternak',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '218',
            'rumpun'    => 'Produksi dan Teknologi Pakan Ternak',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '219',
            'rumpun'    => 'Bioteknologi Peternakan',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '221',
            'rumpun'    => 'Sain Veteriner',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '222',
            'rumpun'    => 'Bidang Peternakan Lain Yang Belum Tercantum',
            'sub'       => '210'
        ]);

        RumpunIlmu::create([
            'kode'      => '230',
            'rumpun'    => 'ILMU PERIKANAN',
            'sub'       => '200'
        ]);

        RumpunIlmu::create([
            'kode'      => '231',
            'rumpun'    => 'Sosial Ekonomi Perikanan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '232',
            'rumpun'    => 'Pemanfaatan Sumberdaya Perikanan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '233',
            'rumpun'    => 'Budidaya Perikanan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '234',
            'rumpun'    => 'Pengolahan Hasil Perikanan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '235',
            'rumpun'    => 'Sumberdaya Perairan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '236',
            'rumpun'    => 'Nutrisi dan Makanan Ikan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '237',
            'rumpun'    => 'Teknologi Penangkapan Ikan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '238',
            'rumpun'    => 'Bioteknologi Perikanan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '239',
            'rumpun'    => 'Budidaya Perairan',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '241',
            'rumpun'    => 'Bidang Perikanan Lain Yang Belum Tercantum',
            'sub'       => '230'
        ]);

        RumpunIlmu::create([
            'kode'      => '250',
            'rumpun'    => 'ILMU KEDOKTERAN HEWAN',
            'sub'       => '200'
        ]);

        RumpunIlmu::create([
            'kode'      => '251',
            'rumpun'    => 'Kedokteran Hewan',
            'sub'       => '250'
        ]);

        RumpunIlmu::create([
            'kode'      => '252',
            'rumpun'    => 'Bidang Kedokteran Hewan Lain yang Belum Tercantum',
            'sub'       => '250'
        ]);

        RumpunIlmu::create([
            'kode'      => '260',
            'rumpun'    => 'ILMU KEDOKTERAN'
        ]);

        RumpunIlmu::create([
            'kode'      => '270',
            'rumpun'    => 'ILMU KEDOKTERAN SPESIALIS',
            'sub'       => '260'
        ]);

        RumpunIlmu::create([
            'kode'      => '272',
            'rumpun'    => 'Anestesi',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '273',
            'rumpun'    => 'Bedah (Umum, Plastik, Orthopaedi, Urologi, Dll)',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '274',
            'rumpun'    => 'Kebidanan dan Penyakit Kandungan',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '275',
            'rumpun'    => 'Kedokteran Forensik',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '276',
            'rumpun'    => 'Kedokteran Olahraga',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '277',
            'rumpun'    => 'Penyakit Anak',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '278',
            'rumpun'    => 'Ilmu Kedokteran Nuklir',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '279',
            'rumpun'    => 'Ilmu Kedokteran Fisik dan Rehabilitasi',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '281',
            'rumpun'    => 'Penyakit THT',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '282',
            'rumpun'    => 'Patologi Anatomi',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '283',
            'rumpun'    => 'Patologi Klinik',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '284',
            'rumpun'    => 'Penyakit Dalam',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '285',
            'rumpun'    => 'Penyakit Jantung',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '286',
            'rumpun'    => 'Penyakit Kulit dan Kelamin',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '287',
            'rumpun'    => 'Penyakit Mata',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '288',
            'rumpun'    => 'Ilmu Kedokteran Fisik dan Rehabilitasi',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '289',
            'rumpun'    => 'Penyakit Paru',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '291',
            'rumpun'    => 'Penyakit Syaraf',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '293',
            'rumpun'    => 'Mikrobiologi Klinik',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '294',
            'rumpun'    => 'Neurologi',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '295',
            'rumpun'    => 'Psikiatri',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '296',
            'rumpun'    => 'Radiologi',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '297',
            'rumpun'    => 'Rehabilitasi Medik',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '298',
            'rumpun'    => 'Bidang Kedokteran Spesialis Lain Yang Tercantum',
            'sub'       => '270'
        ]);

        RumpunIlmu::create([
            'kode'      => '300',
            'rumpun'    => 'ILMU KEDOKTERAN (AKADEMIK)',
            'sub'       => '260'
        ]);

        RumpunIlmu::create([
            'kode'      => '301',
            'rumpun'    => 'Biologi Reproduksi',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '303',
            'rumpun'    => 'Ilmu Biologi Reproduksi',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '304',
            'rumpun'    => 'Ilmu Biomedik',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '305',
            'rumpun'    => 'Ilmu Kedokteran Umum',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '306',
            'rumpun'    => 'Ilmu Kedokteran Dasar',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '307',
            'rumpun'    => 'Ilmu Kedokteran Dasar & Biomedis',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '308',
            'rumpun'    => 'Ilmu Kedokteran Keluarga',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '309',
            'rumpun'    => 'Ilmu Kedokteran Klinik',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '311',
            'rumpun'    => 'Ilmu Kedokteran Tropis',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '312',
            'rumpun'    => 'Imunologi',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '313',
            'rumpun'    => 'Kedokteran Kerja',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '314',
            'rumpun'    => 'Kesehatan Reproduksi',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '315',
            'rumpun'    => 'Bidang Ilmu Kedokteran Lain Yang Belum Tercantum',
            'sub'       => '300'
        ]);

        RumpunIlmu::create([
            'kode'      => '320',
            'rumpun'    => 'ILMU SPESIALIS KEDOKTERAN GIGI DAN MULUT',
            'sub'       => '260'
        ]);

        RumpunIlmu::create([
            'kode'      => '321',
            'rumpun'    => 'Kedokteran Gigi',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '322',
            'rumpun'    => 'Bedah Mulut',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '323',
            'rumpun'    => 'Penyakit Mulut',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '324',
            'rumpun'    => 'Periodonsia',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '325',
            'rumpun'    => 'Ortodonsia',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '326',
            'rumpun'    => 'Prostodonsia',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '327',
            'rumpun'    => 'Konservasi Gigi',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '328',
            'rumpun'    => 'Bidang Spesialis Kedokteran Gigi Lain Yang Belum Tercantum',
            'sub'       => '320'
        ]);

        RumpunIlmu::create([
            'kode'      => '330',
            'rumpun'    => 'ILMU KEDOKTERAN GIGI (AKADEMIK)',
            'sub'       => '260'
        ]);

        RumpunIlmu::create([
            'kode'      => '331',
            'rumpun'    => 'Ilmu Kedokteran Gigi',
            'sub'       => '330'
        ]);

        RumpunIlmu::create([
            'kode'      => '332',
            'rumpun'    => 'Ilmu Kedokteran Gigi Dasar',
            'sub'       => '330'
        ]);

        RumpunIlmu::create([
            'kode'      => '333',
            'rumpun'    => 'Ilmu Kedokteran Gigi Komunitas',
            'sub'       => '330'
        ]);

        RumpunIlmu::create([
            'kode'      => '334',
            'rumpun'    => 'Bidang Ilmu Kedokteran Gigi Lain Yang Belum Tercantum',
            'sub'       => '330'
        ]);

        RumpunIlmu::create([
            'kode'      => '340',
            'rumpun'    => 'ILMU KESEHATAN'
        ]);

        RumpunIlmu::create([
            'kode'      => '350',
            'rumpun'    => 'ILMU KESEHATAN UMUM',
            'sub'       => '340'
        ]);

        RumpunIlmu::create([
            'kode'      => '351',
            'rumpun'    => 'Kesehatan Masyarakat',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '352',
            'rumpun'    => 'Keselamatan dan Kesehatan Kerja (Kesehatan Kerja; Hiperkes)',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '353',
            'rumpun'    => 'Kebijakan Kesehatan (dan Analis Kesehatan)',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '354',
            'rumpun'    => 'Ilmu Gizi',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '355',
            'rumpun'    => 'Epidemiologi',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '356',
            'rumpun'    => 'Teknik Penyehatan Lingkungan',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '357',
            'rumpun'    => 'Promosi Kesehatan',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '358',
            'rumpun'    => 'Ilmu Asuransi Jiwa dan Kesehatan',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '359',
            'rumpun'    => 'Kesehatan Lingkungan',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '361',
            'rumpun'    => 'Ilmu Olah Raga',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '362',
            'rumpun'    => 'Bidang Kesehatan Umum Lain Yang Belum Tercantum',
            'sub'       => '350'
        ]);

        RumpunIlmu::create([
            'kode'      => '370',
            'rumpun'    => 'ILMU KEPERAWATAN DAN KEBIDANAN',
            'sub'       => '340'
        ]);

        RumpunIlmu::create([
            'kode'      => '371',
            'rumpun'    => 'Ilmu Keperawatan',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '372',
            'rumpun'    => 'Kebidanan',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '373',
            'rumpun'    => 'Administrasi Rumah Sakit',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '375',
            'rumpun'    => 'Entomologi (Kesehatan, Fitopatologi)',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '376',
            'rumpun'    => 'Ilmu Biomedik',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '377',
            'rumpun'    => 'Ergonomi Fisiologi Kerja',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '378',
            'rumpun'    => 'Fisioterapi',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '379',
            'rumpun'    => 'Analis Medis',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '381',
            'rumpun'    => 'Fisiologi (Keolahragaan)',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '382',
            'rumpun'    => 'Reproduksi (Biologi dan Kesehatan)',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '383',
            'rumpun'    => 'Akupunktur',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '384',
            'rumpun'    => 'Rehabilitasi Medik',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '385',
            'rumpun'    => 'Bidang Keperawatan & Kebidanan Lain Yang Belum Tercantum',
            'sub'       => '370'
        ]);

        RumpunIlmu::create([
            'kode'      => '390',
            'rumpun'    => 'ILMU PSIKOLOGI',
            'sub'       => '340'
        ]);

        RumpunIlmu::create([
            'kode'      => '391',
            'rumpun'    => 'Psikologi Umum',
            'sub'       => '390'
        ]);

        RumpunIlmu::create([
            'kode'      => '392',
            'rumpun'    => 'Psikologi Anak',
            'sub'       => '390'
        ]);

        RumpunIlmu::create([
            'kode'      => '393',
            'rumpun'    => 'Psikologi Masyarakat',
            'sub'       => '390'
        ]);

        RumpunIlmu::create([
            'kode'      => '394',
            'rumpun'    => 'Psikologi Kerja (Industri)',
            'sub'       => '390'
        ]);

        RumpunIlmu::create([
            'kode'      => '395',
            'rumpun'    => 'Bidang Psikologi Lain Yang Belum Tercantum',
            'sub'       => '390'
        ]);

        RumpunIlmu::create([
            'kode'      => '400',
            'rumpun'    => 'ILMU FARMASI',
            'sub'       => '340'
        ]);

        RumpunIlmu::create([
            'kode'      => '401',
            'rumpun'    => 'Farmasi Umum dan Apoteker',
            'sub'       => '400'
        ]);

        RumpunIlmu::create([
            'kode'      => '402',
            'rumpun'    => 'Farmakologi dan Farmasi Klinik',
            'sub'       => '400'
        ]);

        RumpunIlmu::create([
            'kode'      => '403',
            'rumpun'    => 'Biologi Farmasi',
            'sub'       => '400'
        ]);

        RumpunIlmu::create([
            'kode'      => '404',
            'rumpun'    => 'Analisis Farmasi dan Kimia Medisinal',
            'sub'       => '400'
        ]);

        RumpunIlmu::create([
            'kode'      => '405',
            'rumpun'    => 'Farmasetika dan Teknologi Farmasi',
            'sub'       => '400'
        ]);

        RumpunIlmu::create([
            'kode'      => '406',
            'rumpun'    => 'Farmasi Makanan dan Analisis Keamanan Pangan',
            'sub'       => '400'
        ]);

        RumpunIlmu::create([
            'kode'      => '407',
            'rumpun'    => 'Farmasi Lain Yang Belum Tercantum',
            'sub'       => '400'
        ]);

        RumpunIlmu::create([
            'kode'      => '410',
            'rumpun'    => 'ILMU TEKNIK'
        ]);

        RumpunIlmu::create([
            'kode'      => '420',
            'rumpun'    => 'TEKNIK SIPIL DAN PERENCANAAN TATA RUANG',
            'sub'       => '410'
        ]);

        RumpunIlmu::create([
            'kode'      => '421',
            'rumpun'    => 'Teknik Sipil',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '422',
            'rumpun'    => 'Teknik Lingkungan',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '423',
            'rumpun'    => 'Rancang Kota',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '424',
            'rumpun'    => 'Perencanaan Wilayah dan Kota',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '425',
            'rumpun'    => 'Teknik Pengairan',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '426',
            'rumpun'    => 'Teknik Arsitektur',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '427',
            'rumpun'    => 'Teknologi Alat Berat',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '428',
            'rumpun'    => 'Transportasi',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '429',
            'rumpun'    => 'Bidang Teknik Sipil Lain Yang Belum Tercantum',
            'sub'       => '420'
        ]);

        RumpunIlmu::create([
            'kode'      => '430',
            'rumpun'    => 'ILMU KETEKNIKAN INDUSTRI',
            'sub'       => '410'
        ]);

        RumpunIlmu::create([
            'kode'      => '431',
            'rumpun'    => 'Teknik Mesin (dan Ilmu Permesinan Lain)',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '432',
            'rumpun'    => 'Teknik Produksi (dan Atau Manufakturing)',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '433',
            'rumpun'    => 'Teknik Kimia',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '434',
            'rumpun'    => 'Teknik (Industri) Farmasi',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '435',
            'rumpun'    => 'Teknik Industri',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '436',
            'rumpun'    => 'Penerbangan/Aeronotika dan Astronotika',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '437',
            'rumpun'    => 'Teknik Pertekstilan (Tekstil)',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '438',
            'rumpun'    => 'Teknik Refrigerasi',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '439',
            'rumpun'    => 'Bioteknologi Dalam Industri',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '441',
            'rumpun'    => 'Teknik Nuklir (dan Atau Ilmu Nuklir Lain)',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '442',
            'rumpun'    => 'Teknik Fisika',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '443',
            'rumpun'    => 'Teknik Enerji',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '444',
            'rumpun'    => 'Penginderaan Jauh',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '445',
            'rumpun'    => 'Teknik Material (Ilmu Bahan)',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '446',
            'rumpun'    => 'Bidang Keteknikan Industri Lain Yang Belum Tercantum',
            'sub'       => '430'
        ]);

        RumpunIlmu::create([
            'kode'      => '450',
            'rumpun'    => 'TEKNIK ELEKTRO DAN INFORMATIKA',
            'sub'       => '410'
        ]);

        RumpunIlmu::create([
            'kode'      => '451',
            'rumpun'    => 'Teknik Elektro',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '452',
            'rumpun'    => 'Teknik Tenaga Elektrik',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '453',
            'rumpun'    => 'Teknik Telekomunikasi',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '454',
            'rumpun'    => 'Teknik Elektronika',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '455',
            'rumpun'    => 'Teknik Kendali (Atau Instrumentasi dan Kontrol)',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '456',
            'rumpun'    => 'Teknik Biomedika',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '457',
            'rumpun'    => 'Teknik Komputer',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '458',
            'rumpun'    => 'Teknik Informatika',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '459',
            'rumpun'    => 'Ilmu Komputer',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '461',
            'rumpun'    => 'Sistem Informasi',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '462',
            'rumpun'    => 'Teknologi Informasi',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '463',
            'rumpun'    => 'Teknik Perangkat Lunak',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '464',
            'rumpun'    => 'Teknik Mekatronika',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '465',
            'rumpun'    => 'Bidang Teknik Elektro dan Informatika Lain Yang Belum Tercantum',
            'sub'       => '450'
        ]);

        RumpunIlmu::create([
            'kode'      => '470',
            'rumpun'    => 'TEKNOLOGI KEBUMIAN',
            'sub'       => '410'
        ]);

        RumpunIlmu::create([
            'kode'      => '471',
            'rumpun'    => 'Teknik Panas Bumi',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '472',
            'rumpun'    => 'Teknik Geofisika',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '473',
            'rumpun'    => 'Teknik Pertambangan (Rekayasa Pertambangan)',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '474',
            'rumpun'    => 'Teknik Perminyakan (Perminyakan)',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '475',
            'rumpun'    => 'Teknik Geologi',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '476',
            'rumpun'    => 'Teknik Geodesi',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '474',
            'rumpun'    => 'Teknik Geomatika',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '478',
            'rumpun'    => 'Bidang Teknologi Kebumian Lain Yang Belum Tercantum',
            'sub'       => '470'
        ]);

        RumpunIlmu::create([
            'kode'      => '480',
            'rumpun'    => 'ILMU PERKAPALAN',
            'sub'       => '410'
        ]);

        RumpunIlmu::create([
            'kode'      => '481',
            'rumpun'    => 'Teknik Perkapalan',
            'sub'       => '480'
        ]);

        RumpunIlmu::create([
            'kode'      => '482',
            'rumpun'    => 'Teknik Permesinan Kapal',
            'sub'       => '480'
        ]);

        RumpunIlmu::create([
            'kode'      => '483',
            'rumpun'    => 'Teknik Sistem Perkapalan',
            'sub'       => '480'
        ]);

        RumpunIlmu::create([
            'kode'      => '484',
            'rumpun'    => 'Teknik Kelautan dan Ilmu Kelautan',
            'sub'       => '480'
        ]);

        RumpunIlmu::create([
            'kode'      => '485',
            'rumpun'    => 'Oceanograpi (Oceanologi)',
            'sub'       => '480'
        ]);

        RumpunIlmu::create([
            'kode'      => '486',
            'rumpun'    => 'Bidang Perkapalan Lain Yang Belum Tercantum',
            'sub'       => '480'
        ]);

        RumpunIlmu::create([
            'kode'      => '500',
            'rumpun'    => 'ILMU BAHASA'
        ]);

        RumpunIlmu::create([
            'kode'      => '510',
            'rumpun'    => 'SUB RMPUN ILMU SASTRA (DAN BAHASA) INDONESIA DAN DAERAH',
            'sub'       => '500'
        ]);

        RumpunIlmu::create([
            'kode'      => '511',
            'rumpun'    => 'Sastra (dan Bahasa) Daerah (Jawa, Sunda, Batak Dll)',
            'sub'       => '510'
        ]);

        RumpunIlmu::create([
            'kode'      => '512',
            'rumpun'    => 'Sastra (dan Bahasa) Indonesia',
            'sub'       => '510'
        ]);

        RumpunIlmu::create([
            'kode'      => '513',
            'rumpun'    => 'Sastra (dan Bahasa) Indonesia Atau Daerah Lainnya',
            'sub'       => '510'
        ]);

        RumpunIlmu::create([
            'kode'      => '520',
            'rumpun'    => 'ILMU BAHASA',
            'sub'       => '500'
        ]);

        RumpunIlmu::create([
            'kode'      => '521',
            'rumpun'    => 'Ilmu Linguistik',
            'sub'       => '520'
        ]);

        RumpunIlmu::create([
            'kode'      => '522',
            'rumpun'    => 'Jurnalistik',
            'sub'       => '520'
        ]);

        RumpunIlmu::create([
            'kode'      => '523',
            'rumpun'    => 'Ilmu Susastra Umum',
            'sub'       => '520'
        ]);

        RumpunIlmu::create([
            'kode'      => '524',
            'rumpun'    => 'Kearsipan',
            'sub'       => '520'
        ]);

        RumpunIlmu::create([
            'kode'      => '525',
            'rumpun'    => 'Ilmu Perpustakaan',
            'sub'       => '520'
        ]);

        RumpunIlmu::create([
            'kode'      => '526',
            'rumpun'    => 'Bidang Ilmu Bahasa Lain Yang Belum Tercantum',
            'sub'       => '520'
        ]);

        RumpunIlmu::create([
            'kode'      => '530',
            'rumpun'    => 'ILMU BAHASA ASING',
            'sub'       => '500'
        ]);

        RumpunIlmu::create([
            'kode'      => '531',
            'rumpun'    => 'Sastra (dan Bahasa) Inggris',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '532',
            'rumpun'    => 'Sastra (dan Bahasa) Jepang',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '533',
            'rumpun'    => 'Sastra (dan Bahasa) China (Mandarin)',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '534',
            'rumpun'    => 'Sastra (dan Bahasa) Arab',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '535',
            'rumpun'    => 'Sastra (dan Bahasa) Korea',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '536',
            'rumpun'    => 'Sastra (dan Bahasa) Jerman',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '537',
            'rumpun'    => 'Sastra (dan Bahasa) Melayu',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '538',
            'rumpun'    => 'Sastra (dan Bahasa) Belanda',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '539',
            'rumpun'    => 'Sastra (dan Bahasa) Perancis',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '541',
            'rumpun'    => 'Bidang Sastra (dan Bahasa) Asing Lain Yang Belum Tercantum',
            'sub'       => '530'
        ]);

        RumpunIlmu::create([
            'kode'      => '550',
            'rumpun'    => 'ILMU EKONOMI'
        ]);

        RumpunIlmu::create([
            'kode'      => '560',
            'rumpun'    => 'ILMU EKONOMI',
            'sub'       => '550'
        ]);

        RumpunIlmu::create([
            'kode'      => '561',
            'rumpun'    => 'Ekonomi Pembangunan',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '562',
            'rumpun'    => 'Akuntansi',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '563',
            'rumpun'    => 'Ekonomi Syariah',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '564',
            'rumpun'    => 'Perbankan',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '565',
            'rumpun'    => 'Perpajakan',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '566',
            'rumpun'    => 'Asuransi Niaga (Kerugian)',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '567',
            'rumpun'    => 'Notariat',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '568',
            'rumpun'    => 'Bidang Ekonomi Lain Yang Belum Tercantum',
            'sub'       => '560'
        ]);

        RumpunIlmu::create([
            'kode'      => '570',
            'rumpun'    => 'ILMU MANAJEMEN',
            'sub'       => '550'
        ]);

        RumpunIlmu::create([
            'kode'      => '571',
            'rumpun'    => 'Manajemen',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '572',
            'rumpun'    => 'Manajemen Syariah',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '573',
            'rumpun'    => 'Administrasi Keuangan (Perkantoran, Pajak, Hotel, Logistik, Dll)',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '574',
            'rumpun'    => 'Pemasaran',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '575',
            'rumpun'    => 'Manajemen Transportasi',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '576',
            'rumpun'    => 'Manajemen Industri',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '577',
            'rumpun'    => 'Manajemen Informatika',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '578',
            'rumpun'    => 'Kesekretariatan',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '579',
            'rumpun'    => 'Bidang Manajemen Yang Belum Tercantum',
            'sub'       => '570'
        ]);

        RumpunIlmu::create([
            'kode'      => '580',
            'rumpun'    => 'ILMU SOSIAL HUMANIORA'
        ]);

        RumpunIlmu::create([
            'kode'      => '590',
            'rumpun'    => 'ILMU POLITIK',
            'sub'       => '580'
        ]);

        RumpunIlmu::create([
            'kode'      => '591',
            'rumpun'    => 'Ilmu Politik',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '592',
            'rumpun'    => 'Kriminologi',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '593',
            'rumpun'    => 'Hubungan Internasional',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '594',
            'rumpun'    => 'Ilmu Administrasi (Niaga, Negara, Publik, Pembangunan, Dll)',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '595',
            'rumpun'    => 'Kriminologi',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '596',
            'rumpun'    => 'Ilmu Hukum',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '597',
            'rumpun'    => 'Ilmu Pemerintahan',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '601',
            'rumpun'    => 'Ilmu Sosial dan Politik',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '602',
            'rumpun'    => 'Studi Pembangunan (Perencanaan Pembangunan, Wilayah, Kota)',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '603',
            'rumpun'    => 'Ketahanan Nasional',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '604',
            'rumpun'    => 'Ilmu Kepolisian',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '605',
            'rumpun'    => 'Kebijakan Publik',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '606',
            'rumpun'    => 'Bidang Ilmu Politik Lain Yang Belum Tercantum',
            'sub'       => '590'
        ]);

        RumpunIlmu::create([
            'kode'      => '610',
            'rumpun'    => 'ILMU SOSIAL',
            'sub'       => '580'
        ]);

        RumpunIlmu::create([
            'kode'      => '611',
            'rumpun'    => 'Ilmu Kesejahteraan Sosial',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '612',
            'rumpun'    => 'Sosiologi',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '613',
            'rumpun'    => 'Humaniora',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '614',
            'rumpun'    => 'Kajian Wilayah (Eropa, Asia, Jepang, Timur Tengah Dll)',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '615',
            'rumpun'    => 'Arkeologi',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '616',
            'rumpun'    => 'Ilmu Sosiatri',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '617',
            'rumpun'    => 'Kependudukan (Demografi, dan Ilmu Kependudukan Lain)',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '618',
            'rumpun'    => 'Sejarah (Ilmu Sejarah)',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '619',
            'rumpun'    => 'Kajian Budaya',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '621',
            'rumpun'    => 'Komunikasi Penyiaran Islam',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '622',
            'rumpun'    => 'Ilmu Komunikasi',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '623',
            'rumpun'    => 'Antropologi',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '624',
            'rumpun'    => 'Bidang Sosial Lain Yang Belum Tercantum',
            'sub'       => '610'
        ]);

        RumpunIlmu::create([
            'kode'      => '630',
            'rumpun'    => 'AGAMA DAN FILSAFAT'
        ]);

        RumpunIlmu::create([
            'kode'      => '640',
            'rumpun'    => 'ILMU PENGETAHUAN (ILMU) AGAMA',
            'sub'       => '630'
        ]);

        RumpunIlmu::create([
            'kode'      => '641',
            'rumpun'    => 'Agama Islam',
            'sub'       => '640'
        ]);

        RumpunIlmu::create([
            'kode'      => '642',
            'rumpun'    => 'Agama Katolik',
            'sub'       => '640'
        ]);

        RumpunIlmu::create([
            'kode'      => '643',
            'rumpun'    => 'Agama Kristen dan Teologia',
            'sub'       => '640'
        ]);

        RumpunIlmu::create([
            'kode'      => '644',
            'rumpun'    => 'Sosiologi Agama',
            'sub'       => '640'
        ]);

        RumpunIlmu::create([
            'kode'      => '645',
            'rumpun'    => 'Agama (Filsafat) Hindu, Budha, dan Lain Yang Belum Tercantum',
            'sub'       => '640'
        ]);

        RumpunIlmu::create([
            'kode'      => '650',
            'rumpun'    => 'ILMU FILSAFAT',
            'sub'       => '630'
        ]);

        RumpunIlmu::create([
            'kode'      => '651',
            'rumpun'    => 'Filsafat',
            'sub'       => '650'
        ]);

        RumpunIlmu::create([
            'kode'      => '652',
            'rumpun'    => 'Ilmu Religi dan Budaya',
            'sub'       => '650'
        ]);

        RumpunIlmu::create([
            'kode'      => '653',
            'rumpun'    => 'Filsafat Lain Yang Belum Tercantum',
            'sub'       => '650'
        ]);

        RumpunIlmu::create([
            'kode'      => '660',
            'rumpun'    => 'ILMU SENI, DESAIN DAN MEDIA'
        ]);

        RumpunIlmu::create([
            'kode'      => '670',
            'rumpun'    => 'ILMU SENI PERTUNJUKAN',
            'sub'       => '660'
        ]);

        RumpunIlmu::create([
            'kode'      => '671',
            'rumpun'    => 'Senitari',
            'sub'       => '670'
        ]);

        RumpunIlmu::create([
            'kode'      => '672',
            'rumpun'    => 'Seni Teater',
            'sub'       => '670'
        ]);

        RumpunIlmu::create([
            'kode'      => '673',
            'rumpun'    => 'Seni Pedalangan',
            'sub'       => '670'
        ]);

        RumpunIlmu::create([
            'kode'      => '674',
            'rumpun'    => 'Seni Musik',
            'sub'       => '670'
        ]);

        RumpunIlmu::create([
            'kode'      => '675',
            'rumpun'    => 'Seni Karawitan',
            'sub'       => '670'
        ]);

        RumpunIlmu::create([
            'kode'      => '676',
            'rumpun'    => 'Seni Pertunjukkan Lainnya yang Belum Disebut',
            'sub'       => '670'
        ]);

        RumpunIlmu::create([
            'kode'      => '680',
            'rumpun'    => 'ILMU KESENIAN',
            'sub'       => '660'
        ]);

        RumpunIlmu::create([
            'kode'      => '681',
            'rumpun'    => 'Penciptaan Seni',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '682',
            'rumpun'    => 'Etnomusikologi',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '683',
            'rumpun'    => 'Antropologi Tari',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '684',
            'rumpun'    => 'Seni Rupa Murni (seni lukis)',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '685',
            'rumpun'    => 'Seni Patung',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '687',
            'rumpun'    => 'Seni Grafis',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '688',
            'rumpun'    => 'Seni Intermedia',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '689',
            'rumpun'    => 'Bidang Ilmu Kesenian Lain Yang Belum Tercantum',
            'sub'       => '680'
        ]);

        RumpunIlmu::create([
            'kode'      => '690',
            'rumpun'    => 'ILMU SENI KRIYA',
            'sub'       => '660'
        ]);

        RumpunIlmu::create([
            'kode'      => '691',
            'rumpun'    => 'Kriya Patung',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '692',
            'rumpun'    => 'Kriya Kayu',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '693',
            'rumpun'    => 'Kriya Kulit',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '694',
            'rumpun'    => 'Kriya Keramik',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '695',
            'rumpun'    => 'Kriya Tekstil',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '696',
            'rumpun'    => 'Kriya Logam (dan Logam Mulia/Perhiasan)',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '697',
            'rumpun'    => 'Bidang Seni Kriya Lain Yang Belum Tercantum',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '699',
            'rumpun'    => 'Kepariwisataan',
            'sub'       => '690'
        ]);

        RumpunIlmu::create([
            'kode'      => '700',
            'rumpun'    => 'ILMU MEDIA',
            'sub'       => '660'
        ]);

        RumpunIlmu::create([
            'kode'      => '701',
            'rumpun'    => 'Fotografi',
            'sub'       => '700'
        ]);

        RumpunIlmu::create([
            'kode'      => '702',
            'rumpun'    => 'Televisi',
            'sub'       => '700'
        ]);

        RumpunIlmu::create([
            'kode'      => '703',
            'rumpun'    => 'Broadcasting (Penyiaran)',
            'sub'       => '700'
        ]);

        RumpunIlmu::create([
            'kode'      => '704',
            'rumpun'    => 'Grafika (dan Penerbitan)',
            'sub'       => '700'
        ]);

        RumpunIlmu::create([
            'kode'      => '705',
            'rumpun'    => 'Bidang Media Lain Yang Belum Tercantum',
            'sub'       => '700'
        ]);

        RumpunIlmu::create([
            'kode'      => '706',
            'rumpun'    => 'DESAIN',
            'sub'       => '660'
        ]);

        RumpunIlmu::create([
            'kode'      => '707',
            'rumpun'    => 'Desain Interior',
            'sub'       => '706'
        ]);

        RumpunIlmu::create([
            'kode'      => '708',
            'rumpun'    => 'Desain Komunikasi Visual',
            'sub'       => '706'
        ]);

        RumpunIlmu::create([
            'kode'      => '709',
            'rumpun'    => 'Desain Produk',
            'sub'       => '706'
        ]);

        RumpunIlmu::create([
            'kode'      => '710',
            'rumpun'    => 'ILMU PENDIDIKAN'
        ]);

        RumpunIlmu::create([
            'kode'      => '720',
            'rumpun'    => 'PENDIDIKAN ILMU SOSIAL',
            'sub'       => '710'
        ]);

        RumpunIlmu::create([
            'kode'      => '721',
            'rumpun'    => 'Pendidikan Pancasila dan Kewarganegaraan',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '722',
            'rumpun'    => 'Pendidikan Sejarah',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '723',
            'rumpun'    => 'Pendidikan Ekonomi',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '724',
            'rumpun'    => 'Pendidikan Geografi',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '725',
            'rumpun'    => 'Pendidikan Sosiologi dan Antropologi',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '726',
            'rumpun'    => 'Pendidikan Akuntansi',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '727',
            'rumpun'    => 'Pendidikan Tata Niaga',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '728',
            'rumpun'    => 'Pendidikan Administrasi Perkantoran',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '729',
            'rumpun'    => 'Pendidikan Bahasa Jepang',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '731',
            'rumpun'    => 'Pendidikan Sosiologi (Ilmu Sosial)',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '732',
            'rumpun'    => 'Pendidikan Koperasi',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '733',
            'rumpun'    => 'Pend Kependudukan dan Lingkungan Hidup',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '734',
            'rumpun'    => 'Pendidikan Ekonomi Koperasi',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '735',
            'rumpun'    => 'Bidang Pendidikan Ilmu Sosial Lain Yang Belum Tercantum',
            'sub'       => '720'
        ]);

        RumpunIlmu::create([
            'kode'      => '740',
            'rumpun'    => 'ILMU PENDIDIKAN BAHASA DAN SASTRA',
            'sub'       => '710'
        ]);

        RumpunIlmu::create([
            'kode'      => '741',
            'rumpun'    => 'Pendidikan Bahasa, Sastra Indonesia dan Daerah',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '742',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Inggris',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '743',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Indonesia',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '744',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Jerman',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '745',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Perancis',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '746',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Arab',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '747',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Perancis',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '748',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Jawa',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '749',
            'rumpun'    => 'Pendidikan Bahasa (dan Sastra) Cina (Mandarin)',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '751',
            'rumpun'    => 'Bidang Pendidikan Bahasa (dan Satra) Lain Yang Belum Tercantum',
            'sub'       => '740'
        ]);

        RumpunIlmu::create([
            'kode'      => '760',
            'rumpun'    => 'ILMU PENDIDIKAN OLAH RAGA DAN KESEHATAN',
            'sub'       => '710'
        ]);

        RumpunIlmu::create([
            'kode'      => '761',
            'rumpun'    => 'Pendidikan Jasmani, Kesehatan dan Rekreasi',
            'sub'       => '760'
        ]);

        RumpunIlmu::create([
            'kode'      => '762',
            'rumpun'    => 'Pendidikan Jasmani dan Kesehatan',
            'sub'       => '760'
        ]);

        RumpunIlmu::create([
            'kode'      => '763',
            'rumpun'    => 'Pendidikan Olahraga dan Kesehatan',
            'sub'       => '760'
        ]);

        RumpunIlmu::create([
            'kode'      => '764',
            'rumpun'    => 'Pendidikan Kepelatihan Olahraga',
            'sub'       => '760'
        ]);

        RumpunIlmu::create([
            'kode'      => '765',
            'rumpun'    => 'Ilmu Keolahragaan',
            'sub'       => '760'
        ]);

        RumpunIlmu::create([
            'kode'      => '766',
            'rumpun'    => 'Pendidikan Olah Raga dan Kesehatan Lain Yang Belum Tercantum',
            'sub'       => '760'
        ]);

        RumpunIlmu::create([
            'kode'      => '770',
            'rumpun'    => 'ILMU PENDIDIKAN MATEMATIKA DAN ILMU PENGETAHUAN ALAM (MIPA)',
            'sub'       => '710'
        ]);

        RumpunIlmu::create([
            'kode'      => '771',
            'rumpun'    => 'Pendidikan Biologi',
            'sub'       => '770'
        ]);

        RumpunIlmu::create([
            'kode'      => '772',
            'rumpun'    => 'Pendidikan Matematika',
            'sub'       => '770'
        ]);

        RumpunIlmu::create([
            'kode'      => '773',
            'rumpun'    => 'Pendidikan Fisika',
            'sub'       => '770'
        ]);

        RumpunIlmu::create([
            'kode'      => '774',
            'rumpun'    => 'Pendidikan Kimia',
            'sub'       => '770'
        ]);

        RumpunIlmu::create([
            'kode'      => '775',
            'rumpun'    => 'Pendidikan Ilmu Pengetahuan Alam (Sains)',
            'sub'       => '770'
        ]);

        RumpunIlmu::create([
            'kode'      => '776',
            'rumpun'    => 'Pendidikan Geografi',
            'sub'       => '770'
        ]);

        RumpunIlmu::create([
            'kode'      => '777',
            'rumpun'    => 'Pendidikan Mipa Lain Yang Belum Tercantum',
            'sub'       => '770'
        ]);

        RumpunIlmu::create([
            'kode'      => '780',
            'rumpun'    => 'ILMU PENDIDIKAN TEKNOLOGI DAN KEJURUAN',
            'sub'       => '710'
        ]);

        RumpunIlmu::create([
            'kode'      => '781',
            'rumpun'    => 'Pendidikan Teknik Mesin',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '782',
            'rumpun'    => 'Pendidikan Teknik Bangunan',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '783',
            'rumpun'    => 'Pendidikan Teknik Elektro',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '784',
            'rumpun'    => 'Pendidikan Teknik Elektronika',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '785',
            'rumpun'    => 'Pendidikan Teknik Otomotif',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '786',
            'rumpun'    => 'Pendidikan Teknik Informatika',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '787',
            'rumpun'    => 'Pendidikan Kesejahteraan Keluarga (Tataboga, Busana, Rias Dll)',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '788',
            'rumpun'    => 'Pend. Teknologi dan Kejuruan',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '789',
            'rumpun'    => 'Bidang Pend. Teknologi dan Kejuruan Lain yang Belum Tercantum',
            'sub'       => '780'
        ]);

        RumpunIlmu::create([
            'kode'      => '790',
            'rumpun'    => 'ILMU PENDIDIKAN',
            'sub'       => '710'
        ]);

        RumpunIlmu::create([
            'kode'      => '791',
            'rumpun'    => 'Pendidikan Luar Biasa',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '792',
            'rumpun'    => 'Pendidikan Luar Sekolah',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '791',
            'rumpun'    => 'Pendidikan Luar Sekolah',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '792',
            'rumpun'    => 'Pendidikan Luar Sekolah',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '793',
            'rumpun'    => 'Pgsd',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '794',
            'rumpun'    => 'Pgtk dan (Paud)',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '795',
            'rumpun'    => 'Psikologi Pendidikan',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '796',
            'rumpun'    => 'Pengukuran dan Evaluasi Pendidikan',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '797',
            'rumpun'    => 'Pengembangan Kurikulum	',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '798',
            'rumpun'    => 'Teknologi Pendidikan',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '799',
            'rumpun'    => 'Administrasi Pendidikan (Manajemen Pendidikan)',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '801',
            'rumpun'    => 'Pendidikan Anak Usia Dini',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '802',
            'rumpun'    => 'Kurikulum dan Teknologi Pendidikan',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '803',
            'rumpun'    => 'Bimbingan dan Konseling',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '804',
            'rumpun'    => 'Bidang Pendidikan Lain Yang Belum Tercantum',
            'sub'       => '790'
        ]);

        RumpunIlmu::create([
            'kode'      => '810',
            'rumpun'    => 'ILMU PENDIDIKAN KESENIAN',
            'sub'       => '710'
        ]);

        RumpunIlmu::create([
            'kode'      => '811',
            'rumpun'    => 'Pendidikan Seni Drama, Tari dan Musik',
            'sub'       => '810'
        ]);

        RumpunIlmu::create([
            'kode'      => '812',
            'rumpun'    => 'Pendidikan Seni Rupa',
            'sub'       => '810'
        ]);

        RumpunIlmu::create([
            'kode'      => '813',
            'rumpun'    => 'Pendidikan Seni Musik',
            'sub'       => '810'
        ]);

        RumpunIlmu::create([
            'kode'      => '814',
            'rumpun'    => 'Pendidikan Seni Tari',
            'sub'       => '810'
        ]);

        RumpunIlmu::create([
            'kode'      => '815',
            'rumpun'    => 'Pendidikan Keterampilan dan Kerajinan',
            'sub'       => '810'
        ]);

        RumpunIlmu::create([
            'kode'      => '816',
            'rumpun'    => 'Pendidikan Seni Kerajinan',
            'sub'       => '810'
        ]);

        RumpunIlmu::create([
            'kode'      => '817',
            'rumpun'    => 'Bidang Pendidikan Kesenian Lain Yang Belum Tercantum',
            'sub'       => '810'
        ]);

        RumpunIlmu::create([
            'kode'      => '900',
            'rumpun'    => 'RUMPUN ILMU LAINNYA'
        ]);
    }
}
