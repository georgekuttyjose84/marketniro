<style>
    .hourly-comparison {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 28px;
        margin-top: 40px;
        box-sizing: border-box;
        width: 100%;
        overflow: hidden;
    }

    .comparison-header h2 {
        font-size: clamp(18px, 4vw, 28px);
        font-weight: 700;
        margin-bottom: 6px;
        line-height: 1.3;
    }

    .comparison-header p {
        color: #64748b;
        margin-bottom: 24px;
        font-size: clamp(14px, 2.5vw, 16px);
        line-height: 1.6;
    }

    .comparison-table {
        margin-bottom: 0;
        width: 100%;
        table-layout: auto;
    }

    .comparison-table thead {
        background: #f8fafc;
    }

    .comparison-table th {
        font-weight: 700;
        color: #0f172a;
        border-bottom: 2px solid #e5e7eb;
        padding: 14px 12px;
        white-space: nowrap;
        font-size: 14px;
    }

    .comparison-table td {
        vertical-align: middle;
        padding: 12px;
        font-size: 14px;
    }

    .comparison-table .col-time {
        white-space: nowrap;
    }

    .comparison-table tbody tr:hover {
        background: #fafafa;
    }

    .trend-up {
        color: #16a34a;
        font-size: 18px;
        font-weight: bold;
        display: inline-block;
        line-height: 1;
    }

    .trend-down {
        color: #dc2626;
        font-size: 18px;
        font-weight: bold;
        display: inline-block;
        line-height: 1;
    }

    .trend-flat {
        color: #64748b;
        font-size: 18px;
        display: inline-block;
        line-height: 1;
    }

    .trend-none {
        color: #64748b;
        font-size: 15px;
        display: inline-block;
    }

    @media (max-width: 480px) {
        .hourly-comparison {
            padding: 16px 12px;
            border-radius: 10px;
            margin-top: 24px;
        }

        .comparison-header p {
            margin-bottom: 16px;
        }

        .comparison-table th,
        .comparison-table td {
            padding: 10px 8px;
        }
    }

    @media (max-width: 360px) {
        .hourly-comparison {
            padding: 12px 8px;
        }

        .comparison-table th,
        .comparison-table td {
            padding: 8px 6px;
        }
    }
</style>

<section
        class="hourly-comparison"
        aria-label="Hourly USD to INR forex price comparison: today versus yesterday"
>
    <div class="comparison-header">
        <h2>Hourly Forex Price Comparison – Today vs Yesterday</h2>
        <p>
            Compare today's hourly USD to INR exchange rates against yesterday's prices
            to identify intraday currency market movements and trends.
        </p>
    </div>

    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
        <table
                class="table comparison-table align-middle"
                aria-label="Hourly USD to INR exchange rate comparison"
        >
            <thead>
            <tr>
                <th scope="col">Time</th>
                <th scope="col">Yesterday</th>
                <th scope="col">Today</th>
                <th scope="col">Trend</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td class="col-time"><?= htmlspecialchars($row['time']) ?></td>

                    <td>
                        <?= $row['yesterday'] !== null
                                ? htmlspecialchars($row['yesterday']) . ' ' . htmlspecialchars($target)
                                : '—'
                        ?>
                    </td>

                    <td>
                        <?= $row['today'] !== null
                                ? htmlspecialchars($row['today']) . ' ' . htmlspecialchars($target)
                                : '—'
                        ?>
                    </td>

                    <td>
                        <?php if ($row['today'] === null || $row['yesterday'] === null): ?>
                            <span class="trend-none" aria-label="No data">–</span>
                        <?php elseif ($row['today'] > $row['yesterday']): ?>
                            <span class="trend-up" aria-label="Rate increased">▲</span>
                        <?php elseif ($row['today'] < $row['yesterday']): ?>
                            <span class="trend-down" aria-label="Rate decreased">▼</span>
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