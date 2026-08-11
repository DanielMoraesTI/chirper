document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-avatar-picker]').forEach(initAvatarPicker);
});

/**
 * Antes de selecionar um personagem, mostra um modal com um resumo de quem
 * ele é na história de Chrono Trigger. A seleção só é aplicada de fato
 * quando a pessoa confirma no modal.
 */
function initAvatarPicker(picker) {
    const modal = picker.querySelector('dialog.avatar-lore-modal');
    if (!modal) return;

    const img = modal.querySelector('[data-avatar-lore-img]');
    const name = modal.querySelector('[data-avatar-lore-name]');
    const bio = modal.querySelector('[data-avatar-lore-bio]');
    const confirmBtn = modal.querySelector('[data-avatar-lore-confirm]');
    const cancelBtn = modal.querySelector('[data-avatar-lore-cancel]');
    const backdropBtn = modal.querySelector('[data-avatar-lore-backdrop]');

    let pendingInput = null;

    picker.querySelectorAll('label[data-avatar-slug]').forEach((label) => {
        const input = label.querySelector('input[type="radio"]');
        if (!input) return;

        label.addEventListener('click', (event) => {
            // Mesmo já selecionado, o clique reabre o modal de apresentação.
            event.preventDefault();
            pendingInput = input;

            img.src = label.dataset.avatarImg ?? '';
            img.alt = label.dataset.avatarName ?? '';
            name.textContent = label.dataset.avatarName ?? '';
            bio.textContent = label.dataset.avatarBio ?? '';
            confirmBtn.textContent = `⚔️ Escolher ${label.dataset.avatarName ?? ''}`;

            modal.showModal();
        });
    });

    confirmBtn?.addEventListener('click', () => {
        if (pendingInput) {
            pendingInput.checked = true;
            pendingInput.dispatchEvent(new Event('change', { bubbles: true }));
        }
        modal.close();
    });

    cancelBtn?.addEventListener('click', () => {
        pendingInput = null;
        modal.close();
    });

    backdropBtn?.addEventListener('click', () => {
        pendingInput = null;
        modal.close();
    });

    modal.addEventListener('close', () => {
        pendingInput = null;
    });
}
