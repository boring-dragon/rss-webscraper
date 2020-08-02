<?php
/*

Todo
- fix tags
- fix image

*/

namespace Jinas\RssScraper\Extractors;

use Goutte\Client;
use Jinas\RssScraper\Interfaces\IExtractor;

class EFaanooz implements IExtractor
{
    protected $client;

    protected $title;
    protected $content;
    protected $image;
    protected $tags = [];
    protected $guid;
    protected $author;
    protected $date;
    protected $url;

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

        //Trimming the guid from the url
        $get_array = trim($url, 'https://faanooz.com/');
        $this->guid = $get_array;

        $crawler = $this->client->request('GET', $url);

        $crawler->filter('h1')->each(function ($node) {
            $title = $node->text();
            $this->title = $title;
        });

        $crawler->filter('.jeg_meta_author a')->each(function ($node) {
            $author = $node->text();
            $this->author = $author;
        });

        /*
        $format = 'img[alt*="%s"]';
        $imagescr = sprintf($format,$this->title);


        $crawler->filter($imagescr)->each(function ($node) {
            $image = $node->attr('src');
            $this->image = $image;
        });

        */

        $crawler->filter('.jeg_post_tags a')->each(function ($node) {
            $tags[] = $node->text();
            $this->tags[] = $tags;
        });

        $crawler->filter('div.entry-content.no-share')->each(function ($node) {
            $content = $node->text();
            $removeonespace = str_replace("\n", '', $content);
            $this->content = $removeonespace;
        });

        $data = [
            'service'    => 'Faanooz',
            'title'      => $this->title,
            'image'      => $this->image,
            'content'    => $this->content,
            'date'       => $this->date,
            'url'        => $this->url,
            'author'     => $this->author,
            'guid'       => $this->guid,
            'word_count' => str_word_count($this->content),
            'tags'       => $this->tags,
        ];

        return $data;
    }
}
