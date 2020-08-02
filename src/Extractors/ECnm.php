<?php
/*


░C░N░M░ ░S░c░r░a░p░e░r░


Todo:
- add tags

*/

namespace Jinas\RssScraper\Extractors;

use Goutte\Client;
use Jinas\RssScraper\Interfaces\IExtractor;

class ECnm implements IExtractor
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
        $this->date = $date;

        parse_str($url, $get_array);

        $this->guid = $get_array['https://cnm_mv/f/?id'];

        //Need to fix the url hang issue
        $this->url = 'https://cnm.mv/f/?id='.$this->guid;

        $crawler = $this->client->request('GET', $this->url);

        $crawler->filter('h1')->each(function ($node) {
            $title = $node->text();
            $this->title = $title;
        });

        $crawler->filter('img[alt*="image"]')->each(function ($node) {
            $image = $node->attr('src');
            $trimeddata = str_replace('../', '', $image);
            $this->image = 'https://cnm.mv/'.$trimeddata;
        });

        $crawler->filter('div[class*="col fontf artT px-0 py-4"]')->each(function ($node) {
            $content = $node->text();
            $input = str_replace("\n", '', $content);
            $this->content = $input;
        });

        $crawler->filter('div[style*="margin-left:20px;padding-right:15px;"]')->each(function ($node) {
            $author = $node->text();
            $this->author = $author;
        });

        $data = [
            'service'    => 'CNM News',
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
