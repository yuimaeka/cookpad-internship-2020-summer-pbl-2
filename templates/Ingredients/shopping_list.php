<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient[]|\Cake\Collection\CollectionInterface $ingredients
 */
?>
<div class="ingredients index content">
    <h3><img src="../webroot/img/carrot.png" height="36"><?= __('本日の買い物リスト') ?></h3>
    <h5>買ったものにチェックを入れてください。</h5>
    <?= $this->Form->create(null,['url'=>"/ingredients/fridge"]) ?>
    <ul style="list-style:none;">
        <?php foreach ($buy_ingredients as $ingredient): ?>
            <li>
                <input type="checkbox" name="<?= $ingredient->id ?>" id="<?= $ingredient->id ?>">
                <?= h($ingredient->name) ?>
            </li>                
        <?php endforeach; ?>
    </ul>
    
    <?= $this->Form->button(__('買い物を終わる'), ['type'=>'submit','class'=>'my-button']) ?>

    </form>
    
</div>
