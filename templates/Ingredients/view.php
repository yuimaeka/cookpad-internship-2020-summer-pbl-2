<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ingredient'), ['action' => 'edit', $ingredient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ingredient'), ['action' => 'delete', $ingredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ingredients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ingredient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ingredients view content">
            <h3><?= h($ingredient->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($ingredient->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ingredient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($ingredient->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified At') ?></th>
                    <td><?= h($ingredient->modified_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Recipes') ?></h4>
                <?php if (!empty($ingredient->recipes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Modified At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($ingredient->recipes as $recipes) : ?>
                        <tr>
                            <td><?= h($recipes->id) ?></td>
                            <td><?= h($recipes->name) ?></td>
                            <td><?= h($recipes->created_at) ?></td>
                            <td><?= h($recipes->modified_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Recipes', 'action' => 'view', $recipes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Recipes', 'action' => 'edit', $recipes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recipes', 'action' => 'delete', $recipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
