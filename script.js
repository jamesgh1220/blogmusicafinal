/* Cuando todo el html ha cargado */
addEventListener('DOMContentLoaded', () => {
    const btn_menu = document.querySelector('.btn-menu');
    if (btn_menu) {
        btn_menu.addEventListener('click', () => {
            const home_ppal = document.querySelector('.home-ppal');//Form registro y login
            const central = document.querySelector('.central');
            const img_home = document.querySelector('.img-home');
            if (home_ppal) {
                home_ppal.classList.toggle('show'); /* Modificar para las vistas que seleccionen elementos que si estén */
            }
            if (central && img_home) {
                central.classList.toggle('show');
                img_home.classList.toggle('show');
            }
            const menu_items = document.querySelector('.menu-items');
            menu_items.classList.toggle('show');
        })
    }

    const sign_in_btn = document.querySelector('.sign-in-button');
    const sign_up_btn = document.querySelector('.sign-up-button');
    const form_home = document.querySelector('.form-home');
    const home_ppal = document.querySelector('.home-ppal');

    if (sign_up_btn) {
        sign_up_btn.onclick = () => {
            form_home.classList.add('active');
            home_ppal.classList.add('active');
        }
    }
    if (sign_in_btn) {
        sign_in_btn.onclick = () => {
            form_home.classList.remove('active');
            home_ppal.classList.remove('active');
        }
    }

})