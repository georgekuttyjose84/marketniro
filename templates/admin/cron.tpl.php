<style>
    /* =========================================================
   CRON CARDS
========================================================= */

    .cron-card {
        height: 100%;

        padding: 24px;

        background: var(--surface-container-lowest, #ffffff);

        border: 1px solid var(--outline-variant, #dfe3e8);

        border-radius: 16px;

        transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
    }

    .cron-card:hover {
        transform: translateY(-2px);

        box-shadow:
                0 8px 24px rgba(0, 0, 0, 0.06);
    }


    .cron-card-icon {
        width: 46px;
        height: 46px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 18px;

        border-radius: 12px;

        background: var(--primary-container, #e7eeff);

        color: var(--primary, #315efb);
    }


    .cron-card-icon .material-symbols-outlined {
        font-size: 24px;
    }


    .cron-card-content h3 {
        margin: 0 0 8px;

        font-size: 18px;
        font-weight: 700;

        color: var(--on-surface, #172033);
    }


    .cron-card-content p {
        margin: 0 0 20px;

        color: var(--on-surface-variant, #687386);

        font-size: 14px;
        line-height: 1.6;
    }


    /* =========================================================
       RUN BUTTON
    ========================================================= */

    .cron-run-btn {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 7px;

        min-width: 110px;

        padding: 9px 16px;

        border-radius: 8px;

        background: var(--primary, #315efb);

        border: 1px solid var(--primary, #315efb);

        color: #ffffff;

        font-size: 14px;
        font-weight: 600;

        transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
    }


    .cron-run-btn:hover {
        background: var(--primary-hover, #244edb);

        color: #ffffff;

        transform: translateY(-1px);

        box-shadow:
                0 5px 14px rgba(49, 94, 251, 0.2);
    }


    .cron-run-btn:disabled {
        cursor: not-allowed;

        opacity: 0.65;

        transform: none;

        box-shadow: none;
    }


    .cron-run-btn .material-symbols-outlined {
        font-size: 18px;
    }


    /* =========================================================
       MODAL
    ========================================================= */

    .cron-modal {
        border: 0;

        border-radius: 18px;

        overflow: hidden;

        background: var(--surface-container-lowest, #ffffff);
    }


    .cron-modal .modal-header {
        padding: 18px 22px;

        border-bottom:
                1px solid var(--outline-variant, #dfe3e8);
    }


    .cron-modal .modal-title {
        font-size: 17px;

        font-weight: 700;

        color: var(--on-surface, #172033);
    }


    .cron-modal .modal-body {
        padding: 40px 24px;
    }


    .cron-modal .modal-footer {
        padding: 14px 22px;

        border-top:
                1px solid var(--outline-variant, #dfe3e8);
    }


    /* =========================================================
       MODAL STATES
    ========================================================= */

    .cron-modal-state h4 {
        margin: 18px 0 8px;

        font-size: 20px;
        font-weight: 700;

        color: var(--on-surface, #172033);
    }


    .cron-modal-state p {
        max-width: 380px;

        margin: 0 auto;

        color: var(--on-surface-variant, #687386);

        font-size: 14px;

        line-height: 1.6;

        word-break: break-word;
    }


    /* =========================================================
       LOADING
    ========================================================= */

    .cron-spinner {
        width: 64px;
        height: 64px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto;

        border-radius: 50%;

        background: var(--primary-container, #e7eeff);

        color: var(--primary, #315efb);
    }


    .cron-spinner .material-symbols-outlined {
        font-size: 32px;

        animation: cronSpin 1s linear infinite;
    }


    @keyframes cronSpin {

        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }

    }


    /* =========================================================
       SUCCESS
    ========================================================= */

    .cron-success-icon {
        width: 64px;
        height: 64px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto;

        border-radius: 50%;

        background: #e8f7ee;

        color: #198754;
    }


    .cron-success-icon .material-symbols-outlined {
        font-size: 34px;
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .cron-error-icon {
        width: 64px;
        height: 64px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto;

        border-radius: 50%;

        background: #fdecec;

        color: #dc3545;
    }


    .cron-error-icon .material-symbols-outlined {
        font-size: 34px;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767px) {

        .cron-card {
            padding: 20px;
        }

        .cron-modal .modal-body {
            padding: 32px 20px;
        }

    }

</style>











<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">

<div class="row g-4">
    <div class="col-md-4">
        <div class="cron-card">
            <div class="cron-card-icon">
                <span class="material-symbols-outlined">local_shipping</span>
            </div>
            <div class="cron-card-content">
                <h3>Rubber Prices</h3>
                <p>Fetch the latest rubber market prices.</p>
                <button type="button" class="btn cron-run-btn" data-cron-job="rubber" data-cron-name="Rubber Prices">
                    <span class="material-symbols-outlined">sync</span>Run Now
                </button>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="cron-card">
            <div class="cron-card-icon">
                <span class="material-symbols-outlined">currency_exchange</span>
            </div>

            <div class="cron-card-content">
                <h3>Exchange Rates</h3>
                <p>Fetch the latest currency exchange rates.</p>

                <button type="button" class="btn cron-run-btn" data-cron-job="exchange-rates" data-cron-name="Exchange Rates">
                    <span class="material-symbols-outlined">sync</span>Run Now
                </button>
            </div>
        </div>
    </div>


    <!-- Pineapple -->
    <div class="col-md-4">

        <div class="cron-card">

            <div class="cron-card-icon">
                <span class="material-symbols-outlined">
                    agriculture
                </span>
            </div>

            <div class="cron-card-content">

                <h3>
                    Pineapple Prices
                </h3>

                <p>
                    Fetch the latest pineapple market prices.
                </p>

                <button
                    type="button"
                    class="btn cron-run-btn"
                    data-cron-job="pineapple"
                    data-cron-name="Pineapple Prices"
                >
                    <span class="material-symbols-outlined">
                        sync
                    </span>

                    Run Now
                </button>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     CRON RESULT MODAL
========================================================= -->

<div
    class="modal fade"
    id="cronResultModal"
    tabindex="-1"
    aria-labelledby="cronResultModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content cron-modal">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="cronResultModalLabel"
                >
                    Running Job
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    id="cronModalClose"
                ></button>

            </div>


            <div class="modal-body text-center">

                <!-- Loading -->
                <div
                    id="cronLoadingState"
                    class="cron-modal-state"
                >

                    <div class="cron-spinner">

                        <span class="material-symbols-outlined">
                            sync
                        </span>

                    </div>

                    <h4 id="cronLoadingTitle">
                        Running...
                    </h4>

                    <p id="cronLoadingMessage">
                        Please wait while the job is being completed.
                    </p>

                </div>


                <!-- Success -->
                <div
                    id="cronSuccessState"
                    class="cron-modal-state d-none"
                >

                    <div class="cron-success-icon">

                        <span class="material-symbols-outlined">
                            check_circle
                        </span>

                    </div>

                    <h4>
                        Successful
                    </h4>

                    <p id="cronSuccessMessage">
                        Job completed successfully.
                    </p>

                </div>


                <!-- Failed -->
                <div
                    id="cronFailedState"
                    class="cron-modal-state d-none"
                >

                    <div class="cron-error-icon">

                        <span class="material-symbols-outlined">
                            error
                        </span>

                    </div>

                    <h4>
                        Failed
                    </h4>

                    <p id="cronErrorMessage">
                        Something went wrong.
                    </p>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                    id="cronModalDoneButton"
                >
                    Close
                </button>

            </div>

        </div>

    </div>

</div>

        </main>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const buttons =
        document.querySelectorAll('.cron-run-btn');

        const modalElement =
        document.getElementById('cronResultModal');

        const modal =
        new bootstrap.Modal(modalElement, {
        backdrop: 'static',
        keyboard: false
    });


        const modalTitle =
        document.getElementById('cronResultModalLabel');

        const loadingState =
        document.getElementById('cronLoadingState');

        const successState =
        document.getElementById('cronSuccessState');

        const failedState =
        document.getElementById('cronFailedState');


        const loadingTitle =
        document.getElementById('cronLoadingTitle');

        const loadingMessage =
        document.getElementById('cronLoadingMessage');

        const successMessage =
        document.getElementById('cronSuccessMessage');

        const errorMessage =
        document.getElementById('cronErrorMessage');


        const closeButton =
        document.getElementById('cronModalClose');

        const doneButton =
        document.getElementById('cronModalDoneButton');


        /*
         * Reset modal state
         */
        function resetModal() {

        loadingState.classList.remove('d-none');

        successState.classList.add('d-none');

        failedState.classList.add('d-none');

        closeButton.disabled = true;

        doneButton.disabled = true;

        modalTitle.textContent = 'Running Job';

        loadingTitle.textContent = 'Running...';

        loadingMessage.textContent =
        'Please wait while the job is being completed.';

    }


        /*
         * Show success
         */
        function showSuccess(message) {

        loadingState.classList.add('d-none');

        failedState.classList.add('d-none');

        successState.classList.remove('d-none');

        modalTitle.textContent = 'Job Completed';

        successMessage.textContent =
        message || 'Job completed successfully.';

        closeButton.disabled = false;

        doneButton.disabled = false;
    }


        /*
         * Show failure
         */
        function showFailure(message) {

        loadingState.classList.add('d-none');

        successState.classList.add('d-none');

        failedState.classList.remove('d-none');

        modalTitle.textContent = 'Job Failed';

        errorMessage.textContent =
        message || 'Something went wrong while running the job.';

        closeButton.disabled = false;

        doneButton.disabled = false;
    }


        /*
         * Run each cron job
         */
        buttons.forEach(function (button) {

        button.addEventListener('click', async function () {

        const job =
        button.dataset.cronJob;

        const jobName =
        button.dataset.cronName;


        if (!job) {
        return;
    }


        /*
         * Disable the clicked button
         */
        button.disabled = true;


        /*
         * Prepare modal
         */
        resetModal();

        modalTitle.textContent =
        `Running ${jobName}`;


        loadingTitle.textContent =
        `Running ${jobName}...`;


        loadingMessage.textContent =
        'Please wait while the latest data is being fetched and saved.';


        /*
         * Open modal immediately
         */
        modal.show();


        try {

        const response = await fetch(
        `/cron/${encodeURIComponent(job)}`,
    {
        method: 'POST',

        headers: {
        'X-Requested-With':
        'XMLHttpRequest',

        'Accept':
        'application/json',

        'Content-Type':
        'application/json'
    }
    }
        );


        /*
         * Try to decode JSON.
         */
        let data;

        try {

        data = await response.json();

    } catch (error) {

        throw new Error(
        'The server returned an invalid response.'
        );

    }


        /*
         * HTTP error
         */
        if (!response.ok) {

        throw new Error(
        data.message ||
        'The cron job failed.'
        );
    }


        /*
         * Application-level failure
         */
        if (!data.success) {

        throw new Error(
        data.message ||
        'The cron job failed.'
        );
    }


        /*
         * SUCCESS
         */
        showSuccess(
        data.message ||
        `${jobName} completed successfully.`
        );


    } catch (error) {

        /*
         * FAILURE
         */
        showFailure(
        error.message ||
        `Unable to run ${jobName}.`
        );


    } finally {

        /*
         * Re-enable button
         */
        button.disabled = false;
    }

    });

    });

    });

</script>