<?php


namespace app\components;
use yii\base\Widget;
use app\models\Avtogruztip;
use Yii;

class MenuWidgettipavtogruz extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menutipavtogruzHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menutipavtogruz';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menutipavtogruz.php'){
            $menu = Yii::$app->cache->get('menutipavtogruz');
            if($menu) return $menu;
        }

        $this->data = avtogruztip::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menutipavtogruzHtml = $this->getMenutipavtogruzHtml($this->tree);
        // set cache
        if($this->tpl == 'menutipavtogruz.php'){
            Yii::$app->cache->set('menutipavtogruz', $this->menutipavtogruzHtml, 60);
        }
        return $this->menutipavtogruzHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenutipavtogruzHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $avtogruztip) {
            $str .= $this->catToTemplate($avtogruztip, $tab);
        }
        return $str;
    }

    protected function catToTemplate($avtogruztip, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 

