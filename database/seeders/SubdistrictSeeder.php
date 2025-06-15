<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use App\Models\Ward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
    {
        $kecamatans = [
            'Balongbendo' => [
                'Bakung', 'Balongbendo', 'Cangkring', 'Gayam', 'Jiken', 'Kemangsen',
                'Ketajen', 'Kedungbocok', 'Kedungdowo', 'Kesambi', 'Klurak', 'Larangan'
            ],
            'Buduran' => [
                'Buduran', 'Damarsi', 'Dukuhtengah', 'Entalsewu', 'Pagerwojo', 'Pucangro',
                'Pucang Anom', 'Sidokerto', 'Sidomulyo', 'Sidorejo', 'Siwalanpanji', 'Sukorejo',
                'Tebuwung', 'Wadungasri'
            ],
            'Candi' => [
                'Balongdowo', 'Balonggabus', 'Bendungan', 'Candisari', 'Durungbanjar', 'Durungbedug',
                'Gelam', 'Jambangan', 'Kalipecabean', 'Karangtanjung', 'Kupang', 'Ngampelsari',
                'Sepande', 'Sumberejo', 'Sumokali'
            ],
            'Gedangan' => [
                'Bangah', 'Ganting', 'Gedangan', 'Gemurung', 'Karangbong', 'Keboan Sikep',
                'Kebonanom', 'Punggul', 'Sawohan', 'Sruni'
            ],
            'Jabon' => [
                'Balongtani', 'Besuki', 'Dukuhsari', 'Jemirahan', 'Keboguyang', 'Kedungcangkring',
                'Kedungpandan', 'Kedungrejo', 'Panggreh', 'Pejarakan', 'Permisan', 'Semambung'
            ],
            'Krembung' => [
                'Balanggarut', 'Cankring', 'Gading', 'Jenggot', 'Kandangjati', 'Kedungrawan',
                'Kedungsumur', 'Krembung', 'Lemujut', 'Menanggal', 'Pilang', 'Wangkal'
            ],
            'Krian' => [
                'Balongbendo', 'Barengkrajan', 'Gamping', 'Jatikalang', 'Jerukgamping', 'Junwangi',
                'Krian', 'Kramattemanggung', 'Keboharan', 'Kebomas', 'Kedungsumber', 'Lebani',
                'Mrican', 'Pandanwojo', 'Pepe', 'Sembung', 'Sidomojo', 'Sidomulyo', 'Sukorejo',
                'Tambakkemerakan'
            ],
            'Porong' => [
                'Candipari', 'Glagahharum', 'Gempolsari', 'Jatirejo', 'Kedungboto', 'Kebakalan',
                'Kebonagung', 'Kedungsolo', 'Kesambi', 'Lajuk', 'Pamotan', 'Porong',
                'Renokenongo', 'Sawotratap', 'Siring', 'Jatianom', 'Mindi', 'Wunut'
            ],
            'Prambon' => [
                'Bendotretek', 'Bulang', 'Cangkringturi', 'Geneng', 'Kedungwonokerto', 'Kedungrejo',
                'Kebomas', 'Lemahputro', 'Ngerong', 'Prambon', 'Simogirang', 'Simpang',
                'Tondomulo', 'Tropodo', 'Wangkal', 'Wirobiting', 'Wonoplintahan'
            ],
            'Sedati' => [
                'Banjarkemuning', 'Banjarpilang', 'Betro', 'Buncitan', 'Cemandi', 'Gisikcemandi',
                'Kalanganyar', 'Pabean', 'Pepe', 'Sedatiagung'
            ],
            'Sidoarjo' => [
                'Banjarbendo', 'Bluru Kidul', 'Cemengkalang', 'Jati', 'Kemiri', 'Lemahputro',
                'Mageret', 'Sekardangan', 'Pucang', 'Pucanganom', 'Sidokare', 'Sidoklumpuk',
                'Sidokumpul', 'Sarirogo', 'Suko', 'Urangagung', 'Zainulmustofa'
            ],
            'Sukodono' => [
                'Anggaswangi', 'Bakalan', 'Bangsri', 'Cangkringsari', 'Jumputrejo', 'Kebonagung',
                'Keloposepuluh', 'Jambangan', 'Masangan Wetan', 'Ngaresrejo', 'Panjunan', 'Pekauman',
                'Sukodono', 'Wonokoyo'
            ],
            'Taman' => [
                'Bebekan', 'Geluran', 'Kalijaten', 'Ketegan', 'Ngelom', 'Sepanjang', 'Taman',
                'Wonocolo', 'Wadungasri', 'Kejapanan', 'Krian', 'Manukan', 'Tawangsari',
                'Sidoarjo', 'Trosobo', 'Watugolong', 'Wonoayu'
            ],
            'Tanggulangin' => [
                'Banjarasri', 'Banjarpanji', 'Cendoro', 'Cemandi', 'Gempolsari', 'Jatirejo',
                'Kalitengah', 'Ketanen', 'Klantingsari', 'Kedungbanteng', 'Kedungotok', 'Kembangan',
                'Kupang', 'Kutisari', 'Ngelom', 'Sawohan', 'Segodobancang'
            ],
            'Tarik' => [
                'Banjarwungu', 'Balongmacekan', 'Gampingrowo', 'Gedangklutuk', 'Janti', 'Kalimati',
                'Kedungbocok', 'Kemuning', 'Kramattemanggung', 'Mergobener', 'Mergosari', 'Mindugading',
                'Miriprowo', 'Sewor', 'Simokaton', 'Simpang', 'Singgogalih', 'Tarik', 'Tropodo'
            ],
            'Tulangan' => [
                'Gamping', 'Gedangan', 'Gemekan', 'Janti', 'Jetis', 'Kajeksan', 'Kebaran',
                'Kedondong', 'Kemantren', 'Kenongo', 'Kupang', 'Medalem', 'Modong', 'Ngaban',
                'Putat', 'Sudimoro', 'Tlasih', 'Tulangan', 'Wonoayu'
            ],
            'Waru' => [
                'Berbek', 'Bungurasih', 'Janti', 'Kedungrejo', 'Kepuhkiriman', 'Kureksari',
                'Medaeng', 'Ngingas', 'Pepelegi', 'Waru', 'Wedoro', 'Tambakoso', 'Tambarejo',
                'Tambaksawah'
            ],
            'Wonoayu' => [
                'Bakalan', 'Candi', 'Datar', 'Glonggong', 'Jeruklegi', 'Kemantren', 'Ketimang',
                'Pilang', 'Pucangro', 'Pucangsido', 'Sambilawang', 'Simoanginangin', 'Simokerto',
                'Sumberejo', 'Tanggul', 'Wonoayu', 'Wonokalang', 'Wonokasihan', 'Wonosari'
            ]
        ];

        foreach ($kecamatans as $kecamatan => $kelurahans) {
            // Buat kecamatan
            $subdistrict = Subdistrict::create(['name' => $kecamatan]);

            // Buat kelurahan untuk kecamatan ini
            foreach ($kelurahans as $kelurahan) {
                Ward::create([
                    'subdistrict_id' => $subdistrict->id,
                    'name' => $kelurahan
                ]);
            }
        }
    }
}
