<?php


namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Tipuchastka;
use Yii;

class MenuWidgettipzemli extends Widget{

    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menutipzemliHtml;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menutipzemli';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if($this->tpl == 'menutipzemli.php'){
            $menu = Yii::$app->cache->get('menutipzemli');
            if($menu) return $menu;
        }

        $this->data = tipuchastka::find()->indexBy('tip')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menutipzemliHtml = $this->getMenutipzemliHtml($this->tree);
        // set cache
        if($this->tpl == 'menutipzemli.php'){
            Yii::$app->cache->set('menutipzemli', $this->menutipzemliHtml, 60);
        }
        return $this->menutipzemliHtml;
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

    protected function getMenutipzemliHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $tipzemli) {
            $str .= $this->catToTemplate($tipzemli, $tab);
        }
        return $str;
    }

    protected function catToTemplate($tipzemli, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

} 









