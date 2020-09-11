<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe[]|\Cake\Collection\CollectionInterface $recipes
 */
?>
<div class="recipes index content">
    <h3><img src="../webroot/img/carrot.png" height="36"><?= __('本日のおすすめレシピ') ?></h3>
    <h5>本日作る料理を選んでください。</h5>
    <?= $this->Form->create(null,['url'=>"/ingredients/shopping_list"]) ?>
    <ul style="list-style:none;">
        <?php foreach ($suggest_recipes as $recipe): ?>
            <li>
                <input type="radio" name="select_recipe" id="<?= $recipe->id ?>" value="<?= $recipe->id ?>">
                <?= h($recipe->name) ?>
            </li>                
        <?php endforeach; ?>
    </ul>
    
    <?= $this->Form->button(__('このレシピで買い物リストを作成'), ['type'=>'submit','class'=>'my-button']) ?>

    </form>

    </div>
</div>
