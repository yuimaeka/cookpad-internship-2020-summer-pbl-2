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
        $ingredients = $this->paginate($this->Ingredients->find('all',['conditions'=>['in_fridge'=>1]]));

        $this->set(compact('ingredients'));
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
        $this->request->allowMethod(['post', 'delete']);
        $ingredient = $this->Ingredients->get($id);
        if ($this->Ingredients->delete($ingredient)) {
            $this->Flash->success(__('The ingredient has been deleted.'));
        } else {
            $this->Flash->error(__('The ingredient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
