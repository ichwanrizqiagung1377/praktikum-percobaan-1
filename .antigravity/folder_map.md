# Peta Folder (Folder Map) Laravel

Dokumen ini menjelaskan fungsi dari beberapa direktori penting dalam struktur proyek Laravel ini.

### 1. `app/Http/Controllers`
Folder ini digunakan untuk menyimpan file-file Controller. Controller berfungsi sebagai penghubung antara Model (data) dan View (tampilan). Semua logika aplikasi (business logic) terkait permintaan dari URL tertentu biasanya diatur atau diarahkan dari dalam Controller ini. 

### 2. `resources/views`
Folder ini berisi semua file tampilan (view) situs web atau aplikasi Anda. Di Laravel, tampilan biasanya ditulis menggunakan Blade Template Engine (ditandai dengan ekstensi `.blade.php`). Di sinilah kode HTML, CSS, dan instruksi Blade untuk merender data dari Controller atau komponen diletakkan.

### 3. `routes`
Folder ini menampung semua rute (routes) yang mendefinisikan URL/End-point aplikasi Anda. File yang sering digunakan untuk web berbasis browser adalah `web.php`. Di dalamnya, Anda mencocokkan URL yang diketik pengguna dengan respon (bisa berupa View langsung atau memanggil Controller).

### 4. `public`
Direktori ini adalah satu-satunya folder root yang dapat diakses publik melalui web server. File `index.php` di dalam folder ini berfungsi sebagai titik masuk (entry point) untuk semua permintaan. Selain itu, Anda dapat menempatkan aset statis yang bisa diakses langsung secara publik, seperti gambar, file CSS (contohnya `style.css`), file JavaScript (Vanilla JS), dan file eksternal lainnya.
