
<?php
use App\Domain\Entity\CurrencyRate;


?>


<h1>This is the Home Page For Currenct Convertor please Check it out</h1>
<h1>Currency Rates</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Base Currency</th>
            <th>Target Currency</th>
            <th>Rate</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rates as $rate): ?>
        <tr>
            <td><?= $rate->id ?></td>

            <td><?= htmlspecialchars($rate->baseCurrency) ?></td>

            <td><?= htmlspecialchars($rate->targetCurrency) ?></td>

            <td><?= htmlspecialchars($rate->rate) ?></td>

            <td>
                <?= htmlspecialchars(
                    $rate->createdAt
                        ->setTimezone(new DateTimeZone('Asia/Kolkata'))
                        ->format('d M Y, h:i A')
                ) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
