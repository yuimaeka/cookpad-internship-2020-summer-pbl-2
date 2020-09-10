<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ingredients Controller
 *
 * @property \App\Model\Table\IngredientsTable $Ingredients
 * @method \App\Model\Entity\Ingredient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IngredientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ingredients = $this->paginate($this->Ingredients);

        $this->set(compact('ingredients'));
    }

    public function fridge()
    {
        $ingredients = $this->Ingredients->find('list',['keyField'=>'id','valueField'=>'name']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $target_id = $this->request->getData('add_ingredient');
            if(isset($target_id)){

                $test=$target_id;
                $this->set(compact('test'));

                $target_ingredient = $this->Ingredients->get($target_id);

                $target_ingredient = $this->Ingredients->patchEntity($target_ingredient,['in_fridge'=>1]);
                if ($this->Ingredients->save($target_ingredient)) {
                    $this->Flash->success(__('食材を追加しました'));
                }
            }else{
                foreach ($this->request->getData() as $id=>$temp){
                    $target_ingredient = $this->Ingredients->get($id);
                    $target_ingredient = $this->Ingredients->patchEntity($target_ingredient,['in_fridge'=>1]);
                    $this->Ingredients->save($target_ingredient);
                }
                $this->Flash->success(__('購入した食材を追加しました'));
            }

        }

        $my_ingredients = $this->paginate($this->Ingredients->find('all',['conditions'=>['in_fridge'=>1]]));
        $not_my_ingredients = $this->Ingredients->find('list',['keyField'=>'id','valueField'=>'name','conditions'=>['in_fridge'=>0]])->toArray();

        $this->set(compact('my_ingredients','ingredients','not_my_ingredients'));
    }

    public function shoppingList()
    {

        $buy_ingredients = array();
        $target_recipe_id=$this->request->getData('select_recipe')??3;
        $this->loadModel('Recipes');
        $target_recipe=$this->Recipes->get($target_recipe_id, [
            'contain' => ['Ingredients'],
        ]);

        $ingredients = $this->Ingredients->find('all', [
            'contain' => ['Recipes'],
        ]);


        foreach ($target_recipe->ingredients as $target_ingredient){
            if($target_ingredient->in_fridge==0){
                $buy_ingredients[]=$target_ingredient;
            }
        }

        //$test = $this->request->getData();
        $this->set(compact('buy_ingredients'));

    }

    /**
     * View method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingredient = $this->Ingredients->get($id, [
            'contain' => ['Recipes'],
        ]);

        $this->set(compact('ingredient'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingredient = $this->Ingredients->newEmptyEntity();
        if ($this->request->is('post')) {
            $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->getData());
            if ($this->Ingredients->save($ingredient)) {
                $this->Flash->success(__('The ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
        }
        $recipes = $this->Ingredients->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('ingredient', 'recipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingredient = $this->Ingredients->get($id, [
            'contain' => ['Recipes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->getData());
            if ($this->Ingredients->save($ingredient)) {
                $this->Flash->success(__('The ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
        }
        $recipes = $this->Ingredients->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('ingredient', 'recipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        //$this->request->allowMethod(['post', 'delete']);
        $target_ingredient = $this->Ingredients->get($id);

        $target_ingredient = $this->Ingredients->patchEntity($target_ingredient,['in_fridge'=>0]);
        if ($this->Ingredients->save($target_ingredient)) {
            $this->Flash->success(__('食材を削除しました'));
        }

        return $this->redirect(['action' => 'fridge']);
    }
}
