$('#btnSend').click(function () {
    const name = $('#name').val();
    const email = $('#email').val();
    const tel = $('#tel').val();
    const text = $('#text').val();

    fetch('send/send.php', {
        method: 'POST',
        dataType: 'JSON',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json, charset=utf-8'
        },
        body: JSON.stringify({
            name: name,
            email: email,
            tel: tel,
            text: text
        })
    })
    .then(res => res.json())
    .then(result => {
        if (result.status === 'success') {
            Swal.fire(
                'Ваша сообщение успешно отправлено!',
                'Скоро с Вами свяжутся сотрудники компании! Спасибо',
                'success'
            );
        } else {
            Swal.fire(
                'Ooops!',
                'Что то пошло не так, проверьте данные на истенность и попробуйте еще раз отправить!',
                'error'
            );
        }
    });
});