export const init = () => {
    const closes = document.querySelectorAll('.popup-close');
    const opens = document.querySelectorAll('.open-popup');
    const popups = document.querySelectorAll('.popup');
    
    closes.forEach(close => {
        close.addEventListener('click', () => {
            popups.forEach(p => {
                p.classList.remove('active')
            })
        })
    })
    
    opens.forEach(open => {
        open.addEventListener('click', () => {
            const t = open.getAttribute('data-target');
            const el = document.querySelector(`#${t}`);
            el.classList.add('active')
        })
    })

    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault()
            let formData = new FormData(form);
            form.classList.add('sending');
            
            // let response = await fetch('/files/form-submit.php', {
            //     method: 'POST',
            //     body: formData
            // });
            // console.log(response);
            // if(response.ok){
                // let result = await response.json();
                form.classList.add('success');
                form.classList.remove('sending');
                form.reset();
                const popups = document.querySelectorAll('.popup');
                popups.forEach(el => {
                    el.classList.remove('active')
                })
                const thanks = document.querySelector('.popup#thanks');
                thanks.classList.add('active');
            // }else{
            //     alert("Ошибка");
            //     form.classList.remove('sending');
            // }
        })
    })

}