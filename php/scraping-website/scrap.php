<?php

use Symfony\Component\DomCrawler\Crawler;
require "vendor/autoload.php";

// url target
$url = "http://code.tutsplus.com/";

// inisiasi curl session
$curl = curl_init($url);

// aktifkan returntransfer, gunanya supaya response dari curl dapat disimpan ke variable (baris 21)
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// FYI: tutsplus pakai layanan cloudflare
// dimana cloudflare punya fitur untuk mendeteksi robot yang mengakses website 
// jadi jika curl kita dideteksi sebagai robot, kita bukan mendapatkan kode HTML halaman yang diincar
// melainkan halaman(kode HTML) gerbang autentikasi dari cloudflare untuk memasukkan kode captcha terlebih dahulu
// ---------------------------------------------------------------------------------------------------------------
// opsi curl dibawah ini untuk men-setting useragent saat curl me-request website tersebut
// ini membuat cloudflare (untuk saat ini atau beberapa waktu kedepan) 
// menganggap curl mengakses website tersebut dengan menggunakan browser layaknya kita(manusia) mengakses website
// NB: string useragent bisa didapat dengan cara membuka console pada browser, kemudian ketikkan navigator.userAgent
//     atau menggunakan PHP $_SERVER['HTTP_USER_AGENT']
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36");

// eksekusi curl, dan simpan response ke dalam variable $html
$html = curl_exec($curl);

// jika terjadi error
if(curl_errno($curl)) {
	// tampillkan pesan error
	exit(curl_error($curl));
}

// inisiasi symfony dom crawler
$crawler = new Crawler($html);

// array untuk menampung post
$array_posts = array();

// mengambil list posts pada crawler yang telah di inisiasi dengan HTML response dari curl
// dalam kasus ini, tutsplus menaruh list postingannya pada selektor dengan class 'posts__post'
$list_posts = $crawler->filter(".posts__post");

// jika node 
if(count($list_posts) > 0) {

	// loop list posts
	$list_posts->each(function($post, $i) use (&$array_posts) {

		// mengambil post title yang berada di dalam .posts__post
		$title = $post->filter(".posts__post-title");
		// mengambil img thumbnail
		$thumb = $post->filter("img");

		// push title, url dan thumb ke dalam array_posts
		$array_posts[] = array(
			'title' => $title->text(),
			'thumb' => $thumb->attr("src"),
			'url' => $title->attr("href")
		);
	});
}

// sekarang mari tampilkan hasilnya
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Belajar Scraping</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
    	<div id="wrapper">
    		<h1>Test Scraping</h1>
    		<ul class="list-posts">
    			<?php foreach($array_posts as $post_item):?>
				<li>
					<div class="thumb">
						<img src="<?php echo $post_item['thumb'];?>" alt="<?php echo $post_item['title'];?>"/>
					</div>
					<div class="info">
						<h2>
							<a href="<?php echo $post_item['url'];?>" target="_blank">
								<?php echo $post_item['title'];?>
							</a>
						</h2>
					</div>
				</li>
	        	<?php endforeach;?>
    		</ul>
    	</div>
    </body>
</html>