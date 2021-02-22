<div class="modal fade" id="new-parking-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is" id="staticBackdropLabel">اضافه کردن پارکینگ جدید</h5>
            </div>
            <div class="modal-body">
                <form action="" id="new-parking-form" class="form">

                    <div class="form-group">
                        <label for="type_parking">نوع پارکینگ:</label>
                        <select name="type_parking" id="type_parking" name="type_parking" class="form-control">
                            <option value="1">رو باز</option>
                            <option value="2">سر بسته</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="car_capacity">ظرفیت ماشین:</label>
                        <input type="number" name="car_capacity" id="car_capacity" class="form-control"
                            placeholder="ظرفیت ماشین پارکینگ را وارد نمایید">
                    </div>

                    <div class="d-block my-2 float-right w-100">
                        <input type="submit" class="btn btn-sm btn-outline-primary" value="تایید">
                        <button type="button" modal="#new-parking-modal"
                            class="close-modal btn btn-danger is">لغو</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
