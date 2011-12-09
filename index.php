<?php

$begin = microtime();

require_once dirname(__FILE__).'/toro.php';

function is_valid($string) {
	//check function?
    if($string) return true;
}

class MainHandler extends ToroHandler {
    public function get() { 
		$this->ttpl->set('title', 'Hello, world');
		$this->ttpl->set('content', 'Hello, world.');
    }
}

class TestHandler extends ToroHandler {
    public function get() {
		$this->ttpl->set('title', 'Test');
		$this->ttpl->set('content', '<p>Test.</p>');
    }
}

class ArticleHandler extends ToroHandler {
	
    public function get($slug) {
		if(is_valid($slug)){
			$this->ttpl->set('title', 'Hello, world');
			$this->ttpl->set('content', 'Load an article that matches the slug: ' . $slug);
		}else{
			$this->not_found();
		}
    }
}

$site = new ToroApplication(array(
    array('/', 'MainHandler'),
    array('test', 'TestHandler'),
	array("article/([a-zA-Z0-9_]+)", 'ArticleHandler'),
    array("([a-zA-Z0-9_]+)", 'ArticleHandler'),
	//array('.*', 'ErrorHandler') //no longer needed everytime for custom 404 page
));

$site->serve();

//send variables such as time checker
$ttpl->set('begin', $begin);
// finally, print our our rendered template
print $ttpl->fetch('index.tpl.php');