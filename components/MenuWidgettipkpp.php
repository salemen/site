<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Avtokorobka;
use Yii;

class MenuWidgettipkpp extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menukppHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menukpp';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menukpp.php'){
            $menu = Yii::$app->cache->get('menukpp');
            if($menu) return $menu;
        }

        $this->data = avtokorobka::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menukppHtml = $this->getMenukppHtml($this->tree);
        // set cache
        if($this->tpl == 'menukpp.php'){
            Yii::$app->cache->set('menukpp', $this->menukppHtml, 60);
        }
        return $this->menukppHtml;
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

    protected function getMenukppHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $tipkpp) {
            $str .= $this->catToTemplate($tipkpp, $tab);
        }
        return $str;
    }

    protected function catToTemplate($tipkpp, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





