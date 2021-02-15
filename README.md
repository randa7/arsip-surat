## Cara Penginstallan
1. Install Composer
 Link : https://getcomposer.org/download/2.0.9/composer.phar
2. Clone Repository
 command line : git clone https://github.com/randa7/arsip-surat.git
3. Masuk ke directory file
 command line : cd arsip-surat.git
4. Install Depedency
 command line : composer install
5. Buat Database (Mysql ,PostgreSQL atau sejenisnya)
6. Setup Environment Variable
   Buat File .env dengan mengcopy isi file .env.example pada folder directory.
   atau melalui command line : cp .env.example .env
   Sesuaikan nama database yang dibuat dengan yang ada pada file .env
7. Generate Key
   command line : php artisan key:generate
8. Migrasi dan seed 
   command line : php artisan migrate --seed
9. Run di local server
   command line : php artisan serve





demo : http://arsipsurat.herokuapp.com/
