# RSS-WebScraper

[![StyleCI](https://github.styleci.io/repos/284431797/shield?branch=master)](https://github.styleci.io/repos/284431797?branch=master)

Tool that reads rss from dhivehi news sites and scrape the latest news articles.

This tool was built 6 months ago. There might be few bugs here and there but I will try to improve and look into those later.

## Usage

```php
use Jinas\RssScraper\Services\RssService;

$rss = new RssService();
//echo json_encode($rss->thiladhun(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
echo json_encode($rss->faanooz(), JSON_UNESCAPED_UNICODE);
```
This will return a json representation of scraped data from faanooz. It will be scraped according to the rss feed.

### Supported sites
- [Cnm](https://cnm.mv/)
- [Mihaaru](https://mihaaru.com/)
- [Thiladhun](https://thiladhun.com/)
- [Faanooz](https://faanooz.com/)
