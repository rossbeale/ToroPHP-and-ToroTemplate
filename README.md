# ToroPHP

Toro is a tiny framework for PHP that lets you prototype web applications quickly.

* [Toro Home Page](http://toroweb.org)

## The Primordial Application

The canonical "Hello, world" example:

    require_once 'toro.php';
    
    class MainHandler extends ToroHandler {
        public function get() { 
            $this->ttpl->set('title', 'Hello, world');
			$this->ttpl->set('content', 'Hello, world.');
        }
    }
    
    $site = new ToroApplication(array(
        array('/', 'MainHandler')
    ));
    
    $site->serve();

	print $ttpl->fetch('index.tpl.php');

## A Substantial Application

Here is a slightly more advanced application garnished with pseudocode:

    require_once 'toro.php';

    class BlogHandler extends ToroHandler {
        public function get() { 
			$this->ttpl->set('title', 'Blog');
			$this->ttpl->set('content', 'This the front page of the blog. Load all articles.');
        }

        public function get_mobile() {
            // _mobile => fires if iPhone/Android/webOS is detected
			$this->ttpl->set('title', 'Blog');
			$this->ttpl->set('content', 'Load a subset of the articles.');
        }
    }

    class ArticleHandler extends ToroHandler {
        public function get($slug) {
            $this->ttpl->set('title', $slug);
			$this->ttpl->set('content', 'Load an article that matches the slug: ' . $slug);
        }
    }

    class CommentHandler extends ToroHandler {
        public function post($slug) {
			$this->ttpl->set('title', $slug);
			$this->ttpl->set('content', 'Validate slug - redirect if not found.<br />Peek into $_POST, save the comment, and redirect.');
        }

        public function post_xhr($slug) {
            // _xhr => fires if XHR request is detected
			$this->ttpl->set('title', $slug);
			$this->ttpl->set('content', 'Validate, save, and return a JSON blob.');
        }
    }

    class SyndicationHandler extends ToroHandler {
        public function get() {
			$this->ttpl->set('title', 'RSS');
			$this->ttpl->set('content', 'Display some recent entries in RSS/Atom.');
        }
    }

    $site = new ToroApplication(array(
        array('/', 'BlogHandler'),
        array('article/([a-zA-Z0-9_]+)', 'ArticleHandler'),
        array('comment/([a-zA-Z0-9_]+)', 'CommentHandler'),
        array('feed', 'SyndicationHandler')
    ));

    $site->serve();
	print $ttpl->fetch('index.tpl.php');
	
## Installation

Grab the source and copy toro.php and the templates folder, and the example index.php if you so wish, to your htdocs or lib directory directory.

Couch the following in your Apache configuration or .htaccess:

    RewriteEngine on
    RewriteCond $1 !^(index\.php)
    RewriteRule ^(.*)$ index.php/$1 [L]

## Roadmap

The immediate plan is to complete the following:

* Add database functionality!

Toro is intended to be a minimal framework to help you organize and prototype your next PHP application. One of the project's goals is to make sure the source stays lean.