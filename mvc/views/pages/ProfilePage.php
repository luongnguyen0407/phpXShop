<section class="wrap_profile">
    <div class="box_profile">
        <div class="box_info">
            <img src="https://images.unsplash.com/photo-1666526330716-7eb7ddfc5aca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <div>
                <label for="">Email:</label>
                <input type="text" value="admin@gmail.com" disabled>
            </div>
            <div>
                <label for="">UserName:</label>
                <input type="text" value="admin" disabled>
            </div>
            <div>
                <button class="btn_change_pass">
                    Đổi mật khẩu
                </button>
            </div>
        </div>
        <div class="box_address scroll_style">
            <div>
                <h3 class="box_address_heading">Add New Address</h3>
                <form class="address_chose" autocomplete="off">
                    <div class="wrap_list_pr wrap_list_pr1" data-parent=1>
                        <input placeholder="Tỉnh..." type="text" readonly="readonly">
                        <ul class="list_province scroll_style">
                        </ul>
                    </div>
                    <div class="wrap_list_pr wrap_list_pr2" data-parent=2>
                        <input placeholder="Huyện..." type="text" readonly="readonly">
                        <ul class="list_province scroll_style">
                        </ul>
                    </div>
                    <div class="wrap_list_pr wrap_list_pr3" data-parent=3>
                        <input placeholder="Xã..." type="text" readonly="readonly">
                        <ul class="list_province scroll_style">
                        </ul>
                    </div>
                </form>
                <div class="wrap_list_aria">
                    <textarea class="detailAddress" placeholder="Your address..."></textarea>
                </div>
                <div class="address_chose input_list_phone">
                    <input type="text" placeholder="Phone number" class="phone_oder">
                    <input type="text" placeholder="Name order" class="name_oder">
                </div>
                <button class="address_btn">Add New Address</button>
                </form>
            </div>
            <div class="wrap_list_address">
                <ul>

                </ul>

            </div>
        </div>
        <div class="modal micromodal-slide " id="modal-3" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                        <h2 class="modal__title" id="modal-1-title">
                            Đổi Mật Khẩu
                        </h2>
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>
                    <main class="modal__content modal__content2" id="modal-1-content">
                        <form action="" class="form_modal_pass">
                            <div>
                                <label for="">Nhập mật khẩu cũ</label>
                                <input type="password" class="passOld">
                            </div>
                            <div>
                                <label for="">Nhập mật khẩu mới</label>
                                <input type="password" class="passNew">
                            </div>
                            <div>
                                <label for="">Nhập lại mật khẩu mới</label>
                                <input type="password" class="passNewRef">
                            </div>
                            <footer class="modal__footer">
                                <button type="submit" class="modal__btn modal__btn-primary btn_save">Save</button>
                                <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                            </footer>
                        </form>
                    </main>
                </div>
            </div>
        </div>
</section>
<script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script defer src="public/js/profile.js"></script>