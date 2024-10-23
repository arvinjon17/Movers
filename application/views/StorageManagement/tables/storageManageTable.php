<?php if (!empty($item)) : ?>
    <?php foreach ($item as $row) : ?>
        <tr>
            <td><?= $row['itemname'] ?></td>
            <td><?= $row['qty'] ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= $row['createdby'] ?></td>
            <td><?= $row['createddate'] != null ? date('M. d, Y h:i A', strtotime($row['createddate'])) : '' ?></td>
            <td><?= $row['updatedby'] ?></td>
            <td><?= $row['updateddate'] != null ? date('M. d, Y h:i A', strtotime($row['updateddate'])) : '' ?></td>
            <td><?= $row['activeflag'] == 1 ? "Active" : "Deactivated" ?></td>
            <td style="width: 8%;"><button type="button" class="btn btn-info editbtn" id="editbtn" data-itemid="<?= $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></button> | 
            
            <?php if($row['activeflag'] == 1){?>
                <button type="button" class="btn btn-danger disablebtn" data-itemid="<?= $row['id'] ?>"><i class="fa-solid fa-rectangle-xmark"></button></i></td>
            <?php } else { ?>
                <button type="button" class="btn btn-success activatebtn" data-itemid="<?= $row['id'] ?>"><i class="fa-solid fa-square-plus"></i></i></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="14" class="text-center fs-4">No records found</td>
    </tr>
    </tr>
<?php endif; ?>