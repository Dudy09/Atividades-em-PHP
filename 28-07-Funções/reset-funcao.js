// Script para controlar os formulários dinâmicos da página.
// Ele faz o reset do campo e também envia o formulário via AJAX
// sem recarregar a página inteira.

document.addEventListener('click', function (event) {
    // Busca o botão que contém o atributo data-reset-form.
    const button = event.target.closest('[data-reset-form]');

    // Se não for um botão de reset, termina a execução.
    if (!button) {
        return;
    }

    // Pega os IDs do formulário e do resultado associado.
    const formId = button.dataset.resetForm;
    const resultId = button.dataset.resultId;

    // Busca o formulário e o container de resultado.
    const form = document.getElementById(formId);
    const result = document.getElementById(resultId);

    // Limpa os campos do formulário.
    if (form) {
        form.reset();
    }

    // Remove a mensagem de resultado anterior.
    if (result) {
        result.remove();
    }
});

// Quando a página estiver pronta, todos os formulários com
// data-ajax="true" receberão o evento de submit com AJAX.
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form[data-ajax="true"]');

    forms.forEach(function (form) {
        form.addEventListener('submit', async function (event) {
            // Impede o envio padrão do navegador.
            event.preventDefault();

            // Pega o ID do resultado que vai mostrar a resposta.
            const resultId = form.dataset.resultId || 'resultado-ajax';
            const currentResult = document.getElementById(resultId);

            // Se já existir o resultado, atualiza com "Processando...".
            if (currentResult) {
                currentResult.textContent = 'Processando...';
                currentResult.style.opacity = '0.7';
            } else {
                // Se não existir, cria um bloco temporário para mostrar a mensagem.
                const loading = document.createElement('div');
                loading.id = resultId;
                loading.style.marginTop = '12px';
                loading.style.fontWeight = '600';
                loading.textContent = 'Processando...';
                form.insertAdjacentElement('afterend', loading);
            }

            // Coleta os dados do formulário e envia por fetch.
            const formData = new FormData(form);
            formData.set('ajax', '1');
            formData.set('resultId', resultId);

            const response = await fetch(form.action || window.location.href, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            // Converte o retorno em texto HTML.
            const html = await response.text();
            const wrapper = document.createElement('div');
            wrapper.innerHTML = html;

            // Procura o elemento com o ID de retorno dentro do HTML recebido.
            const selectedId = '#' + resultId.replace(/[^a-zA-Z0-9_-]/g, '');
            const serverResult = wrapper.querySelector(selectedId);

            // Substitui ou insere o resultado na página.
            if (serverResult) {
                const target = document.getElementById(resultId);

                if (target) {
                    target.replaceWith(serverResult);
                } else {
                    form.insertAdjacentElement('afterend', serverResult);
                }
            }
        });
    });
});
