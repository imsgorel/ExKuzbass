//------------ЗАГРУЗКА КАРТИНКИ ССЫЛКОЙ URL----------------------
document.getElementById('LoadImage').addEventListener('click', function() {
    const imageUrl = document.getElementById('ImageURL').value;
    const imageBlock = document.querySelector('.image-block');

    const imgElement = document.getElementById('ex_image');
    imgElement.src = imageUrl;
    imageBlock.style.border = 'none';

    if (imageUrl) {
        imgElement.style.display = 'block';

    } else {
        imgElement.style.display = 'none';
    }
});

//---------------------------------------------------------------------
document.getElementById('RemoveImage').addEventListener('click', function() {
    const imgElement = document.getElementById('ex_image');
    const inputURL = document.getElementById('ImageURL');
    imgElement.src = '';

    const imageBlock = document.querySelector('.image-block');
    imageBlock.style.border = '1px dashed #00000045';
    inputURL.value = '';
});

//-----------------------------------------------------------------------
document.getElementById('authButtonAdmin').addEventListener('click', function() {
    const inputCode = document.getElementById('inputPasswordAdmin').value;

            if (inputCode === '123') {
                document.getElementById('passwordBlock').style.display = 'none';
                document.getElementById('AdminSection').style.display = 'flex';
                document.getElementById('PasswordBlock-Background').style.display = 'none';
            } else {
                alert('Ошибка авторизации!');
            }
        });

//--------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    const deleteExLink = document.getElementById('deleteExLink');
    const deleteForm = document.getElementById('deleteForm');
    const adminPanel = document.getElementById('adminPanel');

    if (deleteExLink && deleteForm && adminPanel) {
        deleteExLink.addEventListener('click', function(event) {
            event.preventDefault();

            const adminPanelHeight = window.getComputedStyle(adminPanel).height;

            const heightNum = parseInt(adminPanelHeight.replace('px', ''), 10);

            if (heightNum === 800) {
                adminPanel.style.height = '900px';
                deleteForm.style.display = 'flex';
                deleteExLink.innerText = 'Скрыть';
            } else {
                adminPanel.style.height = '800px';
                deleteForm.style.display = 'none';
                deleteExLink.innerText = 'Удаление достопримечательностей';
            }
        });
    } else {
        console.error('Не удалось раскрыть доп. настройки админ-панели.');
    }
});