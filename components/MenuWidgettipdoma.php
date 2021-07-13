<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Tipdoma;
use Yii;

class MenuWidgettipdoma extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menutipdomaHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menutipdoma';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menutipdoma.php'){
            $menu = Yii::$app->cache->get('menutipdoma');
            if($menu) return $menu;
        }

        $this->data = tipdoma::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menutipdomaHtml = $this->getMenutipdomaHtml($this->tree);
        // set cache
        if($this->tpl == 'menutipdoma.php'){
            Yii::$app->cache->set('menutipdoma', $this->menutipdomaHtml, 60);
        }
        return $this->menutipdomaHtml;
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

    protected function getMenutipdomaHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $tipdoma) {
            $str .= $this->catToTemplate($tipdoma, $tab);
        }
        return $str;
    }

    protected function catToTemplate($tipdoma, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 




