<?php
/*


░T░h░i░ l░a░d░h░u░n ░S░c░r░a░p░e░r░

Todo:
- add tags

*/

namespace Jinas\RssScraper\Extractors;

use Goutte\Client;
use Jinas\RssScraper\Interfaces\IExtractor;

class EThiladhun implements IExtractor
{
    protected $client;

    protected $title;
    protected $content;
    protected $guid;
    protected $image;
    protected $author;
    protected $date;
    protected $url;

    /**
     * __construct.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * extract.
     *
     * @param mixed $url
     * @param mixed $date
     * @param mixed $guid
     *
     * @return array
     */
    public function extract($url, $date = null, $guid = null)
    {
        $this->url = $url;
        $this->date = $date;

        $this->guid = $guid = str_replace('https://thiladhun.com/', '', $url);

        $crawler = $this->client->request('GET', $url);

        $crawler->filter('h1')->each(function ($node) {
            $title = $node->text();
            $this->title = $title;
        });

        //Removing all the unnecessary a tags
        $crawler->filter('div.single-body.entry-content.typography-copy a')->each(function ($nodes) {
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });

        $crawler->filter('div.single-body.entry-content.typography-copy')->each(function ($node) {

            //Trimming unnecessary tabs and \n
            $content = $node->text();
            $removeonelayer = str_replace("See author's posts", '', $content);
            $removespace = str_replace("\r\n", '', $removeonelayer);
            $removetab = str_replace("\t", '', $removespace);
            $removeonespace = str_replace("\n", '', $removetab);
            $this->content = $removeonespace;
        });

        $crawler->filter('div[class*="entry-thumb single-entry-thumb"] img')->each(function ($node) {
            $image = $node->attr('src');
            $this->image = $image;
        });

        $crawler->filter('a[class*="entry-author__name"]')->each(function ($node) {
            $author = $node->text();
            $this->author = $author;
        });

        $data = [
            'service'    => 'Thiladhun News',
            'title'      => $this->title,
            'image'      => $this->image,
            'content'    => $this->content,
            'date'       => $this->date,
            'url'        => $this->url,
            'author'     => $this->author,
            'guid'       => $this->guid,
            'word_count' => str_word_count($this->content),
        ];

        return $data;
    }
}
