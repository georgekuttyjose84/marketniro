<section class="card-block table-card filter-card mb-4">
    <h2>Hourly Forex Price Comparison – Today vs Yesterday</h2>
    <p>Compare today's hourly USD to INR exchange rates against yesterday's prices to identify intraday currency market movements and trends.</p>

    <div class="table-scroll">
        <table class="hourly-table">
            <thead>
            <tr>
                <th>Time</th>
                <th>Today</th>
                <th>Yesterday</th>
                <th class="text-center">Trend</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($rows as $row): ?>
                <tr>
                    <td class="fw-bold"><?= htmlspecialchars($row['time']) ?></td>
                    <td><?= $row['yesterday'] !== null ? htmlspecialchars($row['yesterday']) . ' ' . htmlspecialchars($target) : '—' ?></td>
                    <td><?= $row['today'] !== null ? htmlspecialchars($row['today']) . ' ' . htmlspecialchars($target) : '—' ?></td>


                    <td class="text-center">
                        <?php if ($row['today'] === null || $row['yesterday'] === null): ?>
                            <span class="trend-icon flat">●</span>
                        <?php elseif ($row['today'] > $row['yesterday']): ?>
                            <span class="trend-icon up">▲</span>
                        <?php elseif ($row['today'] < $row['yesterday']): ?>
                            <span class="trend-icon down">▼</span>
                        <?php else: ?>
                            <span class="trend-flat" aria-label="No change">—</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>