<?php
class MainController extends BaseController {
	
	// 首页
	function actionIndex(){
		$this->title = "主页";
        $articleObj = new Article();
        $categoryObj = new Category();
        $this->categorys = $categoryObj->findAll();
        $this->articles = $articleObj->findAll('', 'article_id DESC', "*", array((int)arg("p", 1), 5));
        $this->pager = $articleObj->page;

		$templateObj = new Template();
		$template = $templateObj->find(array("template_type"=>"index"), "updated DESC");
		if($template){
			$this->display($GLOBALS["template_dir"] . DS .$template["filename"]);
		}
	}

	// 列表页
	function actionList(){
		if(arg("category_id")){
			$categoryObj = new Category();
			$category = $categoryObj->find(array("category_id" => arg("category_id")));
			if($category){
				$this->title = $category["category_name"];
				$this->category = $category;
				$this->categorys = $categoryObj->findAll();
				$articleObj = new Article();
				$this->articles = $articleObj->findAll(array("category_id" => $category["category_id"]), 'article_id DESC', "*", array((int)arg("p", 1), 5));
				$this->pager = $articleObj->page;
				if(!empty($category["template_id"])){
					$templateObj = new Template();
					$template = $templateObj->find(array("template_id"=>$category["template_id"]));
					if($template){
						$this->display($GLOBALS["template_dir"] . DS .$template["filename"]);
						return;
					}
				}
				$this->display("main_list.html");
				return;
			}
		}
		BaseController::err404('', 'main', 'list', '分类不存在');
	}
	
	// 查看单个文章页
	function actionView(){
        $articleObj = new Article();
        if(arg("article_id")){
            $article = $articleObj->find(array("article_id" => arg("article_id")));
            if($article){
                $categoryObj = new Category();
                $this->categorys = $categoryObj->findAll();
                $this->article = $article;
                $this->title = $article["title"];

				if(!empty($article["template_id"])){
					$templateObj = new Template();
					$template = $templateObj->find(array("template_id"=>$article["template_id"]));
					if($template){
						$this->display($GLOBALS["template_dir"] . DS .$template["filename"]);
						return;
					}
				}
                $this->display("main_view.html");
                return;
            }
        }
        BaseController::err404('', 'main', 'view', '文章不存在');
	}

	// 页面增加访问量
	function actionPv() {
		$articleObj = new Article();
		if (arg("article_id")) {
			$article = $articleObj->find(array("article_id" => arg("article_id")));
			if ($article) {
				$articleObj->incr(array("article_id" => arg("article_id")), "page_view");
				return;
			}
		}
		BaseController::err404('', 'main', 'pv', '文章不存在');
	}
}