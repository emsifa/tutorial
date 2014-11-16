[PHP] Scraping Website dengan cURL dan Symfony DomCrawler
=========================================================

![scraping](https://dl.dropboxusercontent.com/u/102070675/repo-tutorial/php-scraping-with-curl-and-symfony-domcrawler.png)

Tutorial ini membahas tentang bagaimana cara scraping website
menggunakan cURL dan komponen Symfony DomCrawler.

Scraping sendiri singkatnya adalah teknik untuk mengambil keping-kepingan informasi
pada halaman website. Seperti mengambil data keberangkatan pesawat pada halaman website maskapai,
mengambil berita populer pada halaman website berita, dsb.

Dalam hal ini cURL digunakan untuk melakukan request ke website target dan mengambil response berupa kode HTML,
sedangkan untuk scrapingnya menggunakan [Symfony DomCrawler](http://symfony.com/doc/current/components/dom_crawler.html) yang dikombinasikan dengan [Symfony CssSelector](http://symfony.com/doc/current/components/css_selector.html) agar dapat men-select elemen [DOM](http://en.wikipedia.org/wiki/Document_Object_Model) seperti menggunakan jQuery selector. 

## Requirement
- PHP versi 5.3+
- PHP cURL extension (biasanya sudah tersedia pada LAMPP/XAMPP/WAMP stack)
- Composer untuk menginstall library-library yang dibutuhkan (dalam hal ini symfony/dom-crawler dan symfony/css-selector)

## Petunjuk Installasi Repo
- Clone repo tutorial ini atau cukup salin file-file pada folder ini ke direktori projek anda (contoh: `C:/xampp/htdocs/testing` atau `C:/wampp/www/testing`)
- Masuk ke direktori tersebut di `cmd`/`terminal`
- Ketikkan perintah `composer install`
- Lihat hasilnya pada browser di url `http://localhost/[direktorinya]/scrap.php`

## Hasil
![scraping](https://dl.dropboxusercontent.com/u/102070675/repo-tutorial/result.php-scraping-with-curl-and-symfony-domcrawler.png)

> jika hasil tidak seperti diatas kemungkinan website target sudah merubah template sehingga selektor-selektor pada `scrap.php` tidak mengarah ke bagian yang di scrap(dalam hal ini list postingan).