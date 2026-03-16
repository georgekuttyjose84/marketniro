<!DOCTYPE html>
<html>
<head>
    <title>MarketNiro</title>
</head>
<body>

<h1>MarketNiro</h1>

<h2>Latest Currency Rates</h2>

<table border="1">
<tr>
<th>Base</th>
<th>Target</th>
<th>Rate</th>
<th>Time</th>
</tr>

<?php foreach ($rates as $rate): ?>
<tr>
<td><?= $rate['base_currency'] ?></td>
<td><?= $rate['target_currency'] ?></td>
<td><?= $rate['rate'] ?></td>
<td><?= $rate['created_at'] ?></td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
