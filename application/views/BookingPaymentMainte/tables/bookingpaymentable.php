<?php if (!empty($record)) : ?>
    <?php foreach ($record as $row) : ?>
        <tr>
            <td><?= $row['drivername'] ?></td>
            <td><?= $row['clientname'] ?></td>
            <td><?= $row['tripfrom'] ?></td>
            <td><?= $row['tripto'] ?></td>
            <td><?= $row['service'] ?></td>
            <td><?= $row['amount'] ?></td>
            <td><?= $row['tip'] ?></td>
            <td><?= $row['total'] ?></td>
            <td><?= $row['paidflag'] == 1 ? "Paid" : "Ongoing Trip" ?></td>
            <td><?= $row['createdby'] ?></td>
            <td><?= $row['createddate'] != null ? date('M. d, Y h:i A', strtotime($row['createddate'])) : '' ?></td>
            <td><?= $row['updatedby'] ?></td>
            <td><?= $row['updateddate'] != null ? date('M. d, Y h:i A', strtotime($row['updateddate'])) : '' ?></td>
            <td style="width: 8%;"> 
            <?php if($row['paidflag'] == 0){?>    
                <button type="button" class="btn btn-success paybooking" data-recordid="<?= $row['id'] ?>"><i class="fa-solid fa-money-bill-wave"></i></button>
            <?php } ?>
            </td>
                

        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="14" class="text-center fs-4">No records found</td>
    </tr>
    </tr>
<?php endif; ?>