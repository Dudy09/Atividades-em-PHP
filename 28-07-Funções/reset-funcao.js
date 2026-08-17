document.addEventListener('click', function (event) {
    const button = event.target.closest('[data-reset-form]');

    if (!button) {
        return;
    }

    const formId = button.dataset.resetForm;
    const resultId = button.dataset.resultId;
    const form = document.getElementById(formId);
    const result = resultId ? document.getElementById(resultId) : null;

    if (form) {
        form.reset();
    }

    if (result) {
        result.remove();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form[data-ajax="true"]');

    forms.forEach(function (form) {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            const resultId = form.dataset.resultId || 'resultado-ajax';
            let result = document.getElementById(resultId);

            if (!result) {
                result = document.createElement('div');
                result.id = resultId;
                result.style.marginTop = '12px';
                result.style.fontWeight = '600';
                form.insertAdjacentElement('afterend', result);
            }

            result.textContent = 'Processando...';
            result.style.opacity = '0.7';

            const formData = new FormData(form);
            formData.set('ajax', '1');

            try {
                const response = await fetch(form.action || window.location.href, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error('Erro ao processar a requisição');
                }

                const payload = await response.json();
                const mensagem = payload.resultado ?? 'Sem resposta';

                result.textContent = mensagem;
                result.style.opacity = '1';
            } catch (error) {
                result.textContent = 'Erro no processamento do AJAX.';
                result.style.opacity = '1';
                console.error(error);
            }
        });
    });
});
