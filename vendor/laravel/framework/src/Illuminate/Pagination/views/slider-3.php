<?php
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
    <div class="paging">总数：<b><?php echo $paginator->getTotal() ?></b>
        <?php echo $presenter->render(); ?>
        <div class="clear"></div>
    </div>
<?php endif; ?>
