<?php $pagelimit = 2 ?>
<div class="text-center bg-white rounded">
    <ul class="pagination">
        <?php if ($pagenum != 1): ?>
            <li><button class="btn btn-default pagebutton" value="1">&laquo;&laquo;</button></li>
            <li><button class="btn btn-default pagebutton" value="<?= $pagenum - 1 ?>">&laquo;</button></li>
        <?php endif; ?>

        <?php for ($i = $pagenum - $pagelimit; $i < $pagenum; $i++): ?>
            <?php if ($i > 0): ?>
                <li><button class="btn btn-default pagebutton" value="<?= $i ?>"><?= $i ?></button></li>
            <?php endif; ?>
        <?php endfor; ?>

        <li class="active"><button class="btn btn-primary pagebutton" value="<?= $pagenum ?>"><?= $pagenum ?></button></li>

        <?php for ($i = $pagenum + 1; $i <= $pagenum + $pagelimit; $i++): ?>
            <?php if ($i <= $pagecount): ?>
                <li><button class="btn btn-default pagebutton" value="<?= $i ?>"><?= $i ?></button></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($pagenum < $pagecount): ?>
            <li><button class="btn btn-default pagebutton" value="<?= $pagenum + 1 ?>">&raquo;</button></li>
            <li><button class="btn btn-default pagebutton" value="<?= $pagecount ?>">&raquo;&raquo;</button></li>
        <?php endif; ?>
    </ul>
</div>

