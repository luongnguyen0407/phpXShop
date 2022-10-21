<section class="wrap_profile">
    <div class="box_profile">
        <div class="box_info">
            <img src="https://images.unsplash.com/photo-1633815475307-884ad652b80b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <div>
                <label for="">Email:</label>
                <input type="text" value="admin@gmail.com" disabled>
            </div>
            <div>
                <label for="">UserName:</label>
                <input type="text" value="admin" disabled>
            </div>
        </div>
        <div class="box_address scroll_style">
            <div>
                <h3 class="box_address_heading">Add New Address</h3>
                <form class="address_chose" autocomplete="off">
                    <div class="wrap_list_pr wrap_list_pr1" data-parent=1>
                        <input placeholder="Tỉnh..." type="text" id='address' readonly="readonly">
                        <ul class="list_province scroll_style">
                        </ul>
                    </div>
                    <div class="wrap_list_pr wrap_list_pr2" data-parent=2>
                        <input placeholder="Huyện..." type="text" id='address' readonly="readonly">
                        <ul class="list_province scroll_style">
                        </ul>
                    </div>
                    <div class="wrap_list_pr wrap_list_pr3" data-parent=3>
                        <input placeholder="Xã..." type="text" id='address' readonly="readonly">
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
</section>
<script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script defer src="public/js/profile.js"></script>