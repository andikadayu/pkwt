<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Surat Perjanjian</title>
    <meta content='id' name='language'/>
    
</head>
<style>
    body{
        justify-self: auto;
        font-size: 12;
        font-family: 'Times New Roman', Times, serif;
    }
</style>
<body>
    @foreach($data as $dt)
    <h4 align="center" style="font-size: 16; font-weight: bold;">PERJANJIAN KERJA <br> UNTUK WAKTU TERTENTU (KONTRAK)</h4>
    <h4 align="center" style="font-size: 16; font-weight: normal; line-height: 5px;">No.{{$dt->id_karyawan}}/SPK-{{\Carbon\Carbon::parse($dt->tgl_masuk)->format('d')}}/{{\Carbon\Carbon::parse($dt->tgl_masuk)->format('m')}}/{{\Carbon\Carbon::parse($dt->tgl_masuk)->format('Y')}}</h4>

    <p>Pada hari ini {{\Carbon\Carbon::parse($dt->tgl_masuk)->locale('id_ID')->isoFormat('dddd')}} Tanggal {{\Carbon\Carbon::parse($dt->tgl_masuk)->locale('id_ID')->format('d')}} bulan {{\Carbon\Carbon::parse($dt->tgl_masuk)->locale('id_ID')->isoFormat('MMMM')}} tahun {{\Carbon\Carbon::parse($dt->tgl_masuk)->format('Y')}} telah dibuat dan disepakati perjanjian kerja antara:</p>
    <table border="0" style="width: 100%;">
        <tr>
            <td>I</td>
            <td>Nama</td>
            <td>:</td>
            <td><b>{{$dt->nama_user}}</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$dt->alamat_user}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{$dt->role}}</td>
        </tr>
        <tr>
            <td colspan="4">
                <p>Dalam hal ini bertindak untuk dan atas nama <b>PT Internusa Cipta Solusi Perdana</b> yang selanjutnya disebut sebagai PIHAK PERTAMA</p>
            </td>
        </tr>
        <tr>
            <td>II</td>
            <td>Nama</td>
            <td>:</td>
            <td>{{$dt->nama}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Tempat/Tgl lahir</td>
            <td>:</td>
            <td>{{$dt->tempat_lahir}}/{{\Carbon\Carbon::parse($dt->tgl_lahir)->format('d-m-Y')}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$dt->alamat_karyawan}}</td>
        </tr>
    </table>
    <p>Dalam hal ini bertindak untuk dan atas nama diri sendiri, yang selanjutnya disebut sebagai PIHAK KEDUA. <br>Kedua belah pihak sepakat untuk mengikatkan diri dalam Perjanjian Kerja Untuk Waktu Tertentu (Kontrak) dengan ketentuan-ketentuan sebagai berikut :  </p>
    <h4 align="center" style="font-size: 12;">Pasal 1 <br>Ruang Lingkup</h4>
    <ul type="1">
        <li>PIHAK PERTAMA menyatakan menerima PIHAK KEDUA untuk bekerja di tempat PIHAK PERTAMA dengan status karyawan kontrak untuk posisi sebagai <b>Programmer</b>.</li>
        <li>PIHAK KEDUA menyatakan bersedia bekerja ditempat PIHAK PERTAMA dan akan mentaati semua tata tertib dan Peraturan yang berlaku di tempat PIHAK PERTAMA.</li>
    </ul>
    <h4 align="center" style="font-size: 12;">Pasal 2 <br>Jangka Waktu</h4>
    <ul type="1">
        <li>Perjanjian ini berlaku untuk jangka waktu selama ....................... (....................) <b>Bulan</b> terhitung sejak ................................ <b>sd</b> .................................</li>
        <li>Perjanjian kerja ini dapat diperpanjang apabila disepakati kedua belah pihak.</li>
        <li>Selama dalam masa kontrak kerja PIHAK KEDUA dilarang mengundurkan diri, apabila PIHAK KEDUA mengundurkan diri dan atau tidak menyelesaikan masa kontrak kerja sebelum berakhir, maka PIHAK KEDUA berkewajiban mengganti sisa kontrak kerja secara rupiah.</li>
    </ul>
    <h4 align="center" style="font-size: 12;">Pasal 3 <br>Jam Kerja</h4>
    <ul type="1">
        <li>Waktu kerja PIHAK KEDUA adalah 8 ( Delapan ) jam sehari atau 40 ( empat puluh ) jam seminggu.</li>
        <li>PIHAK KEDUA bersedia bekerja melebihi waktu yang telah ditetapkan apabila diperlukan oleh PIHAK PERTAMA.</li>
        <li>PIHAK KEDUA wajib mengikuti / masuk kerja sesuai jam masuk pagi yaitu jam 09.00.</li>
    </ul>
    <br>
    <h4 align="center" style="font-size: 12;">Pasal 4 <br>Upah & Cara Pembayaran</h4>
    <ul type="1">
        <li>PIHAK KEDUA  berhak atas upah / gaji dari pekerjaan yang dilakukannya dari PIHAK PERTAMA sebagai berikut :
            <ul style="list-style-type: none;">
                <li>Gaji Pokok</li>
                <li>Tunjangan Jabatan/Fungsional</li>
                <li>Tunjangan Makan</li>
                <li>Tunjangan Transport</li>
                <li>Tunjangan Komunikasi</li>
                <li>Tunjangan Domisili</li>
                <li><b>Total Gaji Kotor</b></li>
                <li><b>Total Gaji Diterima Cash</b></li>
            </ul>
        </li>
        <li>PIHAK PERTAMA membayar upah PIHAK KEDUA melalui Bank Mandiri setiap tanggal 1 bulan berjalan.</li>
    </ul>
    <h4 align="center" style="font-size: 12;">Pasal 5 <br>Hak dan Kewajiban</h4>
    <ul type="1">
        <li>PIHAK PERTAMA berhak melakukan evaluasi kinerja kepada PIHAK KEDUA setiap bulan.</li>
        <li>PIHAK PERTAMA wajib membayar upah kepada PIHAK KEDUA sesuai yang diperjanjikan.</li>
        <li>PIHAK KEDUA wajib mentaati tata tertib dan peraturan yang berlaku ditempat PIHAK PERTAMA.</li>
        <li>PIHAK KEDUA wajib melaksanakan tugas dan kewajibannya yang diberikan oleh PIHAK PERTAMA dengan penuh tanggung jawab.</li>
        <li>PIHAK KEDUA wajib mengembalikan semua barang milik PIHAK PERTAMA apabila hubungan kerja antara PIHAK PERTAMA dan PIHAK KEDUA telah berakhir.</li>
        <li>PIHAK PERTAMA berhak memberikan teguran lisan, tertulis atau PHK kepada PIHAK KEDUA apabila PIHAK KEDUA melanggar perjanjian kerja atau peraturan yang berlaku ditempat PIHAK PERTAMA.</li>
        <li>PIHAK KEDUA berkewajiban menerima dan melaksanakan tugas dan tenggung jawab tersebut serta tugas - tugas lain yang diberikan PIHAK PERTAMA dengan sebaik-baiknya dan rasa tanggung-jawab.</li>
        <li>PIHAK KEDUA berkewajiban tunduk dan melaksanakan seluruh ketentuan yang telah diatur baik dalam Pedoman Peraturan dan Tata Tertib Karyawan maupun ketentuan lain yang menjadi Keputusan Direksi dan Managemen Perusahaan.</li>
        <li>PIHAK KEDUA berkewajiban menyimpan dan menjaga kerahasiaan baik dokumen maupun informasi milik PIHAK PERTAMA dan tidak dibenarkan memberikan dokumen atau informasi yang diketahui baik secara lisan maupun tertulis kepada pihak lain.</li>
        <li>PIHAK KEDUA bersedia ditempatkan dimana saja apabila sewaktu-waktu ditugaskan oleh Perusahaan.</li>
        <li>PIHAK KEDUA bertanggung jawab penuh terhadap peralatan kerja PIHAK PERTAMA dan wajib menjaganya dengan sebaik mungkin.</li>
        <li>PIHAK PERTAMA menyimpan IJAZAH ASLI PIHAK KEDUA selama masa kontrak kerja berlangsung.</li>
    </ul>
    <h4 align="center" style="font-size: 12;">Pasal 6 <br>Berakhirnya Perjanjian</h4>
    <ul type='1'>
        <li>Perjanjian kerja ini berakhir apabila :
            <ul type='a'>
                <li>PIHAK KEDUA mengundurkan diri/meninggal dunia.</li>
                <li>Berakhirnya perjanjian kerja.</li>
            </ul>
        </li>
        <li>PIHAK PERTAMA dapat melakukan pemutusan hubungan kerja kepada PIHAK KEDUA sebelum perjanjian kerja berakhir tanpa uang pesangon, uang penghargaan masa kerja dan uang penggantian hak apabila:
            <ul type='a'>
                <li>PIHAK KEDUA melakukan pelanggaran :
                    <ul type='i'>
                        <li>Terlambat masuk kerja selama 7 kali berturut atau 12 kali tidak berturut-turut.</li>
                        <li>Mangkir selama 5 (lima) hari kerja berturut-turut.</li>
                        <li>Berlaku kasar baik secara lisan atau perbuatan kepada Client, rekan pekerja atau PIHAK PERTAMA.</li>
                        <li>Tidak dapat menjalankan target kerja dan kewajibannya.</li>
                        <li>Menolak perintah PIHAK PERTAMA.</li>
                        <li>Mengambil barang/uang PIHAK PERTAMA /rekan pekerja lainnya.</li>
                        <li>Merusak barang milik PIHAK PERTAMA.</li>
                        <li>Menyebarluaskan informasi yang bersifat rahasia baik secara lisan, tulisan, foto atau video yang dapat mencemarkan nama baik dan atau merugikan PIHAK PERTAMA.</li>
                    </ul>
                </li>
                <li>PIHAK PERTAMA mengalami kerugian dalam usahanya.</li>
            </ul>
        </li>
    </ul>
    <h4 align="center" style="font-size: 12;">Pasal 7 <br>Perjanjian Tambahan</h4>
    <p>Hal-hal yang belum cukup diatur dalam perjanjian ini, akan ditetapkan secara musyawarah oleh kedua belah pihak dalam perjanjian tambahan yang merupakan bagian yang tidak dapat pisahkan dari perjajian ini.</p>
    <h4 align="center" style="font-size: 12;">Pasal 8 <br>Penutup</h4>
    <p>Demikian perjanjian ini dibuat dan ditanda tangani oleh kedua bela pihak dalam keadaan sadar dan tanpa tekanan dan paksaan dari pihak manapun.</p>
    <br>
    <table border='0' style="width: 100%;">
        <tr align="left">
            <th>PIHAK PERTAMA <br>PT Internusa Cipta Solusi Perdana</th>
            <th>Karyawan</th>
        </tr>
        <tr align="left">
            <th>
                <br><br><br><br>
                <u>{{$dt->nama_user}}</u><br>HRD
            </th>
            <th>
                <br><br><br>
                <u>{{$dt->nama}}</u>
            </th>
        </tr>
    </table>
    @endforeach
</body>
</html>