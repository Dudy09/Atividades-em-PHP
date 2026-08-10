document.addEventListener('click', function (event) {
    const button = event.target.closest('[data-reset-form]');

    if (!button) {
        return;
    }

    const formId = button.dataset.resetForm;
    const resultId = button.dataset.resultId;

    const form = document.getElementById(formId);
    const result = document.getElementById(resultId);

    if (form) {
        form.reset();
    }

    if (result) {
        result.remove();
    }
});
