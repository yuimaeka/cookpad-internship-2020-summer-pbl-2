<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient[]|\Cake\Collection\CollectionInterface $ingredients
 */
?>
<div class="ingredients index content">
    <h3><img src="../webroot/img/carrot.png" height="36"><?= __('家にある食材リスト') ?></h3>
    <h5>本日使いたい食材を選んで下さい。</h5>
    <?= $this->Form->create(null,['url'=>"/recipes/suggest_recipes"]) ?>
    <ul style="list-style:none;">
        <?php foreach ($my_ingredients as $ingredient): ?>
            <li>
                <input type="checkbox" name="<?= $ingredient->id ?>" id="<?= $ingredient->id ?>">
                <?= h($ingredient->name) ?>
                <?= $this->Html->Link(__('Delete'), ['action' => 'delete', $ingredient->id]) ?>
            </li>                
        <?php endforeach; ?>
    </ul>
    
    <?= $this->Form->button(__('この食材でレシピ検索'), ['type'=>'submit','class'=>'my-button']) ?>

    </form>

    <div class="recipes form content">
            <?= $this->Form->create(null) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('add_ingredient',['options' => $not_my_ingredients,'type'=>'select','label'=>'食材の追加']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('追加する'),['class'=>'my-button']) ?>
            <?= $this->Form->end() ?>
    </div>
    
</div>
