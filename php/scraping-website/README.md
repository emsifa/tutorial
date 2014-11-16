[PHP] Scraping Website dengan cURL dan Symfony DomCrawler
=========================================================

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

