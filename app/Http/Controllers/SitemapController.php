<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\SitemapGenerator;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use SimpleXMLElement;

class SitemapController extends Controller
{
    public function test()
    {

        $sitemap = Sitemap::create()->add(Url::create('/'))
                                    ->add(Url::create('/about'))
                                    ->add(Url::create('/contact'))
                                    ->add(Url::create('/list-of-local-businesses-in-usa'))
                                    ->add(Url::create('/blogs'));
        // Blog::all()->each(function (Blog $blog) use ($sitemap) {
        //     $sitemap->add(Url::create("/{$blog->slug}"));
        // });
        // LandingPage::all()->each(function (LandingPage $landingpage) use ($sitemap) {
        //     $sitemap->add(Url::create("/{$landingpage->slug}"));
        // });
        $sitemap->writeToFile('pages-sitemap.xml');
        // $sitemap->writeToFile(public_path('tuesday.xml'));
        return "generated";

    }
        public function landpage()
    {
        // Create the sitemap for the landing pages (as per your existing logic)
        $landingPageSitemap = Sitemap::create()
            ->add(Url::create('/'));

        // Fetch all landing pages and add them to the sitemap
        LandingPage::all()->each(function (LandingPage $landingpage) use ($landingPageSitemap) {
            $landingPageSitemap->add(Url::create("/{$landingpage->slug}"));
        });

        // Write landing page sitemap to file
        $landingPageSitemap->writeToFile('landingpages-sitemap.xml');
        return response()->json(['message' => "Landing Pages Sitemap generated"]) ;
    }

    public function listing()
    {
        // Create the sitemap for the landing pages (as per your existing logic)
        $listingsitemap = Sitemap::create()
            ->add(Url::create('/'));

            $business =  Business::where('status', 1)->get();
        // Fetch all landing pages and add them to the sitemap
        $business->each(function ($business) use ($listingsitemap) {
            $listingsitemap->add(Url::create("/{$business->slug}"));
        });

        // Write landing page sitemap to file
        $listingsitemap->writeToFile('listings-sitemap.xml');
        return response()->json(['message' => "Listing Pages Sitemap generated"]) ;
    }
    public function imagessitemap()
    {
        $imageSitemap = Sitemap::create();
        
        // Add images from each landing page to the image sitemap
        LandingPage::all()->each(function (LandingPage $landingpage) use ($imageSitemap) {
            $this->addImagesToImageSitemap("/{$landingpage->slug}", $imageSitemap);
        });
        
        // Fetch businesses that are active (status = 1)
        $businesses = Business::where('status', 1)->get();
        
        // Add images from each business to the image sitemap
        $businesses->each(function (Business $business) use ($imageSitemap) {
            // Assuming you have a method that retrieves the images related to the business
            $this->addImagesToImageSitemap("/{$business->slug}", $imageSitemap);
        });
        
        // Write the updated image sitemap to a file
        $imageSitemap->writeToFile(public_path('images_sitemap.xml'));
         return response()->json(['message' => "Images Sitemap generated"]) ;
    }
/**
 * Fetches the landing page and adds its images to the image sitemap.
 *
 * @param string $url
 * @param \Spatie\Sitemap\Sitemap $sitemap
 */
private function addImagesToImageSitemap(string $url, Sitemap $imageSitemap)
{
    // Fetch the page content
    $response = Http::get(url($url));

    if ($response->successful()) {
        // Parse the HTML using Symfony's DOM Crawler
        $crawler = new Crawler($response->body());

        // Get all image src attributes
        $imageUrls = $crawler->filter('img')->each(function (Crawler $node) {
            return $node->attr('src');
        });

        // Add each image to the image sitemap
        foreach ($imageUrls as $imageUrl) {
            // Ensure the image URL is absolute (in case it's relative)
            $absoluteImageUrl = $this->normalizeImageUrl($imageUrl);

            // Create an image-specific URL tag and add it to the image sitemap
            $imageSitemap->add(Url::create($absoluteImageUrl));
        }
    }
}
private function normalizeImageUrl(string $imageUrl)
{
    // If the image URL is not absolute, make it absolute by appending it to the base URL
    if (filter_var($imageUrl, FILTER_VALIDATE_URL) === false) {
        // Normalize relative URL to absolute (prepend base URL)
        return url($imageUrl);  // Ensure this points to the base URL correctly
    }

    return $imageUrl;  // Return the URL if it's already absolute
}


    public function category()
    {
        // Create the sitemap for the landing pages (as per your existing logic)
        $categorySitemap = Sitemap::create()
            ->add(Url::create('/'));

        // Fetch all landing pages and add them to the sitemap
        BusinessCategory::all()->each(function (BusinessCategory $category) use ($categorySitemap) {
            $categorySitemap->add(Url::create("category/{$category->slug}"));
        });

        // Write landing page sitemap to file
        $categorySitemap->writeToFile('categories-sitemap.xml');
        return response()->json(['message' => "Category Sitemap generated"]) ;
    }

    public function blog() {

        // Create a new SimpleXMLElement instance for the sitemap
    $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"></urlset>');

    // Fetch the news articles you want to include in the sitemap
    $articles = Blog::orderBy('created_at', 'desc')
                           ->get();

    // Loop through each article and add the necessary XML structure
    foreach ($articles as $article) {
        // Create a new <url> element
        $url = $sitemap->addChild('url');

        // Add the <loc> element (Update URL structure if needed)
        $url->addChild('loc', 'https://localbeings.com/'.$article->slug); // Use the new base URL

        // Add the <news:news> tag
        $news = $url->addChild('news:news', null, 'http://www.google.com/schemas/sitemap-news/0.9');

        // Add the <news:publication> with a <news:name> element
        $publication = $news->addChild('news:publication');
        $publication->addChild('news:name', 'Local Beings'); // Update the publication name

        // Add the <news:language> element
        $publication->addChild('news:language', 'en');

        // Add the publication date
        $news->addChild('news:publication_date', $article->created_at->format('Y-m-d'));

        // Add the <news:title> element
        $news->addChild('news:title', $article->title);
    }

    // Save the sitemap to the public directory
    $sitemap->asXML('articles-sitemap.xml');

    return response()->json(['message' => 'Article Sitemap generated successfully.']);




}

public function video(){
    $sitemap = Sitemap::create()
    ->add(Url::create('/'));


    Business::all()->each(function (Business $business) use ($sitemap) {
    $sitemap->add(Url::create("{$business->video_link}"));
});
// dd($sitemap);

// Write landing page sitemap to file
$sitemap->writeToFile('videos-sitemap.xml');
     return response()->json(['message' => 'Video sitemap generated successfully.']);
}
}
