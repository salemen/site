<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Domvid;
use Yii;

class MenuWidgetviddoma extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuviddomaHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuviddoma';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuviddoma.php'){
            $menu = Yii::$app->cache->get('menuviddoma');
            if($menu) return $menu;
        }

        $this->data = domvid::find()->indexBy('vid')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuviddomaHtml = $this->getMenuviddomaHtml($this->tree);
        // set cache
        if($this->tpl == 'menuviddoma.php'){
            Yii::$app->cache->set('menuviddoma', $this->menuviddomaHtml, 60);
        }
        return $this->menuviddomaHtml;
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

    protected function getMenuviddomaHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $viddoma) {
            $str .= $this->catToTemplate($viddoma, $tab);
        }
        return $str;
    }

    protected function catToTemplate($viddoma, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





