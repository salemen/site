<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Garagioxrana;
use Yii;

class MenuWidgetochrana extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuochranaHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menuochrana';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menuochrana.php'){
            $menu = Yii::$app->cache->get('menuochrana');
            if($menu) return $menu;
        }

        $this->data = garagioxrana::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuochranaHtml = $this->getMenuochranaHtml($this->tree);
        // set cache
        if($this->tpl == 'menuochrana.php'){
            Yii::$app->cache->set('menuochrana', $this->menuochranaHtml, 60);
        }
        return $this->menuochranaHtml;
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

    protected function getMenuochranaHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $ochrana) {
            $str .= $this->catToTemplate($ochrana, $tab);
        }
        return $str;
    }

    protected function catToTemplate($ochrana, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 





