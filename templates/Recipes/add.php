<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipes form content">
            <?= $this->Form->create($recipe) ?>
            <fieldset>
                <legend><?= __('Add Recipe') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('modified_at');
                    // echo $this->Form->control('ingredients._ids', ['options' => $ingredients->toArray(), 'multiple' => 'true']);
                    echo $this->Form->control('ingredients._ids',['options' => $ingredients->toArray(),'multiple' => true,'type'=>'select','class'=>'m-select']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
