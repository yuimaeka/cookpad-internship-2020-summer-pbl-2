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
            <?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recipe'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="recipes view content">
            <h3><?= h($recipe->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($recipe->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($recipe->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($recipe->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified At') ?></th>
                    <td><?= h($recipe->modified_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Ingredients') ?></h4>
                <?php if (!empty($recipe->ingredients)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Modified At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($recipe->ingredients as $ingredients) : ?>
                        <tr>
                            <td><?= h($ingredients->id) ?></td>
                            <td><?= h($ingredients->name) ?></td>
                            <td><?= h($ingredients->created_at) ?></td>
                            <td><?= h($ingredients->modified_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ingredients', 'action' => 'view', $ingredients->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ingredients', 'action' => 'edit', $ingredients->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ingredients', 'action' => 'delete', $ingredients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredients->id)]) ?>
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
