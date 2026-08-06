<?php

$type = $metalType === 'gold' ? ['price22k','price24k'] : ['price925','price999'];
$header = $metalType === 'gold' ? ['22 Carat' ,'24 Carat']: ['925 Silver', '999 Silver'];

?>



<?php if (!empty($table)): ?>
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="section-card h-100 p-4">
                <div class="mb-4">
                    <h2 class="fw-bold m-0" style="font-size: 24px; color: var(--on-surface);"><?= ucfirst($metalType) ?> Price in <strong><?= htmlspecialchars($currency) ?></strong></h2>
                    <p class="m-0 mt-1" style="font-size: 14px; color: var(--text-secondary);">Standard measurements</p>
                </div>
                <div class="table-responsive">
                    <table class="table-custom w-100">
                        <thead>
                        <tr>
                            <th style="font-size: 12px;" class="">Quantity</th>
                            <th class="text-end" style="font-size: 12px;"><?= $header[0] ?></th>
                            <th class="text-end" style="font-size: 12px;"><?= $header[1] ?></th>
                        </tr>
                        </thead>
                        <tbody class="font-data-mono" style="font-size: 14px;">
                        <?php foreach ($table as $row): ?>
                            <tr style="transform: scale(1);">
                                <td class="font-sans" style="font-family: Inter, sans-serif; font-size: 14px;">
                                    <strong>
                                        <?= htmlspecialchars($row['label']) ?>
                                    </strong>
                                    <?php if ($row['description'] !== null): ?>
                                        <br>
                                        <span class="text-muted t-xsmall"><?= htmlspecialchars($row['description']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?= number_format($row[$type[0]], 0) ?> <?= htmlspecialchars($currency) ?>
                                </td>
                                <td class="text-end fw-bold" style="color: var(--primary);">
                                    <?= number_format($row[$type[1]], 0) ?> <?= htmlspecialchars($currency) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>