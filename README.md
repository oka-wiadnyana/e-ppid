# Aplikasi E-PPID

Aplikasi ini adalah aplikasi untuk meningkatkan kualitas keterbukaan informasi pada satuan kerja. Aplikasi ini dilengkapi dengan permohonan informasi secara elektronik untuk memudahkan masyarakat mengajukan permohonan informasi sekaligus pemohonan keberatan atas tanggapan informasi. Aplikasi ini juga dapat mencetak laporan bulanan terkait permohonan informasi dan keberatan

Project ini dibuat menggunakan framework _Codeigniter 4_, dan untuk halaman user mengguganakan template _Anyar_ dari BootstrapMade sedangkan CMS nya menggunakan template admin _Gentelella alela_.

Demo : http://eppid.ozavo.my.id
Admin : http://eppid.ozavo.my.id/admineppid
Username admin : onsdee86@gmail.com
Password admin : 12345

## Feature

Selain fitur dasar keterbukaan informasi dan permohonan informasi serta keberatan, landing page ini juga menggunakan fitur text to speech dengen SpeechSynthesisAPI Javascript. Aksesibilitas disabilitas menggunakan aksesibilitas _Userway_. Untuk fitur livechat nya menggunakan widget dari [tawk.to](https://www.tawk.to/). Silahkan daftar pada website tersebut, dan replace script widget tawk.to yang ada sebelum tutup body. Selain itu setiap tahapan pemrosesan permohonan, akan terdapat notifikasi email ke admin dan user.

## How to use?

(Development)
1. Instal composer [disini](https://getcomposer.org/download/). (Skip langkah ini apabila pada system operasi sudah terinstall composer)
2. Download repo ini kemudian buka terminal dan arahkan ke repo hasil download dan ketikkan
   >composer install
3. Buat database terlebih dahulu di local webserver
4. Import database yang disertakan dalam repo ini
5. Untuk development, silahkan copykan folder project ke local web server(htdocs (XAMPP), www(laragon), etc),
6. Copy file env dalam repo dan rename menjadi .env melalui **Text Editor**, dan rubah environment serta baseurl pada file .env menjadi
   ```html
   CI_ENVIRONMENT = development

   app.baseURL = 'http://localhost/nama_root_folder/public/'
   ```
7. Setting database dalam file .env sesuai dengan dengan konfigurasi databse yang telah diimport sebelumnya, contoh :
   ```html
      database.default.hostname = localhost
      database.default.database = eppid
      database.default.username = root
      database.default.password = 
      database.default.DBDriver = MySQLi
      database.default.DBPrefix =
   ```
8. Untuk mulai menggunakan aplikasi silahkan masuk terlebih dahulu ke dashboar admin pada alamt http://localhost/nama_root_folder/admineppid
9. Masukkan email **onsdee86@gmail.com** dan password **12345** (untuk selanjutnya agar dirubah)

Untuk versi full (tanpa composer install) : [link](https://drive.google.com/file/d/1gRMBhLpIv3X2xFVMs-n7etVPIwxODeE0/view?usp=sharing)

Feel free to contact me :

**Telegram** : @Okawiadnyana