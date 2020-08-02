<?php
/*


░M░i░h░a░a░r░u░ ░S░c░r░a░p░e░r░

TODOs:
- filter content data more

*/

namespace Jinas\RssScraper\Extractors;

use Jinas\RssScraper\Interfaces\IExtractor;
use Goutte\Client;
use Jinas\RssScraper\Utils\Json;

class EMihaaru implements IExtractor
{
    protected $client;

    protected $title;
    protected $content;
    protected $image;
    protected $tags = array();
    protected $guid;
    protected $author;
    protected $date;
    protected $url;


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * extract
     *
     * Mihaaru News Extractor. This function scraps title,content,author and date from the article
     * @param  mixed $url
     * @param  mixed $date
     * @param  mixed $guid
     *
     * @access public
     *
     * @return array
     */
    public function extract($url, $date = null, $guid = null)
    {
        $this->url = $url;
        $this->date = $date;
        $this->guid = $guid;

        $crawler = $this->client->request('GET', $url);


        $crawler->filter('h1')->each(function ($node) {
            $title = $node->text();
            $this->title = $title;
        });

        $crawler->filter('.container  img')->eq(3)->each(function ($node) {
            $image = $node->attr('src');
            $this->image = $image;
        });


        $crawler->filter('.by-line address')->each(function ($node) {
            $author = $node->text();
            //Trim all the white spaces
            $spacetrim = str_replace(' ', '', $author);
            //Replace multiple spaces and newlines with a single space
            $cleaneddata = trim(preg_replace('/\s\s+/', ' ', $spacetrim));
            $this->author = $cleaneddata;
        });

        $crawler->filter('article')->each(function ($node) {
            $content =  $node->text();

            $input = str_replace("\n", '', $content);
            $this->content = $input;
        });

        $crawler->filter('.article-tags')->each(function ($node) {
            $tags[] =  $node->text();
            $this->tags[] = $tags;
        });

        $data = [
            "service" => "Mihaaru News",
            "title" => $this->title,
            "image" => $this->image,
            "content" => $this->content,
            "date" => $this->date,
            "url" => $this->url,
            "author" => $this->author,
            "guid" => $this->guid,
            "word_count" => str_word_count($this->content),
            "tags" => $this->tags
        ];

        //$data = Data::

        return $data;
    }
}
