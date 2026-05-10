<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\Products;
use App\Models\Images;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Seed Users
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        // 2. Seed Categories TERLEBIH DAHULU
        $categories = [
            ['id' => 1, 'name' => 'Objek'],
            ['id' => 2, 'name' => 'Rute'],
            ['id' => 3, 'name' => 'Enginesound'],
        ];
        foreach ($categories as $cat) {
            Categories::create($cat);
        }

        // 3. Seed Tags TERLEBIH DAHULU
        $tags = [
            ['id' => 1, 'name' => 'All Support'],
            ['id' => 2, 'name' => 'Android  Version'],
            ['id' => 3, 'name' => 'Android Version'],
            ['id' => 4, 'name' => 'Trainz New Era (TANE)'],
            ['id' => 5, 'name' => 'Trainz Simulator 2019 (TRS19)'],
            ['id' => 6, 'name' => 'Trainz Simulator 2022 (TRS22)'],
            ['id' => 7, 'name' => 'Trainz Sim 2012'],
        ];
        foreach ($tags as $tag) {
            Tags::create($tag);
        }

        // 4. Seed Products (sekarang categories sudah ada)
        $products = [
            [
                'id' => 2,
                'name' => 'Stasiun Garum',
                'type' => 'freeware',
                'description' => 'Stasiun Garum adalah sebuah stasiun kereta api yang terletak di Kecamatan Garum, Kabupaten Blitar, Jawa Timur. Stasiun ini berada di bawah pengelolaan PT Kereta Api Indonesia (KAI) dan termasuk dalam wilayah operasional Daerah Operasi VII Madiun. Stasiun Garum melayani perjalanan kereta api penumpang di lintas selatan Jawa, yang menghubungkan berbagai kota penting seperti Blitar, Malang, dan Surabaya. Meskipun tidak sebesar stasiun utama di sekitarnya, Stasiun Garum memiliki peran penting sebagai titik naik-turun penumpang bagi masyarakat lokal, terutama warga sekitar Kecamatan Garum dan wilayah Blitar bagian timur. \r\nnote: Non PBR',
                'price' => null,
                'category_id' => 1,
                'active' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Daerah Operasi 6-4-7-8 (YK-SLO-SMC-MN-SGU) - Android',
                'type' => 'payware',
                'description' => 'Stasiun Garum adalah sebuah stasiun kereta api yang terletak di Kecamatan Garum, Kabupaten Blitar, Jawa Timur. Stasiun ini berada di bawah pengelolaan PT Kereta Api Indonesia (KAI) dan termasuk dalam wilayah operasional Daerah Operasi VII Madiun. Stasiun Garum melayani perjalanan kereta api penumpang di lintas selatan Jawa, yang menghubungkan berbagai kota penting seperti Blitar, Malang, dan Surabaya. Meskipun tidak sebesar stasiun utama di sekitarnya, Stasiun Garum memiliki peran penting sebagai titik naik-turun penumpang bagi masyarakat lokal, terutama warga sekitar Kecamatan Garum dan wilayah Blitar bagian timur. \r\nnote: Non PBR',
                'price' => 150000.00,
                'category_id' => 2,
                'active' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Daerah Operasi 8-7 (Lawang-Malang-Blitar)',
                'type' => 'payware',
                'description' => 'Rute Daerah Operasi 8–7 (Lawang–Malang–Blitar) memiliki skala jarak antar stasiun 1:1, sehingga setiap segmen lintasan direpresentasikan secara realistis sesuai kondisi operasional sebenarnya tanpa penyederhanaan jarak. Hal ini membuat pengalaman perjalanan terasa lebih autentik, karena perubahan kontur dari perbukitan, area perkotaan, hingga pedesaan benar-benar mencerminkan kondisi nyata di lapangan. Jalur ini didominasi oleh variasi elevasi yang cukup terasa, tikungan di kawasan berbukit, serta transisi yang jelas antara wilayah padat aktivitas dan area yang lebih tenang. Salah satu ciri khasnya adalah keberadaan dua terowongan di petak Pohgajih–Sumberpucung yang menjadi representasi unik kondisi geografis jalur selatan. Dengan pendekatan 1:1 ini, keseluruhan lintasan memberikan pengalaman dinasan yang imersif, realistis, dan sesuai karakter asli Malang Raya hingga Blitar.',
                'price' => 40000.00,
                'category_id' => 2,
                'active' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Daerah Operasi 6-4-7-8 (YK-SLO-SMC-MN-SGU) - Tane Up',
                'type' => 'payware',
                'description' => 'Rute Daerah Operasi 6–4–7–8 (YK–SLO–SMC–MN–SGU) menghadirkan pengalaman dinasan yang kaya variasi, dimulai dari Yogyakarta dengan suasana jalur yang ramai perlintasan sebidang, aktivitas warga yang dekat rel, serta panorama Gunung Merapi yang menjadi latar khas perjalanan, sehingga sejak awal menuntut ketelitian dan kewaspadaan tinggi. Memasuki Solo, lintasan menjadi lebih dinamis dengan banyak sinyal, stasiun yang berdekatan, serta perpaduan kawasan perkotaan dan pinggiran yang membuat ritme perjalanan harus dijaga dengan presisi. Perjalanan menuju Semarang menghadirkan tantangan tersendiri dengan kontur jalur berbukit dan berkelok di lintas tengah Jawa, disertai pemandangan lembah, struktur jalur yang bervariasi, serta keberadaan Stasiun Tanggung yang dikenal sebagai salah satu stasiun pertama di Indonesia, menambah nilai historis dalam lintasan ini. Di wilayah Madiun, suasana berubah lebih tenang dengan hamparan sawah luas, namun tetap menjadi simpul penting perkeretaapian yang padat aktivitas, sekaligus dilewati kawasan industri dan keberadaan pabrik kereta api PT INKA di Madiun yang menjadi pusat produksi sarana perkeretaapian nasional, memberikan nuansa kuat jalur industri dan teknologi transportasi. Hingga Surabaya Gubeng, perjalanan memasuki kawasan metropolitan dengan intensitas pergerakan kereta yang tinggi, kompleksitas jalur masuk stasiun besar, serta dinamika operasional yang padat, menjadikan keseluruhan rute ini sebagai pengalaman perjalanan yang lengkap, bersejarah, dan penuh variasi lanskap dari Yogyakarta hingga Surabaya.',
                'price' => 170000.00,
                'category_id' => 2,
                'active' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Daerah Operasi 6-4-7-8 (YK-SLO-SMC-MN-SGU) - TS12',
                'type' => 'payware',
                'description' => 'Rute Daerah Operasi 6–4–7–8 (YK–SLO–SMC–MN–SGU) menghadirkan pengalaman dinasan yang kaya variasi, dimulai dari Yogyakarta dengan suasana jalur yang ramai perlintasan sebidang, aktivitas warga yang dekat rel, serta panorama Gunung Merapi yang menjadi latar khas perjalanan, sehingga sejak awal menuntut ketelitian dan kewaspadaan tinggi. Memasuki Solo, lintasan menjadi lebih dinamis dengan banyak sinyal, stasiun yang berdekatan, serta perpaduan kawasan perkotaan dan pinggiran yang membuat ritme perjalanan harus dijaga dengan presisi. Perjalanan menuju Semarang menghadirkan tantangan tersendiri dengan kontur jalur berbukit dan berkelok di lintas tengah Jawa, disertai pemandangan lembah, struktur jalur yang bervariasi, serta keberadaan Stasiun Tanggung yang dikenal sebagai salah satu stasiun pertama di Indonesia, menambah nilai historis dalam lintasan ini. Di wilayah Madiun, suasana berubah lebih tenang dengan hamparan sawah luas, namun tetap menjadi simpul penting perkeretaapian yang padat aktivitas, sekaligus dilewati kawasan industri dan keberadaan pabrik kereta api PT INKA di Madiun yang menjadi pusat produksi sarana perkeretaapian nasional, memberikan nuansa kuat jalur industri dan teknologi transportasi. Hingga Surabaya Gubeng, perjalanan memasuki kawasan metropolitan dengan intensitas pergerakan kereta yang tinggi, kompleksitas jalur masuk stasiun besar, serta dinamika operasional yang padat, menjadikan keseluruhan rute ini sebagai pengalaman perjalanan yang lengkap, bersejarah, dan penuh variasi lanskap dari Yogyakarta hingga Surabaya.',
                'price' => 160000.00,
                'category_id' => 2,
                'active' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Daerah Operasi 2-5 (Indihiang-Banjar-Sidareja)',
                'type' => 'payware',
                'description' => 'Daop 5–Daop 2 (Sidareja–Banjar–Indihiang) menghadirkan pengalaman dinasan yang khas dengan karakter lintasan selatan yang didominasi perbukitan, lembah, serta jembatan panjang yang melintasi alur sungai dan kawasan hijau alami. Perjalanan di rute ini terasa dinamis karena perubahan elevasi yang cukup sering, tikungan yang mengikuti kontur alam, serta jalur yang membelah area berbukit dan lembah sempit sehingga memberikan sensasi perjalanan yang stabil namun tetap menantang. Memasuki wilayah Banjar, lintasan mulai bertransisi menjadi lebih terbuka dengan hamparan sawah dan pemukiman yang tersebar, lalu berlanjut menuju Sidareja hingga Indihiang yang didominasi suasana pedesaan yang tenang dan area dataran yang lebih luas. Kombinasi jalur berkelok, jembatan ikonik, serta perubahan lanskap dari perbukitan menuju dataran rendah menjadikan rute ini sebagai perjalanan yang imersif, seimbang antara tantangan teknis dan keindahan panorama alam.',
                'price' => 35000.00,
                'category_id' => 2,
                'active' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Daerah Operasi 7-8 (Kertosono-Mojokerto-Sidotopo)',
                'type' => 'payware',
                'description' => 'Daop 7–8 (Kertosono–Mojokerto–Sidotopo) menghadirkan pengalaman dinasan yang khas dengan karakter lintasan dataran rendah yang relatif padat aktivitas, didominasi jalur panjang yang stabil namun diselingi banyak perlintasan sebidang, persinyalan aktif, serta lalu lintas kereta yang cukup intens karena merupakan koridor penting penghubung antar wilayah di Jawa Timur. Perjalanan di rute ini terasa dinamis bukan dari kontur ekstrem, melainkan dari ritme operasional yang rapat, terutama saat memasuki area perkotaan dan jalur menuju Surabaya yang semakin sibuk. Di beberapa segmen, suasana pedesaan masih terasa dengan hamparan sawah dan pemukiman yang mengikuti jalur rel, sebelum akhirnya berubah menjadi kawasan urban padat saat mendekati Sidotopo. Kombinasi antara jalur datar yang panjang, aktivitas operasional tinggi, serta transisi dari area semi-rural ke perkotaan menjadikan rute ini sebagai pengalaman dinasan yang fokus, ritmis, dan mencerminkan intensitas operasional jalur utara–timur Jawa.',
                'price' => 40000.00,
                'category_id' => 2,
                'active' => 1,
            ],
            [
                'id' => 9,
                'name' => 'NEW ENGINESOUND 2025 HD Pack',
                'type' => 'payware',
                'description' => '**NEW ENGINESOUND 2025 HD Pack** adalah paket sound untuk simulator kereta yang menghadirkan suara mesin lokomotif dengan kualitas tinggi dan lebih realistis dibanding versi standar.\r\n\r\nPack ini menonjolkan:\r\n\r\n* **Suara mesin HD (high definition)** yang lebih jernih dan detail\r\n* **Variasi suara CC 201/203 dan lokomotif lainnya**, mulai dari idle hingga notch tinggi\r\n* **Transisi suara yang halus** saat akselerasi dan deselerasi sehingga perubahan tenaga terasa natural\r\n* **Efek turbo dan exhaust** yang lebih hidup saat beban kerja meningkat\r\n* **Getaran dan karakter mesin** yang lebih terasa, mendukung pengalaman dinasan yang imersif\r\n\r\nDengan karakter suara yang lebih dalam dan realistis, pack ini sering digunakan untuk meningkatkan sensasi perjalanan agar terasa seperti operasi kereta sebenarnya di lintasan.',
                'price' => 50000.00,
                'category_id' => 3,
                'active' => 1,
            ],
            [
                'id' => 10,
                'name' => '2026 New Enginesound Pack Api api🔥🔥',
                'type' => 'payware',
                'description' => '**2026 New Enginesound Pack Api Api 🔥🔥** adalah paket sound simulator kereta yang dirancang untuk menghadirkan pengalaman dinasan yang lebih hidup, intens, dan berenergi. Pack ini menonjolkan efek suara yang lebih tegas, transisi audio yang halus, serta nuansa perjalanan yang terasa lebih dinamis di setiap lintasan. Dengan karakter sound yang lebih dramatis dan imersif, paket ini membuat pengalaman perjalanan kereta terasa lebih seru, realistis, dan tidak monoton di berbagai rute.',
                'price' => 30000.00,
                'category_id' => 3,
                'active' => 1,
            ],
        ];
        foreach ($products as $product) {
            Products::create($product);
        }

        // 5. Seed Products Images (sekarang products sudah ada)
        $images = [
            ['product_id' => 2, 'path' => 'image-products/hoPtbKmTTsMWXwNSzS1ArLa7pIjrbnoeEhuId8AI.png', 'is_primary' => 0],
            ['product_id' => 4, 'path' => 'image-products/82Zy0hG7DrrtfzNIShie3uMvh2I7P8hc5kACdszD.png', 'is_primary' => 0],
            ['product_id' => 4, 'path' => 'image-products/XB6ZK2xZYuOXYrVOP2l2zoUJ9SIfwVmK26DjPQwj.png', 'is_primary' => 0],
            ['product_id' => 4, 'path' => 'image-products/uyIhKxe8PJ2OUtLNlbr4HEhGg9ScY8X4wZgcGPpy.png', 'is_primary' => 0],
            ['product_id' => 5, 'path' => 'image-products/FTYkNF6OHSSYII3u9yOqknAN1LRvpAR831agrxAg.jpg', 'is_primary' => 0],
            ['product_id' => 5, 'path' => 'image-products/ohOb3ZMWaGLIPQ6HatrEDhB9XhgWe9lvdp2wURIY.jpg', 'is_primary' => 0],
            ['product_id' => 5, 'path' => 'image-products/fI4vNJgI1iTdbJlHYaNjs5BpMHZ9IcXvgPLRUicG.jpg', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/O2YDz7q7pgG97siBpcU5fSiL6Jhof95KnhBcXdKF.png', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/0imDAlEoVLiEGsfiVJb40I9A6ekDvGW8CWyW4bZn.png', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/doQSjouOjX6dPWMfBlRCLXAuO6Yt43TjZ66t50Bm.png', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/sgjz5WhAPVHqMFTuD1Z4LskFFTG31Wws2qTP72QG.png', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/GmcZwFGuthMGhlEkhZfqjWTMexb3GMMNVuBbXGVz.png', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/PcvgSOYpbY8vZT7au5CYSTS4QMPBOdFkke8ocSvz.png', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/6Y7H45yD54pGbvy2bOOxgb29LGh6HoVbR3aSwZbS.png', 'is_primary' => 0],
            ['product_id' => 6, 'path' => 'image-products/ilVe3dteCnwq6KkhEiZt8a44w9oLC67HuVQCgIXt.png', 'is_primary' => 0],
            ['product_id' => 3, 'path' => 'image-products/9RZFBLChhYOj2kdPNGmhkGXCOft9oki9tmengkXn.jpg', 'is_primary' => 0],
            ['product_id' => 3, 'path' => 'image-products/jLfDGm8QMPUeHz2HGyhiFZ05JlvBZbHQKcLSN3vg.jpg', 'is_primary' => 0],
            ['product_id' => 3, 'path' => 'image-products/K7fkTQlEyPY0BbBJFCjI5uF4lAP1hC6VzF22Z1aA.jpg', 'is_primary' => 0],
            ['product_id' => 3, 'path' => 'image-products/qZKx2kARbkc0miguAYhlyFuFiiVvY7jMQSH9eAKz.jpg', 'is_primary' => 0],
            ['product_id' => 7, 'path' => 'image-products/X7Rt87oIxarXUnjSueWtkm2Vw9npxBd1gPEMIfHW.jpg', 'is_primary' => 0],
            ['product_id' => 7, 'path' => 'image-products/Pfdu2azdQA0g7rxoTCCBofdsyu9OJoXkHIcFeZxg.jpg', 'is_primary' => 0],
            ['product_id' => 7, 'path' => 'image-products/bwYnO3DsRCZkhKnYqFtTURm4bdrPNfxJtLj97lFv.jpg', 'is_primary' => 0],
            ['product_id' => 8, 'path' => 'image-products/ZhiwCmOBukkSWVmQdjY0rrEPbsdhtLEYvEUBnFVh.png', 'is_primary' => 0],
            ['product_id' => 8, 'path' => 'image-products/ui1UPGgKcC0gUg9fNbjPgKkw2QShYXYkdXsfqVa1.png', 'is_primary' => 0],
            ['product_id' => 8, 'path' => 'image-products/S7KfEs37QmkKljkqxp8C298hqujsBp68vgpGiWEe.png', 'is_primary' => 0],
            ['product_id' => 8, 'path' => 'image-products/VxKY4uTpeu6MhIuR2YHDFF3weEaTOqBuulyYe1PQ.png', 'is_primary' => 0],
            ['product_id' => 8, 'path' => 'image-products/J6z5mswivHnhXLgYGaoZAY84DYcXf6aUVHoCtObs.png', 'is_primary' => 0],
            ['product_id' => 9, 'path' => 'image-products/J9WV4WoKzGwHZxy7pPryOA3YTW1fU8HRZbFkD7nx.png', 'is_primary' => 0],
            ['product_id' => 10, 'path' => 'image-products/syTVYXJB8GK0Y03v1oQ2LKVJ7AYf0rK4xunmv0dj.png', 'is_primary' => 0],
        ];
        foreach ($images as $image) {
            Images::create($image);
        }

        // 6. Seed Product Tags (sekarang products & tags sudah ada)
        $productTags = [
            [2, 1],  // Stasiun Garum -> All Support
            [3, 2],  // Daop 6-4-7-8 Android -> Android Version
            [4, 3],  // Daop 8-7 -> Android Version
            [5, 4],  // Daop 6-4-7-8 Tane -> TANE
            [5, 5],  // Daop 6-4-7-8 Tane -> TRS19
            [5, 6],  // Daop 6-4-7-8 Tane -> TRS22
            [6, 7],  // Daop 6-4-7-8 TS12 -> TS12
            [7, 3],  // Daop 2-5 -> Android Version
            [8, 3],  // Daop 7-8 -> Android Version
            [9, 1],  // Enginesound 2025 -> All Support
            [10, 1], // Enginesound Api -> All Support
        ];

        foreach ($productTags as [$productId, $tagId]) {
            // Attach tag ke product menggunakan pivot table
            Products::find($productId)->tags()->attach($tagId);
        }
    }
}